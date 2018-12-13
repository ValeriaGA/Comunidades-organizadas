<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'name', 'gender_id', 'last_name', 'second_last_name', 'official_id', 'foreigner'
    ];

    public function user()
    {
    	return $this->hasOne(User::class, 'person_id', 'id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }
}
