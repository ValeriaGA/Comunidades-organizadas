<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [
    	'genre'
    ];

    public function victims()
    {
        return $this->hasMany(Victims::class, 'genre_id', 'id');
    }

    public function perpetrators()
    {
        return $this->hasMany(Perpetrators::class, 'genre_id', 'id');
    }
}
