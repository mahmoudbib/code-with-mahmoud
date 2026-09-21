<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>الاختبارات والتدريبات | منصتي التعليمية</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Tahoma, Arial, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            padding: 16px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            text-decoration: none;
            color: #111827;
            font-size: 21px;
            font-weight: bold;
        }

        .logo span {
            color: #16a34a;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .nav-links a {
            text-decoration: none;
            color: #4b5563;
            font-size: 14px;
            transition: 0.2s;
        }

        .nav-links a:hover {
            color: #16a34a;
        }

        .dashboard-btn {
            background: #16a34a;
            color: white !important;
            padding: 10px 16px;
            border-radius: 10px;
            font-weight: bold;
        }

        /* Hero */
        .hero {
            background: linear-gradient(135deg, #052e16, #166534, #16a34a);
            color: white;
            padding: 65px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: "</>";
            position: absolute;
            left: 8%;
            top: 15px;
            font-size: 100px;
            font-weight: bold;
            opacity: 0.06;
        }

        .hero::after {
            content: "{ }";
            position: absolute;
            right: 8%;
            bottom: 5px;
            font-size: 90px;
            font-weight: bold;
            opacity: 0.06;
        }

        .hero h1 {
            font-size: 38px;
            margin-bottom: 15px;
            position: relative;
            z-index: 2;
        }

        .hero p {
            font-size: 17px;
            opacity: 0.92;
            position: relative;
            z-index: 2;
        }

        /* Content */
        .container {
            width: min(1100px, 92%);
            margin: 45px auto;
        }

        .course-title {
            text-align: center;
            margin-bottom: 35px;
        }

        .course-title h2 {
            font-size: 27px;
            margin-bottom: 10px;
            color: #111827;
        }

        .course-title p {
            color: #6b7280;
        }

        /* Exams */
        .exams-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(290px, 1fr));
            gap: 24px;
        }

        .exam-card {
            background: #ffffff;
            border-radius: 18px;
            padding: 26px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
            transition: 0.25s ease;
        }

        .exam-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.09);
        }

        .exam-icon {
            width: 58px;
            height: 58px;
            border-radius: 15px;
            background: #dcfce7;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 27px;
            margin-bottom: 18px;
        }

        .exam-card h3 {
            font-size: 21px;
            color: #111827;
            margin-bottom: 10px;
        }

        .exam-description {
            color: #6b7280;
            line-height: 1.8;
            font-size: 14px;
            min-height: 50px;
            margin-bottom: 20px;
        }

        .exam-info {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 22px;
        }

        .info-item {
            background: #f3f4f6;
            border-radius: 8px;
            padding: 8px 11px;
            color: #4b5563;
            font-size: 13px;
        }

        .start-btn {
            display: block;
            width: 100%;
            text-align: center;
            text-decoration: none;
            background: #16a34a;
            color: white;
            padding: 13px;
            border-radius: 11px;
            font-weight: bold;
            transition: 0.2s;
        }

        .start-btn:hover {
            background: #15803d;
        }

        .submitted-btn {
            display: block;
            width: 100%;
            text-align: center;
            background: #dcfce7;
            color: #166534;
            padding: 13px;
            border-radius: 11px;
            font-weight: bold;
            border: 1px solid #bbf7d0;
            cursor: default;
        }

        .result-btn {
            display: block;
            width: 100%;
            text-align: center;
            text-decoration: none;
            background: #2563eb;
            color: white;
            padding: 13px;
            border-radius: 11px;
            font-weight: bold;
            transition: 0.2s;
            margin-top: 10px;
        }

        .result-btn:hover {
            background: #1d4ed8;
        }

        /* Empty */
        .empty {
            background: white;
            border-radius: 18px;
            padding: 55px 25px;
            text-align: center;
            border: 1px solid #e5e7eb;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        }

        .empty-icon {
            font-size: 55px;
            margin-bottom: 15px;
        }

        .empty h3 {
            font-size: 23px;
            margin-bottom: 10px;
            color: #111827;
        }

        .empty p {
            color: #6b7280;
            line-height: 1.8;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #16a34a;
            font-weight: bold;
        }

        /* Mobile */
        @media (max-width: 700px) {

            .navbar {
                flex-direction: column;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }

            .hero {
                padding: 50px 18px;
            }

            .hero h1 {
                font-size: 29px;
            }

            .hero p {
                font-size: 15px;
            }

            .container {
                margin: 30px auto;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar">

        <a href="{{ url('/') }}" class="logo">
            💻 <span>منصتي التعليمية</span>
        </a>

        <div class="nav-links">

            <a href="{{ url('/') }}">
                الرئيسية
            </a>

            <a href="{{ route('course.content') }}">
                المحاضرات
            </a>

            <a href="{{ route('exams.index') }}">
                الاختبارات
            </a>

            <a href="{{ route('dashboard') }}" class="dashboard-btn">
                لوحة التحكم
            </a>

        </div>

    </nav>


    <!-- Hero -->
    <section class="hero">

        <h1>📝 الاختبارات والتدريبات</h1>

        <p>
            اختبر فهمك وراجع ما تعلمته من خلال اختبارات مادة البرمجة
        </p>

    </section>


    <!-- Content -->
    <main class="container">

        <div class="course-title">

            <h2>
                {{ $course->title }}
            </h2>

            <p>
                اختر الاختبار الذي تريد البدء فيه
            </p>

        </div>


        @if($exams->count() > 0)

            <div class="exams-grid">

                @foreach($exams as $exam)

                    <div class="exam-card">

                        <div class="exam-icon">
                            📝
                        </div>

                        <h3>
                            {{ $exam->title }}
                        </h3>

                        <p class="exam-description">
                            {{ $exam->description ?: 'اختبار تدريبي لقياس مدى فهمك للمادة.' }}
                        </p>


                        <div class="exam-info">

                            @if($exam->duration)

                                <div class="info-item">
                                    ⏱️ {{ $exam->duration }} دقيقة
                                </div>

                            @endif


                            <div class="info-item">
                                🎯 {{ $exam->total_marks }} درجة
                            </div>

                        </div>


                        {{-- حالة الامتحان --}}

                        @if(isset($submittedAttempts[$exam->id]))

                            {{-- الامتحان تم تسليمه --}}

                            <div class="submitted-btn">
                                ✅ تم تسليم الامتحان
                            </div>


                            {{-- عرض النتيجة --}}

                            <a
                                href="{{ route('exams.result', $submittedAttempts[$exam->id]) }}"
                                class="result-btn"
                            >
                                📊 عرض النتيجة
                            </a>

                        @else

                            {{-- بدء الامتحان --}}

                            <a
                                href="{{ route('exams.start', $exam) }}"
                                class="start-btn"
                            >
                                🚀 ابدأ الاختبار
                            </a>

                        @endif

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty">

                <div class="empty-icon">
                    📝
                </div>

                <h3>
                    لا توجد اختبارات متاحة حاليًا
                </h3>

                <p>
                    سيتم إضافة الاختبارات والتدريبات قريبًا.
                    تابع المنصة لمعرفة كل جديد.
                </p>

                <a
                    href="{{ route('dashboard') }}"
                    class="back-btn"
                >
                    ← العودة إلى لوحة التحكم
                </a>

            </div>

        @endif

    </main>

</body>
</html>