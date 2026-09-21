<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        نتيجة الاختبار - {{ $attempt->exam->title }}
    </title>

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
            max-width: 950px;
            margin: 40px auto;
        }

        .result-card {
            background: white;
            border-radius: 24px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.07);
            margin-bottom: 25px;
        }

        .success-icon {
            width: 85px;
            height: 85px;
            border-radius: 50%;
            background: #dcfce7;
            color: #16a34a;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 42px;
            margin: 0 auto 20px;
        }

        .result-card h1 {
            margin: 0 0 10px;
            font-size: 30px;
            color: #111827;
        }

        .result-card p {
            color: #6b7280;
            margin-bottom: 30px;
        }

        .score-box {
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 25px;
        }

        .score-label {
            color: #475569;
            font-size: 15px;
            margin-bottom: 8px;
        }

        .score {
            font-size: 52px;
            font-weight: bold;
            color: #2563eb;
        }

        .score span {
            font-size: 25px;
            color: #64748b;
        }

        .percentage {
            margin-top: 8px;
            font-size: 18px;
            font-weight: bold;
            color: #1d4ed8;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 25px;
        }

        .stat {
            padding: 20px;
            border-radius: 15px;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
        }

        .stat-icon {
            font-size: 27px;
            margin-bottom: 8px;
        }

        .stat-number {
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .stat-title {
            color: #6b7280;
            font-size: 13px;
        }

        .correct .stat-number {
            color: #16a34a;
        }

        .wrong .stat-number {
            color: #dc2626;
        }

        .total .stat-number {
            color: #2563eb;
        }

        .answers-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        }

        .answers-card h2 {
            margin: 0 0 20px;
            font-size: 22px;
            color: #111827;
        }

        .answer-item {
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 18px;
            margin-bottom: 12px;
            text-align: right;
        }

        .answer-question {
            font-weight: bold;
            line-height: 1.8;
            margin-bottom: 10px;
        }

        .answer-status {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: bold;
        }

        .answer-status.correct {
            background: #dcfce7;
            color: #166534;
        }

        .answer-status.wrong {
            background: #fee2e2;
            color: #991b1b;
        }

        .student-answer {
            margin-top: 10px;
            color: #6b7280;
            font-size: 14px;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 25px;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            padding: 13px 22px;
            border-radius: 11px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }

        @media (max-width: 700px) {

            .container {
                width: 94%;
                margin: 25px auto;
            }

            .result-card {
                padding: 25px 18px;
            }

            .result-card h1 {
                font-size: 24px;
            }

            .score {
                font-size: 43px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .answers-card {
                padding: 20px;
            }

        }

    </style>

</head>

<body>

<div class="container">

    {{-- النتيجة الرئيسية --}}
    <div class="result-card">

        <div class="success-icon">
            🎉
        </div>

        <h1>
            تم تصحيح الاختبار بنجاح
        </h1>

        <p>
            {{ $attempt->exam->title }}
        </p>


        <div class="score-box">

            <div class="score-label">
                درجتك النهائية
            </div>

            <div class="score">
                {{ $attempt->score }}

                <span>
                    / {{ $attempt->total_marks }}
                </span>
            </div>

            <div class="percentage">
                {{ $percentage }}%
            </div>

        </div>


        <div class="stats">

            <div class="stat correct">

                <div class="stat-icon">
                    ✅
                </div>

                <div class="stat-number">
                    {{ $correctAnswers }}
                </div>

                <div class="stat-title">
                    إجابة صحيحة
                </div>

            </div>


            <div class="stat wrong">

                <div class="stat-icon">
                    ❌
                </div>

                <div class="stat-number">
                    {{ $wrongAnswers }}
                </div>

                <div class="stat-title">
                    إجابة خاطئة
                </div>

            </div>


            <div class="stat total">

                <div class="stat-icon">
                    📝
                </div>

                <div class="stat-number">
                    {{ $totalQuestions }}
                </div>

                <div class="stat-title">
                    إجمالي الأسئلة
                </div>

            </div>

        </div>


        <div class="buttons">

            <a
                href="{{ route('exams.index') }}"
                class="btn btn-primary"
            >
                📝 الاختبارات
            </a>

            <a
                href="{{ route('dashboard') }}"
                class="btn btn-secondary"
            >
                🏠 لوحة التحكم
            </a>

        </div>

    </div>


    {{-- تفاصيل الإجابات --}}
    <div class="answers-card">

        <h2>
            📋 تفاصيل إجاباتك
        </h2>


        @foreach($attempt->answers as $index => $answer)

            <div class="answer-item">

                <div class="answer-question">

                    {{ $index + 1 }}.
                    {{ $answer->question->question }}

                </div>


                @if($answer->is_correct)

                    <span class="answer-status correct">
                        ✅ إجابة صحيحة
                    </span>

                @else

                    <span class="answer-status wrong">
                        ❌ إجابة خاطئة
                    </span>

                @endif


                <div class="student-answer">

                    <strong>
                        إجابتك:
                    </strong>

                    @if($answer->answer === 'a')
                        أ) {{ $answer->question->option_a }}

                    @elseif($answer->answer === 'b')
                        ب) {{ $answer->question->option_b }}

                    @elseif($answer->answer === 'c')
                        ج) {{ $answer->question->option_c }}

                    @elseif($answer->answer === 'd')
                        د) {{ $answer->question->option_d }}

                    @else
                        لم يتم اختيار إجابة
                    @endif

                </div>


                @if(!$answer->is_correct)

                    <div class="student-answer">

                        <strong>
                            الإجابة الصحيحة:
                        </strong>

                        @if($answer->question->correct_answer === 'a')
                            أ) {{ $answer->question->option_a }}

                        @elseif($answer->question->correct_answer === 'b')
                            ب) {{ $answer->question->option_b }}

                        @elseif($answer->question->correct_answer === 'c')
                            ج) {{ $answer->question->option_c }}

                        @elseif($answer->question->correct_answer === 'd')
                            د) {{ $answer->question->option_d }}

                        @endif

                    </div>

                @endif

            </div>

        @endforeach

    </div>

</div>

</body>
</html>