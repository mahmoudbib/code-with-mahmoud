<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>الاشتراك في الكورس</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        h1 {
            margin-top: 0;
        }

        .price {
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0;
        }

        .payment-box {
            background: #f5f7fb;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
        }

        .payment-box h3 {
            margin-top: 0;
        }

        .payment-box p {
            font-size: 17px;
            line-height: 1.8;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 8px;
            font-weight: bold;
        }

        select,
        input[type="file"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 14px;
            margin-top: 20px;
            background: #111827;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #000;
        }

        .error-box {
            background: #fee2e2;
            color: #991b1b;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .error-box ul {
            margin: 0;
            padding-right: 20px;
        }

        .payment-number {
            font-weight: bold;
            font-size: 18px;
            direction: ltr;
            display: inline-block;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>الاشتراك في الكورس</h1>

        <h2>{{ $course->title }}</h2>

        <div class="price">
            {{ $course->price }} جنيه / شهر
        </div>

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="payment-box">

            <h3>طريقة الدفع</h3>

            <p>
                قم بتحويل قيمة الاشتراك الشهري <strong>200 جنيه</strong>
                إلى إحدى طرق الدفع التالية، ثم اختر طريقة الدفع التي استخدمتها وارفع صورة إثبات التحويل.
            </p>

            <p>
                <strong>InstaPay:</strong>
                <span class="payment-number">01224189851</span>
            </p>

            <p>
                <strong>Vodafone Cash:</strong>
                <span class="payment-number">01098391339</span>
            </p>

        </div>

        <form
            action="{{ route('subscriptions.store', $course) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <label for="payment_method">
                اختر طريقة الدفع
            </label>

            <select
                id="payment_method"
                name="payment_method"
                required
            >
                <option value="">-- اختر طريقة الدفع --</option>

                <option
                    value="instapay"
                    {{ old('payment_method') == 'instapay' ? 'selected' : '' }}
                >
                    InstaPay
                </option>

                <option
                    value="vodafone_cash"
                    {{ old('payment_method') == 'vodafone_cash' ? 'selected' : '' }}
                >
                    Vodafone Cash
                </option>
            </select>

            <label for="payment_proof">
                إثبات التحويل
            </label>

            <input
                type="file"
                id="payment_proof"
                name="payment_proof"
                accept="image/*"
                required
            >

            <button type="submit">
                إرسال طلب الاشتراك
            </button>

        </form>

    </div>

</body>

</html>