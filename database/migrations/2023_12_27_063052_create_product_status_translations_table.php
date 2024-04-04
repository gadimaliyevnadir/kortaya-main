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
        Schema::create('product_status_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_status_id')->nullable()->index()->references('id')->on('product_statuses')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name', 255)->nullable();
            $table->string('slug', 255)->unique()->nullable();
            $table->string('locale', 2)->index();
            $table->unique(['product_status_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_status_translations');
    }
};
