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
        Schema::create('quizoptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quizquestion_id')->nullable();
            $table->foreign('quizquestion_id')->references('id')->on('quizquestions');
            $table->string('option', 255)->nullable();
            $table->string('order', 255)->nullable();
            $table->integer('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizoptions');
    }
};
