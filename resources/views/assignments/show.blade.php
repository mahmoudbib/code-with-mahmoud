<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>{{ $assignment->title }}</title>

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
            max-width: 900px;
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
            margin: 0 0 12px;
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

        .card {
            background: white;
            padding: 30px;
            border-radius: 22px;
            margin-bottom: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        }

        .card-title {
            font-size: 21px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #111827;
        }

        .description {
            color: #64748b;
            line-height: 2;
            white-space: pre-line;
        }

        .meta {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .badge {
            background: #eff6ff;
            color: #1d4ed8;
            padding: 9px 13px;
            border-radius: 9px;
            font-size: 13px;
        }

        .upload-box {
            border: 2px dashed #cbd5e1;
            border-radius: 18px;
            padding: 25px;
            background: #f8fafc;
        }

        .upload-icon {
            font-size: 45px;
            text-align: center;
            margin-bottom: 10px;
        }

        .upload-title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .upload-help {
            text-align: center;
            color: #64748b;
            font-size: 13px;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .file-input {
            width: 100%;
            padding: 15px;
            background: white;
            border: 1px solid #d1d5db;
            border-radius: 11px;
            cursor: pointer;
        }

        /* ================================
           الدرس والوحدة
        ================================= */

        .lesson-field {
            margin-bottom: 20px;
        }

        .lesson-label {
            display: block;
            font-weight: bold;
            margin-bottom: 9px;
            color: #111827;
        }

        .lesson-hint {
            color: #64748b;
            font-size: 13px;
            line-height: 1.7;
            margin-bottom: 10px;
        }

        .lesson-input {
            width: 100%;
            padding: 14px 15px;

            border: 1px solid #cbd5e1;
            border-radius: 11px;

            background: white;

            font-family: Tahoma, Arial, sans-serif;
            font-size: 15px;

            outline: none;

            transition: 0.2s;
        }

        .lesson-input:focus {
            border-color: #2563eb;

            box-shadow:
                0 0 0 3px rgba(37, 99, 235, 0.10);
        }

        .submit-btn {
            width: 100%;
            border: none;
            background: #2563eb;
            color: white;
            padding: 15px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
            transition: 0.2s;
        }

        .submit-btn:hover {
            background: #1d4ed8;
        }

        .warning {
            background: #fff7ed;
            border: 1px solid #fed7aa;
            color: #9a3412;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
            line-height: 1.8;
        }

        .error-box {
            background: #fee2e2;
            color: #991b1b;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .error-box ul {
            margin: 8px 0 0;
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
                font-size: 24px;
            }

            .card {
                padding: 20px;
            }

        }

    </style>

</head>

<body>

<div class="container">


    {{-- رأس الصفحة --}}

    <div class="hero">

        <h1>
            📚 {{ $assignment->title }}
        </h1>

        <p>
            اطلع على تعليمات الواجب وحل الأسئلة الموجودة في الكتاب،
            ثم ارفع صور الحل.
        </p>

        <a
            href="{{ route('assignments.index') }}"
            class="back-btn"
        >
            ← العودة إلى الواجبات
        </a>

    </div>


    {{-- الأخطاء --}}

    @if($errors->any())

        <div class="error-box">

            <strong>
                يوجد بعض الأخطاء:
            </strong>

            <ul>

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- معلومات الواجب --}}

    <div class="card">

        <div class="card-title">
            📝 المطلوب في الواجب
        </div>

        @if($assignment->description)

            <div class="description">
                {{ $assignment->description }}
            </div>

        @else

            <div class="description">
                حل الواجب الموجود في الكتاب ثم ارفع صور الحل.
            </div>

        @endif


        <div class="meta">

            <div class="badge">
                🎯 الدرجة الكلية:
                {{ $assignment->total_marks }}
            </div>


            @if($assignment->lesson)

                <div class="badge">
                    📖 المحاضرة:
                    {{ $assignment->lesson->title }}
                </div>

            @endif

        </div>

    </div>


    {{-- رفع الحل --}}

    <div class="card">

        <div class="card-title">
            📸 رفع صور الحل
        </div>

        <div class="warning">
            ⚠️ صوّر الحل بوضوح وتأكد أن الكتابة ظاهرة بالكامل.
            يمكنك رفع أكثر من صورة إذا كان الحل في أكثر من صفحة.
        </div>


        <form
            action="{{ route('assignments.submit', $assignment) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            {{-- الدرس والوحدة --}}

            <div class="lesson-field">

                <label
                    for="lesson_number"
                    class="lesson-label"
                >
                    📖 الدرس والوحدة
                </label>

                <div class="lesson-hint">

                    اكتب اسم الدرس والوحدة التي ينتمي إليها الحل،
                    مثال: الدرس الأول - الوحدة الأولى

                </div>

                <input
                    type="text"
                    id="lesson_number"
                    name="lesson_number"
                    class="lesson-input"
                    placeholder="مثال: الدرس الأول - الوحدة الأولى"
                    value="{{ old('lesson_number') }}"
                    maxlength="255"
                    required
                >

            </div>


            <div class="upload-box">

                <div class="upload-icon">
                    📷
                </div>

                <div class="upload-title">
                    اختر صور حل الواجب
                </div>

                <div class="upload-help">

                    يمكنك رفع من صورة واحدة حتى 10 صور.

                    <br>

                    الصيغ المسموحة:
                    JPG - PNG - WEBP

                    <br>

                    الحد الأقصى للصورة الواحدة:
                    5MB

                </div>


                <input
                    type="file"
                    name="images[]"
                    class="file-input"
                    accept="image/jpeg,image/png,image/webp"
                    multiple
                    required
                >

            </div>


            <button
                type="submit"
                class="submit-btn"
                onclick="return confirm('هل أنت متأكد أنك تريد تسليم الواجب؟');"
            >
                📤 تسليم الواجب
            </button>

        </form>

    </div>

</div>

</body>

</html>