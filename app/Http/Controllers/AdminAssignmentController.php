<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class AdminAssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::with([
            'course',
            'lesson',
        ])
        ->latest()
        ->get();

        return view(
            'admin.assignments.index',
            compact('assignments')
        );
    }

    public function create()
    {
        $courses = Course::where('is_published', true)
            ->get();

        $lessons = Lesson::where('is_published', true)
            ->orderBy('sort_order')
            ->get();

        return view(
            'admin.assignments.create',
            compact('courses', 'lessons')
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => [
                'required',
                'exists:courses,id',
            ],

            'lesson_id' => [
                'nullable',
                'exists:lessons,id',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'total_marks' => [
                'required',
                'integer',
                'min:1',
            ],

            'is_published' => [
                'nullable',
                'boolean',
            ],
        ]);

        $validated['is_published'] =
            $request->boolean('is_published');

        Assignment::create($validated);

        return redirect()
            ->route('admin.assignments.index')
            ->with(
                'success',
                'تمت إضافة الواجب بنجاح.'
            );
    }
}