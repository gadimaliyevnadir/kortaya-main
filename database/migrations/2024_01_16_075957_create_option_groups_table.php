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
        Schema::create('option_groups', function (Blueprint $table) {
            $table->id();
            $table->integer('order')->nullable();
            $table->string('code')->nullable();
            $table->enum('status',['1','0'])->default('1');
            $table->enum('is_filtered',['1','0'])->default('1');
            $table->foreignId('category_id')->nullable()->index()->references('id')->on('categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('option_groups');
    }
};
