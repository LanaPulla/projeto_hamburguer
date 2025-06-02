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
        Schema::create('burger_optional', function (Blueprint $table) {
            $table->id();
            $table->boolean('salami');
            $table->boolean('cheddar');
            $table->boolean('red_onion');
            $table->boolean('bacon');
            $table->boolean('tomato');
            $table->boolean('cucumber');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('burger_optional');
    }
};
