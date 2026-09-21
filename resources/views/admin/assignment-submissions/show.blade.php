<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>تفاصيل تسليم الواجب</title>

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

        .top-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 22px;
        }

        .back-btn {
            display: inline-block;
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

        .success-message {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .error-message {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .student-card,
        .images-section,
        .ai-section,
        .review-section {
            background: white;
            border-radius: 22px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
        }

        .student-header {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .student-icon {
            width: 65px;
            height: 65px;
            border-radius: 18px;
            background: #eff6ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
        }

        .student-info h2 {
            margin: 0 0 7px;
            color: #111827;
        }

        .student-info p {
            margin: 0;
            color: #64748b;
            font-size: 14px;
        }

        .details {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 15px;
            margin-top: 25px;
        }

        .detail-box {
            background: #f8fafc;
            border-radius: 15px;
            padding: 18px;
            border: 1px solid #eef2f7;
        }

        .detail-box span {
            display: block;
            color: #64748b;
            font-size: 12px;
            margin-bottom: 8px;
        }

        .detail-box strong {
            color: #111827;
            font-size: 16px;
        }

        .status-submitted {
            color: #b45309 !important;
        }

        .status-reviewed {
            color: #15803d !important;
        }

        .section-title {
            margin: 0 0 8px;
            font-size: 23px;
            color: #111827;
        }

        .section-description {
            color: #64748b;
            margin: 0 0 25px;
            line-height: 1.8;
        }

        /* صور الطالب */

        .images-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .image-card {
            background: #f8fafc;
            border-radius: 18px;
            padding: 12px;
            border: 1px solid #e2e8f0;
        }

        .image-number {
            font-weight: bold;
            color: #1e3a8a;
            padding: 8px 5px 12px;
        }

        .solution-image {
            width: 100%;
            height: 500px;
            object-fit: contain;
            background: #e5e7eb;
            border-radius: 12px;
            display: block;
        }

        .empty-images {
            text-align: center;
            padding: 50px 20px;
            color: #64748b;
        }

        .empty-images-icon {
            font-size: 55px;
            margin-bottom: 15px;
        }

        /* AI */

        .ai-section {
            border: 2px solid #ddd6fe;
        }

        .ai-header {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 20px;
        }

        .ai-icon {
            width: 55px;
            height: 55px;
            border-radius: 15px;
            background: #ede9fe;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .ai-header h2 {
            margin: 0;
            color: #5b21b6;
            font-size: 23px;
        }

        .ai-header p {
            margin: 5px 0 0;
            color: #64748b;
            font-size: 13px;
        }

        .ai-summary-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
            margin-bottom: 25px;
        }

        .ai-summary-card {
            background: #faf5ff;
            border: 1px solid #e9d5ff;
            border-radius: 16px;
            padding: 22px;
        }

        .ai-card-title {
            color: #7e22ce;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .ai-score {
            font-size: 34px;
            font-weight: bold;
            color: #6b21a8;
        }

        .ai-feedback-text {
            color: #4c1d95;
            line-height: 1.9;
            font-size: 15px;
        }

        .ai-run-box {
            margin-bottom: 20px;
            padding: 20px;
            background: linear-gradient(135deg, #faf5ff, #f5f3ff);
            border: 1px solid #ddd6fe;
            border-radius: 16px;
        }

        .ai-run-box p {
            margin: 0 0 15px;
            color: #5b21b6;
            line-height: 1.8;
        }

        .ai-run-btn {
            width: 100%;
            border: none;
            padding: 15px;
            background: linear-gradient(135deg, #7c3aed, #5b21b6);
            color: white;
            border-radius: 12px;
            font-family: inherit;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .ai-run-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(91, 33, 182, 0.2);
        }

        .ai-waiting {
            padding: 25px;
            text-align: center;
            background: #fefce8;
            border: 1px solid #fde68a;
            border-radius: 15px;
            color: #854d0e;
            line-height: 1.9;
        }

        /* تفاصيل الأسئلة */

        .questions-results {
            margin-top: 25px;
        }

        .questions-title {
            margin: 0 0 18px;
            color: #111827;
            font-size: 21px;
        }

        .question-result {
            background: #ffffff;
            border-radius: 18px;
            padding: 20px;
            margin-bottom: 18px;
            border: 2px solid #e5e7eb;
        }

        .question-correct {
            border-color: #bbf7d0;
            background: #f0fdf4;
        }

        .question-wrong {
            border-color: #fecaca;
            background: #fffafa;
        }

        .question-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 18px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e5e7eb;
        }

        .question-number {
            font-size: 18px;
            font-weight: bold;
            color: #111827;
        }

        .question-status {
            padding: 7px 12px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: bold;
        }

        .question-status.correct {
            background: #dcfce7;
            color: #166534;
        }

        .question-status.wrong {
            background: #fee2e2;
            color: #991b1b;
        }

        .question-block {
            margin-bottom: 15px;
        }

        .question-label {
            font-size: 13px;
            font-weight: bold;
            color: #64748b;
            margin-bottom: 7px;
        }

        .question-text,
        .student-answer,
        .correct-answer,
        .explanation {
            line-height: 1.9;
            font-size: 15px;
        }

        .question-text {
            color: #111827;
            font-weight: bold;
        }

        .student-answer {
            background: #f8fafc;
            padding: 12px 15px;
            border-radius: 10px;
            color: #334155;
        }

        .question-score {
            display: inline-block;
            background: #ede9fe;
            color: #6b21a8;
            padding: 8px 13px;
            border-radius: 9px;
            font-weight: bold;
            margin-top: 5px;
        }

        .correct-answer-box {
            margin-top: 18px;
            padding: 15px;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 12px;
        }

        .correct-answer {
            color: #166534;
            font-weight: bold;
        }

        .explanation-box {
            margin-top: 12px;
            padding: 15px;
            background: #fff7ed;
            border: 1px solid #fed7aa;
            border-radius: 12px;
        }

        .explanation {
            color: #9a3412;
        }

        /* مراجعة المدرس */

        .review-section {
            border: 2px solid #dbeafe;
        }

        .review-header {
            margin-bottom: 20px;
        }

        .review-header h2 {
            margin: 0 0 8px;
            color: #1e40af;
            font-size: 23px;
        }

        .review-header p {
            margin: 0;
            color: #64748b;
            line-height: 1.8;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #374151;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #dbe3ec;
            border-radius: 11px;
            font-family: inherit;
            font-size: 14px;
            outline: none;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.08);
        }

        .form-group textarea {
            min-height: 130px;
            resize: vertical;
            line-height: 1.8;
        }

        .score-input-wrapper {
            position: relative;
        }

        .score-input-wrapper input {
            padding-left: 90px;
        }

        .score-max {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            font-weight: bold;
        }

        .submit-review-btn {
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

        .submit-review-btn:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        .reviewed-box {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 16px;
            padding: 20px;
        }

        .reviewed-box h3 {
            margin: 0 0 15px;
            color: #166534;
        }

        .final-score {
            font-size: 32px;
            font-weight: bold;
            color: #15803d;
            margin-bottom: 12px;
        }

        .teacher-feedback {
            color: #166534;
            line-height: 1.9;
        }

        @media (max-width: 1100px) {

            .details {
                grid-template-columns: repeat(3, 1fr);
            }

        }

        @media (max-width: 900px) {

            .details {
                grid-template-columns: repeat(2, 1fr);
            }

            .images-grid {
                grid-template-columns: 1fr;
            }

            .ai-summary-grid {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 600px) {

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

            .student-header {
                align-items: flex-start;
            }

            .details {
                grid-template-columns: 1fr;
            }

            .solution-image {
                height: 400px;
            }

            .question-header {
                flex-direction: column;
                align-items: flex-start;
            }

        }

    </style>

</head>

<body>

<div class="container">


    {{-- Header --}}

    <div class="hero">

        <h1>
            📄 تفاصيل تسليم الواجب
        </h1>

        <p>
            هنا يمكنك مراجعة بيانات الطالب وصور السؤال والإجابة،
            ثم مراجعة نتيجة التصحيح بالذكاء الاصطناعي واعتماد الدرجة النهائية.
        </p>

        <div class="top-buttons">

            <a
                href="{{ route('admin.assignment-submissions.index') }}"
                class="back-btn"
            >
                ← كل التسليمات
            </a>

            <a
                href="{{ route('admin.dashboard') }}"
                class="back-btn"
            >
                🏠 لوحة التحكم
            </a>

        </div>

    </div>


    {{-- الرسائل --}}

    @if(session('success'))

        <div class="success-message">
            {{ session('success') }}
        </div>

    @endif


    @if(session('error'))

        <div class="error-message">
            {{ session('error') }}
        </div>

    @endif


    @if($errors->any())

        <div class="error-message">

            <strong>
                حدث خطأ:
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


    {{-- بيانات الطالب --}}

    <div class="student-card">

        <div class="student-header">

            <div class="student-icon">
                👨‍🎓
            </div>

            <div class="student-info">

                <h2>
                    {{ $submission->user->name ?? 'طالب غير معروف' }}
                </h2>

                <p>
                    {{ $submission->user->email ?? '' }}
                </p>

            </div>

        </div>


        <div class="details">

            {{-- الواجب --}}

            <div class="detail-box">

                <span>
                    📚 الواجب
                </span>

                <strong>
                    {{ $submission->assignment->title ?? 'غير معروف' }}
                </strong>

            </div>


            {{-- رقم الدرس --}}

            <div class="detail-box">

                <span>
                    📖 رقم الدرس
                </span>

                <strong>
                    {{ $submission->lesson_number ?? 'غير محدد' }}
                </strong>

            </div>


            {{-- رقم المحاولة --}}

            <div class="detail-box">

                <span>
                    🔢 رقم المحاولة
                </span>

                <strong>
                    #{{ $submission->id }}
                </strong>

            </div>


            {{-- وقت التسليم --}}

            <div class="detail-box">

                <span>
                    🕐 وقت التسليم
                </span>

                <strong>

                    @if($submission->submitted_at)

                        {{ $submission->submitted_at->format('Y-m-d') }}

                        <br>

                        {{ $submission->submitted_at->format('h:i A') }}

                    @else

                        غير محدد

                    @endif

                </strong>

            </div>


            {{-- الحالة --}}

            <div class="detail-box">

                <span>
                    📌 الحالة
                </span>

                <strong
                    class="{{ $submission->status === 'reviewed' ? 'status-reviewed' : 'status-submitted' }}"
                >

                    @if($submission->status === 'reviewed')

                        تمت المراجعة

                    @elseif($submission->ai_score !== null)

                        تم تصحيح AI

                    @else

                        في انتظار المراجعة

                    @endif

                </strong>

            </div>

        </div>

    </div>


    {{-- صور السؤال والإجابة --}}

    <div class="images-section">

        <h2 class="section-title">
            📝 صور السؤال والإجابة
        </h2>

        <p class="section-description">
            الطالب قام بتصوير السؤال الموجود في الكتاب مع إجابته ورفع الصور هنا.
            هذه الصور هي المصدر الذي يستخدمه الذكاء الاصطناعي لفهم السؤال والإجابة وتقييم الحل.
        </p>


        @if($submission->images->count() > 0)

            <div class="images-grid">

                @foreach($submission->images as $index => $image)

                    <div class="image-card">

                        <div class="image-number">
                            الصورة رقم {{ $index + 1 }}
                        </div>

                        <img
                            src="{{ asset('storage/' . $image->image_path) }}"
                            alt="صورة السؤال والإجابة {{ $index + 1 }}"
                            class="solution-image"
                        >

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty-images">

                <div class="empty-images-icon">
                    📭
                </div>

                <h3>
                    لا توجد صور
                </h3>

                <p>
                    لم يتم العثور على صور لهذا التسليم.
                </p>

            </div>

        @endif

    </div>


    {{-- نتيجة الذكاء الاصطناعي --}}

    <div class="ai-section">

        <div class="ai-header">

            <div class="ai-icon">
                🤖
            </div>

            <div>

                <h2>
                    تصحيح الذكاء الاصطناعي
                </h2>

                <p>
                    نتيجة مقترحة من الذكاء الاصطناعي بعد تحليل صور السؤال والإجابة.
                </p>

            </div>

        </div>


        {{-- زر تشغيل التصحيح --}}

        <div class="ai-run-box">

            <p>
                اضغط على الزر لبدء تحليل صور الطالب وتصحيح الإجابات.
                سيتم اقتراح درجة وكتابة التصحيح والإجابة الصحيحة للأسئلة الخاطئة.
            </p>

            <form
                action="{{ route('admin.assignment-submissions.grade-ai', $submission) }}"
                method="POST"
                onsubmit="return confirm('هل تريد تشغيل التصحيح بالذكاء الاصطناعي الآن؟');"
            >

                @csrf

                <button
                    type="submit"
                    class="ai-run-btn"
                >
                    🤖 تشغيل التصحيح بالذكاء الاصطناعي
                </button>

            </form>

        </div>


        @if($submission->ai_score !== null)

            @php
                $aiData = json_decode($submission->ai_feedback, true);
            @endphp


            {{-- الدرجة والملخص --}}

            <div class="ai-summary-grid">

                <div class="ai-summary-card">

                    <div class="ai-card-title">
                        🎯 الدرجة المقترحة
                    </div>

                    <div class="ai-score">

                        {{ $submission->ai_score }}

                        /

                        {{ $submission->assignment->total_marks ?? 0 }}

                    </div>

                </div>


                <div class="ai-summary-card">

                    <div class="ai-card-title">
                        💬 ملخص التصحيح
                    </div>

                    <div class="ai-feedback-text">

                        @if(is_array($aiData) && isset($aiData['feedback']))

                            {{ $aiData['feedback'] }}

                        @else

                            لا توجد ملاحظات.

                        @endif

                    </div>

                </div>

            </div>


            {{-- تفاصيل الأسئلة --}}

            @if(
                is_array($aiData)
                && isset($aiData['questions'])
                && is_array($aiData['questions'])
            )

                <div class="questions-results">

                    <h3 class="questions-title">
                        📝 تفاصيل تصحيح الأسئلة
                    </h3>


                    @foreach($aiData['questions'] as $index => $question)

                        @php
                            $isCorrect = $question['is_correct'] ?? false;
                        @endphp


                        <div
                            class="question-result {{ $isCorrect ? 'question-correct' : 'question-wrong' }}"
                        >

                            {{-- رأس السؤال --}}

                            <div class="question-header">

                                <div class="question-number">
                                    السؤال {{ $index + 1 }}
                                </div>


                                @if($isCorrect)

                                    <div class="question-status correct">
                                        ✅ إجابة صحيحة
                                    </div>

                                @else

                                    <div class="question-status wrong">
                                        ❌ إجابة خاطئة
                                    </div>

                                @endif

                            </div>


                            {{-- نص السؤال --}}

                            <div class="question-block">

                                <div class="question-label">
                                    ❓ السؤال
                                </div>

                                <div class="question-text">
                                    {{ $question['question'] ?? 'السؤال غير واضح' }}
                                </div>

                            </div>


                            {{-- إجابة الطالب --}}

                            <div class="question-block">

                                <div class="question-label">
                                    👨‍🎓 إجابة الطالب
                                </div>

                                <div class="student-answer">
                                    {{ $question['student_answer'] ?? 'غير واضحة' }}
                                </div>

                            </div>


                            {{-- الدرجة --}}

                            <div class="question-score">

                                🎯 درجة السؤال:

                                <strong>
                                    {{ $question['score'] ?? 0 }}
                                </strong>

                            </div>


                            {{-- لو الإجابة خاطئة --}}

                            @if(!$isCorrect)

                                <div class="correct-answer-box">

                                    <div class="question-label">
                                        ✅ الإجابة الصحيحة
                                    </div>

                                    <div class="correct-answer">
                                        {{ $question['correct_answer'] ?? 'لم يتم تحديد الإجابة الصحيحة.' }}
                                    </div>

                                </div>


                                <div class="explanation-box">

                                    <div class="question-label">
                                        💡 سبب الخطأ
                                    </div>

                                    <div class="explanation">
                                        {{ $question['explanation'] ?? 'لا يوجد شرح.' }}
                                    </div>

                                </div>

                            @endif

                        </div>

                    @endforeach

                </div>

            @endif


        @else

            <div class="ai-waiting">

                🤖 <strong>التصحيح الذكي لم يتم تشغيله بعد.</strong>

                <br>

                عند تشغيل التصحيح سيتم تحليل الصور واستخراج السؤال والإجابة،
                ثم اقتراح درجة وملاحظات للطالب.

            </div>

        @endif

    </div>


    {{-- مراجعة المدرس --}}

    <div class="review-section">

        <div class="review-header">

            <h2>
                👨‍🏫 مراجعة واعتماد المدرس
            </h2>

            <p>
                راجع نتيجة الذكاء الاصطناعي ثم حدد الدرجة النهائية بنفسك.
                الدرجة التي تكتبها هنا هي الدرجة المعتمدة للطالب.
            </p>

        </div>


        @if($submission->status === 'reviewed')

            <div class="reviewed-box">

                <h3>
                    ✅ تم اعتماد التصحيح
                </h3>

                <div class="final-score">

                    {{ $submission->final_score }}

                    /

                    {{ $submission->assignment->total_marks ?? 0 }}

                </div>


                @if($submission->teacher_feedback)

                    <div class="teacher-feedback">

                        <strong>
                            📝 ملاحظات المدرس:
                        </strong>

                        <br>

                        {{ $submission->teacher_feedback }}

                    </div>

                @else

                    <div class="teacher-feedback">
                        لا توجد ملاحظات من المدرس.
                    </div>

                @endif


                @if($submission->reviewed_at)

                    <br>

                    <small>

                        تم الاعتماد بتاريخ:

                        {{ $submission->reviewed_at->format('Y-m-d h:i A') }}

                    </small>

                @endif

            </div>

        @else

            <form
                action="{{ route('admin.assignment-submissions.review', $submission) }}"
                method="POST"
            >

                @csrf


                <div class="form-group">

                    <label for="final_score">
                        🎯 الدرجة النهائية
                    </label>

                    <div class="score-input-wrapper">

                        <input
                            type="number"
                            name="final_score"
                            id="final_score"
                            min="0"
                            max="{{ $submission->assignment->total_marks ?? 0 }}"
                            value="{{ old('final_score', $submission->ai_score) }}"
                            required
                        >

                        <span class="score-max">
                            / {{ $submission->assignment->total_marks ?? 0 }}
                        </span>

                    </div>

                </div>


                <div class="form-group">

                    <label for="teacher_feedback">
                        📝 ملاحظات المدرس
                    </label>

                    <textarea
                        name="teacher_feedback"
                        id="teacher_feedback"
                        placeholder="اكتب ملاحظاتك على حل الطالب..."
                    >{{ old('teacher_feedback') }}</textarea>

                </div>


                <button
                    type="submit"
                    class="submit-review-btn"
                    onclick="return confirm('هل أنت متأكد أنك تريد اعتماد هذه الدرجة؟');"
                >
                    ✅ اعتماد التصحيح
                </button>

            </form>

        @endif

    </div>


</div>

</body>

</html>