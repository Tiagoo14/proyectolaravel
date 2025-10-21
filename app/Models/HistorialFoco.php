<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialFoco extends Model
{
    use HasFactory;

    protected $table = 'historial_focos';

    protected $fillable = [
        'foco_id',
        'accion',
        'fecha',
        'responsable',
    ];

    // Relación con el modelo Foco
    public function foco()
    {
        return $this->belongsTo(Foco::class);
    }
}
