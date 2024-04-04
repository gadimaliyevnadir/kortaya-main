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
        Schema::create('color_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('color_id')->nullable()->index()->references('id')->on('colors')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name', 255)->nullable();
            $table->string('slug', 255)->unique()->nullable();
            $table->string('locale', 2)->index();
            $table->unique(['color_id', 'locale']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('color_translations');
    }
};
