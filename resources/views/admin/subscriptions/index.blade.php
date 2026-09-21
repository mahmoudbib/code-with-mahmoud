<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>إدارة الاشتراكات</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Tahoma, Arial, sans-serif;
            background: #f5f7fb;
            color: #222;
        }

        .container {
            width: 95%;
            max-width: 1200px;
            margin: 40px auto;
        }

        h1 {
            margin-bottom: 25px;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .badge {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
        }

        .pending {
            background: #fff3cd;
            color: #856404;
        }

        .active {
            background: #d1e7dd;
            color: #0f5132;
        }

        .expired {
            background: #f8d7da;
            color: #842029;
        }

        .rejected {
            background: #f8d7da;
            color: #842029;
        }

        .info {
            line-height: 1.9;
        }

        .info strong {
            color: #111;
        }

        .proof {
            margin-top: 15px;
        }

        .proof img {
            max-width: 250px;
            max-height: 300px;
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .btn {
            border: none;
            border-radius: 8px;
            padding: 11px 18px;
            font-size: 15px;
            font-family: inherit;
            font-weight: bold;
            cursor: pointer;
            color: white;
        }

        .btn-approve {
            background: #198754;
        }

        .btn-reject {
            background: #dc3545;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .empty {
            text-align: center;
            padding: 40px;
            color: #777;
        }

        @media (max-width: 700px) {
            .container {
                width: 92%;
            }

            .top {
                flex-direction: column;
                align-items: flex-start;
            }

            .proof img {
                max-width: 100%;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="top">
        <div>
            <h1>📋 إدارة الاشتراكات</h1>
            <p>مراجعة طلبات اشتراك الطلاب وإيصالات الدفع</p>
        </div>
    </div>

    @if(session('success'))
        <div class="success">
            ✅ {{ session('success') }}
        </div>
    @endif


    @if($subscriptions->count())

        @foreach($subscriptions as $subscription)

            <div class="card">

                <div class="top">

                    <div>
                        <h2>
                            👤 {{ $subscription->user->name }}
                        </h2>

                        <div class="info">
                            <strong>الإيميل:</strong>
                            {{ $subscription->user->email }}
                        </div>
                    </div>

                    <div>
                        @if($subscription->status === 'pending')
                            <span class="badge pending">
                                🟡 قيد المراجعة
                            </span>

                        @elseif($subscription->status === 'active')
                            <span class="badge active">
                                🟢 مفعل
                            </span>

                        @elseif($subscription->status === 'expired')
                            <span class="badge expired">
                                🔴 منتهي
                            </span>

                        @elseif($subscription->status === 'rejected')
                            <span class="badge rejected">
                                ❌ مرفوض
                            </span>
                        @endif
                    </div>

                </div>


                <div class="info">

                    <p>
                        <strong>📚 الكورس:</strong>
                        {{ $subscription->course->title }}
                    </p>

                    <p>
                        <strong>💰 المبلغ:</strong>
                        {{ $subscription->amount }} جنيه
                    </p>

                    <p>
                        <strong>💳 طريقة الدفع:</strong>

                        @if($subscription->payment_method === 'instapay')
                            InstaPay
                        @elseif($subscription->payment_method === 'vodafone_cash')
                            Vodafone Cash
                        @else
                            {{ $subscription->payment_method }}
                        @endif
                    </p>

                    <p>
                        <strong>📅 تاريخ الطلب:</strong>
                        {{ $subscription->created_at->format('Y-m-d H:i') }}
                    </p>

                    @if($subscription->starts_at)
                        <p>
                            <strong>🟢 بداية الاشتراك:</strong>
                            {{ $subscription->starts_at->format('Y-m-d H:i') }}
                        </p>
                    @endif

                    @if($subscription->expires_at)
                        <p>
                            <strong>🔴 نهاية الاشتراك:</strong>
                            {{ $subscription->expires_at->format('Y-m-d H:i') }}
                        </p>
                    @endif

                </div>


                @if($subscription->payment_proof)

                    <div class="proof">

                        <h3>🧾 إيصال الدفع</h3>

                        <img
                            src="{{ asset('storage/' . $subscription->payment_proof) }}"
                            alt="إيصال الدفع"
                        >

                    </div>

                @endif


                {{-- أزرار التحكم تظهر فقط للطلبات قيد المراجعة --}}
                @if($subscription->status === 'pending')

                    <div class="actions">

                        <form
                            action="{{ route('admin.subscriptions.approve', $subscription) }}"
                            method="POST"
                        >
                            @csrf

                            <button
                                type="submit"
                                class="btn btn-approve"
                            >
                                ✅ قبول الاشتراك
                            </button>
                        </form>


                        <form
                            action="{{ route('admin.subscriptions.reject', $subscription) }}"
                            method="POST"
                        >
                            @csrf

                            <button
                                type="submit"
                                class="btn btn-reject"
                            >
                                ❌ رفض الطلب
                            </button>
                        </form>

                    </div>

                @endif

            </div>

        @endforeach

    @else

        <div class="card empty">
            لا توجد طلبات اشتراك حالياً.
        </div>

    @endif

</div>

</body>
</html>