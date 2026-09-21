<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>نتيجة الواجب</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Tahoma, Arial, sans-serif;
            background: #f5f7fb;
            color: #222;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 40px auto;
        }

        .header {
            background: white;
            border-radius: 18px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
            text-align: center;
        }

        .header h1 {
            margin: 0 0 10px;
            font-size: 28px;
        }

        .header p {
            margin: 0;
            color: #777;
            font-size: 16px;
        }

        .score-card {
            background: white;
            border-radius: 18px;
            padding: 30px;
            margin-bottom: 25px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }

        .score-title {
            font-size: 18px;
            color: #666;
            margin-bottom: 15px;
        }

        .score {
            font-size: 52px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .score-total {
            color: #777;
            font-size: 17px;
        }

        .section {
            background: white;
            border-radius: 18px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }

        .section h2 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 22px;
        }

        .question {
            border: 1px solid #e5e7eb;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            background: #fafafa;
        }

        .question:last-child {
            margin-bottom: 0;
        }

        .question-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .answer-box {
            background: white;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 12px;
            border-right: 4px solid #999;
        }

        .answer-box strong {
            display: block;
            margin-bottom: 7px;
        }

        .correct-answer {
            border-right-color: #22c55e;
        }

        .wrong-answer {
            border-right-color: #ef4444;
        }

        .explanation {
            background: #fff;
            border-radius: 10px;
            padding: 15px;
            margin-top: 12px;
        }

        .question-score {
            margin-top: 15px;
            font-weight: bold;
        }

        .teacher-feedback {
            background: #f8fafc;
            border-radius: 12px;
            padding: 20px;
            line-height: 1.8;
        }

        .back-btn {
            display: inline-block;
            background: #111827;
            color: white;
            text-decoration: none;
            padding: 13px 22px;
            border-radius: 10px;
            margin-top: 10px;
        }

        .back-btn:hover {
            opacity: 0.9;
        }

        .empty {
            text-align: center;
            color: #777;
            padding: 30px;
        }

        @media (max-width: 600px) {
            .container {
                width: 94%;
                margin: 20px auto;
            }

            .header,
            .score-card,
            .section {
                padding: 20px;
            }

            .score {
                font-size: 42px;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        {{-- Header --}}
        <div class="header">

            <h1>
                نتيجة الواجب
            </h1>

            <p>
                {{ $assignment->title }}
            </p>

        </div>


        {{-- Final Score --}}
        <div class="score-card">

            <div class="score-title">
                الدرجة النهائية
            </div>

            <div class="score">
                {{ $submission->final_score }}
                / {{ $assignment->total_marks }}
            </div>

            <div class="score-total">
                تم اعتماد النتيجة من المدرس
            </div>

        </div>


        {{-- AI Feedback --}}
        @php
            $aiData = null;

            if (!empty($submission->ai_feedback)) {
                $aiData = json_decode($submission->ai_feedback, true);
            }
        @endphp


        @if(is_array($aiData))

            <div class="section">

                <h2>
                    📝 تفاصيل التصحيح
                </h2>


                {{-- AI Summary --}}
                @if(!empty($aiData['summary']))

                    <div class="answer-box">

                        <strong>
                            ملخص التصحيح:
                        </strong>

                        <div>
                            {{ $aiData['summary'] }}
                        </div>

                    </div>

                @endif


                {{-- Questions --}}
                @if(!empty($aiData['questions']) && is_array($aiData['questions']))

                    @foreach($aiData['questions'] as $index => $question)

                        <div class="question">

                            <div class="question-title">
                                السؤال {{ $index + 1 }}
                            </div>


                            {{-- Question --}}
                            @if(!empty($question['question']))

                                <div class="answer-box">

                                    <strong>
                                        السؤال:
                                    </strong>

                                    {{ $question['question'] }}

                                </div>

                            @endif


                            {{-- Student Answer --}}
                            @if(isset($question['student_answer']))

                                <div class="answer-box">

                                    <strong>
                                        إجابة الطالب:
                                    </strong>

                                    {{ $question['student_answer'] }}

                                </div>

                            @endif


                            {{-- Correct Answer --}}
                            @if(!empty($question['correct_answer']))

                                <div class="answer-box correct-answer">

                                    <strong>
                                        الإجابة الصحيحة:
                                    </strong>

                                    {{ $question['correct_answer'] }}

                                </div>

                            @endif


                            {{-- Explanation --}}
                            @if(!empty($question['explanation']))

                                <div class="explanation">

                                    <strong>
                                        💡 التوضيح:
                                    </strong>

                                    <div style="margin-top: 8px;">
                                        {{ $question['explanation'] }}
                                    </div>

                                </div>

                            @endif


                            {{-- Question Score --}}
                            @if(isset($question['score']))

                                <div class="question-score">

                                    درجة السؤال:
                                    {{ $question['score'] }}

                                </div>

                            @endif

                        </div>

                    @endforeach

                @else

                    <div class="empty">
                        لا توجد تفاصيل أسئلة متاحة.
                    </div>

                @endif

            </div>

        @endif


        {{-- Teacher Feedback --}}
        @if(!empty($submission->teacher_feedback))

            <div class="section">

                <h2>
                    👨‍🏫 ملاحظات المدرس
                </h2>

                <div class="teacher-feedback">

                    {{ $submission->teacher_feedback }}

                </div>

            </div>

        @endif


        {{-- Back --}}
        <div style="text-align:center;">

            <a
                href="{{ route('assignments.index') }}"
                class="back-btn"
            >
                ← العودة إلى الواجبات
            </a>

        </div>

    </div>

</body>

</html>