<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('student_type_new')->nullable();
        });

        DB::statement('
            UPDATE users
            SET student_type_new = student_type
        ');

        DB::statement('
            UPDATE users
            SET student_type_new = "baccalaureate_second"
            WHERE student_type_new IS NULL
        ');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('student_type');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('student_type_new', 'student_type');
        });
    }

    public function down(): void
    {
        //
    }
};