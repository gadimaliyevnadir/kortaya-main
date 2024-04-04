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
        Schema::create('option_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable()->index()->references('id')->on('products')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('option_id')->nullable()->index()->references('id')->on('options')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('option_products');
    }
};
