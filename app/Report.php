<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'id', 'description', 'sub_cat_report_id', 'community_group_id', 'state_id', 'longitud', 'latitud', 'user_id', 'date', 'time', 'active', 'news', 'title'
    ];

    public function subCatReport()
    {
        return $this->belongsTo(SubCatReport::class, 'sub_cat_report_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function like()
    {
    	return $this->belongsToMany(User::class, 'likes', 'report_id', 'user_id');
    }

    public function communityGroup()
    {
        return $this->belongsTo(CommunityGroup::class, 'community_group_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'report_id', 'id');
    }

    public function evidence()
    {
        return $this->hasMany(Evidence::class, 'report_id', 'id');
    }

    public function report_alert()
    {
        return $this->belongsToMany(User::class, 'report_alert', 'report_id', 'user_id');
    }

    public function securityReport()
    {
        return $this->hasOne(SecurityReport::class, 'report_id', 'id');
    }

    public function scopeLocation($query, $param)
    {
        // old
        // return $query->where('location', 'LIKE', '%' . $param . '%');
    }

    public function scopeDate($query, $param)
    {
        return $query->where('date', '=', $param);
    }

    public static function incidentsOverTime($year)
    {
        return static::selectRaw('MONTH(date) as month, count(*) qty')
            ->whereRaw('YEAR(date) = '.$year)
            ->groupBy(DB::raw('MONTH(date)'))
            ->get();
    }
}
