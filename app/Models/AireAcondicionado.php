<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AireAcondicionado extends Model
{
    use HasFactory;

    protected $table = 'aireacondicionados'; // 👈 importante
    protected $fillable = [
        'aula_id',
        'marca',
        'modelo',
        'capacidad_frio',
        'capacidad_calor',
        'estado',
        'descripcion',
    ];

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}
