<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['uuid','nome','usuario_id'];

    public function livros()
    {
        return $this->hasMany(Livros::class);
    }
}
