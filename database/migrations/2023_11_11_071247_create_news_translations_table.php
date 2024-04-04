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
        Schema::create('news_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('news_id')->references('id')->on('news')->cascadeOnDelete();
            $table->text('title')->nullable();
            $table->text('sub_title')->nullable();
            $table->longText('description')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('locale', 2)->index();
            $table->unique(['news_id', 'locale']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_translations');
    }
};
