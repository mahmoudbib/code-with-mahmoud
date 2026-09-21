<?php

namespace App\Http\Controllers;

use App\Models\ExamAttempt;

class AdminExamAttemptController extends Controller
{
    public function index()
    {
        $attempts = ExamAttempt::with([
            'user',
            'exam',
        ])
        ->latest()
        ->get();

        return view('admin.exam-attempts.index', compact('attempts'));
    }
}