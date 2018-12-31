<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportAlert extends Model
{

	public $table = "report_alert";

    protected $fillable = [
        'report_id', 'user_id', 'reason'
    ];
}
