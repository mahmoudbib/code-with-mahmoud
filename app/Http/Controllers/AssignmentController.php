<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\AssignmentSubmission;
use App\Models\AssignmentSubmissionImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = Assignment::where('is_published', true)
            ->with('lesson')
            ->latest()
            ->get();

        return view(
            'assignments.index',
            compact('assignments')
        );
    }

    public function show(Assignment $assignment)
    {
        if (!$assignment->is_published) {
            abort(404);
        }

        $assignment->load('lesson');

        return view(
            'assignments.show',
            compact('assignment')
        );
    }

    public function submit(
        Request $request,
        Assignment $assignment
    ) {
        if (!$assignment->is_published) {
            abort(404);
        }

        $request->validate([
            /*
             * وصف الدرس
             * مثال:
             * الدرس الأول - الوحدة الأولى
             */
            'lesson_number' => [
                'required',
                'string',
                'max:255',
            ],

            /*
             * صور الحل
             */
            'images' => [
                'required',
                'array',
                'min:1',
                'max:10',
            ],

            'images.*' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ]);

        $user = auth()->user();

        /*
         * حفظ التسليم والصور داخل Transaction
         */
        $submission = DB::transaction(function () use (
            $request,
            $assignment,
            $user
        ) {
            /*
             * إنشاء Submission جديد
             */
            $submission = AssignmentSubmission::create([
                'assignment_id' => $assignment->id,

                /*
                 * اسم الدرس والوحدة
                 */
                'lesson_number' => $request->lesson_number,

                'user_id' => $user->id,

                'status' => 'submitted',

                'submitted_at' => now(),
            ]);

            /*
             * حفظ صور الحل
             */
            foreach (
                $request->file('images')
                as $index => $image
            ) {
                $path = $image->store(
                    'assignments/submissions',
                    'public'
                );

                AssignmentSubmissionImage::create([
                    'assignment_submission_id' => $submission->id,
                    'image_path' => $path,
                    'sort_order' => $index,
                ]);
            }

            return $submission;
        });

        /*
         * تحميل البيانات المطلوبة للإيميل
         */
        $submission->load([
            'assignment',
            'user',
        ]);

        /*
         * رابط مباشر لصفحة حل الواجب في الأدمن
         */
        $adminUrl = URL::route(
            'admin.assignment-submissions.show',
            $submission
        );

        /*
         * إرسال إشعار إلى إيميل المدرس
         */
        Mail::html(
            '
            <!DOCTYPE html>
            <html lang="ar" dir="rtl">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
            </head>

            <body style="
                margin:0;
                padding:30px 15px;
                background:#f4f7fb;
                font-family:Tahoma,Arial,sans-serif;
                direction:rtl;
            ">

                <div style="
                    max-width:650px;
                    margin:auto;
                    background:#ffffff;
                    border-radius:18px;
                    overflow:hidden;
                    box-shadow:0 8px 30px rgba(0,0,0,.08);
                ">

                    <div style="
                        background:linear-gradient(135deg,#111827,#2563eb);
                        color:#ffffff;
                        padding:30px;
                        text-align:center;
                    ">

                        <div style="font-size:45px;">
                            📚
                        </div>

                        <h1 style="
                            margin:10px 0 0;
                            font-size:25px;
                        ">
                            طالب سلّم واجبًا جديدًا
                        </h1>

                    </div>


                    <div style="
                        padding:30px;
                        color:#1f2937;
                    ">

                        <p style="
                            font-size:17px;
                            line-height:1.8;
                            margin-top:0;
                        ">
                            تم استلام تسليم واجب جديد من أحد الطلاب.
                        </p>


                        <div style="
                            background:#f8fafc;
                            border:1px solid #e5e7eb;
                            border-radius:14px;
                            padding:20px;
                            margin:20px 0;
                        ">

                            <p style="
                                margin:0 0 12px;
                                font-size:15px;
                            ">
                                <strong>👨‍🎓 الطالب:</strong>
                                ' . e($submission->user->name) . '
                            </p>


                            <p style="
                                margin:0 0 12px;
                                font-size:15px;
                            ">
                                <strong>📝 الواجب:</strong>
                                ' . e($submission->assignment->title) . '
                            </p>


                            <p style="
                                margin:0 0 12px;
                                font-size:15px;
                            ">
                                <strong>📖 الدرس والوحدة:</strong>
                                ' . e($submission->lesson_number) . '
                            </p>


                            <p style="
                                margin:0;
                                font-size:15px;
                            ">
                                <strong>🕐 وقت التسليم:</strong>
                                ' . e($submission->submitted_at->format('Y-m-d h:i A')) . '
                            </p>

                        </div>


                        <div style="
                            text-align:center;
                            margin:30px 0 15px;
                        ">

                            <a
                                href="' . e($adminUrl) . '"
                                style="
                                    display:inline-block;
                                    background:#2563eb;
                                    color:#ffffff;
                                    text-decoration:none;
                                    padding:14px 28px;
                                    border-radius:11px;
                                    font-size:16px;
                                    font-weight:bold;
                                "
                            >
                                👀 مشاهدة حل الواجب
                            </a>

                        </div>


                        <p style="
                            text-align:center;
                            color:#64748b;
                            font-size:13px;
                            line-height:1.8;
                            margin-bottom:0;
                        ">
                            منصتي التعليمية
                        </p>

                    </div>

                </div>

            </body>

            </html>
            ',
            function ($message) {
                $message
                    ->to('mahm1162003@gmail.com')
                    ->subject('📚 طالب سلّم واجبًا جديدًا - منصتي التعليمية');
            }
        );

        return redirect()
            ->route('assignments.index')
            ->with(
                'success',
                'تم تسليم الواجب بنجاح.'
            );
    }

    /**
     * عرض نتيجة الواجب للطالب
     */
    public function result(Assignment $assignment)
    {
        $user = auth()->user();

        /*
         * نجيب آخر محاولة تم اعتمادها من المدرس فقط.
         *
         * الطالب لن يستطيع مشاهدة النتيجة
         * طالما التصحيح لم يتم اعتماده.
         */
        $submission = AssignmentSubmission::where(
                'assignment_id',
                $assignment->id
            )
            ->where(
                'user_id',
                $user->id
            )
            ->where(
                'status',
                'reviewed'
            )
            ->latest('reviewed_at')
            ->first();

        /*
         * لو مفيش نتيجة معتمدة،
         * نرجع الطالب لقائمة الواجبات.
         */
        if (!$submission) {
            return redirect()
                ->route('assignments.index')
                ->with(
                    'error',
                    'لم يتم اعتماد نتيجة هذا الواجب حتى الآن.'
                );
        }

        /*
         * تحميل بيانات الواجب والصور.
         */
        $submission->load([
            'assignment',
            'images',
        ]);

        return view(
            'assignments.result',
            compact(
                'assignment',
                'submission'
            )
        );
    }
}