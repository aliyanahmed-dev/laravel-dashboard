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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo', 255)->nullable();
            $table->string('logo_2', 255)->nullable();
            $table->string('logo_3', 255)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('phone_2', 20)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('email_2', 255)->nullable();
            $table->text('address')->nullable();
            $table->text('address_2')->nullable();
            $table->text('timing')->nullable();
            $table->text('timing_2')->nullable();
            $table->text('copyright')->nullable();
            $table->text('footer_about')->nullable();
            $table->string('color', 30)->nullable();
            $table->string('color_2', 30)->nullable();
            $table->string('color_3', 30)->nullable();
            $table->string('facebook', 255)->nullable();
            $table->string('twitter', 255)->nullable();
            $table->string('instagram', 255)->nullable();
            $table->string('linkedin', 255)->nullable();
            $table->string('behance', 255)->nullable();
            $table->string('pinterest', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
