<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>لوحة تحكم الإدارة</title>


    <style>

        * {
            box-sizing: border-box;
        }


        body {
            margin: 0;

            font-family:
                Tahoma,
                Arial,
                sans-serif;

            background:
                radial-gradient(
                    circle at 10% 10%,
                    rgba(13, 110, 253, 0.08),
                    transparent 22%
                ),
                radial-gradient(
                    circle at 90% 80%,
                    rgba(25, 135, 84, 0.08),
                    transparent 22%
                ),
                #f4f7fb;

            color: #1f2937;

            overflow-x: hidden;
        }


        a {
            text-decoration: none;
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

            margin: 15px auto 25px;

            background:
                rgba(255, 255, 255, 0.95);

            backdrop-filter: blur(12px);

            border: 1px solid #e7ebf0;

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

            color: #0d6efd;

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

            background:
                linear-gradient(
                    135deg,
                    #e7f0ff,
                    #dce9ff
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

            background: #eef4ff;

            color: #0d6efd;
        }


        .nav-link.active {

            background: #0d6efd;

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
           CONTAINER
        ================================= */

        .container {

            width: 92%;

            max-width: 1200px;

            margin: 20px auto 60px;

            position: relative;

            z-index: 2;
        }


        /* ================================
           WELCOME
        ================================= */

        .welcome {

            position: relative;

            overflow: hidden;

            background:
                radial-gradient(
                    circle at 15% 50%,
                    rgba(255, 255, 255, 0.12),
                    transparent 30%
                ),
                linear-gradient(
                    135deg,
                    #071f49,
                    #0d6efd
                );

            color: white;

            padding: 35px 40px;

            border-radius: 24px;

            box-shadow:
                0 18px 40px rgba(13, 110, 253, 0.18);

            margin-bottom: 30px;
        }


        .welcome::before {

            content: "";

            position: absolute;

            width: 250px;

            height: 250px;

            border-radius: 50%;

            background:
                rgba(255, 255, 255, 0.06);

            left: -80px;

            top: -120px;
        }


        .welcome::after {

            content: "";

            position: absolute;

            width: 200px;

            height: 200px;

            border-radius: 50%;

            background:
                rgba(255, 255, 255, 0.06);

            right: -70px;

            bottom: -110px;
        }


        .welcome-content {

            position: relative;

            z-index: 2;
        }


        .welcome h1 {

            margin: 0 0 10px;

            font-size: 31px;
        }


        .welcome p {

            margin: 0;

            line-height: 1.8;

            opacity: 0.9;
        }


        .admin-badge {

            display: inline-flex;

            align-items: center;

            gap: 8px;

            margin-top: 18px;

            padding: 10px 17px;

            border-radius: 50px;

            background:
                rgba(255, 255, 255, 0.12);

            border:
                1px solid rgba(255, 255, 255, 0.20);

            font-size: 14px;
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
           CARDS
        ================================= */

        .cards {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 20px;

            margin-bottom: 30px;
        }


        .card {

            background: white;

            padding: 25px;

            border-radius: 20px;

            border: 1px solid #edf0f4;

            box-shadow:
                0 8px 25px rgba(31, 41, 55, 0.055);

            transition: 0.25s;

            min-height: 245px;

            display: flex;

            flex-direction: column;
        }


        .card:hover {

            transform:
                translateY(-5px);

            box-shadow:
                0 15px 35px rgba(31, 41, 55, 0.10);
        }


        .card-icon {

            width: 62px;

            height: 62px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 17px;

            font-size: 29px;

            margin-bottom: 17px;
        }


        .icon-blue {

            background: #e7f0ff;

            color: #0d6efd;
        }


        .icon-green {

            background: #e5f8ef;

            color: #198754;
        }


        .icon-orange {

            background: #fff0df;

            color: #fd7e14;
        }


        .icon-purple {

            background: #f1e8ff;

            color: #8e44d6;
        }


        .icon-red {

            background: #ffe9ec;

            color: #dc3545;
        }


        .icon-cyan {

            background: #e5f8fb;

            color: #0891b2;
        }


        .card h2 {

            margin: 0 0 10px;

            font-size: 20px;

            color: #17202a;
        }


        .card p {

            margin: 0;

            color: #718096;

            line-height: 1.8;

            font-size: 13px;

            flex: 1;
        }


        .buttons {

            display: flex;

            gap: 8px;

            flex-wrap: wrap;

            margin-top: 20px;
        }


        .btn {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding: 11px 16px;

            border-radius: 9px;

            color: white;

            font-weight: bold;

            font-size: 13px;

            transition: 0.2s;
        }


        .btn:hover {

            transform:
                translateY(-2px);
        }


        .blue {

            background: #0d6efd;
        }


        .blue:hover {

            background: #0b5ed7;
        }


        .green {

            background: #198754;
        }


        .green:hover {

            background: #157347;
        }


        .orange {

            background: #fd7e14;
        }


        .orange:hover {

            background: #e96b02;
        }


        .purple {

            background: #8e44d6;
        }


        .purple:hover {

            background: #7136aa;
        }


        .red {

            background: #dc3545;
        }


        .red:hover {

            background: #bb2d3b;
        }


        .cyan {

            background: #0891b2;
        }


        .cyan:hover {

            background: #0e7490;
        }


        /* ================================
           QUICK LINKS
        ================================= */

        .quick-links {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 15px;

            margin-top: 5px;
        }


        .quick-link {

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            padding: 16px;

            background: white;

            border:
                1px solid #edf0f4;

            border-radius: 14px;

            color: #475569;

            font-weight: bold;

            font-size: 14px;

            box-shadow:
                0 6px 20px rgba(31, 41, 55, 0.04);

            transition: 0.2s;
        }


        .quick-link:hover {

            color: #0d6efd;

            transform:
                translateY(-2px);

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


            .cards {

                grid-template-columns:
                    repeat(2, 1fr);
            }


            .quick-links {

                grid-template-columns:
                    repeat(2, 1fr);
            }

        }


        @media (max-width: 700px) {

            .container {

                width: 94%;
            }


            .navbar {

                width: 94%;
            }


            .cards {

                grid-template-columns: 1fr;
            }


            .quick-links {

                grid-template-columns: 1fr;
            }


            .welcome {

                padding: 28px 22px;
            }


            .welcome h1 {

                font-size: 25px;
            }

        }


        @media (max-width: 500px) {

            .nav-links {

                display: grid;

                grid-template-columns:
                    repeat(2, 1fr);
            }


            .nav-link {

                justify-content: center;
            }


            .welcome {

                border-radius: 20px;
            }


            .card {

                min-height: auto;
            }

        }

    </style>

</head>


<body>


{{-- ================================
     NAVBAR
================================= --}}

<nav class="navbar">

    <div class="nav-content">


        {{-- Brand --}}
        <a
            href="{{ route('admin.dashboard') }}"
            class="brand"
        >

            <span class="brand-icon">
                🛠️
            </span>

            إدارة المنصة

        </a>


        {{-- Navigation --}}
        <div class="nav-links">


            <a
                href="{{ route('admin.dashboard') }}"
                class="nav-link active"
            >
                🏠 الرئيسية
            </a>


            <a
                href="{{ route('admin.lessons.index') }}"
                class="nav-link"
            >
                📚 المحاضرات
            </a>


            <a
                href="{{ route('admin.assignments.index') }}"
                class="nav-link"
            >
                📝 الواجبات
            </a>


            <a
                href="{{ route('admin.exams.index') }}"
                class="nav-link"
            >
                🧠 الامتحانات
            </a>


            <a
                href="{{ route('admin.subscriptions.index') }}"
                class="nav-link"
            >
                💳 الاشتراكات
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
     MAIN
================================= --}}

<div class="container">


    {{-- Welcome --}}
    <div class="welcome">

        <div class="welcome-content">

            <h1>
                👋 أهلاً بك يا {{ $user->name }}
            </h1>

            <p>
                🛠️ أنت الآن داخل لوحة تحكم إدارة منصة البرمجة.
            </p>

            <div class="admin-badge">

                👑

                صلاحيات مدير المنصة

            </div>

        </div>

    </div>


    {{-- Main Management --}}
    <div class="section-title">

        <h2>
            ⚡ إدارة المنصة
        </h2>

        <span>
            جميع الأقسام المهمة في مكان واحد
        </span>

    </div>


    <div class="cards">


        {{-- Subscriptions --}}
        <div class="card">

            <div class="card-icon icon-blue">
                💳
            </div>

            <h2>
                إدارة الاشتراكات
            </h2>

            <p>
                مراجعة طلبات الاشتراك ومتابعة الطلبات
                وقبول أو رفض اشتراكات الطلاب.
            </p>

            <div class="buttons">

                <a
                    href="{{ route('admin.subscriptions.index') }}"
                    class="btn blue"
                >
                    💳 إدارة الاشتراكات
                </a>

            </div>

        </div>


        {{-- Lessons --}}
        <div class="card">

            <div class="card-icon icon-green">
                📚
            </div>

            <h2>
                إدارة المحاضرات
            </h2>

            <p>
                إضافة المحاضرات وتعديلها ونشرها
                أو إخفائها من الطلاب.
            </p>

            <div class="buttons">

                <a
                    href="{{ route('admin.lessons.index') }}"
                    class="btn green"
                >
                    📚 إدارة المحاضرات
                </a>

                <a
                    href="{{ route('admin.lessons.create') }}"
                    class="btn orange"
                >
                    ➕ إضافة محاضرة
                </a>

            </div>

        </div>


        {{-- Assignments --}}
        <div class="card">

            <div class="card-icon icon-orange">
                📝
            </div>

            <h2>
                إدارة الواجبات
            </h2>

            <p>
                إنشاء الواجبات ومتابعة الواجبات التي
                تم تسليمها من الطلاب.
            </p>

            <div class="buttons">

                <a
                    href="{{ route('admin.assignments.index') }}"
                    class="btn orange"
                >
                    📝 إدارة الواجبات
                </a>

                <a
                    href="{{ route('admin.assignments.create') }}"
                    class="btn green"
                >
                    ➕ إضافة واجب
                </a>

            </div>

        </div>


        {{-- Assignment Submissions --}}
        <div class="card">

            <div class="card-icon icon-purple">
                📋
            </div>

            <h2>
                تسليمات الواجبات
            </h2>

            <p>
                مشاهدة محاولات الطلاب، صور الحل،
                التصحيح بالذكاء الاصطناعي واعتماد النتيجة.
            </p>

            <div class="buttons">

                <a
                    href="{{ route('admin.assignment-submissions.index') }}"
                    class="btn purple"
                >
                    📋 متابعة التسليمات
                </a>

            </div>

        </div>


        {{-- Exams --}}
        <div class="card">

            <div class="card-icon icon-cyan">
                🧠
            </div>

            <h2>
                إدارة الامتحانات
            </h2>

            <p>
                إنشاء الامتحانات وإضافة الأسئلة
                ومتابعة محاولات الطلاب.
            </p>

            <div class="buttons">

                <a
                    href="{{ route('admin.exams.index') }}"
                    class="btn cyan"
                >
                    🧠 إدارة الامتحانات
                </a>

                <a
                    href="{{ route('admin.exams.create') }}"
                    class="btn green"
                >
                    ➕ إنشاء امتحان
                </a>

            </div>

        </div>


        {{-- Exam Attempts --}}
        <div class="card">

            <div class="card-icon icon-red">
                📊
            </div>

            <h2>
                محاولات الامتحانات
            </h2>

            <p>
                متابعة محاولات الطلاب والاطلاع على
                النتائج الخاصة بالامتحانات.
            </p>

            <div class="buttons">

                <a
                    href="{{ route('admin.exam-attempts.index') }}"
                    class="btn red"
                >
                    📊 متابعة المحاولات
                </a>

            </div>

        </div>


    </div>


    {{-- Quick Links --}}
    <div class="section-title">

        <h2>
            🚀 وصول سريع
        </h2>

        <span>
            اختصارات الإدارة
        </span>

    </div>


    <div class="quick-links">


        <a
            href="{{ route('admin.lessons.create') }}"
            class="quick-link"
        >
            ➕ إضافة محاضرة
        </a>


        <a
            href="{{ route('admin.assignments.create') }}"
            class="quick-link"
        >
            📝 إنشاء واجب
        </a>


        <a
            href="{{ route('admin.exams.create') }}"
            class="quick-link"
        >
            🧠 إنشاء امتحان
        </a>


        <a
            href="{{ route('admin.assignment-submissions.index') }}"
            class="quick-link"
        >
            📋 تسليمات الطلاب
        </a>


        <a
            href="{{ route('admin.exam-attempts.index') }}"
            class="quick-link"
        >
            📊 نتائج الامتحانات
        </a>


        <a
            href="{{ route('admin.subscriptions.index') }}"
            class="quick-link"
        >
            💳 طلبات الاشتراك
        </a>


    </div>


</div>


</body>

</html>