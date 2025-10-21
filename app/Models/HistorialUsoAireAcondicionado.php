<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialUsoAireAcondicionado extends Model
{
    protected $fillable = ['aire_acondicionado_id', 'accion', 'fecha', 'responsable'];

    public function aireAcondicionado()
    {
        return $this->belongsTo(AireAcondicionado::class);
    }
}

