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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->index()->references('id')->on('categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('brand_id')->nullable()->index()->references('id')->on('brands')->cascadeOnUpdate()->cascadeOnDelete();
            $table->tinyInteger('quantity_type')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('maximum_quantity')->nullable();
            $table->string('name');
            $table->string('slug', 255)->unique()->nullable();
            $table->double('price', 15, 2)->nullable()->index();
            $table->double('discount_price', 15, 2)->nullable()->index();
            $table->double('weight', 15, 2)->nullable();;
            $table->double('length', 15, 2)->nullable();;
            $table->double('height', 15, 2)->nullable();;
            $table->double('width', 15, 2)->nullable();;
            $table->enum('status',['1','0'])->default('1');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
