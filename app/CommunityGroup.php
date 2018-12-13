<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunityGroup extends Model
{
    protected $fillable = [
        'name'
    ];

    public function community()
    {
    	return $this->belongsToMany(Community::class, 'communities_by_groups', 'commmunity_group_id', 'id');
    }

    public function user()
    {
    	return $this->belongsToMany(User::class, 'users_by_community_groups', 'community_group_id', 'id');
    }

    public function report()
    {
        return $this->hasMany(Report::class, 'community_group_id', 'id');
    }
}
