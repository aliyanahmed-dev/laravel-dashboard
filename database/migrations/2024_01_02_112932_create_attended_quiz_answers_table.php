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
        Schema::create('attended_quiz_answers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->unsignedBigInteger('attended_quiz_id')->nullable(); // Use unsignedBigInteger for the foreign key.
            $table->foreign('attended_quiz_id')->references('id')->on('attended_quizzes')->onDelete('cascade');
            $table->unsignedBigInteger('answer_option_id')->nullable(); // Use unsignedBigInteger for the foreign key.
            $table->foreign('answer_option_id')->references('id')->on('quizoptions')->onDelete('cascade');
            $table->unsignedBigInteger('question_id')->nullable(); // Use unsignedBigInteger for the foreign key.
            $table->foreign('question_id')->references('id')->on('quizquestions')->onDelete('cascade');
            $table->string('marks', 255)->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attended_quiz_answers');
    }
};
