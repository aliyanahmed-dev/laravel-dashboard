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
        Schema::create('attended_quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->unsignedBigInteger('quiz_id')->nullable(); // Use unsignedBigInteger for the foreign key.
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable(); // Use unsignedBigInteger for the foreign key.
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->time('start_time')->nullable();
            $table->string('total_marks', 255)->nullable();
            $table->string('taken_marks', 255)->nullable();
            $table->string('result', 255)->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attended_quizzes');
    }
};
