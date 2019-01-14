<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{

    public $timestamps = false;
    

    protected $fillable = [
        'name', 'district_id'
    ];

    public function district()
    {
    	return $this->belongsTo(District::class, 'district_id');
    }

    public function communityGroup()
    {
    	return $this->belongsToMany(CommunityGroup::class, 'communities_by_groups', 'community_id', 'community_group_id');
    }

    public function communityAdmin()
    {
        return $this->belongsToMany(CommunityAdmin::class, 'admins_by_community', 'community_id', 'community_admin_id');
    }

    public function activeAdmin()
    {
        return $this->hasMany(CommunityAdmin::class, 'active_community_id', 'id');
    }

    public function communityGroupRequest()
    {
        return $this->belongsToMany(CommunityGroupRequest::class, 'communities_by_group_request', 'community_id', 'community_group_request_id');
    }
}
