<?php

use Illuminate\Support\Facades\Route;

use App\Models\Course;
use App\Models\Lesson;

use App\Http\Controllers\CourseController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\StudentSubscriptionController;
use App\Http\Controllers\AdminSubscriptionController;
use App\Http\Controllers\AdminLessonController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\AdminExamController;
use App\Http\Controllers\AdminQuestionController;
use App\Http\Controllers\AdminExamAttemptController;
use App\Http\Controllers\AdminAssignmentController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AdminAssignmentSubmissionController;


/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Home after login
|--------------------------------------------------------------------------
*/

Route::get('/home', function () {
    return view('welcome');
})->middleware('auth');


/*
|--------------------------------------------------------------------------
| Dashboard - Student
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    $user = auth()->user();

    // إجمالي المحاضرات المنشورة
    $totalLessons = Lesson::where('is_published', true)->count();

    // عدد المحاضرات التي حضرها الطالب
    $presentCount = $user->attendances()
        ->where('status', 'present')
        ->count();

    // عدد المحاضرات التي غاب عنها الطالب
    $absentCount = $user->attendances()
        ->where('status', 'absent')
        ->count();

    // نسبة الحضور
    $attendancePercentage = $totalLessons > 0
        ? round(($presentCount / $totalLessons) * 100)
        : 0;

    return view('dashboard', compact(
        'user',
        'totalLessons',
        'presentCount',
        'absentCount',
        'attendancePercentage'
    ));

})->middleware('auth')->name('dashboard');


/*
|--------------------------------------------------------------------------
| Dashboard - Admin
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard', function () {

    $user = auth()->user();

    return view('admin.dashboard', compact('user'));

})->middleware(['auth', 'admin'])->name('admin.dashboard');


/*
|--------------------------------------------------------------------------
| Courses
|--------------------------------------------------------------------------
*/

Route::get('/courses', [CourseController::class, 'index'])
    ->name('courses.index');


/*
|--------------------------------------------------------------------------
| Subscriptions
|--------------------------------------------------------------------------
*/

Route::get('/courses/{course}/subscribe', [SubscriptionController::class, 'create'])
    ->middleware('auth')
    ->name('subscriptions.create');

Route::post('/courses/{course}/subscribe', [SubscriptionController::class, 'store'])
    ->middleware('auth')
    ->name('subscriptions.store');


/*
|--------------------------------------------------------------------------
| Student Subscription Status
|--------------------------------------------------------------------------
*/

Route::get('/subscription-status', [StudentSubscriptionController::class, 'index'])
    ->middleware('auth')
    ->name('subscriptions.status');


/*
|--------------------------------------------------------------------------
| Course Content
|--------------------------------------------------------------------------
*/

Route::get('/course-content', function () {

    $course = Course::where('slug', 'programming-second-secondary')
        ->firstOrFail();

    $lessons = Lesson::where('course_id', $course->id)
        ->where('is_published', true)
        ->orderBy('sort_order')
        ->get();

    return view('course-content', compact('lessons'));

})->middleware(['auth', 'subscription'])
  ->name('course.content');


/*
|--------------------------------------------------------------------------
| Student Lessons
|--------------------------------------------------------------------------
*/

Route::get('/lessons/{lesson}', [LessonController::class, 'show'])
    ->middleware(['auth', 'subscription'])
    ->name('lessons.show');


/*
|--------------------------------------------------------------------------
| Exams - Student
|--------------------------------------------------------------------------
*/

Route::get('/exams', [ExamController::class, 'index'])
    ->middleware(['auth', 'subscription'])
    ->name('exams.index');

Route::get('/exams/{exam}/start', [ExamController::class, 'start'])
    ->middleware(['auth', 'subscription'])
    ->name('exams.start');

Route::post('/exams/{exam}/submit', [ExamController::class, 'submit'])
    ->middleware(['auth', 'subscription'])
    ->name('exams.submit');

Route::get('/exams/result/{attempt}', [ExamController::class, 'result'])
    ->middleware(['auth', 'subscription'])
    ->name('exams.result');


/*
|--------------------------------------------------------------------------
| Assignments - Student
|--------------------------------------------------------------------------
*/

Route::get('/assignments', [AssignmentController::class, 'index'])
    ->middleware(['auth', 'subscription'])
    ->name('assignments.index');


/*
|--------------------------------------------------------------------------
| Assignment Result - Student
|--------------------------------------------------------------------------
|
| مهم:
| لازم يكون Route النتيجة قبل /assignments/{assignment}
| عشان Laravel ما يعتبرش كلمة result اسم Assignment.
|
*/

Route::get('/assignments/{assignment}/result', [AssignmentController::class, 'result'])
    ->middleware(['auth', 'subscription'])
    ->name('assignments.result');


Route::get('/assignments/{assignment}', [AssignmentController::class, 'show'])
    ->middleware(['auth', 'subscription'])
    ->name('assignments.show');


Route::post('/assignments/{assignment}/submit', [AssignmentController::class, 'submit'])
    ->middleware(['auth', 'subscription'])
    ->name('assignments.submit');


/*
|--------------------------------------------------------------------------
| Admin - Subscriptions
|--------------------------------------------------------------------------
*/

Route::get('/admin/subscriptions', [AdminSubscriptionController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.subscriptions.index');

Route::post('/admin/subscriptions/{subscription}/approve', [AdminSubscriptionController::class, 'approve'])
    ->middleware(['auth', 'admin'])
    ->name('admin.subscriptions.approve');

Route::post('/admin/subscriptions/{subscription}/reject', [AdminSubscriptionController::class, 'reject'])
    ->middleware(['auth', 'admin'])
    ->name('admin.subscriptions.reject');


/*
|--------------------------------------------------------------------------
| Admin - Lessons
|--------------------------------------------------------------------------
*/

Route::get('/admin/lessons', [AdminLessonController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.lessons.index');

Route::get('/admin/lessons/create', [AdminLessonController::class, 'create'])
    ->middleware(['auth', 'admin'])
    ->name('admin.lessons.create');

Route::post('/admin/lessons', [AdminLessonController::class, 'store'])
    ->middleware(['auth', 'admin'])
    ->name('admin.lessons.store');


/*
|--------------------------------------------------------------------------
| Admin - Edit Lessons
|--------------------------------------------------------------------------
*/

Route::get('/admin/lessons/{lesson}/edit', [AdminLessonController::class, 'edit'])
    ->middleware(['auth', 'admin'])
    ->name('admin.lessons.edit');

Route::put('/admin/lessons/{lesson}', [AdminLessonController::class, 'update'])
    ->middleware(['auth', 'admin'])
    ->name('admin.lessons.update');


/*
|--------------------------------------------------------------------------
| Admin - Exams
|--------------------------------------------------------------------------
*/

Route::get('/admin/exams', [AdminExamController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.exams.index');

Route::get('/admin/exams/create', [AdminExamController::class, 'create'])
    ->middleware(['auth', 'admin'])
    ->name('admin.exams.create');

Route::post('/admin/exams', [AdminExamController::class, 'store'])
    ->middleware(['auth', 'admin'])
    ->name('admin.exams.store');


/*
|--------------------------------------------------------------------------
| Admin - Questions
|--------------------------------------------------------------------------
*/

Route::get('/admin/exams/{exam}/questions', [AdminQuestionController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.questions.index');

Route::get('/admin/exams/{exam}/questions/create', [AdminQuestionController::class, 'create'])
    ->middleware(['auth', 'admin'])
    ->name('admin.questions.create');

Route::post('/admin/exams/{exam}/questions', [AdminQuestionController::class, 'store'])
    ->middleware(['auth', 'admin'])
    ->name('admin.questions.store');


/*
|--------------------------------------------------------------------------
| Admin - Exam Attempts
|--------------------------------------------------------------------------
*/

Route::get('/admin/exam-attempts', [AdminExamAttemptController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.exam-attempts.index');


/*
|--------------------------------------------------------------------------
| Admin - Assignments
|--------------------------------------------------------------------------
*/

Route::get('/admin/assignments', [AdminAssignmentController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.assignments.index');

Route::get('/admin/assignments/create', [AdminAssignmentController::class, 'create'])
    ->middleware(['auth', 'admin'])
    ->name('admin.assignments.create');

Route::post('/admin/assignments', [AdminAssignmentController::class, 'store'])
    ->middleware(['auth', 'admin'])
    ->name('admin.assignments.store');


/*
|--------------------------------------------------------------------------
| Admin - Assignment Submissions
|--------------------------------------------------------------------------
*/

Route::get('/admin/assignment-submissions', [AdminAssignmentSubmissionController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.assignment-submissions.index');

Route::get('/admin/assignment-submissions/{submission}', [AdminAssignmentSubmissionController::class, 'show'])
    ->middleware(['auth', 'admin'])
    ->name('admin.assignment-submissions.show');

Route::post('/admin/assignment-submissions/{submission}/grade-ai', [AdminAssignmentSubmissionController::class, 'gradeWithAI'])
    ->middleware(['auth', 'admin'])
    ->name('admin.assignment-submissions.grade-ai');

Route::post('/admin/assignment-submissions/{submission}/review', [AdminAssignmentSubmissionController::class, 'review'])
    ->middleware(['auth', 'admin'])
    ->name('admin.assignment-submissions.review');