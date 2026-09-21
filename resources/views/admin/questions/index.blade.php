<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>إدارة أسئلة الامتحان</title>

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
            width: 92%;
            max-width: 1100px;
            margin: 40px auto;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .title-box h1 {
            margin: 0 0 8px;
            font-size: 30px;
            color: #111827;
        }

        .title-box p {
            margin: 0;
            color: #6b7280;
            font-size: 15px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 15px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }

        .exam-card {
            background: white;
            border-radius: 18px;
            padding: 22px;
            margin-bottom: 25px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
        }

        .exam-card h2 {
            margin: 0 0 10px;
            color: #111827;
        }

        .exam-description {
            color: #6b7280;
            margin-bottom: 15px;
        }

        .exam-image {
            width: 100%;
            max-height: 260px;
            object-fit: cover;
            border-radius: 14px;
            margin-bottom: 18px;
        }

        .stats {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .stat {
            background: #f3f4f6;
            padding: 9px 14px;
            border-radius: 9px;
            font-size: 14px;
            color: #374151;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .question {
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 20px;
            margin-bottom: 15px;
            background: #fafafa;
        }

        .question-header {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .question-number {
            min-width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #2563eb;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .question-text {
            flex: 1;
            font-size: 17px;
            font-weight: bold;
            line-height: 1.7;
        }

        .question-mark {
            background: #dbeafe;
            color: #1d4ed8;
            padding: 7px 12px;
            border-radius: 8px;
            font-size: 13px;
            white-space: nowrap;
        }

        .options {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .option {
            background: white;
            border: 1px solid #e5e7eb;
            padding: 11px 14px;
            border-radius: 9px;
            color: #4b5563;
        }

        .correct {
            border-color: #22c55e;
            background: #f0fdf4;
            color: #166534;
            font-weight: bold;
        }

        .empty {
            text-align: center;
            padding: 50px 20px;
            background: white;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        }

        .empty-icon {
            font-size: 55px;
            margin-bottom: 15px;
        }

        .empty h3 {
            margin: 0 0 10px;
            font-size: 22px;
        }

        .empty p {
            color: #6b7280;
            margin-bottom: 20px;
        }

        @media (max-width: 700px) {
            .container {
                width: 94%;
                margin: 25px auto;
            }

            .title-box h1 {
                font-size: 24px;
            }

            .options {
                grid-template-columns: 1fr;
            }

            .question-header {
                flex-wrap: wrap;
            }

            .top-bar {
                align-items: stretch;
            }

            .top-bar .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="top-bar">

        <div class="title-box">
            <h1>⚙️ إدارة أسئلة الامتحان</h1>

            <p>
                الامتحان:
                <strong>{{ $exam->title }}</strong>
            </p>
        </div>

        <div>
            <a
                href="{{ route('admin.questions.create', $exam) }}"
                class="btn btn-primary"
            >
                ➕ إضافة سؤال
            </a>

            <a
                href="{{ route('admin.exams.index') }}"
                class="btn btn-secondary"
            >
                ← الرجوع للامتحانات
            </a>
        </div>

    </div>


    @if(session('success'))
        <div class="success">
            ✅ {{ session('success') }}
        </div>
    @endif


    <div class="exam-card">

        <h2>{{ $exam->title }}</h2>

        @if($exam->description)
            <div class="exam-description">
                {{ $exam->description }}
            </div>
        @endif


        @if($exam->image)

            <img
                src="{{ asset('storage/' . $exam->image) }}"
                alt="{{ $exam->title }}"
                class="exam-image"
            >

        @endif


        <div class="stats">

            <div class="stat">
                📚 عدد الأسئلة:
                <strong>{{ $questions->count() }}</strong>
            </div>

            <div class="stat">
                🎯 الدرجة الكلية:
                <strong>{{ $exam->total_marks }}</strong>
            </div>

            @if($exam->duration)
                <div class="stat">
                    ⏱️ مدة الامتحان:
                    <strong>{{ $exam->duration }} دقيقة</strong>
                </div>
            @endif

        </div>


        @if($questions->count() > 0)

            @foreach($questions as $index => $question)

                <div class="question">

                    <div class="question-header">

                        <div class="question-number">
                            {{ $index + 1 }}
                        </div>

                        <div class="question-text">
                            {{ $question->question }}
                        </div>

                        <div class="question-mark">
                            {{ $question->mark }} درجة
                        </div>

                    </div>


                    <div class="options">

                        <div class="option {{ $question->correct_answer === 'a' ? 'correct' : '' }}">
                            أ) {{ $question->option_a }}

                            @if($question->correct_answer === 'a')
                                ✅
                            @endif
                        </div>

                        <div class="option {{ $question->correct_answer === 'b' ? 'correct' : '' }}">
                            ب) {{ $question->option_b }}

                            @if($question->correct_answer === 'b')
                                ✅
                            @endif
                        </div>

                        <div class="option {{ $question->correct_answer === 'c' ? 'correct' : '' }}">
                            ج) {{ $question->option_c }}

                            @if($question->correct_answer === 'c')
                                ✅
                            @endif
                        </div>

                        <div class="option {{ $question->correct_answer === 'd' ? 'correct' : '' }}">
                            د) {{ $question->option_d }}

                            @if($question->correct_answer === 'd')
                                ✅
                            @endif
                        </div>

                    </div>

                </div>

            @endforeach

        @else

            <div class="empty">

                <div class="empty-icon">
                    📝
                </div>

                <h3>
                    لسه مفيش أسئلة
                </h3>

                <p>
                    ابدأ بإضافة أول سؤال للامتحان.
                </p>

                <a
                    href="{{ route('admin.questions.create', $exam) }}"
                    class="btn btn-primary"
                >
                    ➕ إضافة أول سؤال
                </a>

            </div>

        @endif

    </div>

</div>

</body>
</html>