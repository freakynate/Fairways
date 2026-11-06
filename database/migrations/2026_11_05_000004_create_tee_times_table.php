<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tee_times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->foreignId('member_id')->nullable()->constrained()->nullOnDelete();
            $table->string('guest_name')->nullable();
            $table->dateTime('starts_at');
            $table->unsignedTinyInteger('players')->default(1);
            $table->string('status')->default('booked');
            $table->decimal('green_fee', 8, 2)->default(0);
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index(['course_id', 'starts_at']);
            $table->index('starts_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tee_times');
    }
};
