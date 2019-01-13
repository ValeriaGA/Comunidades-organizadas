<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunityAdmin extends Model
{

    protected $fillable = [
        'user_id', 'active_community_id'
    ];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function community()
    {
        return $this->belongsToMany(Community::class, 'admins_by_community', 'community_admin_id', 'community_id');
    }

    public function activeCommunity()
    {
       return $this->belongsTo(Community::class, 'active_community_id');
    }
}
