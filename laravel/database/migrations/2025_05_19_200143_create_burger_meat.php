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
        Schema::create('burger_meat', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('burger_meat')->insert(['id' => 0, 'name' => 'maminha']);
        DB::table('burger_meat')->insert(['id' => 1, 'name' => 'alcatra']);
        DB::table('burger_meat')->insert(['id' => 2, 'name' => 'picanha']);
        DB::table('burger_meat')->insert(['id' => 3, 'name' => 'veggie_burger']);    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('burger_meat');
    }
};
