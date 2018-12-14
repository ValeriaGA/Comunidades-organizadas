<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{

    public $table = "evidence";

	protected $fillable = [
        'report_id', 'multimedia_path', 'cat_evidence_id'
    ];
    
    public function report()
    {
    	return $this->belongsTo(Report::class, 'report_id');
    }

    public function evidenceType()
    {
    	return $this->belongsTo(CatEvidence::class, 'cat_evidence_id');
    }
}
