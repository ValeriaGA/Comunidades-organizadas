<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

	public $timestamps = false;
	
    protected $fillable = [
        'name'
    ];

    public function province()
    {
        return $this->hasMany(Province::class, 'country_id', 'id');
    }
}
