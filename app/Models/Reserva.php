<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_reserva',
        'hora_inicio',
        'hora_fin',
        'aula_id',
        'docente_id',
        'materia_id',
        'estado',
        'observaciones',
    ];

    // Relaciones
    public function aula() {
        return $this->belongsTo(Aula::class);
    }

    public function docente() {
        return $this->belongsTo(Docente::class);
    }

    public function materia() {
        return $this->belongsTo(Materia::class);
    }
}
