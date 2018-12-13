<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'name', 'gender', 'last_name', 'second_last_name', 'official_id', 'foreigner'
    ];

    public function user()
    {
    	return $this->hasOne(User::class, 'person_id', 'id');
    }
}
