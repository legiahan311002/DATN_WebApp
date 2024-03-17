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
        Schema::create('buyer_profile', function (Blueprint $table) {
            $table->string('username')->primary();
            $table->string('account_name');
            $table->string('gender')->default('Khác');
            $table->string('birth_day')->nullable();
            $table->string('avt')->nullable();;
            $table->timestamps();
            
            $table->foreign('username')
            ->references('username')->on('user')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buyer_profile');
    }
};
