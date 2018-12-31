<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'avatar_path', 'role_id', 'person_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }

    public function report()
    {
        return $this->hasMany(Report::class, 'user_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function like()
    {
        return $this->belongsToMany(Report::class, 'likes', 'user_id', 'report_id');
    }

    public function communityGroup()
    {
        return $this->belongsToMany(CommunityGroup::class, 'users_by_community_groups', 'user_id', 'community_group_id');
    }

    public function reportAlert()
    {
        return $this->belongsToMany(Report::class, 'report_alert', 'user_id', 'report_id');
    }
}
