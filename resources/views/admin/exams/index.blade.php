<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>إدارة الامتحانات</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Tahoma, Arial, sans-serif;
            background: #f4f7fb;
            color: #1f2937;
        }

        .container {
            width: min(1100px, 92%);
            margin: 40px auto;
        }

        .header {
            background: linear-gradient(135deg, #111827, #1f2937);
            color: white;
            padding: 28px;
            border-radius: 20px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .header h1 {
            margin: 0 0 8px;
            font-size: 28px;
        }

        .header p {
            margin: 0;
            color: #d1d5db;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            border: none;
            cursor: pointer;
            padding: 12px 20px;
            border-radius: 12px;
            font-size: 15px;
            font-weight: bold;
        }

        .btn-primary {
            background: #22c55e;
            color: white;
        }

        .btn-primary:hover {
            background: #16a34a;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #111827;
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .empty {
            background: white;
            padding: 50px 25px;
            text-align: center;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
        }

        .empty .icon {
            font-size: 50px;
            margin-bottom: 15px;
        }

        .empty h2 {
            margin: 0 0 10px;
        }

        .empty p {
            color: #6b7280;
            margin-bottom: 25px;
        }

        .exam-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .exam-card {
            background: white;
            border-radius: 18px;
            padding: 24px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
            transition: 0.2s;
        }

        .exam-card:hover {
            transform: translateY(-3px);
        }

        .exam-card h2 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 21px;
        }

        .description {
            color: #6b7280;
            line-height: 1.8;
            min-height: 55px;
        }

        .info {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 18px 0;
        }

        .badge {
            background: #f3f4f6;
            padding: 8px 12px;
            border-radius: 10px;
            font-size: 13px;
        }

        .published {
            background: #dcfce7;
            color: #166534;
        }

        .draft {
            background: #fef3c7;
            color: #92400e;
        }

        .exam-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 14px;
            margin-bottom: 18px;
            display: block;
        }

        .actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        @media (max-width: 650px) {
            .header {
                flex-direction: column;
                align-items: stretch;
            }

            .header .btn {
                text-align: center;
            }

            .actions {
                flex-direction: column;
            }

            .actions .btn {
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <div>
            <h1>📝 إدارة الامتحانات</h1>

            <p>
                إضافة ومتابعة امتحانات مادة البرمجة
            </p>
        </div>

        <a
            href="{{ route('admin.exams.create') }}"
            class="btn btn-primary"
        >
            ➕ إضافة امتحان
        </a>

    </div>


    @if(session('success'))

        <div class="success">
            ✅ {{ session('success') }}
        </div>

    @endif


    @if($exams->count() === 0)

        <div class="empty">

            <div class="icon">
                📝
            </div>

            <h2>
                لا توجد امتحانات حتى الآن
            </h2>

            <p>
                ابدأ بإضافة أول امتحان للطلاب.
            </p>

            <a
                href="{{ route('admin.exams.create') }}"
                class="btn btn-primary"
            >
                ➕ إضافة أول امتحان
            </a>

        </div>

    @else

        <div class="exam-grid">

            @foreach($exams as $exam)

                <div class="exam-card">

                    {{-- صورة الامتحان --}}
                    @if($exam->image)

                        <img
                            src="{{ asset('storage/' . $exam->image) }}"
                            alt="{{ $exam->title }}"
                            class="exam-image"
                        >

                    @endif


                    <h2>
                        {{ $exam->title }}
                    </h2>


                    <div class="description">

                        {{ $exam->description ?: 'لا يوجد وصف للامتحان.' }}

                    </div>


                    <div class="info">

                        <span class="badge">
                            📚 {{ $exam->course->title }}
                        </span>


                        @if($exam->duration)

                            <span class="badge">
                                ⏱️ {{ $exam->duration }} دقيقة
                            </span>

                        @endif


                        <span class="badge">
                            🎯 {{ $exam->total_marks }} درجة
                        </span>


                        @if($exam->is_published)

                            <span class="badge published">
                                🟢 منشور
                            </span>

                        @else

                            <span class="badge draft">
                                🟡 غير منشور
                            </span>

                        @endif

                    </div>


                    <div class="actions">

                        <a
                            href="{{ route('admin.questions.index', $exam) }}"
                            class="btn btn-secondary"
                        >
                            ⚙️ إدارة الأسئلة
                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    @endif

</div>

</body>

</html>