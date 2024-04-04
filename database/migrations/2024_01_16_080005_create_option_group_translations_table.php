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
        Schema::create('option_group_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('option_group_id')->nullable()->index()->references('id')->on('option_groups')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name')->nullable();
            $table->string('slug', 255)->unique()->nullable();
            $table->string('locale', 2)->index();
            $table->unique(['option_group_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('option_group_translations');
    }
};
