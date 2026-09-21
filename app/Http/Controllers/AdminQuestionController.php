<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;

class AdminQuestionController extends Controller
{
    /**
     * عرض أسئلة امتحان معين
     */
    public function index(Exam $exam)
    {
        $questions = $exam->questions;

        return view('admin.questions.index', compact(
            'exam',
            'questions'
        ));
    }

    /**
     * صفحة إضافة سؤال جديد
     */
    public function create(Exam $exam)
    {
        return view('admin.questions.create', compact('exam'));
    }

    /**
     * حفظ سؤال جديد
     */
    public function store(Request $request, Exam $exam)
    {
        $validated = $request->validate([
            'question' => ['required', 'string'],
            'option_a' => ['required', 'string', 'max:255'],
            'option_b' => ['required', 'string', 'max:255'],
            'option_c' => ['required', 'string', 'max:255'],
            'option_d' => ['required', 'string', 'max:255'],
            'correct_answer' => ['required', 'in:a,b,c,d'],
            'mark' => ['required', 'integer', 'min:1'],
            'sort_order' => ['required', 'integer', 'min:0'],
        ]);

        $validated['exam_id'] = $exam->id;

        Question::create($validated);

        return redirect()
            ->route('admin.questions.index', $exam)
            ->with('success', 'تمت إضافة السؤال بنجاح.');
    }
}