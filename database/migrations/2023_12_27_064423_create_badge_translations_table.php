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
        Schema::create('badge_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('badge_id')->nullable()->index()->references('id')->on('badges')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name', 255)->nullable();
            $table->string('slug', 255)->unique()->nullable();
            $table->string('locale', 2)->index();
            $table->unique(['badge_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badge_translations');
    }
};
