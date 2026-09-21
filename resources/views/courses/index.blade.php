<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>الكورسات | منصتي التعليمية</title>


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            font-family: Tahoma, Arial, sans-serif;

            background:
                radial-gradient(
                    circle at 5% 10%,
                    rgba(37, 99, 235, 0.08),
                    transparent 22%
                ),
                radial-gradient(
                    circle at 95% 80%,
                    rgba(16, 185, 129, 0.08),
                    transparent 22%
                ),
                #f5f8fc;

            color: #172033;

            line-height: 1.7;

            overflow-x: hidden;
        }


        a {
            text-decoration: none;

            color: inherit;
        }


        .container {
            width: min(1150px, 92%);

            margin: auto;
        }


        /* =====================================
           Navbar
        ===================================== */

        .navbar {
            background: rgba(255, 255, 255, 0.96);

            backdrop-filter: blur(12px);

            border-bottom: 1px solid #e5e7eb;

            position: sticky;

            top: 0;

            z-index: 100;
        }


        .nav-content {
            min-height: 75px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 25px;
        }


        .logo {
            font-size: 25px;

            font-weight: bold;

            color: #2563eb;

            white-space: nowrap;
        }


        .nav-links {
            display: flex;

            align-items: center;

            gap: 25px;

            color: #475569;
        }


        .nav-links a {
            transition: 0.2s;
        }


        .nav-links a:hover {
            color: #2563eb;
        }


        .nav-buttons {
            display: flex;

            align-items: center;

            gap: 10px;
        }


        .btn {
            display: inline-block;

            padding: 10px 20px;

            border-radius: 10px;

            font-weight: bold;

            transition: 0.2s;

            border: none;

            cursor: pointer;

            font-family: inherit;

            font-size: 15px;
        }


        .btn-primary {
            background: #2563eb;

            color: white;
        }


        .btn-primary:hover {
            background: #1d4ed8;

            transform: translateY(-2px);
        }


        .btn-outline {
            border: 1px solid #2563eb;

            color: #2563eb;

            background: white;
        }


        .btn-outline:hover {
            background: #eff6ff;

            transform: translateY(-2px);
        }


        .user-name {
            color: #2563eb;

            font-weight: bold;

            white-space: nowrap;
        }


        .logout-form {
            margin: 0;
        }


        /* =====================================
           Programming Background
        ===================================== */

        .background-symbol {
            position: fixed;

            pointer-events: none;

            user-select: none;

            color: #2563eb;

            opacity: 0.06;

            font-family: Consolas, monospace;

            font-weight: bold;

            z-index: 0;
        }


        .symbol-one {
            left: 35px;

            top: 25%;

            font-size: 90px;

            transform: rotate(-10deg);
        }


        .symbol-two {
            right: 30px;

            top: 42%;

            font-size: 100px;

            color: #10b981;

            transform: rotate(8deg);
        }


        .symbol-three {
            left: 70px;

            bottom: 12%;

            font-size: 65px;
        }


        .symbol-four {
            right: 65px;

            bottom: 18%;

            font-size: 60px;

            color: #10b981;
        }


        /* =====================================
           Page Hero
        ===================================== */

        .page-hero {
            position: relative;

            overflow: hidden;

            padding: 70px 0 55px;

            text-align: center;

            background:
                radial-gradient(
                    circle at 20% 30%,
                    rgba(37, 99, 235, 0.10),
                    transparent 25%
                ),
                linear-gradient(
                    135deg,
                    #eff6ff,
                    #ffffff
                );
        }


        .page-hero h1 {
            position: relative;

            z-index: 2;

            font-size: clamp(34px, 5vw, 50px);

            margin-bottom: 12px;
        }


        .page-hero h1 span {
            color: #2563eb;
        }


        .page-hero p {
            position: relative;

            z-index: 2;

            color: #64748b;

            font-size: 17px;
        }


        .js-mini {
            position: absolute;

            left: 9%;

            top: 30px;

            padding: 9px 15px;

            background: #facc15;

            color: #111827;

            border-radius: 9px;

            font-family: Consolas, monospace;

            font-weight: bold;

            transform: rotate(-7deg);

            box-shadow:
                0 8px 20px rgba(0, 0, 0, 0.08);
        }


        .code-mini {
            position: absolute;

            right: 8%;

            bottom: 25px;

            color: #2563eb;

            opacity: 0.16;

            font-family: Consolas, monospace;

            direction: ltr;

            text-align: left;
        }


        /* =====================================
           Courses Section
        ===================================== */

        .courses-section {
            position: relative;

            z-index: 2;

            padding: 55px 0 90px;
        }


        .courses-grid {
            display: grid;

            grid-template-columns:
                repeat(
                    auto-fit,
                    minmax(310px, 1fr)
                );

            gap: 25px;
        }


        /* =====================================
           Course Card
        ===================================== */

        .course {
            position: relative;

            overflow: hidden;

            background: white;

            border: 1px solid #e5e7eb;

            border-radius: 24px;

            padding: 0;

            box-shadow:
                0 10px 30px rgba(
                    15,
                    23,
                    42,
                    0.055
                );

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease;
        }


        .course:hover {
            transform: translateY(-7px);

            box-shadow:
                0 20px 45px rgba(
                    15,
                    23,
                    42,
                    0.10
                );
        }


        /* =====================================
           Course Top
        ===================================== */

        .course-top {
            position: relative;

            height: 155px;

            overflow: hidden;

            background:
                linear-gradient(
                    135deg,
                    #172033,
                    #2563eb
                );

            display: flex;

            align-items: center;

            justify-content: center;
        }


        .course-top::before {
            content: "{ }";

            position: absolute;

            right: 20px;

            top: 15px;

            font-family: Consolas, monospace;

            font-size: 65px;

            color: rgba(255, 255, 255, 0.08);
        }


        .course-top::after {
            content: "</>";

            position: absolute;

            left: 20px;

            bottom: 5px;

            font-family: Consolas, monospace;

            font-size: 55px;

            color: rgba(255, 255, 255, 0.08);
        }


        .js-card-icon {
            position: relative;

            z-index: 2;

            width: 75px;

            height: 75px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #facc15;

            color: #111827;

            border-radius: 17px;

            font-family: Consolas, monospace;

            font-size: 28px;

            font-weight: bold;

            box-shadow:
                0 12px 25px rgba(
                    0,
                    0,
                    0,
                    0.20
                );
        }


        /* =====================================
           Course Body
        ===================================== */

        .course-body {
            padding: 25px;
        }


        .course-tag {
            display: inline-block;

            background: #dbeafe;

            color: #1d4ed8;

            padding: 5px 12px;

            border-radius: 20px;

            font-size: 12px;

            font-weight: bold;

            margin-bottom: 12px;
        }


        .course h2 {
            margin: 0 0 10px;

            font-size: 22px;

            color: #172033;

            line-height: 1.5;
        }


        .course-description {
            color: #64748b;

            line-height: 1.8;

            font-size: 14px;

            min-height: 55px;
        }


        /* =====================================
           Course Footer
        ===================================== */

        .course-footer {
            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 15px;

            margin-top: 22px;

            padding-top: 18px;

            border-top: 1px solid #eef2f7;
        }


        .price-box {
            display: flex;

            flex-direction: column;
        }


        .price-label {
            color: #94a3b8;

            font-size: 12px;

            margin-bottom: 2px;
        }


        .price {
            color: #198754;

            font-size: 22px;

            font-weight: 800;
        }


        .price span {
            font-size: 12px;

            color: #64748b;

            font-weight: normal;
        }


        .subscribe-btn {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

            padding: 12px 18px;

            background:
                linear-gradient(
                    135deg,
                    #198754,
                    #15945a
                );

            color: white;

            border-radius: 11px;

            font-weight: bold;

            white-space: nowrap;

            box-shadow:
                0 7px 18px rgba(
                    25,
                    135,
                    84,
                    0.18
                );

            transition: 0.2s;
        }


        .subscribe-btn:hover {
            transform: translateY(-2px);

            box-shadow:
                0 11px 22px rgba(
                    25,
                    135,
                    84,
                    0.25
                );
        }


        /* =====================================
           Empty
        ===================================== */

        .empty {
            background: white;

            border: 1px solid #e5e7eb;

            border-radius: 20px;

            padding: 50px;

            text-align: center;

            color: #64748b;
        }


        /* =====================================
           Footer
        ===================================== */

        footer {
            position: relative;

            z-index: 2;

            background: #0f172a;

            color: #cbd5e1;

            padding: 30px 0;

            text-align: center;
        }


        /* =====================================
           Responsive
        ===================================== */

        @media (max-width: 850px) {

            .nav-links {
                display: none;
            }

        }


        @media (max-width: 600px) {

            .nav-content {
                min-height: 65px;
            }


            .logo {
                font-size: 20px;
            }


            .nav-buttons .btn {
                padding: 8px 12px;

                font-size: 13px;
            }


            .user-name {
                display: none;
            }


            .page-hero {
                padding: 55px 0 45px;
            }


            .page-hero h1 {
                font-size: 34px;
            }


            .courses-section {
                padding-top: 40px;
            }


            .course-footer {
                align-items: stretch;

                flex-direction: column;
            }


            .subscribe-btn {
                width: 100%;
            }


            .price-box {
                text-align: center;
            }


            .js-mini,
            .code-mini {
                display: none;
            }

        }

    </style>

</head>


<body>


    <!-- =====================================
         Background Symbols
    ===================================== -->

    <div class="background-symbol symbol-one">
        &lt;/&gt;
    </div>

    <div class="background-symbol symbol-two">
        { }
    </div>

    <div class="background-symbol symbol-three">
        JS
    </div>

    <div class="background-symbol symbol-four">
        ⚡
    </div>



    <!-- =====================================
         Navbar
    ===================================== -->

    <header class="navbar">

        <div class="container nav-content">


            <div class="logo">
                💻 منصتي التعليمية
            </div>


            <nav class="nav-links">

                <a href="{{ url('/') }}">
                    الرئيسية
                </a>

                <a href="{{ url('/#features') }}">
                    مميزات المنصة
                </a>

                <a href="{{ route('courses.index') }}">
                    الكورسات
                </a>

                <a href="{{ url('/#contact') }}">
                    تواصل معنا
                </a>

            </nav>


            <div class="nav-buttons">


                @auth

                    <span class="user-name">
                        👋 مرحبًا، {{ auth()->user()->name }}
                    </span>


                    <a
                        href="{{ route('dashboard') }}"
                        class="btn btn-primary"
                    >
                        لوحة التحكم
                    </a>


                    <form
                        method="POST"
                        action="{{ route('logout') }}"
                        class="logout-form"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="btn btn-outline"
                        >
                            تسجيل الخروج
                        </button>

                    </form>


                @else


                    <a
                        href="{{ route('login') }}"
                        class="btn btn-outline"
                    >
                        تسجيل الدخول
                    </a>


                    <a
                        href="{{ route('register') }}"
                        class="btn btn-primary"
                    >
                        إنشاء حساب
                    </a>


                @endauth


            </div>

        </div>

    </header>



    <!-- =====================================
         Page Hero
    ===================================== -->

    <section class="page-hero">


        <div class="js-mini">
            JavaScript ⚡
        </div>


        <div class="code-mini">

            const course = "Programming";<br>

            console.log(course);

        </div>


        <div class="container">

            <h1>

                الكورسات

                <span>
                    التعليمية
                </span>

            </h1>


            <p>
                اختار الكورس المناسب وابدأ رحلتك في تعلم البرمجة 🚀
            </p>

        </div>

    </section>



    <!-- =====================================
         Courses
    ===================================== -->

    <section class="courses-section">


        <div class="container">


            @if($courses->count() > 0)


                <div class="courses-grid">


                    @foreach ($courses as $course)


                        <div class="course">


                            <!-- Course Header -->

                            <div class="course-top">


                                <div class="js-card-icon">
                                    JS
                                </div>


                            </div>



                            <!-- Course Body -->

                            <div class="course-body">


                                <span class="course-tag">
                                    📚 برمجة
                                </span>


                                <h2>
                                    {{ $course->title }}
                                </h2>


                                <p class="course-description">

                                    {{ $course->description }}

                                </p>



                                <div class="course-footer">


                                    <div class="price-box">

                                        <span class="price-label">
                                            الاشتراك الشهري
                                        </span>


                                        <div class="price">

                                            {{ number_format($course->price, 0) }}

                                            <span>
                                                جنيه / شهر
                                            </span>

                                        </div>

                                    </div>



                                    <a
                                        href="{{ route('subscriptions.create', $course) }}"
                                        class="subscribe-btn"
                                    >

                                        اشترك الآن

                                        <span>
                                            ←
                                        </span>

                                    </a>


                                </div>


                            </div>


                        </div>


                    @endforeach


                </div>


            @else


                <div class="empty">

                    <h2>
                        📚 لا توجد كورسات متاحة حاليًا
                    </h2>

                    <p>
                        سيتم إضافة الكورسات قريبًا.
                    </p>

                </div>


            @endif


        </div>


    </section>



    <!-- =====================================
         Footer
    ===================================== -->

    <footer>

        <div class="container">

            <p>

                © {{ date('Y') }}

                منصتي التعليمية

                - جميع الحقوق محفوظة

            </p>

        </div>

    </footer>


</body>

</html>