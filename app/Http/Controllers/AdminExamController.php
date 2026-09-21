<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exam;
use Illuminate\Http\Request;

class AdminExamController extends Controller
{
    /**
     * عرض كل الامتحانات
     */
    public function index()
    {
        $exams = Exam::with('course')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.exams.index', compact('exams'));
    }

    /**
     * صفحة إضافة امتحان
     */
    public function create()
    {
        $courses = Course::where('is_published', true)->get();

        return view('admin.exams.create', compact('courses'));
    }

    /**
     * حفظ الامتحان
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => ['required', 'exists:courses,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'duration' => ['nullable', 'integer', 'min:1'],
            'total_marks' => ['required', 'integer', 'min:1'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | رفع صورة الامتحان
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('exams', 'public');
        }

        $validated['is_published'] = $request->boolean('is_published');

        Exam::create($validated);

        return redirect()
            ->route('admin.exams.index')
            ->with('success', 'تمت إضافة الامتحان بنجاح.');
    }
}