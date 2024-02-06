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
        Schema::create('enquiry_option', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('enquiries_id')->unsigned();
            $table->foreign('enquiries_id')->references('id')->on('enquiries')->onDelete('cascade');
            $table->bigInteger('option_id')->unsigned();
            $table->foreign('option_id')->references('id')->on('options')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiry_option');
    }
};
