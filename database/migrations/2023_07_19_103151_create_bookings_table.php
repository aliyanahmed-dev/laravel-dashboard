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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->Text('phone_number');
            $table->string('email');
            $table->string('full_name');
            // $table->string('last_name');
            // $table->string('password');
            $table->string('area');
            $table->string('block');
            $table->string('street');
            $table->string('avenue')->nullable();
            $table->string('house');
            $table->string('floor')->nullable();
            $table->string('additional_detail')->nullable();
            $table->string('payment_method');
            $table->date('place_date');
            $table->timestamp("time");
            $table->string('status');
            $table->double('total_amount');
            $table->boolean('terms_and_conditions')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
