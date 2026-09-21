<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>إضافة واجب جديد</title>

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

        .form-card {
            background: white;
            border-radius: 22px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #374151;
        }

        .required {
            color: #dc2626;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #dbe3ec;
            border-radius: 11px;
            font-family: inherit;
            font-size: 14px;
            outline: none;
            transition: 0.2s;
            background: #fff;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.08);
        }

        textarea {
            min-height: 140px;
            resize: vertical;
            line-height: 1.8;
        }

        .hint {
            margin-top: 7px;
            color: #64748b;
            font-size: 12px;
            line-height: 1.7;
        }

        .error-box {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .error-box ul {
            margin: 0;
            padding-right: 20px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #f8fafc;
            padding: 15px;
            border-radius: 12px;
        }

        .checkbox-group input {
            width: auto;
            transform: scale(1.2);
        }

        .checkbox-group label {
            margin: 0;
            cursor: pointer;
        }

        .submit-btn {
            width: 100%;
            border: none;
            padding: 15px;
            background: #2563eb;
            color: white;
            border-radius: 12px;
            font-family: inherit;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .submit-btn:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        .ai-info {
            margin-top: 20px;
            padding: 18px;
            background: #eff6ff;
            border: 1px solid #dbeafe;
            border-radius: 15px;
            color: #1e40af;
            line-height: 1.9;
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

            .form-card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    {{-- Header --}}
    <div class="hero">

        <h1>📚 إضافة واجب جديد</h1>

        <p>
            أنشئ الواجب وحدد تعليماته والدرجة الخاصة به.
            الطالب سيقوم بحل الواجب الموجود في الكتاب ثم يرفع صور السؤال والإجابة.
        </p>

        <a
            href="{{ route('admin.assignments.index') }}"
            class="back-btn"
        >
            ← العودة إلى الواجبات
        </a>

    </div>


    {{-- Validation Errors --}}
    @if($errors->any())

        <div class="error-box">

            <ul>

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- Form --}}
    <div class="form-card">

        <form
            action="{{ route('admin.assignments.store') }}"
            method="POST"
        >

            @csrf


            {{-- Course --}}
            <div class="form-group">

                <label for="course_id">
                    الكورس
                    <span class="required">*</span>
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


            {{-- Lesson --}}
            <div class="form-group">

                <label for="lesson_id">
                    المحاضرة المرتبطة
                </label>

                <select
                    name="lesson_id"
                    id="lesson_id"
                >

                    <option value="">
                        بدون محاضرة محددة
                    </option>

                    @foreach($lessons as $lesson)

                        <option
                            value="{{ $lesson->id }}"
                            {{ old('lesson_id') == $lesson->id ? 'selected' : '' }}
                        >
                            {{ $lesson->title }}
                        </option>

                    @endforeach

                </select>

                <div class="hint">
                    اختياري: يمكنك ربط الواجب بمحاضرة معينة.
                </div>

            </div>


            {{-- Title --}}
            <div class="form-group">

                <label for="title">
                    عنوان الواجب
                    <span class="required">*</span>
                </label>

                <input
                    type="text"
                    name="title"
                    id="title"
                    value="{{ old('title') }}"
                    placeholder="مثال: واجب الدرس الأول"
                    required
                >

            </div>


            {{-- Description --}}
            <div class="form-group">

                <label for="description">
                    تعليمات الواجب
                </label>

                <textarea
                    name="description"
                    id="description"
                    placeholder="اكتب تعليمات للطالب مثل: حل الواجب الموجود في الكتاب ثم صوّر السؤال مع إجابتك وارفع الصور."
                >{{ old('description') }}</textarea>

                <div class="hint">
                    الطالب سيحل الأسئلة الموجودة في الكتاب، ثم يرفع صورًا تحتوي على السؤال والإجابة.
                </div>

            </div>


            {{-- Total Marks --}}
            <div class="form-group">

                <label for="total_marks">
                    إجمالي الدرجات
                    <span class="required">*</span>
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


            {{-- Publish --}}
            <div class="form-group">

                <div class="checkbox-group">

                    <input
                        type="checkbox"
                        name="is_published"
                        id="is_published"
                        value="1"
                        {{ old('is_published') ? 'checked' : '' }}
                    >

                    <label for="is_published">
                        نشر الواجب للطلاب مباشرة
                    </label>

                </div>

            </div>


            {{-- AI Info --}}
            <div class="ai-info">

                🤖 <strong>طريقة التصحيح:</strong>

                <br>

                الطالب سيرفع صورًا تحتوي على السؤال وإجابته.

                <br>

                الذكاء الاصطناعي سيقرأ السؤال والإجابة من الصور،
                ثم يقترح الدرجة والملاحظات.

                <br>

                أنت كمدرس ستراجع التصحيح وتستطيع تعديل الدرجة قبل اعتمادها.

            </div>


            <br>


            {{-- Submit --}}
            <button
                type="submit"
                class="submit-btn"
            >
                ✅ إضافة الواجب
            </button>

        </form>

    </div>

</div>

</body>

</html>