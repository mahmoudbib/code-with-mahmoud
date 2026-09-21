<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();

            // الطالب
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // المحاضرة
            $table->foreignId('lesson_id')
                ->constrained()
                ->cascadeOnDelete();

            // حالة الحضور
            $table->enum('status', [
                'present',
                'absent'
            ])->default('absent');

            // وقت تسجيل الحضور
            $table->timestamp('attended_at')->nullable();

            $table->timestamps();

            // منع تسجيل نفس الطالب لنفس المحاضرة أكثر من مرة
            $table->unique(['user_id', 'lesson_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};