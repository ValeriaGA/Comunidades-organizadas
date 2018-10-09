<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    public function incident()
    {
    	return $this->belongsTo(Incident::class);
    }
}