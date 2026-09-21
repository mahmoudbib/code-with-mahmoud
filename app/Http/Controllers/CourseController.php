<?php

namespace App\Http\Controllers;

use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('is_published', true)->get();

        return view('courses.index', compact('courses'));
    }
}