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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('address_name')->nullable();
            $table->string('new_address')->nullable();
            $table->string('phone')->nullable();
            $table->string('note')->nullable();
            $table->integer('payment_method')->nullable();

            $table->integer('order_id')->nullable();
            $table->string('session_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('email')->nullable();
            $table->string('order_status_id')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->decimal('total_amount', 9, 2)->unsigned();
            $table->dateTime('expiration_date')->nullable();
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
