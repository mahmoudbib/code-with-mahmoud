<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentSubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = auth()->user()
            ->subscriptions()
            ->with('course')
            ->latest()
            ->get();

        return view('subscriptions.status', compact('subscriptions'));
    }
}