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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('ticket_id')->constrained()->cascadeOnDelete();
            $table->string('unique_code')->unique();
            $table->enum('status', ['pending', 'waiting', 'success', 'canceled'])->default('pending');
            $table->unsignedInteger('total_price');
            $table->string('payment_url')->nullable();
            $table->enum('payment_method', ['bank_transfer', 'e_wallet'])->nullable();
            $table->string('payment_va_bank')->nullable();
            $table->string('payment_va_number')->nullable();
            $table->timestamp('expired_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
