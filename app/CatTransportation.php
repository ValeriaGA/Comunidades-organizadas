<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatTransportation extends Model
{
    protected $fillable = [
    	'name', 'active'
    ];

    public function securityReport()
    {
        return $this->hasMany(SecurityReport::class, 'cat_transportation_id', 'id');
    }
}
