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
        Schema::create('feedback_image', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_feedback');
            $table->string('url_image');
            $table->timestamps();

            $table->foreign('id_feedback')
            ->references('id')->on('feedback')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_image');
    }
};
