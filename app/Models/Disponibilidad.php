<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Disponibilidad extends Model
{
    use HasFactory;

    protected $fillable = ['docente_id', 'dia_semana', 'hora_inicio', 'hora_fin'];

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }
}
