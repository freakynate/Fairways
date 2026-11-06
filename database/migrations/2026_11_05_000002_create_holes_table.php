<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('holes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('number');
            $table->unsignedTinyInteger('par')->default(4);
            $table->unsignedSmallInteger('yards')->default(350);
            $table->unsignedTinyInteger('handicap')->nullable();
            $table->timestamps();

            $table->unique(['course_id', 'number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('holes');
    }
};
