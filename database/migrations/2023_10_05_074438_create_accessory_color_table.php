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
        Schema::create('accessory_color', function (Blueprint $table) {
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('accessory_id');
            $table->integer('qty');
            $table->float('normal_price');
            $table->float('discount_price')->nullable();

            $table->foreign('color_id')->references('id')->on('colors')->onDelete('Cascade');
            $table->foreign('accessory_id')->references('id')->on('accessories')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accessory_color');
    }
};
