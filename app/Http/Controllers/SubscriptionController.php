<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class SubscriptionController extends Controller
{
    public function create(Course $course)
    {
        return view('subscriptions.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $validated = $request->validate([
            'payment_method' => ['required', 'in:instapay,vodafone_cash'],
            'payment_proof' => ['required', 'image', 'max:5120'],
        ]);

        // حفظ صورة إثبات التحويل
        $paymentProofPath = $request
            ->file('payment_proof')
            ->store('payment-proofs', 'public');

        // إنشاء طلب الاشتراك
        $subscription = Subscription::create([
            'user_id' => auth()->id(),
            'course_id' => $course->id,
            'amount' => $course->price,
            'payment_method' => $validated['payment_method'],
            'status' => 'pending',
            'payment_proof' => $paymentProofPath,
        ]);

        // بيانات الطالب
        $user = auth()->user();

        // رابط الطلب داخل لوحة الأدمن
        $adminUrl = URL::route(
            'admin.subscriptions.index'
        );

        // اسم طريقة الدفع بالعربي
        $paymentMethod = match ($validated['payment_method']) {
            'instapay' => 'InstaPay',
            'vodafone_cash' => 'Vodafone Cash',
            default => $validated['payment_method'],
        };

        // المسار الكامل لصورة إثبات التحويل
        $proofFullPath = Storage::disk('public')->path($paymentProofPath);

        // إرسال الإيميل للأدمن
        Mail::html(
            '
            <div style="
                direction: rtl;
                font-family: Arial, Tahoma, sans-serif;
                background:#f5f7fb;
                padding:30px;
            ">

                <div style="
                    max-width:650px;
                    margin:auto;
                    background:#ffffff;
                    border-radius:14px;
                    padding:30px;
                    box-shadow:0 4px 15px rgba(0,0,0,0.08);
                ">

                    <h2 style="
                        margin-top:0;
                        color:#111827;
                        text-align:center;
                    ">
                        📚 طلب اشتراك جديد
                    </h2>

                    <p style="
                        text-align:center;
                        color:#6b7280;
                        font-size:16px;
                    ">
                        يوجد طالب جديد قام بإرسال طلب اشتراك في
                        <strong>Code with Mahmoud</strong>
                    </p>

                    <hr style="
                        border:none;
                        border-top:1px solid #e5e7eb;
                        margin:25px 0;
                    ">

                    <div style="font-size:16px; line-height:2;">

                        <p>
                            <strong>👤 الطالب:</strong>
                            ' . e($user->name) . '
                        </p>

                        <p>
                            <strong>📧 البريد الإلكتروني:</strong>
                            ' . e($user->email) . '
                        </p>

                        <p>
                            <strong>📚 الكورس:</strong>
                            ' . e($course->title) . '
                        </p>

                        <p>
                            <strong>💰 قيمة الاشتراك:</strong>
                            ' . e($course->price) . ' جنيه / شهر
                        </p>

                        <p>
                            <strong>💳 طريقة الدفع:</strong>
                            ' . e($paymentMethod) . '
                        </p>

                        <p>
                            <strong>🕐 وقت إرسال الطلب:</strong>
                            ' . now()->format('Y-m-d H:i:s') . '
                        </p>

                    </div>

                    <hr style="
                        border:none;
                        border-top:1px solid #e5e7eb;
                        margin:25px 0;
                    ">

                    <h3 style="
                        color:#111827;
                        text-align:center;
                    ">
                        🧾 إثبات التحويل
                    </h3>

                    <div style="
                        text-align:center;
                        margin:20px 0;
                    ">
                        <img
                            src="cid:payment-proof"
                            alt="إثبات التحويل"
                            style="
                                max-width:100%;
                                width:500px;
                                border-radius:10px;
                                border:1px solid #e5e7eb;
                            "
                        >
                    </div>

                    <div style="text-align:center; margin-top:30px;">

                        <a href="' . e($adminUrl) . '"
                           style="
                                display:inline-block;
                                background:#111827;
                                color:#ffffff;
                                text-decoration:none;
                                padding:14px 28px;
                                border-radius:8px;
                                font-size:16px;
                           ">
                            👀 فتح طلبات الاشتراك
                        </a>

                    </div>

                    <p style="
                        text-align:center;
                        color:#9ca3af;
                        font-size:13px;
                        margin-top:30px;
                    ">
                        Code with Mahmoud
                    </p>

                </div>

            </div>
            ',
            function ($message) use ($proofFullPath) {

                // إظهار الصورة داخل الإيميل نفسه
                $message->embed(
                    $proofFullPath,
                    'payment-proof'
                );

                $message->to('mahm1162003@gmail.com')
                        ->subject('💳 طلب اشتراك جديد - Code with Mahmoud');
            }
        );

        return redirect()
            ->route('courses.index')
            ->with(
                'success',
                'تم إرسال طلب الاشتراك بنجاح، وسيتم مراجعته من الإدارة.'
            );
    }
}