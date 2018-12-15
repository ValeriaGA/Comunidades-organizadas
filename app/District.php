<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{


    public $timestamps = false;


    protected $fillable = [
        'name', 'canton_id'
    ];

    public function canton()
    {
    	return $this->belongsTo(Canton::class, 'canton_id');
    }

    public function community()
    {
        return $this->hasMany(Community::class, 'district_id', 'id');
    }
}
