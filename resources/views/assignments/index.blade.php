<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>الواجبات</title>

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

        .hero {
            background: linear-gradient(135deg, #111827, #2563eb);
            color: white;
            padding: 35px;
            border-radius: 24px;
            margin-bottom: 30px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        }

        .hero h1 {
            margin: 0 0 10px;
            font-size: 30px;
        }

        .hero p {
            margin: 0;
            opacity: 0.85;
            line-height: 1.8;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 11px 18px;
            background: rgba(255, 255, 255, 0.15);
            color: white;
            text-decoration: none;
            border-radius: 10px;
        }

        .success-message {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .error-message {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .assignments {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .assignment-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
            border: 1px solid #eef2f7;
            transition: 0.2s;
        }

        .assignment-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        }

        .icon {
            width: 55px;
            height: 55px;
            border-radius: 15px;
            background: #eff6ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-bottom: 18px;
        }

        .assignment-card h2 {
            margin: 0 0 10px;
            font-size: 21px;
            color: #111827;
        }

        .description {
            color: #64748b;
            line-height: 1.8;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .meta {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .badge {
            background: #f1f5f9;
            color: #475569;
            padding: 7px 11px;
            border-radius: 8px;
            font-size: 12px;
        }

        .buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .open-btn,
        .result-btn {
            display: block;
            width: 100%;
            text-align: center;
            text-decoration: none;
            padding: 13px;
            border-radius: 11px;
            font-weight: bold;
            transition: 0.2s;
        }

        .open-btn {
            background: #2563eb;
            color: white;
        }

        .open-btn:hover {
            background: #1d4ed8;
        }

        .result-btn {
            background: #16a34a;
            color: white;
        }

        .result-btn:hover {
            background: #15803d;
        }

        .empty {
            background: white;
            border-radius: 20px;
            padding: 60px 20px;
            text-align: center;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        }

        .empty-icon {
            font-size: 55px;
            margin-bottom: 15px;
        }

        .empty h2 {
            margin: 0 0 10px;
        }

        .empty p {
            color: #64748b;
        }

        @media (max-width: 750px) {

            .container {
                width: 94%;
                margin: 20px auto;
            }

            .hero {
                padding: 25px 20px;
            }

            .hero h1 {
                font-size: 25px;
            }

            .assignments {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>


<body>

<div class="container">


    {{-- Hero --}}
    <div class="hero">

        <h1>
            📚 الواجبات
        </h1>

        <p>
            حل الواجب الموجود في الكتاب، ثم ارفع صور الحل ليتم تصحيحها.
        </p>

        <a
            href="{{ route('dashboard') }}"
            class="back-btn"
        >
            ← لوحة التحكم
        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="success-message">

            {{ session('success') }}

        </div>

    @endif


    {{-- Error Message --}}
    @if(session('error'))

        <div class="error-message">

            {{ session('error') }}

        </div>

    @endif


    {{-- Assignments --}}
    @if($assignments->count() > 0)

        <div class="assignments">


            @foreach($assignments as $assignment)

                @php

                    /*
                     * آخر تسليم للطالب في هذا الواجب
                     */
                    $mySubmission = \App\Models\AssignmentSubmission::where(
                        'assignment_id',
                        $assignment->id
                    )
                    ->where(
                        'user_id',
                        auth()->id()
                    )
                    ->latest('id')
                    ->first();

                @endphp


                <div class="assignment-card">


                    {{-- Icon --}}
                    <div class="icon">

                        📚

                    </div>


                    {{-- Title --}}
                    <h2>

                        {{ $assignment->title }}

                    </h2>


                    {{-- Description --}}
                    @if($assignment->description)

                        <div class="description">

                            {{ $assignment->description }}

                        </div>

                    @endif


                    {{-- Meta --}}
                    <div class="meta">

                        <span class="badge">

                            🎯 {{ $assignment->total_marks }} درجات

                        </span>


                        @if($assignment->lesson)

                            <span class="badge">

                                📖 {{ $assignment->lesson->title }}

                            </span>

                        @endif

                    </div>


                    {{-- Buttons --}}
                    <div class="buttons">


                        {{-- Open Assignment --}}
                        <a
                            href="{{ route('assignments.show', $assignment) }}"
                            class="open-btn"
                        >

                            📤 فتح الواجب ورفع الحل

                        </a>


                        {{-- Result --}}
                        @if(
                            $mySubmission &&
                            $mySubmission->status === 'reviewed'
                        )

                            <a
                                href="{{ route('assignments.result', $assignment) }}"
                                class="result-btn"
                            >

                                📊 عرض النتيجة

                            </a>

                        @endif


                    </div>


                </div>

            @endforeach


        </div>


    @else


        {{-- Empty --}}
        <div class="empty">

            <div class="empty-icon">

                📭

            </div>


            <h2>

                لا توجد واجبات حاليًا

            </h2>


            <p>

                عندما يتم نشر واجب جديد سيظهر هنا.

            </p>

        </div>


    @endif


</div>

</body>

</html>