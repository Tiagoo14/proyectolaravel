<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'codigo',
        'docente_id',
        'descripcion', // si también la usás
    ];

    /**
     * Relación con Docente (una materia pertenece a un docente).
     */
    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }
}
