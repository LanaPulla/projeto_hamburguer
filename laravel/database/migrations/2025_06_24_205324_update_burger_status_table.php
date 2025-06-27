<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('burger_status')->where('name', 'requested ')->update(['name' => 'Solicitado']);
        DB::table('burger_status')->where('name', 'production')->update(['name' => 'Em Produção']);
        DB::table('burger_status')->where('name', 'finished')->update(['name' => 'Finalizado']);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('burger_status')->where('name', 'Solicitado')->update(['name' => 'requested']);
        DB::table('burger_status')->where('name', 'Em Produção')->update(['name' => 'production']);
        DB::table('burger_status')->where('name', 'Finalizado')->update(['name' => 'finished']);

    }
};
