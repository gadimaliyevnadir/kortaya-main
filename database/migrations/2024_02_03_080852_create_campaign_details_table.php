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
        Schema::create('campaign_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->references('id')
                ->on('campaigns')->cascadeOnDelete();

            $table->foreignId('campaign_type_id')->references('id')
                ->on('campaign_types')->cascadeOnDelete();

            $table->foreignId('campaign_belong_id')->references('id')
                ->on('campaign_belongs')->cascadeOnDelete();

            $table->timestamp('started_at')->nullable();
            $table->tinyInteger('belong_type')->nullable();
            $table->timestamp('ended_at')->nullable();
            $table->double('campaign_discount_price', 15, 2)->nullable();
            $table->double('campaign_discount_percent', 15, 2)->nullable();
            $table->enum('status',['1','0'])->default('1');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_details');
    }
};
