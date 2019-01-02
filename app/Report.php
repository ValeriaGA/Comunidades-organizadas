<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'description', 'sub_cat_report_id', 'community_group_id', 'state_id', 'longitud', 'latitud', 'user_id', 'date', 'time', 'active', 'news', 'title'
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

    private static function fetchReports($cat = '%', $filter = null)
    {
        $cat_report = CatReport::where('name', 'LIKE', $cat)->first();
        $sub_cat = SubCatReport::where('cat_report_id', $cat_report->id)->get();
        $sub_cat_ids = array();
        foreach($sub_cat as $c)
        {
            array_push($sub_cat_ids, $c->id);
        }

        if ($filter == 'recent')
        {
            return Report::whereIn('sub_cat_report_id', $sub_cat_ids)
                            ->where('reports.news', false)
                            ->where('reports.active', true)
                            ->orderBy('date', 'desc')
                            ->orderBy('time', 'desc')
                            ->paginate(10);
        }else
        {
            return Report::whereIn('sub_cat_report_id', $sub_cat_ids)
                            ->where('reports.news', false)
                            ->where('reports.active', true)
                            ->latest()
                            ->paginate(10);
        }
        
    }

    public static function fetchService()
    {
        return Report::fetchReports('Servicio');
        
    }

    public static function fetchRecentService()
    {
        return Report::fetchReports('Servicio', 'recent');
    }

    

    public static function fetchSecurity()
    {
        return Report::fetchReports('Seguridad');
        
    }

    public static function fetchRecentSecurity()
    {
        return Report::fetchReports('Seguridad', 'recent');
    }

    public static function fetchNews($filter = null)
    {
        if ($filter == 'recent')
        {
            return Report::where('news', true)
                        ->where('active', true)
                        ->orderBy('date', 'desc')
                        ->orderBy('time', 'desc')
                        ->paginate(10);
        }else
        {
            return Report::where('news', true)
                        ->where('active', true)
                        ->latest()
                        ->paginate(10);
        }
        
    }

    public static function fetchRecentNews()
    {
        return Report::fetchNews('recent');
    }

    public function addEvidence($evidence)
    {
        $i = 0;
        foreach($evidence as $e)
        {
            $filename = '';
            $extension = $e->getClientOriginalExtension();
            $filename = time().'_'.$i++.'.'.$extension;
            $e->move('evidence/'.$this->id, $filename);

            $cat_evidence = CatEvidence::get_cat_evidence($extension);
            if ($cat_evidence != null)
            {
                Evidence::create([
                    'report_id' => $this->id,
                    'multimedia_path' => $filename,
                    'cat_evidence_id' => $cat_evidence->id
                ]);
            }else
            {
                // Not supported type
            }
        }
    }

    public function editReport($request)
    {
        $categories_security = SubCatReport::where('name', 'LIKE', request('type'))->first();

        $state = State::where('name', 'LIKE', request('states'))->first();

        $this->update([
            'community_group_id' => request('community_group'),
            'title' => request('title'),
            'description' => request('description'),
            'longitud' => request('longitud'),
            'latitud' => request('latitud'),
            'date' => request('date'),
            'time' => request('time'),
            'state_id' => $state->id,
            'sub_cat_report_id' => $categories_security->id,
            'active' => ($request['active'] ? true : false)
        ]);

        if ($request->has('evidence_file'))
        {
            foreach($this->evidence as $evidence)
            {
                $path = public_path() . '/evidence/'. $this->id . '/' . $evidence->multimedia_path;
                if(file_exists($path)) {
                    unlink($path);
                }
            }
            
            $report->evidence()->delete();

            $this->addEvidence(request('evidence_file'));
        }else
        {
            $this->evidence()->delete();
        }
    }

    public function editServiceReport($request)
    {
        $this->editReport($request);
    }

    public function editNews($request)
    {
        $this->editReport($request);
    }

    public function editSecurityReport($request)
    {
        $this->editReport($request);

        $weapon = CatWeapon::where('name', 'LIKE', request('weapon'))->first();
        $transportation = CatTransportation::where('name', 'LIKE', request('transportation'))->first();

        $security_report = SecurityReport::where('report_id', $this->id)->first();

        $security_report->update([
            'cat_weapon_id' => $weapon->id,
            'cat_transportation_id' => $transportation->id
        ]);

        $security_report->victims()->delete();
        if ($request->has('victim_gender'))
        {
            $security_report->addVictim(request('victim_gender'));
        }

        $security_report->perpetrators()->delete();
        if ($request->has('perpetrator_gender')
            && $request->has('perpetrator_description'))
        {
            $security_report->addPerpetrator(request('perpetrator_gender'), request('perpetrator_description'));
        }
    }
    
    public function activate($active = true)
    {
        $this->update(compact('active'));
    }
    
    public function deactivate()
    {
        $this->activate(false);
    }
}