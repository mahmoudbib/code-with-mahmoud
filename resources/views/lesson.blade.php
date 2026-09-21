<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $lesson->title }}</title>

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

        .back {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 18px;
            background: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

        .back:hover {
            background: #5c636a;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }

        h1 {
            margin-top: 0;
            font-size: 32px;
        }

        .description {
            line-height: 2;
            font-size: 18px;
            color: #555;
            margin-top: 15px;
        }

        .video {
            margin-top: 30px;
        }

        .video h2,
        .pdf h2 {
            margin-bottom: 15px;
        }

        .video iframe {
            width: 100%;
            height: 500px;
            border: none;
            border-radius: 12px;
        }

        .pdf {
            margin-top: 30px;
        }

        .pdf a {
            display: inline-block;
            padding: 12px 20px;
            background: #198754;
            color: white;
            text-decoration: none;
            border-radius: 8px;
        }

        .pdf a:hover {
            background: #157347;
        }

        .empty {
            padding: 20px;
            background: #f5f7fb;
            border-radius: 10px;
            color: #777;
            margin-top: 15px;
        }

        @media (max-width: 700px) {

            .container {
                width: 94%;
            }

            .card {
                padding: 20px;
            }

            h1 {
                font-size: 25px;
            }

            .video iframe {
                height: 250px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <a href="{{ route('course.content') }}" class="back">
        ↩️ الرجوع لمحتوى الكورس
    </a>

    <div class="card">

        <h1>
            📖 {{ $lesson->title }}
        </h1>


        @if($lesson->description)

            <div class="description">
                {{ $lesson->description }}
            </div>

        @endif


        {{-- الفيديو --}}

        @if($lesson->video_url)

            <div class="video">

                <h2>🎥 فيديو المحاضرة</h2>

                <iframe
                    src="{{ $lesson->video_url }}"
                    allowfullscreen>
                </iframe>

            </div>

        @else

            <div class="empty">
                🎥 لا يوجد فيديو لهذه المحاضرة حتى الآن.
            </div>

        @endif


        {{-- ملف PDF --}}

        @if($lesson->pdf_file)

            <div class="pdf">

                <h2>📄 ملف المحاضرة</h2>

                <a
                    href="{{ asset('storage/' . $lesson->pdf_file) }}"
                    target="_blank">
                    📥 فتح ملف PDF
                </a>

            </div>

        @endif

    </div>

</div>

</body>

</html>