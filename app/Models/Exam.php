<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ExamAttempt;

class Exam extends Model
{
    protected $fillable = [
        'course_id',
        'title',
        'description',
        'image',
        'duration',
        'total_marks',
        'is_published',
    ];

    protected $casts = [
        'duration' => 'integer',
        'total_marks' => 'integer',
        'is_published' => 'boolean',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class)
            ->orderBy('sort_order');
    }

    /*
    |--------------------------------------------------------------------------
    | محاولات الامتحان
    |--------------------------------------------------------------------------
    */

    public function attempts()
    {
        return $this->hasMany(ExamAttempt::class);
    }
}