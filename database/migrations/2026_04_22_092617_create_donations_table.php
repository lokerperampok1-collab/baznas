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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('token')->unique();
            $table->string('sapaan')->nullable();
            $table->string('name');
            $table->string('whatsapp');
            $table->text('comment')->nullable();
            $table->json('qurban_details');
            $table->integer('total_nominal');
            $table->integer('unique_code');
            $table->integer('total_payment');
            $table->string('payment_method');
            $table->string('payment_status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
