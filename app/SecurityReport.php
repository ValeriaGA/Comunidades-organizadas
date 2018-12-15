<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecurityReport extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
    	'cat_transportation_id', 'cat_weapon_id', 'report_id'
    ];

    public function catTransportation()
    {
        return $this->belongsTo(CatTransportation::class, 'cat_transportation_id');
    }

    public function catWeapon()
    {
        return $this->belongsTo(CatWeapon::class, 'cat_weapon_id');
    }

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }

    public function victims()
    {
        return $this->hasMany(Victims::class, 'security_report_id', 'id');
    }

    public function perpetrators()
    {
        return $this->hasMany(Perpetrators::class, 'security_report_id', 'id');
    }
}
