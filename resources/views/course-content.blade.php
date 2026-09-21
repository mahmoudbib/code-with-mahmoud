<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>محتوى الكورس</title>

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
            margin: 50px auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }

        .success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        h1 {
            margin-top: 0;
            margin-bottom: 10px;
        }

        .lesson {
            display: block;
            padding: 20px;
            margin-top: 12px;
            background: #f5f7fb;
            border-radius: 10px;
            text-decoration: none;
            color: #222;
            transition: 0.2s;
            border: 1px solid transparent;
        }

        .lesson:hover {
            background: #e9edf5;
            border-color: #198754;
            transform: translateY(-2px);
        }

        .lesson-number {
            color: #198754;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .lesson-title {
            font-size: 19px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .lesson-description {
            color: #666;
            line-height: 1.7;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #777;
            background: #f5f7fb;
            border-radius: 10px;
            margin-top: 20px;
        }

        @media (max-width: 700px) {
            .container {
                width: 94%;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <div class="success">
            🟢 اشتراكك فعال، يمكنك الوصول إلى محتوى الكورس.
        </div>

        <h1>
            📚 مادة البرمجة - الصف الثاني الثانوي
        </h1>

        <p>
            أهلاً بك في محتوى الكورس.
        </p>


        @if($lessons->count())

            @foreach($lessons as $lesson)

                <a
                    href="{{ route('lessons.show', $lesson) }}"
                    class="lesson"
                >

                    <div class="lesson-number">
                        📖 المحاضرة {{ $lesson->sort_order }}
                    </div>

                    <div class="lesson-title">
                        {{ $lesson->title }}
                    </div>

                    @if($lesson->description)

                        <div class="lesson-description">
                            {{ $lesson->description }}
                        </div>

                    @endif

                </a>

            @endforeach

        @else

            <div class="empty">
                لا توجد محاضرات متاحة حاليًا.
            </div>

        @endif

    </div>

</div>

</body>

</html>