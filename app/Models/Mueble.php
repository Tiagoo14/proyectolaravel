<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mueble extends Model
{
    use HasFactory;

    protected $fillable = ['aula_id', 'tipo', 'estado'];

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}
