<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exam;
use App\Models\ExamAttempt;
use App\Models\ExamAnswer;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $course = Course::where('slug', 'programming-second-secondary')
            ->firstOrFail();

        $exams = Exam::where('course_id', $course->id)
            ->where('is_published', true)
            ->orderBy('id')
            ->get();

        return view('exams.index', compact('course', 'exams'));
    }

    public function start(Exam $exam)
    {
        if (!$exam->is_published) {
            abort(404);
        }

        /*
         * التأكد إن الطالب لم يسلم الامتحان من قبل
         */
        $existingAttempt = ExamAttempt::where('user_id', auth()->id())
            ->where('exam_id', $exam->id)
            ->latest('submitted_at')
            ->first();

        if ($existingAttempt) {
            return redirect()
                ->route('exams.result', $existingAttempt)
                ->with(
                    'error',
                    'لقد قمت بتسليم هذا الامتحان من قبل، ولا يمكن إعادة حله.'
                );
        }

        $exam->load([
            'questions' => function ($query) {
                $query->orderBy('sort_order');
            }
        ]);

        return view('exams.start', compact('exam'));
    }

    public function submit(Request $request, Exam $exam)
    {
        if (!$exam->is_published) {
            abort(404);
        }

        /*
         * التأكد مرة أخرى قبل إنشاء المحاولة
         *
         * مهم جدًا لأن الطالب ممكن يحاول إرسال الطلب
         * مرة ثانية حتى لو لم يدخل من صفحة البداية.
         */
        $existingAttempt = ExamAttempt::where('user_id', auth()->id())
            ->where('exam_id', $exam->id)
            ->latest('submitted_at')
            ->first();

        if ($existingAttempt) {
            return redirect()
                ->route('exams.result', $existingAttempt)
                ->with(
                    'error',
                    'لقد قمت بتسليم هذا الامتحان من قبل، ولا يمكن إعادة حله.'
                );
        }

        $exam->load([
            'questions' => function ($query) {
                $query->orderBy('sort_order');
            }
        ]);

        $answers = $request->input('answers', []);

        $attempt = ExamAttempt::create([
            'user_id' => auth()->id(),
            'exam_id' => $exam->id,
            'score' => 0,
            'total_marks' => $exam->total_marks,
            'started_at' => now(),
            'submitted_at' => now(),
        ]);

        $score = 0;

        foreach ($exam->questions as $question) {

            $studentAnswer = $answers[$question->id] ?? null;

            $isCorrect = $studentAnswer !== null
                && $studentAnswer === $question->correct_answer;

            $earnedMark = $isCorrect
                ? $question->mark
                : 0;

            ExamAnswer::create([
                'exam_attempt_id' => $attempt->id,
                'question_id' => $question->id,
                'answer' => $studentAnswer,
                'is_correct' => $isCorrect,
                'earned_mark' => $earnedMark,
            ]);

            $score += $earnedMark;
        }

        $attempt->update([
            'score' => $score,
        ]);

        return redirect()
            ->route('exams.result', $attempt)
            ->with(
                'success',
                'تم تسليم الاختبار وتصحيحه بنجاح.'
            );
    }

    public function result(ExamAttempt $attempt)
    {
        if ($attempt->user_id !== auth()->id()) {
            abort(403);
        }

        $attempt->load([
            'exam',
            'answers.question',
        ]);

        $correctAnswers = $attempt->answers
            ->where('is_correct', true)
            ->count();

        $wrongAnswers = $attempt->answers
            ->where('is_correct', false)
            ->count();

        $totalQuestions = $attempt->answers->count();

        $percentage = $attempt->total_marks > 0
            ? round(($attempt->score / $attempt->total_marks) * 100)
            : 0;

        return view('exams.result', compact(
            'attempt',
            'correctAnswers',
            'wrongAnswers',
            'totalQuestions',
            'percentage'
        ));
    }
}