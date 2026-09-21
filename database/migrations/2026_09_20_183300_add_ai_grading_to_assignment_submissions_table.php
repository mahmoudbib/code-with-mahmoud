<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('assignment_submissions', function (Blueprint $table) {

            $table->integer('ai_score')
                ->nullable()
                ->after('score');

            $table->text('ai_feedback')
                ->nullable()
                ->after('ai_score');

            $table->integer('final_score')
                ->nullable()
                ->after('ai_feedback');

        });
    }

    public function down(): void
    {
        Schema::table('assignment_submissions', function (Blueprint $table) {

            $table->dropColumn([
                'ai_score',
                'ai_feedback',
                'final_score',
            ]);

        });
    }
};