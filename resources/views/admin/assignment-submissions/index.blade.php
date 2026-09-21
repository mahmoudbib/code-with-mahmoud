<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>تسليمات الواجبات</title>

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
            width: 94%;
            max-width: 1400px;
            margin: 40px auto;
        }

        .hero {
            background: linear-gradient(135deg, #111827, #2563eb);
            color: white;
            padding: 35px;
            border-radius: 24px;
            margin-bottom: 25px;
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

        .top-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 22px;
        }

        .back-btn {
            display: inline-block;
            padding: 11px 18px;
            background: rgba(255, 255, 255, 0.15);
            color: white;
            text-decoration: none;
            border-radius: 10px;
            transition: 0.2s;
        }

        .back-btn:hover {
            background: rgba(255, 255, 255, 0.25);
        }

        .success-message {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .submissions-box {
            background: white;
            border-radius: 22px;
            padding: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1100px;
        }

        thead {
            background: #f8fafc;
        }

        th {
            padding: 16px;
            text-align: right;
            color: #475569;
            font-size: 14px;
            border-bottom: 2px solid #e2e8f0;
            white-space: nowrap;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid #eef2f7;
            vertical-align: middle;
        }

        tbody tr {
            transition: 0.2s;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        .student {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 200px;
        }

        .student-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: #eff6ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .student-info strong {
            display: block;
            color: #111827;
            margin-bottom: 4px;
        }

        .student-info span {
            display: block;
            color: #64748b;
            font-size: 12px;
        }

        .assignment-name {
            font-weight: bold;
            color: #1e3a8a;
            min-width: 150px;
        }

        .attempt {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 55px;
            padding: 7px 11px;
            background: #ede9fe;
            color: #6d28d9;
            border-radius: 9px;
            font-weight: bold;
        }

        .date {
            color: #64748b;
            font-size: 13px;
            white-space: nowrap;
            line-height: 1.8;
        }

        .images-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #eff6ff;
            color: #1d4ed8;
            padding: 8px 13px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: bold;
            text-decoration: none;
            transition: 0.2s;
            white-space: nowrap;
        }

        .images-link:hover {
            background: #dbeafe;
            transform: translateY(-1px);
        }

        .score {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #f1f5f9;
            color: #475569;
            padding: 7px 11px;
            border-radius: 9px;
            font-weight: bold;
            white-space: nowrap;
        }

        .score.ai {
            background: #ede9fe;
            color: #6d28d9;
        }

        .score.final {
            background: #dcfce7;
            color: #166534;
        }

        .score.not-graded {
            background: #fff7ed;
            color: #c2410c;
        }

        .status {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: bold;
            white-space: nowrap;
        }

        .status-submitted {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .status-reviewed {
            background: #dcfce7;
            color: #166534;
        }

        .status-ai {
            background: #ede9fe;
            color: #6d28d9;
        }

        .info-box {
            margin-top: 20px;
            padding: 18px;
            border-radius: 15px;
            background: #eff6ff;
            border: 1px solid #dbeafe;
            color: #1e40af;
            line-height: 1.8;
        }

        .empty {
            background: white;
            border-radius: 22px;
            padding: 70px 20px;
            text-align: center;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        }

        .empty-icon {
            font-size: 60px;
            margin-bottom: 15px;
        }

        .empty h2 {
            margin: 0 0 10px;
            color: #111827;
        }

        .empty p {
            color: #64748b;
            margin: 0;
        }

        @media (max-width: 700px) {
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

            .submissions-box {
                padding: 10px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    {{-- Header --}}
    <div class="hero">

        <h1>📥 تسليمات الواجبات</h1>

        <p>
            من هنا تقدر تتابع جميع محاولات الطلاب في تسليم الواجبات،
            وتشوف الصور والتصحيح بالذكاء الاصطناعي والمراجعة النهائية.
        </p>

        <div class="top-buttons">

            <a
                href="{{ route('admin.dashboard') }}"
                class="back-btn"
            >
                ← لوحة التحكم
            </a>

            <a
                href="{{ route('admin.assignments.index') }}"
                class="back-btn"
            >
                📚 إدارة الواجبات
            </a>

        </div>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="success-message">
            {{ session('success') }}
        </div>

    @endif


    {{-- Submissions --}}
    @if($submissions->count() > 0)

        <div class="submissions-box">

            <table>

                <thead>

                    <tr>

                        <th>الطالب</th>

                        <th>الواجب</th>

                        <th>المحاولة</th>

                        <th>وقت التسليم</th>

                        <th>الصور</th>

                        <th>تصحيح AI</th>

                        <th>الدرجة النهائية</th>

                        <th>الحالة</th>

                    </tr>

                </thead>


                <tbody>

                    @foreach($submissions as $submission)

                        <tr>

                            {{-- Student --}}
                            <td>

                                <div class="student">

                                    <div class="student-icon">
                                        👨‍🎓
                                    </div>

                                    <div class="student-info">

                                        <strong>
                                            {{ $submission->user->name ?? 'طالب غير معروف' }}
                                        </strong>

                                        <span>
                                            {{ $submission->user->email ?? '' }}
                                        </span>

                                    </div>

                                </div>

                            </td>


                            {{-- Assignment --}}
                            <td>

                                <div class="assignment-name">

                                    {{ $submission->assignment->title ?? 'واجب غير معروف' }}

                                </div>

                            </td>


                            {{-- Attempt --}}
                            <td>

                                <span class="attempt">

                                    #{{ $submission->id }}

                                </span>

                            </td>


                            {{-- Submitted At --}}
                            <td>

                                <div class="date">

                                    @if($submission->submitted_at)

                                        {{ $submission->submitted_at->format('Y-m-d') }}

                                        <br>

                                        {{ $submission->submitted_at->format('h:i A') }}

                                    @else

                                        غير محدد

                                    @endif

                                </div>

                            </td>


                            {{-- Images --}}
                            <td>

                                <a
                                    href="{{ route('admin.assignment-submissions.show', $submission) }}"
                                    class="images-link"
                                >

                                    🖼️

                                    {{ $submission->images->count() }}

                                    صور

                                </a>

                            </td>


                            {{-- AI Score --}}
                            <td>

                                @if($submission->ai_score !== null)

                                    <span class="score ai">

                                        🤖

                                        {{ $submission->ai_score }}

                                        /

                                        {{ $submission->assignment->total_marks ?? 0 }}

                                    </span>

                                @else

                                    <span class="score not-graded">

                                        ⏳ لم يصحح بعد

                                    </span>

                                @endif

                            </td>


                            {{-- Final Score --}}
                            <td>

                                @if($submission->final_score !== null)

                                    <span class="score final">

                                        🎯

                                        {{ $submission->final_score }}

                                        /

                                        {{ $submission->assignment->total_marks ?? 0 }}

                                    </span>

                                @else

                                    <span class="score not-graded">

                                        لم تعتمد

                                    </span>

                                @endif

                            </td>


                            {{-- Status --}}
                            <td>

                                @if($submission->status === 'reviewed')

                                    <span class="status status-reviewed">

                                        ✅ تمت المراجعة

                                    </span>

                                @elseif($submission->ai_score !== null)

                                    <span class="status status-ai">

                                        🤖 تم تصحيح AI

                                    </span>

                                @else

                                    <span class="status status-submitted">

                                        📤 تم التسليم

                                    </span>

                                @endif

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>


        <div class="info-box">

            💡 <strong>ملاحظة:</strong>

            كل صف يمثل محاولة مستقلة للطالب.

            اضغط على عدد الصور لفتح تفاصيل المحاولة ومشاهدة صور حل الطالب
            ونتيجة تصحيح الذكاء الاصطناعي.

        </div>


    @else

        {{-- Empty --}}
        <div class="empty">

            <div class="empty-icon">
                📭
            </div>

            <h2>
                لا توجد تسليمات حتى الآن
            </h2>

            <p>
                عندما يقوم أحد الطلاب بتسليم واجب، سيظهر هنا.
            </p>

        </div>

    @endif

</div>

</body>

</html>