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
        Schema::table('users', function (Blueprint $table) {
            $table->string('full_name')->nullable();
            $table->string('image')->nullable();
            $table->bigInteger('cnic_number')->nullable();
            $table->string('cnic_front')->nullable();
            $table->string('cnic_back')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_number')->nullable();
            $table->string('gender')->nullable();
            $table->string('religion')->nullable();
            $table->unsignedBigInteger('role_id')->default(3)->nullable();
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('full_name');
            $table->dropColumn('image');
            $table->dropColumn('cnic_number');
            $table->dropColumn('cnic_front');
            $table->dropColumn('cnic_back');
            $table->dropColumn('guardian_name');
            $table->dropColumn('guardian_number');
            $table->dropColumn('gender');
            $table->dropColumn('religion');
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
        });
    }
};
