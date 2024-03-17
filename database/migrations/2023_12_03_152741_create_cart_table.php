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
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->unsignedBigInteger('id_product_detail');
            $table->integer('quantity');
            $table->string('size')->nullable();
            $table->timestamps();

            $table->foreign('username')
            ->references('username')->on('buyer_profile')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('id_product_detail')
            ->references('id')->on('product_detail')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
