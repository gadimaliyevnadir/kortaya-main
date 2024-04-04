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
        Schema::create('combinations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable()->index()->references('id')->on('products')->cascadeOnUpdate()->cascadeOnDelete();
//            $table->foreignId('color_id')->nullable()->index()->references('id')->on('colors')->cascadeOnUpdate()->cascadeOnDelete();
//            $table->foreignId('type_id')->nullable()->index()->references('id')->on('types')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('size_id')->nullable()->index()->references('id')->on('sizes')->cascadeOnUpdate()->cascadeOnDelete();
            $table->double('price', 15, 2)->index()->default(0);
            $table->double('discount_price', 15, 2)->index()->default(0);
            $table->integer('stock')->unsigned()->default(0);
            $table->string('discount_rate')->nullable();
            $table->string('sku',60)->nullable();
            $table->string('code',60)->nullable();
            $table->boolean('status')->nullable()->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('color_products');
    }
};
