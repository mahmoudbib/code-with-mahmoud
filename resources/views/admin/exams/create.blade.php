<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>إضافة امتحان</title>

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
            width: min(800px, 92%);
            margin: 40px auto;
        }

        .header {
            background: linear-gradient(135deg, #111827, #1f2937);
            color: white;
            padding: 28px;
            border-radius: 20px;
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0 0 8px;
            font-size: 28px;
        }

        .header p {
            margin: 0;
            color: #d1d5db;
        }

        .card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
        }

        .form-group {
            margin-bottom: 22px;
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
            padding: 13px 15px;
            border: 1px solid #d1d5db;
            border-radius: 12px;
            font-size: 15px;
            font-family: inherit;
            outline: none;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #22c55e;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.12);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .file-box {
            background: #f9fafb;
            border: 2px dashed #d1d5db;
            border-radius: 14px;
            padding: 20px;
        }

        .file-box input {
            background: white;
        }

        .file-help {
            display: block;
            margin-top: 8px;
            color: #6b7280;
            font-size: 13px;
            line-height: 1.7;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 25px;
        }

        .checkbox-group input {
            width: auto;
        }

        .checkbox-group label {
            margin: 0;
            cursor: pointer;
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .btn {
            display: inline-block;
            border: none;
            cursor: pointer;
            padding: 13px 22px;
            border-radius: 12px;
            font-size: 15px;
            font-weight: bold;
            text-decoration: none;
            font-family: inherit;
        }

        .btn-primary {
            background: #22c55e;
            color: white;
        }

        .btn-primary:hover {
            background: #16a34a;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #111827;
        }

        .error-box {
            background: #fee2e2;
            color: #991b1b;
            padding: 15px 18px;
            border-radius: 12px;
            margin-bottom: 22px;
        }

        .error-box ul {
            margin: 8px 0 0;
            padding-right: 20px;
        }

        .required {
            color: #dc2626;
        }

        @media (max-width: 650px) {
            .row {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 20px;
            }

            .actions {
                flex-direction: column;
            }

            .actions .btn {
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>📝 إضافة امتحان جديد</h1>
        <p>أضف امتحانًا جديدًا لطلاب مادة البرمجة</p>
    </div>

    <div class="card">

        @if($errors->any())
            <div class="error-box">

                <strong>⚠️ يوجد بعض الأخطاء:</strong>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif

        <form
            action="{{ route('admin.exams.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            {{-- الكورس --}}
            <div class="form-group">

                <label for="course_id">
                    الكورس <span class="required">*</span>
                </label>

                <select name="course_id" id="course_id" required>

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


            {{-- اسم الامتحان --}}
            <div class="form-group">

                <label for="title">
                    اسم الامتحان <span class="required">*</span>
                </label>

                <input
                    type="text"
                    name="title"
                    id="title"
                    value="{{ old('title') }}"
                    placeholder="مثال: اختبار الوحدة الأولى"
                    required
                >

            </div>


            {{-- وصف الامتحان --}}
            <div class="form-group">

                <label for="description">
                    وصف الامتحان
                </label>

                <textarea
                    name="description"
                    id="description"
                    placeholder="اكتب وصفًا مختصرًا للامتحان..."
                >{{ old('description') }}</textarea>

            </div>


            {{-- صورة الامتحان --}}
            <div class="form-group">

                <label for="image">
                    🖼️ صورة الامتحان
                </label>

                <div class="file-box">

                    <input
                        type="file"
                        name="image"
                        id="image"
                        accept="image/jpeg,image/png,image/webp"
                    >

                    <small class="file-help">
                        يمكنك رفع صورة الامتحان بصيغة JPG أو PNG أو WEBP،
                        وبحد أقصى 5 ميجابايت.
                    </small>

                </div>

            </div>


            {{-- المدة والدرجات --}}
            <div class="row">

                <div class="form-group">

                    <label for="duration">
                        مدة الامتحان بالدقائق
                    </label>

                    <input
                        type="number"
                        name="duration"
                        id="duration"
                        value="{{ old('duration') }}"
                        min="1"
                        placeholder="مثال: 30"
                    >

                </div>


                <div class="form-group">

                    <label for="total_marks">
                        إجمالي الدرجات <span class="required">*</span>
                    </label>

                    <input
                        type="number"
                        name="total_marks"
                        id="total_marks"
                        value="{{ old('total_marks', 10) }}"
                        min="1"
                        required
                    >

                </div>

            </div>


            {{-- نشر الامتحان --}}
            <div class="checkbox-group">

                <input
                    type="checkbox"
                    name="is_published"
                    id="is_published"
                    value="1"
                    {{ old('is_published') ? 'checked' : '' }}
                >

                <label for="is_published">
                    نشر الامتحان للطلاب مباشرة
                </label>

            </div>


            {{-- الأزرار --}}
            <div class="actions">

                <button type="submit" class="btn btn-primary">
                    💾 حفظ الامتحان
                </button>

                <a
                    href="{{ route('admin.exams.index') }}"
                    class="btn btn-secondary"
                >
                    ↩️ رجوع
                </a>

            </div>

        </form>

    </div>

</div>

</body>

</html>