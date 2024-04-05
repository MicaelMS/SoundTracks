<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'artista',
        'ano_criacao',
    ];
    
    public function faixas()
    {
        return $this->hasMany(Faixa::class);
    }
}
