<?php

namespace App\Http\Controllers;

use App\Models\AssignmentSubmission;
use App\Services\AIGradingService;
use Illuminate\Http\Request;

class AdminAssignmentSubmissionController extends Controller
{
    public function index()
    {
        $submissions = AssignmentSubmission::with([
            'assignment',
            'user',
            'images',
        ])
        ->latest()
        ->get();

        return view(
            'admin.assignment-submissions.index',
            compact('submissions')
        );
    }

    public function show(AssignmentSubmission $submission)
    {
        $submission->load([
            'assignment',
            'user',
            'images',
        ]);

        return view(
            'admin.assignment-submissions.show',
            compact('submission')
        );
    }

    public function gradeWithAI(
        AssignmentSubmission $submission,
        AIGradingService $aiGradingService
    ) {
        try {
            $result = $aiGradingService->grade($submission);

            $submission->update([
                'ai_score' => $result['score'] ?? null,
                'ai_feedback' => json_encode(
                    $result,
                    JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
                ),
            ]);

            return redirect()
                ->route(
                    'admin.assignment-submissions.show',
                    $submission
                )
                ->with(
                    'success',
                    'تم تصحيح الواجب بالذكاء الاصطناعي بنجاح.'
                );

        } catch (\Throwable $e) {

            return redirect()
                ->route(
                    'admin.assignment-submissions.show',
                    $submission
                )
                ->with(
                    'error',
                    'حدث خطأ أثناء تصحيح الواجب بالذكاء الاصطناعي: '
                    . $e->getMessage()
                );
        }
    }

    public function review(
        Request $request,
        AssignmentSubmission $submission
    ) {
        $validated = $request->validate([
            'final_score' => [
                'required',
                'integer',
                'min:0',
                'max:' . $submission->assignment->total_marks,
            ],

            'teacher_feedback' => [
                'nullable',
                'string',
            ],
        ]);

        $submission->update([
            'final_score' => $validated['final_score'],
            'teacher_feedback' => $validated['teacher_feedback'] ?? null,
            'status' => 'reviewed',
            'reviewed_at' => now(),
        ]);

        return redirect()
            ->route(
                'admin.assignment-submissions.show',
                $submission
            )
            ->with(
                'success',
                'تم اعتماد تصحيح الواجب بنجاح.'
            );
    }
}