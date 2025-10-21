<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Foco extends Model
{
    use HasFactory;

    protected $fillable = ['aula_id', 'estado'];

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }

    public function historiales()
    {
        return $this->hasMany(HistorialFoco::class);
    }
}
