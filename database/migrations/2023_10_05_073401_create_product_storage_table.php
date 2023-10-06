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
        Schema::create('product_storage', function (Blueprint $table) {
            $table->unsignedBigInteger('storage_id');
            $table->unsignedBigInteger('product_id');

            $table->foreign('storage_id')->references('id')->on('storages')->onDelete('Cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_storage');
    }
};
