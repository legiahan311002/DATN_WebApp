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
        Schema::create('shop_profile', function (Blueprint $table) {
            $table->id();
            $table->string('name_shop');
            $table->string('username');
            $table->string('address')->nullable();;
            $table->string('description')->nullable();
            $table->string('cover_image')->nullable();;
            $table->string('avt')->nullable();
            $table->boolean('approved')->nullable();
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
        Schema::dropIfExists('shop_profile');
    }
};
