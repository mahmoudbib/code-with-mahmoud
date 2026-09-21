<?php

namespace App\Http\Controllers;

use App\Models\Lesson;

class LessonController extends Controller
{
    public function show(Lesson $lesson)
    {
        // التأكد إن المحاضرة منشورة
        if (!$lesson->is_published) {
            abort(404);
        }

        return view('lesson', compact('lesson'));
    }
}