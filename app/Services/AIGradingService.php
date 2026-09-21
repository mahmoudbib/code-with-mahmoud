<?php

namespace App\Services;

use App\Models\AssignmentSubmission;
use Illuminate\Support\Facades\Storage;
use OpenAI;

class AIGradingService
{
    public function grade(AssignmentSubmission $submission): array
    {
        $submission->load(['assignment', 'images']);

        $client = OpenAI::client(
            config('services.openai.api_key')
        );

        $content = [
            [
                'type' => 'input_text',
                'text' => $this->buildPrompt($submission),
            ],
        ];

        foreach ($submission->images as $image) {
            $path = Storage::disk('public')->path($image->image_path);

            if (!file_exists($path)) {
                continue;
            }

            $mimeType = mime_content_type($path);
            $base64 = base64_encode(file_get_contents($path));

            $content[] = [
                'type' => 'input_image',
                'image_url' => "data:{$mimeType};base64,{$base64}",
            ];
        }

        $response = $client->responses()->create([
            'model' => 'gpt-5.6-luna',
            'input' => [
                [
                    'role' => 'user',
                    'content' => $content,
                ],
            ],
        ]);

        /*
         * الـResponses API ممكن ترجع أكثر من Output
         * مثل:
         *
         * OutputReasoning
         * OutputMessage
         *
         * لذلك لا نعتمد على output[0].
         *
         * نبحث عن OutputMessage الذي يحتوي على النص.
         */

        $text = '';

        foreach ($response->output as $output) {
            if (!isset($output->content)) {
                continue;
            }

            foreach ($output->content as $contentItem) {
                if (
                    isset($contentItem->type) &&
                    $contentItem->type === 'output_text' &&
                    isset($contentItem->text)
                ) {
                    $text = $contentItem->text;
                    break 2;
                }
            }
        }

        if ($text === '') {
            throw new \RuntimeException(
                'لم يتم العثور على نص في نتيجة الذكاء الاصطناعي.'
            );
        }

        return $this->parseResponse($text);
    }

    private function buildPrompt(AssignmentSubmission $submission): string
    {
        $totalMarks = $submission->assignment->total_marks;

        return <<<PROMPT
أنت مدرس برمجة تقوم بتصحيح واجب طالب.

الطالب رفع صورًا تحتوي على السؤال وإجابته معًا.

مهمتك:

1. اقرأ السؤال من الصور.
2. اقرأ إجابة الطالب.
3. حدد هل الإجابة صحيحة أم خاطئة.
4. إذا كانت الإجابة خاطئة، اكتب الإجابة الصحيحة.
5. اشرح للطالب سبب الخطأ بطريقة بسيطة ومناسبة لطالب في المرحلة الثانوية.
6. اقترح درجة مناسبة للإجابة.
7. لا تفترض معلومات غير موجودة في الصورة.
8. إذا كانت الصورة غير واضحة، اذكر أن الصورة غير واضحة بدل اختراع إجابة.
9. الدرجة الكلية للواجب هي {$totalMarks} درجات.

أريد النتيجة بصيغة JSON فقط بهذا الشكل:

{
    "score": 0,
    "feedback": "ملخص عام لتصحيح الواجب",
    "questions": [
        {
            "question": "نص السؤال",
            "student_answer": "إجابة الطالب",
            "is_correct": false,
            "score": 0,
            "correct_answer": "الإجابة الصحيحة",
            "explanation": "شرح سبب الخطأ"
        }
    ]
}

قواعد مهمة:

- score يجب أن يكون من 0 إلى {$totalMarks}.
- إذا كانت الإجابة صحيحة اجعل correct_answer فارغًا.
- إذا كانت الإجابة خاطئة يجب كتابة correct_answer و explanation.
- لا تضف أي كلام خارج JSON.

PROMPT;
    }

    private function parseResponse(string $text): array
    {
        $text = trim($text);

        /*
         * إزالة Markdown لو الموديل رجّع JSON داخل ```json
         */

        $text = preg_replace('/^```json\s*/i', '', $text);
        $text = preg_replace('/^```\s*/', '', $text);
        $text = preg_replace('/\s*```$/', '', $text);

        $text = trim($text);

        $data = json_decode($text, true);

        if (!is_array($data)) {
            throw new \RuntimeException(
                'تعذر قراءة نتيجة تصحيح الذكاء الاصطناعي.'
            );
        }

        return $data;
    }
}