<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{
	protected $fillable = [
        'incident_id', 'multimedia_path'
    ];
    public function incident()
    {
    	return $this->belongsTo(Incident::class, 'incident_id');
    }
}
