<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['uuid','nome'];

    public function livros()
    {
        return $this->hasMany(Livros::class);
    }
}
