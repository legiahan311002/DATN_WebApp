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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name_product');
            $table->unsignedBigInteger('id_shop');
            $table->unsignedBigInteger('id_category_child');
            $table->text('description');
            $table->timestamps();

            $table->foreign('id_category_child')
            ->references('id')->on('category_child')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_shop')
            ->references('id')->on('shop_profile')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
