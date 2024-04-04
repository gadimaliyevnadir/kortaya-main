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
        Schema::create('campaign_belong_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_belong_id')->references('id')->on('campaign_belongs')->cascadeOnDelete();

            $table->string('name', 255)->nullable();

            $table->string('locale', 2)->index();
            $table->unique(['campaign_belong_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_belong_translations');
    }
};
