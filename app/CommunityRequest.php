<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunityRequest extends Model
{
    protected $table = 'community_requests';
    protected $fillable = [
    	'user_id', 'district_id','name'
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
}
