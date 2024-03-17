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
        Schema::create('user', function (Blueprint $table) {
            $table->string('username')->primary();
            $table->string('email');
            $table->string('facebook_id')->nullable();
            $table->string('google_id')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('password');
            $table->boolean('createStore')->nullable();
            $table->string('email_verification_token')->nullable();
            $table->boolean('email_verified')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
