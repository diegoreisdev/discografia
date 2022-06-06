<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faixa extends Model
{
    use HasFactory;
    protected $table = 'faixas';
    protected $fillable = ['numero', 'nome_faixa', 'duracao'];

    public function albuns()
    {
        return $this->belongsTo(Album::class);
    }
}
