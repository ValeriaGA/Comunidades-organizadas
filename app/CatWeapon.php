<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatWeapon extends Model
{

	public $timestamps = false;

	public $table = "cat_weapon";

    protected $fillable = [
    	'name', 'active'
    ];

    public function securityReport()
    {
        return $this->hasMany(SecurityReport::class, 'cat_weapon_id', 'id');
    }
}
