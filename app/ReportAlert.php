<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportAlert extends Model
{
    protected $fillable = [
        'report_id', 'user_id', 'reason'
    ];
}
