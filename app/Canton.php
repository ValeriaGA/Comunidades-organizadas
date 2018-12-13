<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{
    protected $fillable = [
        'name', 'province_id'
    ];

    public function province()
    {
    	return $this->belongsTo(Province::class, 'province_id');
    }

    public function district()
    {
        return $this->hasMany(Canton::class, 'canton_id', 'id');
    }
}
