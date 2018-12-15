<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatEvidence extends Model
{
    protected $table = 'cat_evidence';

    protected $fillable = [
        'name', 'active'
    ];

    public function evidence()
    {
        return $this->hasMany(Evidence::class, 'cat_evidence_id', 'id');
    }
}
