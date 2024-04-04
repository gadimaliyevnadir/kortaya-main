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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('address_label')->nullable();
            $table->string('name_recipient')->nullable();
            $table->foreignId('user_id')->nullable()->index()->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('address_country')->nullable();
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('address_city')->nullable();
            $table->string('address_state')->nullable();
            $table->string('address_postal_code')->nullable();
            $table->string('telephone_prefix')->nullable();
            $table->string('telephone')->nullable();
            $table->string('mobile_telephone_prefix')->nullable();
            $table->string('mobile_telephone')->nullable();
            $table->enum('set_default',['1','0'])->default('0');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
