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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->unsignedBigInteger('batch_id')->nullable(); // Use unsignedBigInteger for the foreign key.
            $table->foreign('batch_id')->references('id')->on('batches');
            $table->string('difficulty', 255)->nullable();
            $table->string('startdate', 255)->nullable();
            $table->string('enddate', 255)->nullable();
            $table->integer('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
