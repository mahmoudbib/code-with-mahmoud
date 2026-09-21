<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // حذف الكورسات القديمة
        Course::query()->delete();

        // إضافة كورس مادة البرمجة
        Course::create([
            'title' => 'مادة البرمجة - الصف الثاني الثانوي',
            'slug' => 'programming-second-secondary',
            'description' => 'شرح مادة البرمجة لطلاب الصف الثاني الثانوي بالبكالوريا والأزهر، مع المحاضرات والمراجعات والاختبارات والملفات التعليمية.',
            'image' => null,
            'price' => 200,
            'is_published' => true,
        ]);
    }
}