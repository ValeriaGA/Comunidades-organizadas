<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportAlert extends Model
{

	public $table = "report_alert";

    protected $fillable = [
        'report_id', 'user_id', 'reason'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }
}
