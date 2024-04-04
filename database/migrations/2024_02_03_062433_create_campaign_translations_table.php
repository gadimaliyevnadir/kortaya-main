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
        Schema::create('campaign_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->references('id')->on('campaigns')->cascadeOnDelete();

            $table->string('name', 255)->nullable();
            $table->string('slug', 255)->unique()->nullable();
            $table->string('title', 255)->nullable();
            $table->string('keywords', 255)->nullable();
            $table->string('description', 255)->nullable();

            $table->longText('text')->nullable();
            $table->longText('note')->nullable();

            $table->string('locale', 2)->index();
            $table->unique(['campaign_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_translations');
    }
};
