<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignmentSubmission extends Model
{
    protected $fillable = [
        'assignment_id',
        'lesson_number',
        'user_id',
        'score',
        'ai_score',
        'ai_feedback',
        'final_score',
        'teacher_feedback',
        'status',
        'submitted_at',
        'reviewed_at',
    ];

    protected $casts = [
        'score' => 'integer',
        'ai_score' => 'integer',
        'final_score' => 'integer',
        'submitted_at' => 'datetime',
        'reviewed_at' => 'datetime',
    ];

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(AssignmentSubmissionImage::class)
            ->orderBy('sort_order');
    }
}