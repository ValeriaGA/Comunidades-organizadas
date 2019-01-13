<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'name', 'province_id'
    ];

    public function province()
    {
    	return $this->belongsTo(Province::class, 'province_id');
    }

    public function district()
    {
        return $this->hasMany(District::class, 'canton_id', 'id');
    }
}
