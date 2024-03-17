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
        Schema::create('category_child', function (Blueprint $table) {
            $table->id();
            $table->string('name_category_child');
            $table->unsignedBigInteger('id_category');
            $table->unsignedBigInteger('id_shop');
            $table->timestamps();

            $table->foreign('id_category')
            ->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_shop')
            ->references('id')->on('shop_profile')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category');
    }
};
