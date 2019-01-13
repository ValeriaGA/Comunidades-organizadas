<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunityGroupRequest extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'name', 'user_id', 'cat_request_state_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function community()
    {
        return $this->belongsToMany(Community::class, 'communities_by_group_request', 'community_group_request_id', 'community_id');
    }

    public function addCommunities($communities)
    {
        foreach($communities as $community_id)
        {
            $community = Community::findOrFail($community_id);

            $community->communityGroupRequest()->attach($this->id);
        }
    }

    public function catRequestState()
    {
        return $this->belongsTo(CatRequestState::class, 'cat_request_state_id');
    }

    public function accept($state = 'Aprobada')
    {
        $cat_state = CatRequestState::where('name', $state)->first();
        $this->update([
            'cat_request_state_id' => $cat_state->id
        ]);
    }
    
    public function deny()
    {
        $this->accept('Rechazada');
    }
}
