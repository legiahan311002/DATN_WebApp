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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->unsignedBigInteger('id_shipping_address');
            $table->string('payment_methods');
            $table->timestamps();

            $table->foreign('username')
            ->references('username')->on('buyer_profile')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_shipping_address')
            ->references('id')->on('shipping_address')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
