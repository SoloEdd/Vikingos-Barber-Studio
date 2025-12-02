<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    use HasFactory;

    protected $table = 'reservaciones';

    protected $fillable = ['usuario_id', 'servicio', 'fecha', 'hora', 'barbero', 'comentarios'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}

