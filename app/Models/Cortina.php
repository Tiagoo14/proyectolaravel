<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cortina extends Model
{
    use HasFactory;

    protected $fillable = ['aula_id', 'estado'];

    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
}
