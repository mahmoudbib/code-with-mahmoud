<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'exam_id',
        'question',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_answer',
        'mark',
        'sort_order',
    ];

    protected $casts = [
        'mark' => 'integer',
        'sort_order' => 'integer',
    ];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    /*
    |--------------------------------------------------------------------------
    | إجابات الطلاب
    |--------------------------------------------------------------------------
    */

    public function examAnswers()
    {
        return $this->hasMany(ExamAnswer::class);
    }
}