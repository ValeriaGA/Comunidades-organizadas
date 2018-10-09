<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{

    protected $fillable = [
        'description', 'type_id', 'weapon_id', 'transportation_id', 'location', 'longitud', 'latitud', 'perpetrators', 'user_id', 'date', 'time', 'perpetrators', 'victims', 'primary_victim_sex'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function typesOfIncident()
    {
        return $this->hasOne(TypeOfIncident::class, 'id', 'type_id');
    }

    public function transportation()
    {
        return $this->hasOne(TypeOfIncident::class, 'id', 'transportation_id');
    }

    public function weapon()
    {
        return $this->hasOne(TypeOfIncident::class, 'id', 'weapon_id');
    }
}
