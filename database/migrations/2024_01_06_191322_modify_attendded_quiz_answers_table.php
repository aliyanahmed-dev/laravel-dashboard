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
        Schema::table('attended_quiz_answers', function (Blueprint $table) {
            $table->string('answer_type')->nullable();
            $table->text('answer')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attended_quiz_answers', function (Blueprint $table) {
            $table->dropColumn('answer_type');
            $table->dropColumn('answer');
        });
    }
};
