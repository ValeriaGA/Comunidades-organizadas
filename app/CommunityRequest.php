<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunityRequest extends Model
{
    protected $table = 'community_requests';
    protected $fillable = [
    	'user_id', 'district_id', 'cat_request_state_id', 'name'
    ];
    public $timestamps = false;

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
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
