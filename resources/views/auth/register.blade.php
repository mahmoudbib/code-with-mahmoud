<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Code with Mahmoud</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .register-container {
            width: 100%;
            max-width: 450px;
        }

        .register-card {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.08);
        }

        .logo {
            text-align: center;
            font-size: 45px;
            margin-bottom: 10px;
        }

        h1 {
            text-align: center;
            color: #111827;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #6b7280;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #374151;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-size: 16px;
            outline: none;
            transition: 0.2s;
            background: white;
        }

        input:focus,
        select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .error {
            color: #dc2626;
            font-size: 14px;
            margin-top: 6px;
        }

        .register-btn {
            width: 100%;
            border: none;
            background: #2563eb;
            color: white;
            padding: 14px;
            border-radius: 10px;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
            margin-top: 5px;
        }

        .register-btn:hover {
            background: #1d4ed8;
        }

        .links {
            text-align: center;
            margin-top: 25px;
        }

        .links p {
            color: #6b7280;
        }

        .links a {
            color: #2563eb;
            text-decoration: none;
            font-weight: bold;
        }

        .links a:hover {
            text-decoration: underline;
        }

        @media (max-width: 500px) {

            .register-card {
                padding: 25px;
            }

        }

    </style>

</head>

<body>

<div class="register-container">

    <div class="register-card">

        <div class="logo">
            💻
        </div>

        <h1>
            إنشاء حساب جديد
        </h1>

        <p class="subtitle">
            انضم إلى Code with Mahmoud وابدأ رحلة التعلم
        </p>


        <form method="POST" action="{{ route('register') }}">

            @csrf


            <!-- الاسم -->

            <div class="form-group">

                <label for="name">
                    الاسم
                </label>

                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="اكتب اسمك"
                >

                @error('name')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- البريد الإلكتروني -->

            <div class="form-group">

                <label for="email">
                    البريد الإلكتروني
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                    placeholder="example@email.com"
                >

                @error('email')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- نوع الطالب -->

            <div class="form-group">

                <label for="student_type">
                    أنت طالب في
                </label>

                <select
                    id="student_type"
                    name="student_type"
                    required
                >

                    <option value="">
                        -- اختر المسار --
                    </option>


                    <option
                        value="baccalaureate_first"
                        {{ old('student_type') == 'baccalaureate_first' ? 'selected' : '' }}
                    >
                        بكالوريا أولى
                    </option>


                    <option
                        value="baccalaureate_second"
                        {{ old('student_type') == 'baccalaureate_second' ? 'selected' : '' }}
                    >
                        بكالوريا ثانية
                    </option>


                    <option
                        value="azhar"
                        {{ old('student_type') == 'azhar' ? 'selected' : '' }}
                    >
                        الأزهر
                    </option>

                </select>


                @error('student_type')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- كلمة المرور -->

            <div class="form-group">

                <label for="password">
                    كلمة المرور
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="********"
                >

                @error('password')

                    <div class="error">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- تأكيد كلمة المرور -->

            <div class="form-group">

                <label for="password_confirmation">
                    تأكيد كلمة المرور
                </label>

                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="********"
                >

            </div>


            <!-- إنشاء الحساب -->

            <button
                type="submit"
                class="register-btn"
            >
                إنشاء الحساب
            </button>

        </form>


        <div class="links">

            <p>

                لديك حساب بالفعل؟

                <a href="{{ route('login') }}">
                    تسجيل الدخول
                </a>

            </p>

        </div>

    </div>

</div>

</body>

</html>