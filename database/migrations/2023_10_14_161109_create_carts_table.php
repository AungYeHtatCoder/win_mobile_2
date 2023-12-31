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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('accessory_id')->nullable();
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('product_prices_id')->nullable();
            $table->integer('qty')->nullable();
            $table->float('unit_price')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('Cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('Cascade');
            $table->foreign('accessory_id')->references('id')->on('accessories')->onDelete('Cascade');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('Cascade');
            $table->foreign('product_prices_id')->references('id')->on('product_prices')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
