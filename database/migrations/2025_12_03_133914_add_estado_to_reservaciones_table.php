<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reservaciones', function (Blueprint $table) {
            // Valores esperados: 'pendiente', 'finalizada', 'cancelada'
            $table->string('estado')->default('pendiente')->after('comentarios');
        });
    }

    public function down(): void
    {
        Schema::table('reservaciones', function (Blueprint $table) {
            $table->dropColumn('estado');
        });
    }
};
