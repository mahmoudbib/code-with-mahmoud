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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();

            // الطالب
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // الكورس
            $table->foreignId('course_id')
                ->constrained()
                ->cascadeOnDelete();

            // قيمة الاشتراك الشهري
            $table->decimal('amount', 10, 2);

            // طريقة الدفع
            $table->string('payment_method')->nullable();

            // حالة الاشتراك
            $table->enum('status', [
                'pending',
                'active',
                'expired',
                'rejected'
            ])->default('pending');

            // بداية ونهاية الشهر المدفوع
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('expires_at')->nullable();

            // إثبات التحويل لو الطالب رفع صورة
            $table->string('payment_proof')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};