<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('burger_bread', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        DB::table('burger_bread')->insert(['id' => 0, 'name' => 'Italiano Branco']);
        DB::table('burger_bread')->insert(['id' => 1, 'name' => '3 Queijos']);
        DB::table('burger_bread')->insert(['id' => 2, 'name' => 'Parmesão com Orégano']);
        DB::table('burger_bread')->insert(['id' => 3, 'name' => 'Integral']);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('burger_bread');
    }
};
