<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>إدارة المحاضرات</title>

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
            width: 94%;
            max-width: 1200px;
            margin: 40px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        h1 {
            margin: 0;
        }

        .btn {
            display: inline-block;
            padding: 11px 18px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-family: inherit;
        }

        .btn-add {
            background: #198754;
            color: white;
        }

        .btn-add:hover {
            background: #157347;
        }

        .btn-edit {
            background: #0d6efd;
            color: white;
        }

        .btn-edit:hover {
            background: #0b5ed7;
        }

        .success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
            text-align: right;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }

        th {
            background: #f8f9fa;
            font-weight: bold;
        }

        tr:hover {
            background: #fafafa;
        }

        .badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .published {
            background: #d1e7dd;
            color: #0f5132;
        }

        .hidden {
            background: #f8d7da;
            color: #842029;
        }

        .yes {
            color: #198754;
            font-weight: bold;
        }

        .no {
            color: #dc3545;
            font-weight: bold;
        }

        .empty {
            text-align: center;
            padding: 40px;
            color: #777;
        }

        @media (max-width: 700px) {

            .header {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-add {
                text-align: center;
            }

            th,
            td {
                white-space: nowrap;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <h1>
            📚 إدارة المحاضرات
        </h1>

        <a
            href="{{ route('admin.lessons.create') }}"
            class="btn btn-add"
        >
            ➕ إضافة محاضرة
        </a>

    </div>


    @if(session('success'))

        <div class="success">
            ✅ {{ session('success') }}
        </div>

    @endif


    <div class="card">

        @if($lessons->count())

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>
                            <th>#</th>
                            <th>المحاضرة</th>
                            <th>الكورس</th>
                            <th>الترتيب</th>
                            <th>الفيديو</th>
                            <th>PDF</th>
                            <th>الحالة</th>
                            <th>إجراء</th>
                        </tr>

                    </thead>

                    <tbody>

                    @foreach($lessons as $lesson)

                        <tr>

                            <td>
                                {{ $lesson->id }}
                            </td>

                            <td>

                                <strong>
                                    {{ $lesson->title }}
                                </strong>

                                @if($lesson->description)

                                    <br>

                                    <small>
                                        {{ $lesson->description }}
                                    </small>

                                @endif

                            </td>

                            <td>
                                {{ $lesson->course->title ?? '-' }}
                            </td>

                            <td>
                                {{ $lesson->sort_order }}
                            </td>

                            <td>

                                @if($lesson->video_url)

                                    <span class="yes">
                                        🎥 موجود
                                    </span>

                                @else

                                    <span class="no">
                                        غير موجود
                                    </span>

                                @endif

                            </td>

                            <td>

                                @if($lesson->pdf_file)

                                    <span class="yes">
                                        📄 موجود
                                    </span>

                                @else

                                    <span class="no">
                                        غير موجود
                                    </span>

                                @endif

                            </td>

                            <td>

                                @if($lesson->is_published)

                                    <span class="badge published">
                                        🟢 منشورة
                                    </span>

                                @else

                                    <span class="badge hidden">
                                        🔴 مخفية
                                    </span>

                                @endif

                            </td>

                            <td>

                                <a
                                    href="{{ route('admin.lessons.edit', $lesson) }}"
                                    class="btn btn-edit"
                                >
                                    ✏️ تعديل
                                </a>

                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="empty">
                لا توجد محاضرات حاليًا.
            </div>

        @endif

    </div>

</div>

</body>

</html>