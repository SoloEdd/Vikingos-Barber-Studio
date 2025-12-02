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
    Schema::create('reservaciones', function (Blueprint $table) {
        $table->id();
        // Clave foránea que enlaza a la tabla 'usuarios'
        $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade'); 
        $table->string('servicio');
        $table->date('fecha');
        $table->time('hora');
        $table->string('barbero')->nullable();
        $table->text('comentarios')->nullable();
            
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservaciones');
    }
};
