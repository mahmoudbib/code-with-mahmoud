<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class AdminLessonController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | عرض كل المحاضرات
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $lessons = Lesson::with('course')
            ->orderBy('course_id')
            ->orderBy('sort_order')
            ->get();

        return view('admin.lessons.index', compact('lessons'));
    }


    /*
    |--------------------------------------------------------------------------
    | صفحة إضافة محاضرة
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $courses = Course::where('is_published', true)->get();

        return view('admin.lessons.create', compact('courses'));
    }


    /*
    |--------------------------------------------------------------------------
    | حفظ محاضرة جديدة
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => ['required', 'exists:courses,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'video_url' => ['nullable', 'url', 'max:255'],
            'pdf_file' => ['nullable', 'file', 'mimes:pdf', 'max:10240'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('pdf_file')) {
            $validated['pdf_file'] = $request
                ->file('pdf_file')
                ->store('lessons/pdfs', 'public');
        }

        $validated['is_published'] = $request->boolean('is_published');

        Lesson::create($validated);

        return redirect()
            ->route('admin.lessons.index')
            ->with('success', 'تمت إضافة المحاضرة بنجاح.');
    }


    /*
    |--------------------------------------------------------------------------
    | صفحة تعديل المحاضرة
    |--------------------------------------------------------------------------
    */

    public function edit(Lesson $lesson)
    {
        $courses = Course::where('is_published', true)->get();

        return view('admin.lessons.edit', compact('lesson', 'courses'));
    }


    /*
    |--------------------------------------------------------------------------
    | تحديث المحاضرة
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, Lesson $lesson)
    {
        $validated = $request->validate([
            'course_id' => ['required', 'exists:courses,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'video_url' => ['nullable', 'url', 'max:255'],
            'pdf_file' => ['nullable', 'file', 'mimes:pdf', 'max:10240'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | لو رفع PDF جديد
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('pdf_file')) {
            $validated['pdf_file'] = $request
                ->file('pdf_file')
                ->store('lessons/pdfs', 'public');
        } else {
            // الاحتفاظ بالـ PDF القديم
            unset($validated['pdf_file']);
        }


        /*
        |--------------------------------------------------------------------------
        | حالة النشر
        |--------------------------------------------------------------------------
        */

        $validated['is_published'] = $request->boolean('is_published');


        /*
        |--------------------------------------------------------------------------
        | تحديث المحاضرة
        |--------------------------------------------------------------------------
        */

        $lesson->update($validated);


        return redirect()
            ->route('admin.lessons.index')
            ->with('success', 'تم تعديل المحاضرة بنجاح.');
    }
}