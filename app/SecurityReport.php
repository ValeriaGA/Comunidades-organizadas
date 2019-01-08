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
        return $this->hasMany(Victim::class, 'security_report_id', 'id');
    }

    public function perpetrators()
    {
        return $this->hasMany(Perpetrator::class, 'security_report_id', 'id');
    }

    public function addVictim($victims)
    {
        foreach($victims as $victim)
        {
            Victim::create([
                'security_report_id' => $this->id,
                'gender_id' => $victim
            ]);
        }
    }

    public function addPerpetrator($perpetrator_genders, $perpetrator_descriptions)
    {
        if (count($perpetrator_genders) == count($perpetrator_descriptions))
        {
            for($i = 0; $i < count($perpetrator_descriptions); ++$i)
            {
                $perp = Perpetrator::create([
                    'description' => $perpetrator_descriptions[$i],
                    'security_report_id' => $this->id,
                    'gender_id' => $perpetrator_genders[$i]
                ]);
            }
        }
    }

    public function delete()
    {
        
    }
}