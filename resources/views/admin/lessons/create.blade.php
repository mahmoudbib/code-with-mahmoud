<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>إضافة محاضرة</title>

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
            width: 92%;
            max-width: 800px;
            margin: 40px auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 15px;
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
            min-height: 120px;
            resize: vertical;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #198754;
        }

        .hint {
            display: block;
            margin-top: 6px;
            color: #777;
            font-size: 13px;
        }

        .checkbox {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .checkbox input {
            width: auto;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            border: none;
            border-radius: 8px;
            padding: 12px 20px;
            font-family: inherit;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-save {
            background: #198754;
            color: white;
        }

        .btn-back {
            background: #6c757d;
            color: white;
        }

        .errors {
            background: #f8d7da;
            color: #842029;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .errors ul {
            margin: 0;
            padding-right: 20px;
        }

        @media (max-width: 600px) {
            .container {
                width: 92%;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>➕ إضافة محاضرة جديدة</h1>

        @if($errors->any())

            <div class="errors">

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif


        <form
            action="{{ route('admin.lessons.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            <div class="form-group">

                <label for="course_id">
                    📚 الكورس
                </label>

                <select
                    name="course_id"
                    id="course_id"
                    required
                >

                    <option value="">
                        اختر الكورس
                    </option>

                    @foreach($courses as $course)

                        <option
                            value="{{ $course->id }}"
                            {{ old('course_id') == $course->id ? 'selected' : '' }}
                        >
                            {{ $course->title }}
                        </option>

                    @endforeach

                </select>

            </div>


            <div class="form-group">

                <label for="title">
                    📖 اسم المحاضرة
                </label>

                <input
                    type="text"
                    name="title"
                    id="title"
                    value="{{ old('title') }}"
                    placeholder="مثال: مقدمة في البرمجة"
                    required
                >

            </div>


            <div class="form-group">

                <label for="description">
                    📝 وصف المحاضرة
                </label>

                <textarea
                    name="description"
                    id="description"
                    placeholder="اكتب وصفًا مختصرًا للمحاضرة..."
                >{{ old('description') }}</textarea>

            </div>


            <div class="form-group">

                <label for="video_url">
                    🎥 رابط الفيديو
                </label>

                <input
                    type="url"
                    name="video_url"
                    id="video_url"
                    value="{{ old('video_url') }}"
                    placeholder="https://..."
                >

                <span class="hint">
                    يمكن أن يكون رابط الفيديو من YouTube أو أي خدمة فيديو أخرى.
                </span>

            </div>


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

                <span class="hint">
                    الحد الأقصى لحجم الملف 10MB.
                </span>

            </div>


            <div class="form-group">

                <label for="sort_order">
                    🔢 ترتيب المحاضرة
                </label>

                <input
                    type="number"
                    name="sort_order"
                    id="sort_order"
                    value="{{ old('sort_order', 1) }}"
                    min="0"
                    required
                >

            </div>


            <div class="form-group">

                <label class="checkbox">

                    <input
                        type="checkbox"
                        name="is_published"
                        value="1"
                        {{ old('is_published') ? 'checked' : '' }}
                    >

                    👁️ نشر المحاضرة للطلاب

                </label>

            </div>


            <div class="actions">

                <button
                    type="submit"
                    class="btn btn-save"
                >
                    💾 حفظ المحاضرة
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