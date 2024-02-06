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
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->string('batch_id', 255)->nullable();
            $table->string('name', 255)->nullable();
            $table->string('limit', 255)->nullable();
            $table->unsignedBigInteger('course_id')->nullable(); // Use unsignedBigInteger for the foreign key.
            $table->foreign('course_id')->references('id')->on('courses');
            $table->integer('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batches');
    }
};
