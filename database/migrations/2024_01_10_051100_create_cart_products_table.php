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
        Schema::create('cart_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->nullable()->index()->references('id')->on('carts')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('product_id')->nullable()->index()->references('id')->on('products')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('combination_id')->nullable()->index()->references('id')->on('combinations')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('qty')->nullable();
            $table->double('price', 15, 2)->nullable()->index();
            $table->double('discount_price', 15, 2)->nullable()->index();
            $table->double('total_price', 15, 2)->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_products');
    }
};
