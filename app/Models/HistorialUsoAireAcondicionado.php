<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialUsoAireAcondicionado extends Model
{
    // 👇 ¡Añade esta línea!
    use HasFactory; 

    protected $fillable = ['aire_acondicionado_id', 'accion', 'fecha', 'responsable'];

    public function aireAcondicionado()
    {
        // Esto está perfecto. Laravel buscará 'aire_acondicionado_id'
        // gracias al nombre de esta función.
        return $this->belongsTo(AireAcondicionado::class);
    }
}