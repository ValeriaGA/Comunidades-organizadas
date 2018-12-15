<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'province';
    protected $fillable = [
        'name', 'country_id'
    ];

    public function country()
    {
    	return $this->belongsTo(Country::class, 'country_id');
    }


    public function canton()
    {
        return $this->hasMany(Canton::class, 'province_id', 'id');
    }
}
