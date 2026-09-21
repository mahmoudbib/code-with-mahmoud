<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamAttempt extends Model
{
    protected $fillable = [
        'user_id',
        'exam_id',
        'score',
        'total_marks',
        'started_at',
        'submitted_at',
    ];

    protected $casts = [
        'score' => 'integer',
        'total_marks' => 'integer',
        'started_at' => 'datetime',
        'submitted_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    /*
    |--------------------------------------------------------------------------
    | إجابات المحاولة
    |--------------------------------------------------------------------------
    */

    public function answers()
    {
        return $this->hasMany(ExamAnswer::class);
    }
}