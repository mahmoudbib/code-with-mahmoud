<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'user_id',
        'lesson_id',
        'status',
        'attended_at',
    ];

    protected $casts = [
        'attended_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | الطالب
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    |--------------------------------------------------------------------------
    | المحاضرة
    |--------------------------------------------------------------------------
    */

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}