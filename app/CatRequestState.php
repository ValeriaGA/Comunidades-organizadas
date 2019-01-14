<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatRequestState extends Model
{
    public $timestamps = false;
	
    protected $fillable = [
        'name', 'active'
    ];
    public $table = "cat_request_state";

    public function communityRequest()
    {
        return $this->hasMany(CommunityRequest::class, 'cat_request_state_id', 'id');
    }

    public function communityGroupRequest()
    {
        return $this->hasMany(CommunityGroupRequest::class, 'cat_request_state_id', 'id');
    }
}
