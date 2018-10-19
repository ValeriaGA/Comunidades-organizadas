<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{

    protected $fillable = [
        'description', 'type_id', 'weapon_id', 'transportation_id', 'location', 'longitud', 'latitud', 'perpetrators', 'user_id', 'date', 'time', 'victims', 'primary_victim_sex'
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
        return $this->hasOne(Transportation::class, 'id', 'transportation_id');
    }

    public function weapon()
    {
        return $this->hasOne(Weapon::class, 'id', 'weapon_id');
    }

    public function evidence()
    {
        return $this->hasMany(Evidence::class);
    }

    public function scopeLocation($query, $param)
    {
        return $query->where('location', 'LIKE', '%' . $param . '%');
    }

    public function scopeDate($query, $param)
    {
        return $query->where('date', '=', $param);
    }
}
