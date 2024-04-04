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
        Schema::create('product_day_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_day_id')->nullable()->index()
                ->references('id')->on('product_days')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('title', 255)->nullable();
            $table->string('locale', 2)->index();
            $table->unique(['product_day_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_day_translations');
    }
};
