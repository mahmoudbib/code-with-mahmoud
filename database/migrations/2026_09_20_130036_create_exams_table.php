<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();

            // الكورس التابع له الامتحان
            $table->foreignId('course_id')
                ->constrained()
                ->cascadeOnDelete();

            // بيانات الامتحان
            $table->string('title');
            $table->text('description')->nullable();

            // مدة الامتحان بالدقائق
            $table->integer('duration')->nullable();

            // الدرجة النهائية
            $table->integer('total_marks')->default(0);

            // هل الامتحان منشور للطلاب؟
            $table->boolean('is_published')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};