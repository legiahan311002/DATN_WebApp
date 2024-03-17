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
        Schema::create('voucher_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_order');
            $table->unsignedBigInteger('voucher_code')->nullable();
            $table->timestamps();
            
            $table->foreign('id_order')
            ->references('id')->on('order_detail')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('voucher_code')
            ->references('id')->on('voucher')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voucher_order');
    }
};
