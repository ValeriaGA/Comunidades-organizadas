<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'name', 'active'
    ];

    public function report()
    {
        return $this->hasMany(Report::class, 'state_id', 'id');
    }
}
