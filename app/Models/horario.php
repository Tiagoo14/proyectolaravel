<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = [
        'aula_id',
        'dia',
        'hora_inicio',
        'hora_fin',
    ];

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}