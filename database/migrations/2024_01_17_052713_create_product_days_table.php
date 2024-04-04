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
        Schema::create('product_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable()->index()->references('id')
                ->on('products')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamp('expired_at')->nullable();
            $table->enum('status',['1','0'])->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_days');
    }
};
