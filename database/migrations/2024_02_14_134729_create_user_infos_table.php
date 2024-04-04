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
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('english_first_name')->nullable();
            $table->string('english_last_name')->nullable();
//            $table->string('address_country')->nullable();
//            $table->string('address_line_1')->nullable();
//            $table->string('address_line_2')->nullable();
//            $table->string('address_city')->nullable();
//            $table->string('address_state')->nullable();
//            $table->string('address_postal_code')->nullable();
//            $table->string('telephone')->nullable();
            $table->string('id_two')->nullable();
//            $table->string('mobile_telephone')->nullable();
            $table->string('date_of_birth_day')->nullable(); // date formatinda irelde
            $table->string('nickname')->nullable();
            $table->string('register_gender')->nullable();
            $table->string('date_of_anniversary_day')->nullable(); // date formatinda irelde
            $table->string('get_our_site')->nullable();
            $table->string('referrer')->nullable();

            $table->enum('user_agreement',['1','0'])->default('0');
            $table->enum('privacy_policy',['1','0'])->default('0');
            $table->enum('register_sms',['1','0'])->default('0');
            $table->enum('register_email',['1','0'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_infos');
    }
};
