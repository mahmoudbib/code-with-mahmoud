<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>تعديل المحاضرة</title>

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
            max-width: 900px;
            margin: 40px auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: inherit;
            font-size: 15px;
        }

        textarea {
            min-height: 130px;
            resize: vertical;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #198754;
        }

        .checkbox {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .checkbox input {
            width: auto;
        }

        .current-pdf {
            margin-top: 10px;
            padding: 12px;
            background: #f5f7fb;
            border-radius: 8px;
        }

        .current-pdf a {
            color: #198754;
            font-weight: bold;
            text-decoration: none;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            border: none;
            padding: 12px 22px;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-family: inherit;
            font-size: 15px;
        }

        .btn-save {
            background: #198754;
            color: white;
        }

        .btn-save:hover {
            background: #157347;
        }

        .btn-back {
            background: #6c757d;
            color: white;
        }

        .btn-back:hover {
            background: #5c636a;
        }

        .error {
            background: #f8d7da;
            color: #842029;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .hint {
            color: #777;
            font-size: 13px;
            margin-top: 6px;
        }

        @media (max-width: 700px) {
            .container {
                width: 94%;
            }

            .card {
                padding: 20px;
            }

            .buttons {
                flex-direction: column;
            }

            .btn {
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>
            ✏️ تعديل المحاضرة
        </h1>


        {{-- أخطاء التحقق --}}

        @if($errors->any())

            <div class="error">

                <strong>يوجد خطأ:</strong>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif


        <form
            action="{{ route('admin.lessons.update', $lesson) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')


            {{-- الكورس --}}

            <div class="form-group">

                <label for="course_id">
                    الكورس
                </label>

                <select
                    name="course_id"
                    id="course_id"
                    required
                >

                    @foreach($courses as $course)

                        <option
                            value="{{ $course->id }}"
                            {{ $lesson->course_id == $course->id ? 'selected' : '' }}
                        >
                            {{ $course->title }}
                        </option>

                    @endforeach

                </select>

            </div>


            {{-- اسم المحاضرة --}}

            <div class="form-group">

                <label for="title">
                    اسم المحاضرة
                </label>

                <input
                    type="text"
                    name="title"
                    id="title"
                    value="{{ old('title', $lesson->title) }}"
                    required
                >

            </div>


            {{-- الوصف --}}

            <div class="form-group">

                <label for="description">
                    وصف المحاضرة
                </label>

                <textarea
                    name="description"
                    id="description"
                >{{ old('description', $lesson->description) }}</textarea>

            </div>


            {{-- رابط الفيديو --}}

            <div class="form-group">

                <label for="video_url">
                    🎥 رابط الفيديو
                </label>

                <input
                    type="url"
                    name="video_url"
                    id="video_url"
                    value="{{ old('video_url', $lesson->video_url) }}"
                    placeholder="https://www.youtube.com/..."
                >

                <div class="hint">
                    اكتب رابط الفيديو هنا.
                </div>

            </div>


            {{-- PDF --}}

            <div class="form-group">

                <label for="pdf_file">
                    📄 ملف PDF
                </label>

                <input
                    type="file"
                    name="pdf_file"
                    id="pdf_file"
                    accept=".pdf"
                >

                <div class="hint">
                    لو رفعت ملف جديد، سيتم استخدامه بدل الملف القديم.
                </div>


                @if($lesson->pdf_file)

                    <div class="current-pdf">

                        📄 الملف الحالي:

                        <a
                            href="{{ asset('storage/' . $lesson->pdf_file) }}"
                            target="_blank"
                        >
                            فتح ملف PDF
                        </a>

                    </div>

                @endif

            </div>


            {{-- ترتيب المحاضرة --}}

            <div class="form-group">

                <label for="sort_order">
                    ترتيب المحاضرة
                </label>

                <input
                    type="number"
                    name="sort_order"
                    id="sort_order"
                    value="{{ old('sort_order', $lesson->sort_order) }}"
                    min="0"
                    required
                >

            </div>


            {{-- نشر المحاضرة --}}

            <div class="form-group">

                <label class="checkbox">

                    <input
                        type="checkbox"
                        name="is_published"
                        value="1"
                        {{ $lesson->is_published ? 'checked' : '' }}
                    >

                    🟢 نشر المحاضرة للطلاب

                </label>

            </div>


            {{-- الأزرار --}}

            <div class="buttons">

                <button
                    type="submit"
                    class="btn btn-save"
                >
                    💾 حفظ التعديلات
                </button>

                <a
                    href="{{ route('admin.lessons.index') }}"
                    class="btn btn-back"
                >
                    ↩️ رجوع
                </a>

            </div>

        </form>

    </div>

</div>

</body>

</html>