<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable()->index()->references('id')->on('products')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('order_id')->nullable()->index()->references('id')->on('orders')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('combination_id')->nullable()->index()->references('id')->on('combinations')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('qty')->default(1);
            $table->decimal('discount_price', 9, 2)->unsigned();
            $table->decimal('total_price', 9, 2)->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
