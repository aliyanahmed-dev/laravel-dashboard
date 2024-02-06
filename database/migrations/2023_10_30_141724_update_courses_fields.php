<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->text('students')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->text('price');
            $table->text('duration')->nullable();;
            $table->text('level')->nullable();;
            $table->text('requirements')->nullable();;
            $table->text('materials')->nullable();;
        });
    }

    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('students');
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
            $table->dropColumn('price');
            $table->dropColumn('duration');
            $table->dropColumn('level');
            $table->dropColumn('requirements');
            $table->dropColumn('materials');
        });
    }
};
