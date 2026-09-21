<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubscriptionMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login');
        }

        $hasActiveSubscription = $user->subscriptions()
            ->where('status', 'active')
            ->where('starts_at', '<=', now())
            ->where('expires_at', '>=', now())
            ->exists();

        if (!$hasActiveSubscription) {
            return redirect()
                ->route('subscriptions.status')
                ->with('error', 'لا يمكنك الدخول إلى محتوى الكورس، لأن اشتراكك غير مفعل أو انتهت مدته.');
        }

        return $next($request);
    }
}