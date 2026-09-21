<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assignment_submission_images', function (Blueprint $table) {
            $table->id();

            $table->foreignId('assignment_submission_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('image_path');

            $table->integer('sort_order')
                ->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assignment_submission_images');
    }
};