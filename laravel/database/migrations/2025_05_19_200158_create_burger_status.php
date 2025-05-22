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
        Schema::create('burger_status', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('burger_status')->insert(['id' => 0, 'name' => 'requested ']);
        DB::table('burger_status')->insert(['id' => 1, 'name' => 'production']);
        DB::table('burger_status')->insert(['id' => 2, 'name' => 'finished']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('burger_status');
    }
};
