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
        Schema::table('burger', function (Blueprint $table) {
            $table->integer('opcional_id');
            $table->foreign('opcional_id')->references('id')->on('burger_optional');       
            $table->integer('bread_id');
            $table->foreign('bread_id')->references('id')->on('burger_bread');       
            $table->integer('meat_id');
            $table->foreign('meat_id')->references('id')->on('burger_meat'); 
            $table->integer('status_id');
            $table->foreign('status_id')->references('id')->on('burger_status');
        });
             
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
