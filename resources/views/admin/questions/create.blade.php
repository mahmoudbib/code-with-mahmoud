<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>إضافة سؤال - {{ $exam->title }}</title>

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
            max-width: 950px;
            margin: 40px auto;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .title-box h1 {
            margin: 0 0 8px;
            font-size: 30px;
            color: #111827;
        }

        .title-box p {
            margin: 0;
            color: #6b7280;
        }

        .buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 15px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }

        .form-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
        }

        .section-title {
            margin: 0 0 20px;
            padding-bottom: 12px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #374151;
        }

        .required {
            color: #ef4444;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-family: inherit;
            font-size: 15px;
            outline: none;
            transition: 0.2s;
            background: white;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        textarea {
            min-height: 130px;
            resize: vertical;
        }

        .options-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .option-box {
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 16px;
        }

        .option-label {
            font-weight: bold;
            margin-bottom: 8px;
        }

        .settings-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .hint {
            display: block;
            margin-top: 6px;
            color: #6b7280;
            font-size: 13px;
        }

        .error-box {
            background: #fee2e2;
            color: #991b1b;
            padding: 15px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .error-box ul {
            margin: 8px 0 0;
            padding-right: 20px;
        }

        .submit-area {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: flex-start;
        }

        .submit-btn {
            background: #16a34a;
            color: white;
            padding: 14px 30px;
            border: none;
            border-radius: 11px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            font-family: inherit;
        }

        .submit-btn:hover {
            background: #15803d;
        }

        @media (max-width: 700px) {
            .container {
                width: 94%;
                margin: 25px auto;
            }

            .title-box h1 {
                font-size: 24px;
            }

            .form-card {
                padding: 20px;
            }

            .options-grid,
            .settings-grid {
                grid-template-columns: 1fr;
            }

            .buttons {
                width: 100%;
            }

            .buttons .btn {
                flex: 1;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="top-bar">

        <div class="title-box">
            <h1>➕ إضافة سؤال</h1>

            <p>
                الامتحان:
                <strong>{{ $exam->title }}</strong>
            </p>
        </div>

        <div class="buttons">

            <a
                href="{{ route('admin.questions.index', $exam) }}"
                class="btn btn-secondary"
            >
                ← العودة للأسئلة
            </a>

            <a
                href="{{ route('admin.exams.index') }}"
                class="btn btn-secondary"
            >
                📚 الامتحانات
            </a>

        </div>

    </div>


    @if($errors->any())

        <div class="error-box">

            <strong>⚠️ فيه أخطاء محتاجة تتصلح:</strong>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif


    <form
        action="{{ route('admin.questions.store', $exam) }}"
        method="POST"
        class="form-card"
    >

        @csrf


        <h2 class="section-title">
            📝 بيانات السؤال
        </h2>


        <div class="form-group">

            <label for="question">
                السؤال <span class="required">*</span>
            </label>

            <textarea
                name="question"
                id="question"
                placeholder="اكتب السؤال هنا..."
                required
            >{{ old('question') }}</textarea>

        </div>


        <h2 class="section-title">
            🔤 الاختيارات
        </h2>


        <div class="options-grid">

            <div class="option-box">

                <div class="option-label">
                    أ) الاختيار الأول
                </div>

                <input
                    type="text"
                    name="option_a"
                    value="{{ old('option_a') }}"
                    placeholder="اكتب الاختيار الأول"
                    required
                >

            </div>


            <div class="option-box">

                <div class="option-label">
                    ب) الاختيار الثاني
                </div>

                <input
                    type="text"
                    name="option_b"
                    value="{{ old('option_b') }}"
                    placeholder="اكتب الاختيار الثاني"
                    required
                >

            </div>


            <div class="option-box">

                <div class="option-label">
                    ج) الاختيار الثالث
                </div>

                <input
                    type="text"
                    name="option_c"
                    value="{{ old('option_c') }}"
                    placeholder="اكتب الاختيار الثالث"
                    required
                >

            </div>


            <div class="option-box">

                <div class="option-label">
                    د) الاختيار الرابع
                </div>

                <input
                    type="text"
                    name="option_d"
                    value="{{ old('option_d') }}"
                    placeholder="اكتب الاختيار الرابع"
                    required
                >

            </div>

        </div>


        <br>


        <h2 class="section-title">
            ⚙️ إعدادات السؤال
        </h2>


        <div class="settings-grid">

            <div class="form-group">

                <label for="correct_answer">
                    الإجابة الصحيحة <span class="required">*</span>
                </label>

                <select
                    name="correct_answer"
                    id="correct_answer"
                    required
                >

                    <option value="">
                        اختر الإجابة الصحيحة
                    </option>

                    <option
                        value="a"
                        {{ old('correct_answer') === 'a' ? 'selected' : '' }}
                    >
                        أ) الاختيار الأول
                    </option>

                    <option
                        value="b"
                        {{ old('correct_answer') === 'b' ? 'selected' : '' }}
                    >
                        ب) الاختيار الثاني
                    </option>

                    <option
                        value="c"
                        {{ old('correct_answer') === 'c' ? 'selected' : '' }}
                    >
                        ج) الاختيار الثالث
                    </option>

                    <option
                        value="d"
                        {{ old('correct_answer') === 'd' ? 'selected' : '' }}
                    >
                        د) الاختيار الرابع
                    </option>

                </select>

                <span class="hint">
                    اختار الإجابة التي سيتم اعتبارها صحيحة عند تصحيح الامتحان.
                </span>

            </div>


            <div class="form-group">

                <label for="mark">
                    درجة السؤال <span class="required">*</span>
                </label>

                <input
                    type="number"
                    name="mark"
                    id="mark"
                    min="1"
                    value="{{ old('mark', 1) }}"
                    required
                >

                <span class="hint">
                    مثال: 1 درجة.
                </span>

            </div>

        </div>


        <div class="form-group">

            <label for="sort_order">
                ترتيب السؤال
            </label>

            <input
                type="number"
                name="sort_order"
                id="sort_order"
                min="0"
                value="{{ old('sort_order', 0) }}"
            >

            <span class="hint">
                الرقم الأصغر يظهر أولًا.
            </span>

        </div>


        <div class="submit-area">

            <button
                type="submit"
                class="submit-btn"
            >
                💾 حفظ السؤال
            </button>

        </div>

    </form>

</div>

</body>
</html>