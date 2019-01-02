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

    public function communityRequest()
    {
        return $this->hasMany(CommunityRequest::class, 'user_id', 'id');
    }

    public function community()
    {
        return $this->belongsToMany(Community::class, 'admins_by_community', 'user_id', 'community_id');
    }

    public function communityGroupRequest()
    {
        return $this->hasMany(CommunityGroupRequest::class, 'user_id', 'id');
    }

    public function changeAvatar($file)
    {
        if ($this->avatar_path != '')
        {
            $path = public_path() . '/users/'. $this->id . '/' . $this->avatar_path;
            if(file_exists($path)) {
                unlink($path);
            }
        }

        $extension = $file->getClientOriginalExtension();
        $filename =time().'.'.$extension;
        $file->move('users/'.$this->id, $filename);

        $this->avatar_path = $filename;
        $this->save();
    }

    public function fetchSecurityReports()
    {
        $cat_security = CatReport::where('name', 'LIKE', 'Seguridad')->first();
        $sub_cat_security = SubCatReport::where('cat_report_id', $cat_security->id)->get();
        $sub_cat_security_ids = array();
        foreach($sub_cat_security as $cat)
        {
            array_push($sub_cat_security_ids, $cat->id);
        }

        return Report::whereIn('sub_cat_report_id', $sub_cat_security_ids)
                            ->where('reports.user_id', $this->id)
                            ->where('reports.news', false)
                            ->latest()
                            ->paginate(10);

    }

    public function fetchServiceReports()
    {
        $cat_service = CatReport::where('name', 'LIKE', 'Servicio')->first();
        $sub_cat_service = SubCatReport::where('cat_report_id', $cat_service->id)->get();
        $sub_cat_service_ids = array();
        foreach($sub_cat_service as $cat)
        {
            array_push($sub_cat_service_ids, $cat->id);
        }

        return Report::whereIn('sub_cat_report_id', $sub_cat_service_ids)
                            ->where('reports.user_id', $this->id)
                            ->where('reports.news', false)
                            ->latest()
                            ->paginate(10);

    }

    public function fetchNews()
    {
        return Report::where('news', true)
                        ->where('reports.user_id', $this->id)
                        ->latest()
                        ->paginate(10);
    }

    public function addReport($request, $news = false)
    {
        $categories_security = SubCatReport::where('name', 'LIKE', request('type'))->first();

        $state = State::where('name', 'LIKE', 'Sin Procesar')->first();

        $report = Report::create([
            'community_group_id' => request('community_group'),
            'title' => request('title'),
            'description' => request('description'),
            'longitud' => request('longitud'),
            'latitud' => request('latitud'),
            'date' => request('date'),
            'time' => request('time'),
            'state_id' => $state->id,
            'sub_cat_report_id' => $categories_security->id,
            'user_id' => $this->id,
            'active' => true,
            'news' => $news
        ]);

        if ($request->has('evidence_file'))
        {
            $report->addEvidence(request('evidence_file'));
        }
        
        return $report;
    }

    public function addServiceReport($request)
    {
        $this->addReport($request);
    }

    public function addNews($request)
    {
        $this->addReport($request, true);
    }

    public function addSecurityReport($request)
    {
        $report = $this->addReport($request);

        $weapon = CatWeapon::where('name', 'LIKE', request('weapon'))->first();
        $transportation = CatTransportation::where('name', 'LIKE', request('transportation'))->first();

        $security_report = SecurityReport::create([
            'report_id' => $report->id,
            'cat_weapon_id' => $weapon->id,
            'cat_transportation_id' => $transportation->id
        ]);

        if ($request->has('victim_gender'))
        {
            $security_report->addVictim(request('victim_gender'));
        }

        if ($request->has('perpetrator_gender')
            && $request->has('perpetrator_description'))
        {
            $security_report->addPerpetrator(request('perpetrator_gender'), request('perpetrator_description'));
        }
    }

    public function addCommunityRequest($request)
    {
        $district = District::findOrFail(request('district'));
        
        return CommunityRequest::create([
            'user_id' => $this->id,
            'district_id' => $district->id,
            'name' => request('name')
        ]);
    }
}
