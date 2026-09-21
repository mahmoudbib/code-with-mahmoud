<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>حالة الاشتراك</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        .header {
            background: white;
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .header h1 {
            margin: 0 0 10px;
        }

        .subscription-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            margin-bottom: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .subscription-card h2 {
            margin-top: 0;
        }

        .info {
            margin: 12px 0;
            font-size: 16px;
        }

        .status {
            display: inline-block;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: bold;
        }

        .pending {
            background: #fef3c7;
            color: #92400e;
        }

        .active {
            background: #dcfce7;
            color: #166534;
        }

        .expired {
            background: #fee2e2;
            color: #991b1b;
        }

        .rejected {
            background: #fee2e2;
            color: #991b1b;
        }

        .empty {
            background: white;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background: #111827;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="header">
            <h1>حالة الاشتراك</h1>

            <p>
                يمكنك متابعة حالة طلبات الاشتراك الخاصة بك من هنا.
            </p>
        </div>

        @forelse ($subscriptions as $subscription)

            <div class="subscription-card">

                <h2>
                    {{ $subscription->course->title }}
                </h2>

                <div class="info">
                    <strong>المبلغ:</strong>
                    {{ $subscription->amount }} جنيه
                </div>

                <div class="info">
                    <strong>طريقة الدفع:</strong>

                    @if ($subscription->payment_method === 'instapay')
                        InstaPay
                    @else
                        Vodafone Cash
                    @endif
                </div>

                <div class="info">
                    <strong>حالة الطلب:</strong>

                    @if ($subscription->status === 'pending')

                        <span class="status pending">
                            🟡 قيد المراجعة
                        </span>

                    @elseif ($subscription->status === 'active')

                        <span class="status active">
                            🟢 الاشتراك مفعل
                        </span>

                    @elseif ($subscription->status === 'expired')

                        <span class="status expired">
                            🔴 الاشتراك منتهي
                        </span>

                    @elseif ($subscription->status === 'rejected')

                        <span class="status rejected">
                            ❌ تم رفض الطلب
                        </span>

                    @endif
                </div>

                @if ($subscription->starts_at)
                    <div class="info">
                        <strong>بداية الاشتراك:</strong>
                        {{ $subscription->starts_at->format('Y-m-d') }}
                    </div>
                @endif

                @if ($subscription->expires_at)
                    <div class="info">
                        <strong>نهاية الاشتراك:</strong>
                        {{ $subscription->expires_at->format('Y-m-d') }}
                    </div>
                @endif

            </div>

        @empty

            <div class="empty">

                <h2>لا يوجد اشتراك حتى الآن</h2>

                <p>
                    لم تقم بإرسال أي طلب اشتراك.
                </p>

                <a
                    href="{{ route('courses.index') }}"
                    class="back-btn"
                >
                    تصفح الكورسات
                </a>

            </div>

        @endforelse

    </div>

</body>

</html>