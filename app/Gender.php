<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $fillable = [
    	'name'
    ];

    public function victims()
    {
        return $this->hasMany(Victim::class, 'gender_id', 'id');
    }

    public function perpetrators()
    {
        return $this->hasMany(Perpetrator::class, 'gender_id', 'id');
    }

    public function people()
    {
        return $this->hasMany(Person::class, 'gender_id', 'id');
    }
}
