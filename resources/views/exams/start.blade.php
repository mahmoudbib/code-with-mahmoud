<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>بدء الاختبار - {{ $exam->title }}</title>

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
            max-width: 1000px;
            margin: 35px auto;
        }

        .exam-header {
            background: linear-gradient(135deg, #111827, #1e3a8a);
            color: white;
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .exam-header h1 {
            margin: 0 0 12px;
            font-size: 30px;
        }

        .exam-header p {
            margin: 0 0 20px;
            color: #dbeafe;
            line-height: 1.8;
        }

        .exam-info {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .info {
            background: rgba(255, 255, 255, 0.12);
            padding: 10px 15px;
            border-radius: 10px;
            font-size: 14px;
        }

        .question-card {
            background: white;
            border-radius: 18px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
            border: 1px solid #eef0f4;
        }

        .question-top {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 22px;
        }

        .question-number {
            min-width: 45px;
            height: 45px;
            background: #2563eb;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 18px;
        }

        .question-text {
            flex: 1;
            font-size: 18px;
            font-weight: bold;
            line-height: 1.8;
        }

        .question-mark {
            background: #eff6ff;
            color: #1d4ed8;
            padding: 7px 11px;
            border-radius: 8px;
            font-size: 13px;
            white-space: nowrap;
        }

        .options {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 13px;
        }

        .option {
            position: relative;
        }

        .option input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .option label {
            display: block;
            padding: 15px 18px;
            background: #f9fafb;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            cursor: pointer;
            transition: 0.2s;
            font-size: 15px;
        }

        .option label:hover {
            border-color: #93c5fd;
            background: #eff6ff;
        }

        .option input:checked + label {
            border-color: #2563eb;
            background: #eff6ff;
            color: #1d4ed8;
            font-weight: bold;
        }

        .empty {
            background: white;
            text-align: center;
            padding: 50px 20px;
            border-radius: 18px;
        }

        .empty-icon {
            font-size: 55px;
            margin-bottom: 15px;
        }

        .empty h2 {
            margin: 0 0 10px;
        }

        .submit-area {
            background: white;
            border-radius: 18px;
            padding: 25px;
            margin-top: 25px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        .submit-btn {
            border: none;
            background: #16a34a;
            color: white;
            padding: 15px 35px;
            border-radius: 12px;
            font-family: inherit;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .submit-btn:hover {
            background: #15803d;
            transform: translateY(-1px);
        }

        .warning {
            margin-top: 15px;
            color: #6b7280;
            font-size: 13px;
        }

        @media (max-width: 700px) {
            .container {
                width: 94%;
                margin: 20px auto;
            }

            .exam-header {
                padding: 22px;
            }

            .exam-header h1 {
                font-size: 24px;
            }

            .question-card {
                padding: 18px;
            }

            .question-top {
                flex-wrap: wrap;
            }

            .options {
                grid-template-columns: 1fr;
            }

            .question-text {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    {{-- بيانات الامتحان --}}
    <div class="exam-header">

        <h1>
            📝 {{ $exam->title }}
        </h1>

        @if($exam->description)
            <p>
                {{ $exam->description }}
            </p>
        @endif

        <div class="exam-info">

            <div class="info">
                📚 عدد الأسئلة:
                <strong>{{ $exam->questions->count() }}</strong>
            </div>

            <div class="info">
                🎯 الدرجة الكلية:
                <strong>{{ $exam->total_marks }}</strong>
            </div>

            @if($exam->duration)
                <div class="info">
                    ⏱️ المدة:
                    <strong>{{ $exam->duration }} دقيقة</strong>
                </div>
            @endif

        </div>

    </div>


    @if($exam->questions->count() > 0)

        {{-- فورم الامتحان --}}
        <form
            action="{{ route('exams.submit', $exam) }}"
            method="POST"
        >

            @csrf

            @foreach($exam->questions as $index => $question)

                <div class="question-card">

                    <div class="question-top">

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

                        {{-- الاختيار أ --}}
                        <div class="option">

                            <input
                                type="radio"
                                name="answers[{{ $question->id }}]"
                                id="q{{ $question->id }}_a"
                                value="a"
                            >

                            <label for="q{{ $question->id }}_a">
                                أ) {{ $question->option_a }}
                            </label>

                        </div>


                        {{-- الاختيار ب --}}
                        <div class="option">

                            <input
                                type="radio"
                                name="answers[{{ $question->id }}]"
                                id="q{{ $question->id }}_b"
                                value="b"
                            >

                            <label for="q{{ $question->id }}_b">
                                ب) {{ $question->option_b }}
                            </label>

                        </div>


                        {{-- الاختيار ج --}}
                        <div class="option">

                            <input
                                type="radio"
                                name="answers[{{ $question->id }}]"
                                id="q{{ $question->id }}_c"
                                value="c"
                            >

                            <label for="q{{ $question->id }}_c">
                                ج) {{ $question->option_c }}
                            </label>

                        </div>


                        {{-- الاختيار د --}}
                        <div class="option">

                            <input
                                type="radio"
                                name="answers[{{ $question->id }}]"
                                id="q{{ $question->id }}_d"
                                value="d"
                            >

                            <label for="q{{ $question->id }}_d">
                                د) {{ $question->option_d }}
                            </label>

                        </div>

                    </div>

                </div>

            @endforeach


            {{-- زر التسليم --}}
            <div class="submit-area">

                <button
                    type="submit"
                    class="submit-btn"
                    onclick="return confirm('هل أنت متأكد أنك تريد تسليم الاختبار؟');"
                >
                    ✅ تسليم الاختبار
                </button>

                <div class="warning">
                    ⚠️ بعد تسليم الاختبار سيتم تصحيح إجاباتك وحساب درجتك تلقائيًا.
                </div>

            </div>

        </form>

    @else

        <div class="empty">

            <div class="empty-icon">
                📝
            </div>

            <h2>
                لا توجد أسئلة في هذا الامتحان
            </h2>

            <p>
                لم تتم إضافة أسئلة للامتحان حتى الآن.
            </p>

        </div>

    @endif

</div>

</body>
</html>