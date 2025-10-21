<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    protected $fillable = [
        'ubicacion',
        'capacidad',
        'estado',
    ];

    // Una aula puede tener muchas reservas
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    // Una aula puede tener muchas disponibilidades
    public function disponibilidades()
    {
        return $this->hasMany(Disponibilidad::class);
    }

    // Una aula puede tener muchos horarios
    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }

    // Relación con focos
    public function focos()
    {
        return $this->hasMany(Foco::class);
    }

    // Relación con cortinas
    public function cortinas()
    {
        return $this->hasMany(Cortina::class);
    }

    // Relación con aires acondicionados
    public function aires()
    {
        return $this->hasMany(AireAcondicionado::class);
    }

    // Relación con muebles
    public function muebles()
    {
        return $this->hasMany(Mueble::class);
    }

    // Relación con materia recomendada (si corresponde)
    public function materiasRecomendadas()
    {
        return $this->hasMany(Materia::class, 'aula_recomendada_id');
    }
}
