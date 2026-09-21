<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>تسليمات الامتحانات</title>

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
            max-width: 1200px;
            margin: 40px auto;
        }

        .header {
            background: linear-gradient(135deg, #111827, #2563eb);
            color: white;
            padding: 35px;
            border-radius: 24px;
            margin-bottom: 25px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        }

        .header h1 {
            margin: 0 0 10px;
            font-size: 30px;
        }

        .header p {
            margin: 0;
            opacity: 0.85;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
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

        .card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        th {
            background: #f8fafc;
            color: #475569;
            font-size: 14px;
            padding: 16px;
            text-align: right;
            border-bottom: 2px solid #e5e7eb;
        }

        td {
            padding: 17px 16px;
            border-bottom: 1px solid #eef2f7;
            vertical-align: middle;
        }

        tr:hover td {
            background: #fafcff;
        }

        .student {
            font-weight: bold;
            color: #111827;
        }

        .email {
            display: block;
            margin-top: 5px;
            color: #94a3b8;
            font-size: 12px;
            direction: ltr;
            text-align: right;
        }

        .exam {
            font-weight: bold;
            color: #334155;
        }

        .score {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 9px;
            background: #dcfce7;
            color: #166534;
            font-weight: bold;
        }

        .date {
            color: #64748b;
            font-size: 13px;
        }

        .empty {
            text-align: center;
            padding: 60px 20px;
            color: #64748b;
        }

        .empty-icon {
            font-size: 50px;
            margin-bottom: 15px;
        }

        .count {
            margin-bottom: 20px;
            color: #64748b;
            font-size: 14px;
        }

        @media (max-width: 700px) {

            .container {
                width: 94%;
                margin: 20px auto;
            }

            .header {
                padding: 25px 20px;
            }

            .header h1 {
                font-size: 24px;
            }

            .card {
                padding: 15px;
            }

        }

    </style>

</head>

<body>

<div class="container">

    <div class="header">

        <h1>
            📥 تسليمات الامتحانات
        </h1>

        <p>
            جميع محاولات وتسليمات الطلاب للامتحانات
        </p>

        <a
            href="{{ route('admin.dashboard') }}"
            class="back-btn"
        >
            ← العودة إلى لوحة التحكم
        </a>

    </div>


    <div class="card">

        <div class="count">

            إجمالي التسليمات:
            <strong>
                {{ $attempts->count() }}
            </strong>

        </div>


        @if($attempts->count() > 0)

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>
                                الطالب
                            </th>

                            <th>
                                الامتحان
                            </th>

                            <th>
                                الدرجة
                            </th>

                            <th>
                                وقت التسليم
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($attempts as $attempt)

                            <tr>

                                <td>

                                    <div class="student">
                                        {{ $attempt->user->name }}
                                    </div>

                                    <span class="email">
                                        {{ $attempt->user->email }}
                                    </span>

                                </td>


                                <td>

                                    <div class="exam">
                                        {{ $attempt->exam->title }}
                                    </div>

                                </td>


                                <td>

                                    <span class="score">

                                        {{ $attempt->score }}

                                        /

                                        {{ $attempt->total_marks }}

                                    </span>

                                </td>


                                <td>

                                    <div class="date">

                                        {{ $attempt->submitted_at
                                            ? $attempt->submitted_at->format('Y-m-d h:i A')
                                            : 'غير محدد'
                                        }}

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="empty">

                <div class="empty-icon">
                    📭
                </div>

                <h2>
                    لا توجد تسليمات حتى الآن
                </h2>

                <p>
                    عندما يقوم أحد الطلاب بتسليم امتحان، سيظهر هنا.
                </p>

            </div>

        @endif

    </div>

</div>

</body>

</html>