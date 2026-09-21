<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignmentSubmissionImage extends Model
{
    protected $fillable = [
        'assignment_submission_id',
        'image_path',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    public function submission()
    {
        return $this->belongsTo(
            AssignmentSubmission::class,
            'assignment_submission_id'
        );
    }
}