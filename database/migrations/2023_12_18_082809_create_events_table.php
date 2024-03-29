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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('location');
            $table->string('city');
            $table->date('stage_date');
            $table->date('presale_date');
            $table->text('description');
            $table->string('banner');
            $table->boolean('is_draft')->default(true);
            $table->string('duration');
            $table->string('audience')->nullable();
            $table->string('attention')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
