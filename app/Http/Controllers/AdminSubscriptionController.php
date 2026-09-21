<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class AdminSubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::with(['user', 'course'])
            ->latest()
            ->get();

        return view('admin.subscriptions.index', compact('subscriptions'));
    }

    public function approve(Subscription $subscription)
    {
        $subscription->update([
            'status' => 'active',
            'starts_at' => now(),
            'expires_at' => now()->addMonth(),
        ]);

        return redirect()
            ->route('admin.subscriptions.index')
            ->with('success', 'تم قبول الاشتراك وتفعيله بنجاح.');
    }

    public function reject(Subscription $subscription)
    {
        $subscription->update([
            'status' => 'rejected',
            'starts_at' => null,
            'expires_at' => null,
        ]);

        return redirect()
            ->route('admin.subscriptions.index')
            ->with('success', 'تم رفض طلب الاشتراك.');
    }
}