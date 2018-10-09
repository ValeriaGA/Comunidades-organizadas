<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeOfIncident extends Model
{
    public function incident()
    {
    	return $this->belongsTo(Incident::class);
    }
}
