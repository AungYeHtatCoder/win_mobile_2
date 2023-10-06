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
        Schema::create('product_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('storage_id');
            $table->unsignedBigInteger('ram_id');
            $table->unsignedBigInteger('category_id');
            $table->integer('qty');
            $table->float('normal_price');
            $table->float('discount_price')->nullable();

            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('Cascade');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('Cascade');
            $table->foreign('storage_id')->references('id')->on('storages')->onDelete('Cascade');
            $table->foreign('ram_id')->references('id')->on('rams')->onDelete('Cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_prices');
    }
};
