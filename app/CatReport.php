<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CatReport extends Model
{
    protected $table = 'cat_report';

    protected $fillable = [
        'name'
    ];

    public function subCatReport()
    {
        return $this->hasMany(SubCatReport::class, 'cat_report_id', 'id');
    }

}
