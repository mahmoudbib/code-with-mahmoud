<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>منصة البرمجة | لوحة الطالب</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Tahoma, Arial, sans-serif;
            background:
                radial-gradient(
                    circle at 5% 10%,
                    rgba(32, 201, 151, 0.13),
                    transparent 20%
                ),
                radial-gradient(
                    circle at 95% 85%,
                    rgba(13, 110, 253, 0.08),
                    transparent 22%
                ),
                #f3f8fc;
            color: #17202a;
            position: relative;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }


        /* ================================
           TECH BACKGROUND
        ================================= */

        .tech-background {
            position: fixed;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
            z-index: 0;
        }

        .floating-code {
            position: absolute;
            font-family: Consolas, "Courier New", monospace;
            color: #198754;
            opacity: 0.16;
            line-height: 1.8;
            font-size: 15px;
            user-select: none;
        }

        .code-left {
            left: 25px;
            top: 25%;
            transform: rotate(-3deg);
        }

        .code-right {
            right: 25px;
            top: 50%;
            transform: rotate(3deg);
        }

        .floating-symbol {
            position: absolute;
            color: #198754;
            opacity: 0.16;
            font-weight: bold;
            user-select: none;
        }

        .symbol-php {
            left: 45px;
            top: 10%;
            font-size: 42px;
            background: rgba(108, 117, 125, 0.13);
            padding: 5px 18px;
            border-radius: 50%;
        }

        .symbol-code {
            left: 35px;
            top: 67%;
            font-size: 85px;
            transform: rotate(-8deg);
        }

        .symbol-brackets {
            right: 45px;
            top: 27%;
            font-size: 75px;
            transform: rotate(5deg);
        }

        .symbol-gear {
            left: 50px;
            bottom: 18%;
            font-size: 55px;
        }

        .symbol-light {
            left: 30px;
            bottom: 34%;
            font-size: 50px;
        }

        .symbol-laptop {
            right: 25px;
            top: 65%;
            font-size: 75px;
            opacity: 0.11;
            transform: rotate(-7deg);
        }


        /* ================================
           NAVBAR
        ================================= */

        .navbar {
            position: sticky;
            top: 15px;
            z-index: 20;

            width: 92%;
            max-width: 1200px;

            margin: 15px auto 20px;

            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(12px);

            border: 1px solid #e8edf2;
            border-radius: 18px;

            box-shadow:
                0 10px 30px rgba(31, 41, 55, 0.08);

            padding: 12px 18px;
        }

        .nav-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;

            color: #198754;
            font-size: 19px;
            font-weight: 800;

            white-space: nowrap;
        }

        .brand-icon {
            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: linear-gradient(
                135deg,
                #e6f8ef,
                #d8f4e8
            );

            border-radius: 12px;

            font-size: 22px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            flex-wrap: wrap;
        }

        .nav-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;

            padding: 10px 13px;

            border-radius: 10px;

            color: #475569;
            font-size: 13px;
            font-weight: bold;

            transition: 0.2s;
        }

        .nav-link:hover {
            background: #eef8f3;
            color: #198754;
        }

        .nav-link.active {
            background: #198754;
            color: white;
        }

        .logout-btn {
            border: none;
            background: #fff0f0;
            color: #dc3545;

            padding: 10px 13px;

            border-radius: 10px;

            font-family: inherit;
            font-size: 13px;
            font-weight: bold;

            cursor: pointer;

            transition: 0.2s;
        }

        .logout-btn:hover {
            background: #dc3545;
            color: white;
        }


        /* ================================
           MAIN
        ================================= */

        .container {
            width: 92%;
            max-width: 1200px;

            margin: 20px auto 60px;

            position: relative;
            z-index: 2;
        }


        /* ================================
           HERO
        ================================= */

        .welcome {
            position: relative;

            min-height: 245px;

            overflow: hidden;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 30px;

            padding: 30px 45px;

            margin-bottom: 25px;

            color: white;

            border-radius: 25px;

            background:
                radial-gradient(
                    circle at 15% 50%,
                    rgba(32, 201, 151, 0.25),
                    transparent 30%
                ),
                linear-gradient(
                    135deg,
                    #075b38,
                    #198754
                );

            box-shadow:
                0 18px 40px rgba(25, 135, 84, 0.20);
        }

        .welcome::before {
            content: "";

            position: absolute;

            width: 250px;
            height: 250px;

            border-radius: 50%;

            background: rgba(255, 255, 255, 0.06);

            left: -90px;
            top: -110px;
        }

        .welcome::after {
            content: "";

            position: absolute;

            width: 200px;
            height: 200px;

            border-radius: 50%;

            background: rgba(255, 255, 255, 0.06);

            right: -70px;
            bottom: -110px;
        }


        /* ================================
           HERO CODE
        ================================= */

        .hero-code {
            position: relative;

            width: 46%;
            min-height: 190px;

            display: flex;
            align-items: center;
            justify-content: center;

            z-index: 3;
        }

        .code-window {
            width: 290px;
            height: 165px;

            background: #10231c;

            border-radius: 14px;

            overflow: hidden;

            box-shadow:
                0 20px 35px rgba(0, 0, 0, 0.28);

            transform: rotate(-2deg);
        }

        .window-top {
            height: 28px;

            display: flex;
            align-items: center;

            gap: 7px;

            padding: 0 12px;

            background: #173a2c;
        }

        .window-top span {
            width: 8px;
            height: 8px;

            border-radius: 50%;

            background: rgba(255, 255, 255, 0.75);
        }

        .code-lines {
            padding: 13px 18px;

            font-family: Consolas, "Courier New", monospace;

            font-size: 11px;

            line-height: 1.85;

            color: #d8f3e7;
        }

        .code-lines b {
            color: #20c997;
        }

        .code-lines span {
            color: #74c0fc;
        }

        .code-lines i {
            color: #ffd43b;
            font-style: normal;
        }

        .indent {
            padding-right: 18px;
        }


        /* ================================
           HERO SYMBOLS
        ================================= */

        .hero-symbol {
            position: absolute;

            display: flex;
            align-items: center;
            justify-content: center;

            font-family: Consolas, "Courier New", monospace;

            font-weight: bold;

            border-radius: 13px;

            box-shadow:
                0 10px 20px rgba(0, 0, 0, 0.18);
        }

        .symbol-one {
            top: 8px;
            right: 45px;

            width: 58px;
            height: 58px;

            background: #00a884;

            color: white;

            font-size: 26px;
        }

        .symbol-two {
            right: 5px;
            bottom: 10px;

            width: 62px;
            height: 62px;

            background: #a8f5b8;

            color: #11613d;

            font-size: 24px;
        }

        .hero-php {
            position: absolute;

            left: 45px;
            bottom: 3px;

            padding: 8px 14px;

            background: #2674d9;

            color: white;

            border-radius: 9px;

            font-weight: bold;

            box-shadow:
                0 8px 16px rgba(0, 0, 0, 0.20);
        }


        /* ================================
           HERO TEXT
        ================================= */

        .welcome-content {
            position: relative;

            z-index: 4;

            flex: 1;

            text-align: right;
        }

        .welcome h1 {
            margin: 0 0 12px;

            font-size: 31px;

            font-weight: 800;
        }

        .welcome p {
            margin: 0;

            font-size: 16px;

            opacity: 0.92;

            line-height: 1.8;
        }

        .hero-small-text {
            margin-top: 7px !important;

            font-size: 13px !important;

            opacity: 0.72 !important;
        }

        .student-badge {
            display: inline-flex;

            align-items: center;

            gap: 8px;

            margin-top: 18px;

            padding: 10px 17px;

            border-radius: 50px;

            background: rgba(255, 255, 255, 0.13);

            border: 1px solid rgba(255, 255, 255, 0.22);

            font-size: 14px;

            backdrop-filter: blur(5px);
        }


        /* ================================
           COURSE
        ================================= */

        .course-card {
            background: rgba(255, 255, 255, 0.97);

            border-radius: 24px;

            padding: 25px 32px;

            margin-bottom: 30px;

            border: 1px solid #edf0f4;

            box-shadow:
                0 10px 30px rgba(0, 0, 0, 0.055);

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 25px;

            transition: 0.25s;
        }

        .course-card:hover {
            transform: translateY(-2px);

            box-shadow:
                0 14px 35px rgba(0, 0, 0, 0.08);
        }

        .course-info {
            display: flex;

            align-items: center;

            gap: 18px;
        }

        .course-icon {
            width: 65px;
            height: 65px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                linear-gradient(
                    135deg,
                    #e6f8ef,
                    #d8f4e8
                );

            border-radius: 18px;

            font-size: 31px;
        }

        .course-badge {
            display: inline-block;

            margin-bottom: 5px;

            color: #198754;

            font-size: 12px;

            font-weight: bold;
        }

        .course-card h2 {
            margin: 0 0 7px;

            font-size: 23px;

            color: #17202a;
        }

        .course-card p {
            margin: 0;

            color: #718096;

            line-height: 1.7;

            font-size: 14px;
        }

        .course-button {
            display: inline-flex;

            align-items: center;

            gap: 9px;

            padding: 14px 22px;

            background:
                linear-gradient(
                    135deg,
                    #15945a,
                    #198754
                );

            color: white;

            border-radius: 12px;

            font-weight: bold;

            white-space: nowrap;

            box-shadow:
                0 8px 18px rgba(25, 135, 84, 0.18);

            transition: 0.25s;
        }

        .course-button:hover {
            transform: translateY(-2px);

            box-shadow:
                0 12px 22px rgba(25, 135, 84, 0.25);
        }


        /* ================================
           SECTION TITLE
        ================================= */

        .section-title {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin: 10px 0 17px;
        }

        .section-title h2 {
            margin: 0;

            font-size: 22px;
        }

        .section-title span {
            color: #718096;

            font-size: 14px;
        }


        /* ================================
           ATTENDANCE
        ================================= */

        .attendance-cards {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 18px;

            margin-bottom: 32px;
        }

        .attendance-card {
            position: relative;

            overflow: hidden;

            min-height: 190px;

            padding: 24px 23px 30px;

            background: #ffffff;

            border: 1px solid rgba(226, 232, 240, 0.9);

            border-radius: 22px;

            box-shadow:
                0 8px 25px rgba(31, 41, 55, 0.045);

            text-align: center;

            transition: 0.25s;
        }

        .attendance-card:hover {
            transform: translateY(-5px);

            box-shadow:
                0 15px 32px rgba(31, 41, 55, 0.09);
        }

        .attendance-card::after {
            content: "";

            position: absolute;

            left: -8%;
            right: -8%;

            bottom: -35px;

            height: 70px;

            border-radius: 50% 50% 0 0;

            opacity: 0.55;

            transform: rotate(-1deg);
        }

        .attendance-card:nth-child(1)::after {
            background: #cfe0ff;
        }

        .attendance-card:nth-child(2)::after {
            background: #b9f0dc;
        }

        .attendance-card:nth-child(3)::after {
            background: #ffd1dc;
        }

        .attendance-card:nth-child(4)::after {
            background: #ffe9b0;
        }

        .attendance-top {
            display: flex;

            align-items: center;

            justify-content: center;

            position: relative;

            z-index: 2;
        }

        .attendance-icon {
            width: 56px;
            height: 56px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 16px;

            font-size: 27px;

            box-shadow:
                0 5px 12px rgba(0, 0, 0, 0.04);
        }

        .icon-total {
            background: #eaf1ff;
            color: #2674d9;
        }

        .icon-present {
            background: #e5f8ef;
            color: #15945a;
        }

        .icon-absent {
            background: #fff0f3;
            color: #ef476f;
        }

        .icon-percentage {
            background: #fff6e1;
            color: #f5a623;
        }

        .attendance-number {
            position: relative;

            z-index: 2;

            margin-top: 17px;

            font-size: 32px;

            line-height: 1;

            font-weight: 800;

            color: #17202a;
        }

        .attendance-label {
            position: relative;

            z-index: 2;

            margin-top: 9px;

            color: #718096;

            font-size: 14px;

            font-weight: 500;
        }

        .progress {
            position: relative;

            z-index: 3;

            height: 7px;

            background: #e9eef3;

            border-radius: 20px;

            margin-top: 18px;

            overflow: hidden;
        }

        .progress-bar {
            height: 100%;

            width: {{ min($attendancePercentage, 100) }}%;

            background:
                linear-gradient(
                    90deg,
                    #198754,
                    #20c997
                );

            border-radius: 20px;
        }


        /* ================================
           QUICK ACCESS
        ================================= */

        .cards {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 20px;

            margin-bottom: 20px;
        }

        .card {
            position: relative;

            min-height: 165px;

            background: rgba(255, 255, 255, 0.98);

            padding: 25px;

            border-radius: 22px;

            border: 1px solid #edf0f4;

            box-shadow:
                0 10px 28px rgba(31, 41, 55, 0.055);

            display: grid;

            grid-template-columns: 72px 1fr;

            grid-template-rows: auto auto 1fr;

            column-gap: 18px;

            align-items: start;

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease;
        }

        .card:hover {
            transform: translateY(-5px);

            box-shadow:
                0 16px 35px rgba(31, 41, 55, 0.10);
        }

        .card-icon {
            grid-column: 1;

            grid-row: 1 / 4;

            width: 62px;
            height: 62px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 17px;

            font-size: 28px;

            background:
                linear-gradient(
                    135deg,
                    #e8f7ef,
                    #dff5ea
                );
        }

        .card:nth-child(1) .card-icon {
            background:
                linear-gradient(
                    135deg,
                    #e5f8ef,
                    #d4f2e3
                );

            color: #15945a;
        }

        .card:nth-child(2) .card-icon {
            background:
                linear-gradient(
                    135deg,
                    #e6efff,
                    #dbe8ff
                );

            color: #2674d9;
        }

        .card:nth-child(3) .card-icon {
            background:
                linear-gradient(
                    135deg,
                    #f2e9ff,
                    #eadcff
                );

            color: #8e44d6;
        }

        .card h3 {
            grid-column: 2;

            margin: 2px 0 7px;

            font-size: 19px;

            color: #17202a;
        }

        .card p {
            grid-column: 2;

            margin: 0;

            color: #718096;

            line-height: 1.7;

            font-size: 13px;
        }

        .card a {
            grid-column: 2;

            display: inline-flex;

            align-items: center;

            gap: 6px;

            margin-top: 15px;

            color: #198754;

            font-weight: bold;

            font-size: 14px;

            transition: 0.2s;
        }

        .card:nth-child(2) a {
            color: #2674d9;
        }

        .card:nth-child(3) a {
            color: #8e44d6;
        }

        .card a:hover {
            transform: translateX(-4px);
        }


        /* ================================
           EXTRA QUICK LINKS
        ================================= */

        .extra-links {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 15px;

            margin-top: 10px;
        }

        .extra-link {
            display: flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            padding: 15px;

            background: white;

            border: 1px solid #edf0f4;

            border-radius: 14px;

            color: #475569;

            font-weight: bold;

            font-size: 14px;

            box-shadow:
                0 6px 20px rgba(31, 41, 55, 0.04);

            transition: 0.2s;
        }

        .extra-link:hover {
            color: #198754;

            transform: translateY(-2px);

            box-shadow:
                0 10px 25px rgba(31, 41, 55, 0.08);
        }


        /* ================================
           RESPONSIVE
        ================================= */

        @media (max-width: 1050px) {

            .nav-content {
                flex-direction: column;
            }

            .nav-links {
                width: 100%;
            }

            .logout-btn {
                width: 100%;
            }

            .attendance-cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .extra-links {
                grid-template-columns: 1fr;
            }

        }


        @media (max-width: 950px) {

            .welcome {
                padding: 28px;

                flex-direction: column-reverse;

                text-align: center;
            }

            .welcome-content {
                width: 100%;

                text-align: center;
            }

            .hero-code {
                width: 100%;
            }

            .course-card {
                flex-direction: column;

                align-items: flex-start;
            }

            .course-button {
                width: 100%;

                justify-content: center;
            }

        }


        @media (max-width: 550px) {

            .navbar {
                width: 94%;

                top: 8px;

                padding: 10px;
            }

            .nav-links {
                display: grid;

                grid-template-columns: repeat(2, 1fr);

                width: 100%;
            }

            .nav-link {
                justify-content: center;
            }

            .container {
                width: 94%;

                margin-top: 15px;
            }

            .welcome {
                padding: 25px 18px;

                min-height: auto;

                border-radius: 20px;
            }

            .welcome h1 {
                font-size: 24px;
            }

            .hero-code {
                min-height: 165px;
            }

            .code-window {
                width: 255px;

                height: 145px;
            }

            .symbol-one {
                right: 10px;
            }

            .symbol-two {
                right: -5px;
            }

            .hero-php {
                left: 5px;
            }

            .course-card {
                padding: 22px;
            }

            .course-info {
                align-items: flex-start;
            }

            .course-card h2 {
                font-size: 19px;
            }

            .attendance-cards {
                grid-template-columns: 1fr;
            }

            .attendance-card {
                padding: 20px;
            }

            .card {
                grid-template-columns: 68px 1fr;

                padding: 22px;

                min-height: 145px;
            }

            .card-icon {
                width: 56px;
                height: 56px;

                font-size: 25px;
            }

            .card h3 {
                font-size: 18px;
            }

            .card p {
                font-size: 13px;
            }

            .floating-code {
                font-size: 11px;
            }

            .symbol-php {
                left: 8px;

                font-size: 27px;
            }

            .symbol-code {
                left: -5px;

                font-size: 55px;
            }

            .symbol-brackets {
                right: 8px;

                font-size: 50px;
            }

            .symbol-gear,
            .symbol-light,
            .symbol-laptop {
                display: none;
            }

        }

    </style>

</head>


<body>


    {{-- ================================
         Programming Background
    ================================= --}}

    <div class="tech-background">

        <div class="floating-code code-left">

            &lt;?php<br>

            // Welcome<br>

            $success = true;<br>

            if ($success) {<br>

            &nbsp;&nbsp;echo "Keep Going";<br>

            }

        </div>


        <div class="floating-symbol symbol-php">
            PHP
        </div>


        <div class="floating-symbol symbol-code">
            &lt;/&gt;
        </div>


        <div class="floating-symbol symbol-brackets">
            { }
        </div>


        <div class="floating-symbol symbol-gear">
            ⚙️
        </div>


        <div class="floating-symbol symbol-light">
            💡
        </div>


        <div class="floating-symbol symbol-laptop">
            💻
        </div>


        <div class="floating-code code-right">

            eat();<br>

            code();<br>

            sleep();<br>

            repeat();

        </div>

    </div>


    {{-- ================================
         NAVBAR
    ================================= --}}

    <nav class="navbar">

        <div class="nav-content">


            {{-- Brand --}}
            <a
                href="{{ route('dashboard') }}"
                class="brand"
            >

                <span class="brand-icon">
                    💻
                </span>

                منصة البرمجة

            </a>


            {{-- Navigation --}}
            <div class="nav-links">


                <a
                    href="{{ route('dashboard') }}"
                    class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                >
                    🏠 الرئيسية
                </a>


                <a
                    href="{{ route('course.content') }}"
                    class="nav-link {{ request()->routeIs('course.content') || request()->routeIs('lessons.*') ? 'active' : '' }}"
                >
                    📚 الدروس
                </a>


                <a
                    href="{{ route('assignments.index') }}"
                    class="nav-link {{ request()->routeIs('assignments.*') ? 'active' : '' }}"
                >
                    📝 الواجبات
                </a>


                <a
                    href="{{ route('exams.index') }}"
                    class="nav-link {{ request()->routeIs('exams.*') ? 'active' : '' }}"
                >
                    🧠 الامتحانات
                </a>


                <a
                    href="{{ route('subscriptions.status') }}"
                    class="nav-link {{ request()->routeIs('subscriptions.status') ? 'active' : '' }}"
                >
                    💳 اشتراكي
                </a>


            </div>


            {{-- Logout --}}
            <form
                method="POST"
                action="{{ route('logout') }}"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-btn"
                >
                    🚪 خروج
                </button>

            </form>


        </div>

    </nav>


    {{-- ================================
         MAIN CONTAINER
    ================================= --}}

    <div class="container">


        {{-- ================================
             HERO
        ================================= --}}

        <div class="welcome">


            {{-- Code Window --}}
            <div class="hero-code">

                <div class="code-window">

                    <div class="window-top">

                        <span></span>
                        <span></span>
                        <span></span>

                    </div>


                    <div class="code-lines">

                        <div>
                            <b>&lt;?php</b>
                        </div>

                        <div>
                            <span>$student</span> =
                            <i>"Mahmoud"</i>;
                        </div>

                        <div>
                            <span>$course</span> =
                            <i>"Programming"</i>;
                        </div>

                        <div></div>

                        <div>
                            <span>if</span> ($student) {
                        </div>

                        <div class="indent">
                            echo <i>"Keep Learning";</i>
                        </div>

                        <div>
                            }
                        </div>

                    </div>

                </div>


                <div class="hero-symbol symbol-one">
                    &lt;/&gt;
                </div>


                <div class="hero-symbol symbol-two">
                    { }
                </div>


                <div class="hero-php">
                    PHP
                </div>


            </div>


            {{-- Hero Text --}}
            <div class="welcome-content">

                <h1>
                    👋 أهلاً بك يا {{ $user->name }}
                </h1>


                <p>
                    🚀 أهلاً بيك في منصة البرمجة التعليمية
                </p>


                <p class="hero-small-text">
                    تعلم البرمجة، مارس، وطوّر مهاراتك خطوة بخطوة.
                </p>


                <div class="student-badge">

                    🎓

                    أنت طالب في:

                    @if($user->student_type === 'baccalaureate')

                        <strong>
                            البكالوريا
                        </strong>

                    @elseif($user->student_type === 'azhar')

                        <strong>
                            الأزهر
                        </strong>

                    @else

                        <strong>
                            غير محدد
                        </strong>

                    @endif

                </div>

            </div>


        </div>


        {{-- ================================
             COURSE
        ================================= --}}

        <div class="course-card">


            <div class="course-info">

                <div class="course-icon">
                    💻
                </div>


                <div class="course-text">

                    <div class="course-badge">
                        🚀 كورسك الحالي
                    </div>


                    <h2>
                        مادة البرمجة - الصف الثاني الثانوي
                    </h2>


                    <p>
                        المحاضرات والدروس والمواد التعليمية الخاصة بالكورس.
                    </p>

                </div>

            </div>


            <a
                href="{{ route('course.content') }}"
                class="course-button"
            >

                📖

                دخول إلى الكورس

                <span>
                    ←
                </span>

            </a>


        </div>


        {{-- ================================
             ATTENDANCE
        ================================= --}}

        <div class="section-title">

            <h2>
                📊 إحصائيات الحضور
            </h2>

            <span>
                متابعة تقدمك في المحاضرات
            </span>

        </div>


        <div class="attendance-cards">


            {{-- Total --}}
            <div class="attendance-card">

                <div class="attendance-top">

                    <div class="attendance-icon icon-total">
                        📚
                    </div>

                </div>


                <div class="attendance-number">
                    {{ $totalLessons }}
                </div>


                <div class="attendance-label">
                    إجمالي المحاضرات
                </div>

            </div>


            {{-- Present --}}
            <div class="attendance-card">

                <div class="attendance-top">

                    <div class="attendance-icon icon-present">
                        ✅
                    </div>

                </div>


                <div class="attendance-number">
                    {{ $presentCount }}
                </div>


                <div class="attendance-label">
                    محاضرات حضرتها
                </div>

            </div>


            {{-- Absent --}}
            <div class="attendance-card">

                <div class="attendance-top">

                    <div class="attendance-icon icon-absent">
                        ❌
                    </div>

                </div>


                <div class="attendance-number">
                    {{ $absentCount }}
                </div>


                <div class="attendance-label">
                    محاضرات غبت عنها
                </div>

            </div>


            {{-- Percentage --}}
            <div class="attendance-card">

                <div class="attendance-top">

                    <div class="attendance-icon icon-percentage">
                        📈
                    </div>

                </div>


                <div class="attendance-number">
                    {{ $attendancePercentage }}%
                </div>


                <div class="attendance-label">
                    نسبة الحضور
                </div>


                <div class="progress">

                    <div class="progress-bar"></div>

                </div>

            </div>


        </div>


        {{-- ================================
             QUICK ACCESS
        ================================= --}}

        <div class="section-title">

            <h2>
                ⚡ الوصول السريع
            </h2>

            <span>
                أهم الأقسام
            </span>

        </div>


        <div class="cards">


            {{-- Lessons --}}
            <div class="card">

                <div class="card-icon">
                    📚
                </div>


                <h3>
                    المحاضرات
                </h3>


                <p>
                    الوصول إلى جميع المحاضرات المتاحة في الكورس.
                </p>


                <a href="{{ route('course.content') }}">
                    عرض المحاضرات ←
                </a>

            </div>


            {{-- Assignments --}}
            <div class="card">

                <div class="card-icon">
                    📝
                </div>


                <h3>
                    الواجبات
                </h3>


                <p>
                    حل الواجبات ورفع صور الحل ومتابعة النتائج.
                </p>


                <a href="{{ route('assignments.index') }}">
                    عرض الواجبات ←
                </a>

            </div>


            {{-- Exams --}}
            <div class="card">

                <div class="card-icon">
                    🧠
                </div>


                <h3>
                    الامتحانات
                </h3>


                <p>
                    دخول الامتحانات ومتابعة نتائج المحاولات.
                </p>


                <a href="{{ route('exams.index') }}">
                    عرض الامتحانات ←
                </a>

            </div>


        </div>


        {{-- ================================
             EXTRA LINKS
        ================================= --}}

        <div class="extra-links">


            <a
                href="{{ route('subscriptions.status') }}"
                class="extra-link"
            >

                💳

                حالة الاشتراك

            </a>


            <a
                href="{{ route('course.content') }}"
                class="extra-link"
            >

                🎓

                دخول الكورس

            </a>


            <a
                href="{{ route('assignments.index') }}"
                class="extra-link"
            >

                📊

                متابعة الواجبات

            </a>


        </div>


    </div>


</body>

</html>