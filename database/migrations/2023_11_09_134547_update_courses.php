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
            $table->string('video_type', 255)->nullable();
            $table->text('video_iframe')->nullable();
            $table->text('video_file')->nullable();
        });
    }

    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('video_iframe');
            $table->dropColumn('video_file');
            $table->dropColumn('video_type');
        });
    }
};
