<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>منصتي التعليمية | تعلم البرمجة</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        html {
            scroll-behavior: smooth;
        }


        body {
            font-family: Tahoma, Arial, sans-serif;
            color: #172033;
            line-height: 1.7;
            overflow-x: hidden;

            background:
                radial-gradient(
                    circle at 8% 15%,
                    rgba(37, 99, 235, 0.08),
                    transparent 22%
                ),
                radial-gradient(
                    circle at 92% 55%,
                    rgba(20, 184, 166, 0.07),
                    transparent 24%
                ),
                #f8fafc;
        }


        a {
            text-decoration: none;
            color: inherit;
        }


        .container {
            width: min(1150px, 92%);
            margin: auto;
        }



        /* ==================================================
           NAVBAR - PROFESSIONAL
        ================================================== */

        .navbar {
            background: rgba(255, 255, 255, 0.96);

            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);

            border-bottom:
                1px solid rgba(226, 232, 240, 0.85);

            position: sticky;

            top: 0;

            z-index: 1000;

            box-shadow:
                0 4px 20px rgba(
                    15,
                    23,
                    42,
                    0.035
                );
        }


        .nav-content {
            min-height: 78px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 30px;
        }



        /* =========================
           LOGO
        ========================= */

        .logo {
            display: flex;

            align-items: center;

            gap: 8px;

            font-size: 25px;

            font-weight: 900;

            color: #2563eb;

            white-space: nowrap;

            letter-spacing: -0.5px;

            transition: 0.2s;
        }


        .logo:hover {
            transform: translateY(-1px);

            color: #1d4ed8;
        }



        /* =========================
           NAV LINKS
        ========================= */

        .nav-links {
            display: flex;

            align-items: center;

            justify-content: center;

            gap: 32px;

            color: #475569;

            font-size: 15px;

            font-weight: 600;

            flex: 1;
        }


        .nav-links a {
            position: relative;

            padding: 8px 0;

            transition:
                color 0.2s ease,
                transform 0.2s ease;
        }


        .nav-links a::after {
            content: "";

            position: absolute;

            right: 0;

            bottom: 0;

            width: 0;

            height: 2px;

            border-radius: 20px;

            background: #2563eb;

            transition:
                width 0.25s ease;
        }


        .nav-links a:hover {
            color: #2563eb;

            transform: translateY(-1px);
        }


        .nav-links a:hover::after {
            width: 100%;
        }



        /* =========================
           NAV BUTTONS
        ========================= */

        .nav-buttons {
            display: flex;

            align-items: center;

            gap: 9px;

            white-space: nowrap;
        }



        /* =========================
           USER NAME
        ========================= */

        .user-name {
            display: inline-flex;

            align-items: center;

            padding: 8px 13px;

            border-radius: 12px;

            background: #eff6ff;

            border:
                1px solid #dbeafe;

            color: #2563eb;

            font-size: 13px;

            font-weight: 800;

            white-space: nowrap;
        }



        /* =========================
           BUTTONS
        ========================= */

        .btn {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding: 10px 18px;

            min-height: 42px;

            border-radius: 11px;

            font-weight: 700;

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;

            border: none;

            cursor: pointer;

            font-family: inherit;

            font-size: 14px;
        }


        .btn-primary {
            background:
                linear-gradient(
                    135deg,
                    #2563eb,
                    #1d4ed8
                );

            color: white;

            box-shadow:
                0 7px 18px rgba(
                    37,
                    99,
                    235,
                    0.18
                );
        }


        .btn-primary:hover {
            transform: translateY(-2px);

            box-shadow:
                0 11px 24px rgba(
                    37,
                    99,
                    235,
                    0.27
                );
        }


        .btn-outline {
            border:
                1px solid #bfdbfe;

            color: #2563eb;

            background: white;
        }


        .btn-outline:hover {
            background: #eff6ff;

            border-color: #93c5fd;

            transform: translateY(-2px);
        }


        .logout-form {
            margin: 0;
        }



        /* ==================================================
           HERO
        ================================================== */

        .hero {
            position: relative;

            overflow: hidden;

            padding: 90px 0;

            background:
                radial-gradient(
                    circle at 5% 30%,
                    rgba(37, 99, 235, 0.15),
                    transparent 25%
                ),
                radial-gradient(
                    circle at 96% 65%,
                    rgba(20, 184, 166, 0.13),
                    transparent 25%
                ),
                linear-gradient(
                    135deg,
                    #eef5ff 0%,
                    #ffffff 48%,
                    #effdfb 100%
                );
        }


        .hero::before {
            content: "";

            position: absolute;

            inset: 0;

            background-image:
                linear-gradient(
                    rgba(37, 99, 235, 0.035) 1px,
                    transparent 1px
                ),
                linear-gradient(
                    90deg,
                    rgba(37, 99, 235, 0.035) 1px,
                    transparent 1px
                );

            background-size: 38px 38px;

            mask-image:
                linear-gradient(
                    to bottom,
                    black,
                    transparent
                );

            pointer-events: none;
        }


        .hero::after {
            content: "{ }";

            position: absolute;

            right: 3%;

            bottom: 5%;

            font-family: Consolas, monospace;

            font-size: 130px;

            font-weight: bold;

            color: rgba(
                37,
                99,
                235,
                0.055
            );

            transform: rotate(8deg);

            pointer-events: none;
        }


        .hero-content {
            position: relative;

            z-index: 2;

            display: grid;

            grid-template-columns:
                1.1fr 0.9fr;

            align-items: center;

            gap: 60px;
        }


        .hero h1 {
            font-size:
                clamp(
                    38px,
                    5vw,
                    62px
                );

            line-height: 1.2;

            margin-bottom: 22px;

            letter-spacing: -1px;
        }


        .hero h1 span {
            color: #2563eb;

            position: relative;
        }


        .hero h1 span::after {
            content: "";

            position: absolute;

            right: 0;

            left: 10%;

            bottom: -8px;

            height: 5px;

            border-radius: 20px;

            background:
                linear-gradient(
                    90deg,
                    #5eead4,
                    #60a5fa
                );

            transform: rotate(-1deg);
        }


        .hero p {
            font-size: 19px;

            color: #64748b;

            margin-bottom: 30px;

            max-width: 650px;
        }


        .hero-buttons {
            display: flex;

            gap: 15px;

            flex-wrap: wrap;
        }



        /* ==================================================
           HERO DECORATIONS
        ================================================== */

        .hero-decoration {
            position: absolute;

            font-family: Consolas, monospace;

            pointer-events: none;

            user-select: none;

            font-weight: bold;
        }


        .decoration-js {
            top: 45px;

            right: 8%;

            width: 80px;

            height: 80px;

            display: flex;

            align-items: center;

            justify-content: center;

            background:
                rgba(
                    250,
                    204,
                    21,
                    0.22
                );

            color: #ca8a04;

            border-radius: 20px;

            font-size: 27px;

            transform: rotate(7deg);

            box-shadow:
                0 15px 30px rgba(
                    0,
                    0,
                    0,
                    0.04
                );
        }


        .decoration-code {
            bottom: 50px;

            left: 6%;

            color: #2563eb;

            opacity: 0.12;

            font-size: 95px;

            transform: rotate(-10deg);
        }


        .decoration-dots {
            top: 70px;

            left: 15%;

            width: 90px;

            height: 70px;

            opacity: 0.35;

            background-image:
                radial-gradient(
                    #2563eb 2px,
                    transparent 2px
                );

            background-size: 18px 18px;
        }


        .decoration-text {
            left: 3%;

            top: 42%;

            color: #2563eb;

            opacity: 0.6;

            font-size: 18px;

            line-height: 1.9;

            transform: rotate(-8deg);

            direction: ltr;

            text-align: left;
        }



        /* ==================================================
           JAVASCRIPT CARD
        ================================================== */

        .hero-card {
            background:
                linear-gradient(
                    145deg,
                    #172033,
                    #101827
                );

            color: white;

            border-radius: 27px;

            padding: 30px;

            box-shadow:
                0 30px 70px rgba(
                    15,
                    23,
                    42,
                    0.22
                );

            position: relative;

            overflow: hidden;

            border:
                1px solid rgba(
                    255,
                    255,
                    255,
                    0.06
                );
        }


        .hero-card::before {
            content: "";

            position: absolute;

            width: 220px;

            height: 220px;

            background:
                radial-gradient(
                    circle,
                    rgba(
                        37,
                        99,
                        235,
                        0.35
                    ),
                    transparent 70%
                );

            border-radius: 50%;

            top: -100px;

            right: -70px;
        }


        .hero-card::after {
            content: "</>";

            position: absolute;

            left: -5px;

            bottom: -35px;

            font-family: Consolas, monospace;

            font-size: 95px;

            color:
                rgba(
                    96,
                    165,
                    250,
                    0.05
                );
        }


        .hero-card h3 {
            margin-bottom: 20px;

            font-size: 24px;

            position: relative;

            z-index: 2;
        }


        .code-header {
            display: flex;

            align-items: center;

            gap: 7px;

            background: #111827;

            padding: 10px 15px;

            border-radius:
                15px 15px 0 0;

            direction: ltr;

            border-bottom:
                1px solid #243047;
        }


        .dot {
            width: 11px;

            height: 11px;

            border-radius: 50%;

            display: block;
        }


        .dot.red {
            background: #fb7185;
        }


        .dot.yellow {
            background: #facc15;
        }


        .dot.green {
            background: #4ade80;
        }


        .language {
            margin-right: auto;

            color: #facc15;

            font-size: 13px;

            font-family: Consolas, monospace;
        }


        .code {
            background: #0b1220;

            border-radius:
                0 0 15px 15px;

            padding: 25px;

            direction: ltr;

            text-align: left;

            font-family: Consolas, monospace;

            color: #93c5fd;

            overflow: hidden;

            font-size: 15px;

            box-shadow:
                inset 0 0 30px rgba(
                    0,
                    0,
                    0,
                    0.15
                );
        }


        .code .keyword {
            color: #c084fc;
        }


        .code .variable {
            color: #60a5fa;
        }


        .code .string {
            color: #86efac;
        }


        .code .function {
            color: #facc15;
        }


        .js-badge {
            position: absolute;

            bottom: 18px;

            left: 18px;

            background: #facc15;

            color: #111827;

            padding: 8px 13px;

            border-radius: 8px;

            font-weight: bold;

            font-family: Consolas, monospace;

            box-shadow:
                0 8px 20px rgba(
                    0,
                    0,
                    0,
                    0.2
                );
        }



        /* ==================================================
           SECTIONS
        ================================================== */

        section {
            padding: 80px 0;

            position: relative;

            overflow: hidden;
        }


        .section-title {
            text-align: center;

            margin-bottom: 45px;

            position: relative;

            z-index: 2;
        }


        .section-title h2 {
            font-size: 35px;

            margin-bottom: 10px;
        }


        .section-title h2::after {
            content: "";

            display: block;

            width: 55px;

            height: 4px;

            border-radius: 20px;

            margin: 10px auto 0;

            background:
                linear-gradient(
                    90deg,
                    #2563eb,
                    #5eead4
                );
        }


        .section-title p {
            color: #64748b;
        }



        /* ==================================================
           FEATURES BACKGROUND
        ================================================== */

        #features {
            background:
                radial-gradient(
                    circle at 10% 20%,
                    rgba(
                        37,
                        99,
                        235,
                        0.055
                    ),
                    transparent 22%
                ),
                radial-gradient(
                    circle at 90% 75%,
                    rgba(
                        20,
                        184,
                        166,
                        0.055
                    ),
                    transparent 25%
                ),
                #ffffff;
        }


        #features::before {
            content: "{ }";

            position: absolute;

            right: -20px;

            top: 15px;

            font-family: Consolas, monospace;

            font-size: 150px;

            color:
                rgba(
                    37,
                    99,
                    235,
                    0.035
                );

            transform: rotate(8deg);
        }


        #features::after {
            content: "</>";

            position: absolute;

            left: 20px;

            bottom: 15px;

            font-family: Consolas, monospace;

            font-size: 110px;

            color:
                rgba(
                    20,
                    184,
                    166,
                    0.04
                );

            transform: rotate(-8deg);
        }



        /* ==================================================
           FEATURES
        ================================================== */

        .features {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 25px;

            position: relative;

            z-index: 2;
        }


        .feature {
            background:
                rgba(
                    255,
                    255,
                    255,
                    0.88
                );

            padding: 30px;

            border-radius: 22px;

            border: 1px solid #e5e7eb;

            transition: 0.3s;

            box-shadow:
                0 10px 30px rgba(
                    15,
                    23,
                    42,
                    0.035
                );
        }


        .feature:hover {
            transform: translateY(-8px);

            box-shadow:
                0 20px 40px rgba(
                    15,
                    23,
                    42,
                    0.09
                );

            border-color: #bfdbfe;
        }


        /* الكروت القابلة للضغط */

        .feature-link {
            display: block;

            color: inherit;

            text-decoration: none;

            cursor: pointer;
        }


        .feature-link:hover {
            border-color: #93c5fd;

            transform: translateY(-8px);
        }


        .feature-icon {
            width: 58px;

            height: 58px;

            display: flex;

            align-items: center;

            justify-content: center;

            background:
                linear-gradient(
                    135deg,
                    #eff6ff,
                    #ecfeff
                );

            color: #2563eb;

            border-radius: 16px;

            font-size: 25px;

            margin-bottom: 18px;

            box-shadow:
                0 8px 20px rgba(
                    37,
                    99,
                    235,
                    0.07
                );
        }


        .feature h3 {
            margin-bottom: 8px;
        }


        .feature p {
            color: #64748b;
        }



        /* ==================================================
           COURSES
        ================================================== */

        #courses {
            background:
                radial-gradient(
                    circle at 85% 20%,
                    rgba(
                        37,
                        99,
                        235,
                        0.06
                    ),
                    transparent 25%
                ),
                linear-gradient(
                    180deg,
                    #f8fbff,
                    #ffffff
                );
        }


        #courses::before {
            content: "JS";

            position: absolute;

            left: 4%;

            bottom: 20%;

            font-family: Consolas, monospace;

            font-size: 100px;

            color:
                rgba(
                    37,
                    99,
                    235,
                    0.035
                );

            transform: rotate(-8deg);
        }


        .course-card {
            background:
                rgba(
                    255,
                    255,
                    255,
                    0.92
                );

            border: 1px solid #e5e7eb;

            border-radius: 24px;

            padding: 30px;

            max-width: 850px;

            margin: auto;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 25px;

            box-shadow:
                0 15px 40px rgba(
                    15,
                    23,
                    42,
                    0.055
                );

            transition: 0.3s;

            position: relative;

            z-index: 2;
        }


        .course-card:hover {
            transform: translateY(-5px);

            box-shadow:
                0 25px 50px rgba(
                    15,
                    23,
                    42,
                    0.09
                );
        }


        .course-info h3 {
            font-size: 25px;

            margin-bottom: 10px;
        }


        .course-info p {
            color: #64748b;
        }


        .course-tag {
            display: inline-block;

            background: #dbeafe;

            color: #1d4ed8;

            padding: 5px 12px;

            border-radius: 20px;

            font-size: 13px;

            margin-bottom: 12px;
        }



        /* ==================================================
           CTA
        ================================================== */

        .cta {
            position: relative;

            overflow: hidden;

            background:
                radial-gradient(
                    circle at 15% 30%,
                    rgba(
                        255,
                        255,
                        255,
                        0.10
                    ),
                    transparent 25%
                ),
                radial-gradient(
                    circle at 85% 70%,
                    rgba(
                        94,
                        234,
                        212,
                        0.13
                    ),
                    transparent 25%
                ),
                linear-gradient(
                    135deg,
                    #2563eb,
                    #1d4ed8
                );

            color: white;

            text-align: center;
        }


        .cta::before {
            content: "{ }";

            position: absolute;

            left: 7%;

            top: 10%;

            font-size: 110px;

            opacity: 0.08;

            font-family: Consolas, monospace;
        }


        .cta::after {
            content: "</>";

            position: absolute;

            right: 7%;

            bottom: 5%;

            font-size: 95px;

            opacity: 0.08;

            font-family: Consolas, monospace;
        }


        .cta h2 {
            font-size: 38px;

            margin-bottom: 15px;

            position: relative;

            z-index: 2;
        }


        .cta p {
            margin-bottom: 25px;

            opacity: 0.9;

            position: relative;

            z-index: 2;
        }


        .cta .btn {
            background: white;

            color: #2563eb;

            position: relative;

            z-index: 2;
        }


        .cta .btn:hover {
            transform: translateY(-3px);

            box-shadow:
                0 12px 25px rgba(
                    0,
                    0,
                    0,
                    0.15
                );
        }



        /* ==================================================
           FOOTER
        ================================================== */

        footer {
            background: #0f172a;

            color: #cbd5e1;

            padding: 30px 0;

            text-align: center;
        }



        /* ==================================================
           RESPONSIVE
        ================================================== */

        @media (max-width: 1050px) {

            .nav-links {
                gap: 20px;
            }


            .user-name {
                display: none;
            }


            .hero-content {
                gap: 40px;
            }


            .decoration-text {
                display: none;
            }

        }


        @media (max-width: 850px) {

            .nav-links {
                display: none;
            }


            .nav-content {
                gap: 15px;
            }


            .nav-buttons {
                margin-right: auto;
            }


            .hero-content {
                grid-template-columns: 1fr;

                text-align: center;
            }


            .hero p {
                margin-left: auto;

                margin-right: auto;
            }


            .hero-buttons {
                justify-content: center;
            }


            .hero-card {
                max-width: 650px;

                width: 100%;

                margin: auto;
            }


            .features {
                grid-template-columns: 1fr;
            }


            .course-card {
                flex-direction: column;

                align-items: center;

                text-align: center;
            }

        }


        @media (max-width: 600px) {

            .nav-content {
                min-height: 68px;
            }


            .logo {
                font-size: 20px;
            }


            .nav-buttons .btn {
                padding: 8px 11px;

                min-height: 38px;

                font-size: 12px;
            }


            .hero {
                padding: 65px 0;
            }


            .hero h1 {
                font-size: 40px;
            }


            .hero p {
                font-size: 16px;
            }


            section {
                padding: 55px 0;
            }


            .hero-card {
                padding: 20px;
            }


            .hero-card h3 {
                font-size: 20px;
            }


            .code {
                font-size: 12px;

                padding: 18px;
            }


            .decoration-js,
            .decoration-dots {
                display: none;
            }


            .decoration-code {
                font-size: 65px;

                bottom: 15px;
            }


            .section-title h2 {
                font-size: 30px;
            }


            .cta h2 {
                font-size: 30px;
            }

        }

    </style>

</head>


<body>


    <!-- ==================================================
         NAVBAR
    ================================================== -->

    <header class="navbar">

        <div class="container nav-content">


            <a
                href="#home"
                class="logo"
            >
                💻 منصتي التعليمية
            </a>


            <nav class="nav-links">

                <a href="#home">
                    الرئيسية
                </a>

                <a href="#features">
                    مميزات المنصة
                </a>

                <a href="#courses">
                    الكورسات
                </a>

                <a href="#contact">
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



    <!-- ==================================================
         HERO
    ================================================== -->

    <section
        class="hero"
        id="home"
    >


        <div class="hero-decoration decoration-js">
            JS
        </div>


        <div class="hero-decoration decoration-code">
            &lt;/&gt;
        </div>


        <div class="hero-decoration decoration-dots"></div>


        <div class="hero-decoration decoration-text">
            Learn<br>
            Build<br>
            Grow
        </div>



        <div class="container hero-content">


            <div>

                <h1>

                    اتعلم البرمجة

                    <span>
                        بطريقة عملية
                    </span>

                </h1>


                <p>

                    منصة تعليمية متخصصة تساعدك على تعلم البرمجة
                    خطوة بخطوة من خلال الدروس المباشرة،
                    المحاضرات المسجلة، التدريبات والاختبارات.

                </p>


                <div class="hero-buttons">


                    @auth

                        <a
                            href="{{ route('dashboard') }}"
                            class="btn btn-primary"
                        >
                            لوحة التحكم
                        </a>

                    @else

                        <a
                            href="{{ route('register') }}"
                            class="btn btn-primary"
                        >
                            ابدأ التعلم الآن 🚀
                        </a>

                    @endauth


                    <a
                        href="#features"
                        class="btn btn-outline"
                    >
                        اكتشف المنصة
                    </a>


                </div>


            </div>



            <!-- ==================================================
                 JAVASCRIPT CODE
            ================================================== -->

            <div class="hero-card">


                <h3>
                    🚀 رحلتك في البرمجة تبدأ هنا
                </h3>


                <div class="code-header">

                    <span class="dot red"></span>

                    <span class="dot yellow"></span>

                    <span class="dot green"></span>

                    <span class="language">
                        script.js
                    </span>

                </div>


                <div class="code">


                    <div>

                        <span class="keyword">
                            const
                        </span>

                        <span class="variable">
                            student
                        </span>

                        =

                        <span class="string">
                            "مطور المستقبل"
                        </span>;

                    </div>


                    <br>


                    <div>

                        <span class="keyword">
                            let
                        </span>

                        <span class="variable">
                            learn
                        </span>

                        =

                        <span class="keyword">
                            true
                        </span>;

                    </div>


                    <div>

                        <span class="keyword">
                            let
                        </span>

                        <span class="variable">
                            success
                        </span>

                        =

                        <span class="keyword">
                            learn
                        </span>;

                    </div>


                    <br>


                    <div>

                        <span class="keyword">
                            if
                        </span>

                        (<span class="variable">
                            success
                        </span>) {

                    </div>


                    <div style="padding-left: 25px;">

                        <span class="variable">
                            console
                        </span>.

                        <span class="function">
                            log
                        </span>(

                        <span class="string">
                            "ابدأ الآن 🚀"
                        </span>

                        );

                    </div>


                    <div>
                        }
                    </div>


                </div>


                <div class="js-badge">
                    JS
                </div>


            </div>


        </div>

    </section>



    <!-- ==================================================
         FEATURES
    ================================================== -->

    <section id="features">


        <div class="container">


            <div class="section-title">

                <h2>
                    كل ما تحتاجه للتعلم
                </h2>

                <p>
                    أدوات ومحتوى يساعدك على التعلم والمتابعة باستمرار
                </p>

            </div>


            <div class="features">


                <!-- حصص مباشرة -->

                <div class="feature">


                    <div class="feature-icon">
                        🎥
                    </div>


                    <h3>
                        حصص مباشرة
                    </h3>


                    <p>
                        احضر الحصص المباشرة مع المدرس
                        وتابع الشرح خطوة بخطوة.
                    </p>


                </div>



                <!-- محاضرات مسجلة - أصبحت قابلة للضغط -->

                <a
                    href="{{ route('course.content') }}"
                    class="feature feature-link"
                >


                    <div class="feature-icon">
                        📚
                    </div>


                    <h3>
                        محاضرات مسجلة
                    </h3>


                    <p>
                        لو فاتتك الحصة، تقدر ترجع للمحاضرة
                        المسجلة في أي وقت.
                    </p>


                </a>



                <!-- اختبارات وتدريبات - أصبحت قابلة للضغط -->

                <a
                    href="{{ route('exams.index') }}"
                    class="feature feature-link"
                >


                    <div class="feature-icon">
                        📝
                    </div>


                    <h3>
                        اختبارات وتدريبات
                    </h3>


                    <p>
                        اختبر نفسك من خلال الاختبارات
                        والواجبات والتدريبات العملية.
                    </p>


                </a>


            </div>


        </div>

    </section>



    <!-- ==================================================
         COURSES
    ================================================== -->

    <section id="courses">


        <div class="container">


            <div class="section-title">

                <h2>
                    الكورسات
                </h2>

                <p>
                    ابدأ رحلتك التعليمية الآن
                </p>

            </div>


            <div class="course-card">


                <div class="course-info">


                    <span class="course-tag">
                        📚 برمجة
                    </span>


                    <h3>
                        مادة البرمجة - الصف الثاني الثانوي
                    </h3>


                    <p>
                        كورس عملي يساعدك على فهم البرمجة
                        وتطبيقها خطوة بخطوة.
                    </p>


                </div>


                <a
                    href="{{ route('courses.index') }}"
                    class="btn btn-primary"
                >
                    عرض الكورس
                </a>


            </div>


        </div>

    </section>



    <!-- ==================================================
         CTA
    ================================================== -->

    <section
        class="cta"
        id="contact"
    >


        <div class="container">


            <h2>
                جاهز تبدأ رحلتك؟ 🚀
            </h2>


            <p>
                تعلم البرمجة وطور مهاراتك خطوة بخطوة.
            </p>


            @guest

                <a
                    href="{{ route('register') }}"
                    class="btn"
                >
                    إنشاء حساب الآن
                </a>

            @else

                <a
                    href="{{ route('dashboard') }}"
                    class="btn"
                >
                    الدخول إلى المنصة
                </a>

            @endguest


        </div>


    </section>



    <!-- ==================================================
         FOOTER
    ================================================== -->

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