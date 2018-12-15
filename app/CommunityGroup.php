<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunityGroup extends Model
{

    public $timestamps = false;
    
    protected $fillable = [
        'name'
    ];

    public function community()
    {
    	return $this->belongsToMany(Community::class, 'communities_by_groups', 'community_group_id', 'community_id');
    }

    public function user()
    {
    	return $this->belongsToMany(User::class, 'users_by_community_groups', 'community_group_id', 'user_id');
    }

    public function report()
    {
        return $this->hasMany(Report::class, 'community_group_id', 'id');
    }
}
