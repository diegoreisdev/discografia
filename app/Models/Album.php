<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table = 'albuns';
    protected $fillable = ['nome'];

    /* MÉTODO PARA BUSCAR ÁLBUM */
    public static function procurar($procurar)
    {
         return self::where('nome', "like", "%{$procurar}%")
         ->paginate(3);
    }

    public function faixas()
    {
        return $this->hasMany(Faixa::class);
    }
}
