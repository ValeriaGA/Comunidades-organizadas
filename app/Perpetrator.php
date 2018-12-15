<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perpetrator extends Model
{


    public $timestamps = false;


    protected $fillable = [
    	'security_report_id', 'gender_id', 'description'
    ];

    public function securityReport()
    {
        return $this->belongsTo(SecurityReport::class, 'security_report_id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }
}
