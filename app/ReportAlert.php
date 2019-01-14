<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportAlert extends Model
{
    use SoftDeletes;

	public $table = "report_alert";

    protected $fillable = [
        'report_id', 'user_id', 'reason', 'deleted_at'
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }
}
