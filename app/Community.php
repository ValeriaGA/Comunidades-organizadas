<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    protected $table = 'community';
    protected $fillable = [
        'name', 'district_id'
    ];

    public function district()
    {
    	return $this->belongsTo(District::class, 'district_id');
    }

    public function communityGroup()
    {
    	return $this->belongsToMany(CommunityGroup::class, 'communities_by_groups', 'community_id', 'id');
    }
}
