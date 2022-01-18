<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    //Atribuindo o nome da tabela
    protected $table = 'series';

    public $timestamps = false;
    //Passando quais são as colunas que podem ser alteradas através do atributo create
    protected $fillable = ['nome'];

    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }
}
