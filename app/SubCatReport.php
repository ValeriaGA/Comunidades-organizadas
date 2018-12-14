<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCatReport extends Model
{
    public $table = "sub_cat_report";

	protected $fillable = [
        'name', 'multimedia_path', 'active', 'cat_report_id'
    ];

    public function CatReport()
    {
    	return $this->belongsTo(Incident::class, 'cat_report_id');
    }

    public function report()
    {
        return $this->hasMany(Report::class, 'sub_cat_report_id', 'id');
    }
}
