<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{

	public $timestamps = false;
	
    protected $fillable = [
        'name', 'active'
    ];

    public function report()
    {
        return $this->hasMany(Report::class, 'state_id', 'id');
    }

    public function activate($active = true)
    {
        $this->update(compact('active'));
    }
    
    public function deactivate()
    {
        $this->activate(false);
    }
}
