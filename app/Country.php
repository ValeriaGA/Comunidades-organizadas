<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';

    protected $fillable = [
        'name'
    ];

    public function province()
    {
        return $this->hasMany(Province::class, 'country_id', 'id');
    }
}
