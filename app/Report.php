<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class Report extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'description', 'sub_cat_report_id', 'community_group_id', 'state_id', 'longitud', 'latitud', 'user_id', 'date', 'time', 'active', 'news', 'title', 'deleted_at'
    ];
    protected $dates = ['deleted_at'];

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

    public function reportAlert()
    {
        return $this->hasMany(ReportAlert::class, 'report_id', 'id');
    }

    public function securityReport()
    {
        return $this->hasOne(SecurityReport::class, 'report_id', 'id');
    }

    public function scopeNews($query, $param = true)
    {
        return $query->where('news', $param);
    }

    public function scopeNotNews($query)
    {
        return $query->news(false);
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function scopeDate($query, $date)
    {
        return $query->where('date', '=', $date);
    }

    public function scopeInOrCommunities($query, $com1, $com2)
    {
        return $query->where('community_group_id', $com1->id)
                    ->orWhereIn('community_group_id', $com2);
    }

    public function imageEvidence()
    {
        $evidence = [];
        foreach($this->evidence as $e)
        {
            if ($e->evidenceType->name == 'Imagen')
            {
                array_push($evidence, $e);
            }
        }
        return $evidence;
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
        $categories_security = SubCatReport::where('name', 'LIKE', request('type'))->firstOrFail();

        $state = State::where('name', 'LIKE', request('states'))->firstOrFail();

        $community_group = CommunityGroup::findOrFail(request('community_group'));

        $this->update([
            'community_group_id' => $community_group->id,
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

                $evidence->delete();
            }

            $this->addEvidence(request('evidence_file'));
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

        $weapon = CatWeapon::where('name', 'LIKE', request('weapon'))->firstOrFail();
        $transportation = CatTransportation::where('name', 'LIKE', request('transportation'))->firstOrFail();

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

    public function deleteDependencies()
    {
        foreach ($this->comment as $comment)
        {
            $comment->delete();
        }

        foreach ($this->like as $user)
        {
            $this->like()->detach($user->id);
        }

        if ($this->subCatReport->CatReport->name == 'Seguridad')
        {
            $this->securityReport->deleteDependencies();
            $this->securityReport->delete();
        }

        foreach($this->evidence as $evidence)
        {
            $path = public_path() . '/evidence/'. $this->id . '/' . $evidence->multimedia_path;
            if(file_exists($path)) {
                unlink($path);
            }

            $evidence->delete();
        }

        foreach ($this->reportAlert as $alert)
        {
            $alert->delete();
        }
    }

    /* FETCH PUBLICATIONS */
    /*
        *
        *
        *
        *
        *
        *
        *
    */

    private static function subCategories($cat = '%')
    {
        $cat_report = CatReport::where('name', 'LIKE', $cat)->first();
        $sub_cat = SubCatReport::where('cat_report_id', $cat_report->id)->get();
        $sub_cat_ids = array();
        foreach($sub_cat as $c)
        {
            array_push($sub_cat_ids, $c->id);
        }
        return $sub_cat_ids;
    }

    private static function serviceSubCategory()
    {
        return Report::subCategories('Servicio');
    }

    private static function securitySubCategory()
    {
        return Report::subCategories('Seguridad');
    }

    private static function fetchReports($cat = '%', $filter = null)
    {
        $sub_cat_ids = Report::subCategories($cat);

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

    /*
        *
        * GROUPS
        *
    */

    public static function fecthReportByGroupOrGroupName($community_group, $group_name, $cat = '%')
    {
        $sub_cat_ids = Report::subCategories($cat);

        $report_array = DB::table('reports')
            ->join('community_groups', 'reports.community_group_id', '=', 'community_groups.id')
            ->select('reports.*')
            ->where('reports.news', false)
            ->where('reports.active', true)
            ->whereIn('reports.sub_cat_report_id', $sub_cat_ids)
            ->where(function ($query) use ($community_group, $group_name) {
                if ($group_name != null)
                {
                    $query->where('community_groups.name', 'LIKE', '%'.$group_name.'%')
                    ->orwhere('community_group_id', $community_group->id);
                }else
                {
                    $query->where('community_group_id', $community_group->id);
                }
            })
            ->distinct()
            ->latest()
            ->get();
        
        $reports = Report::hydrate( $report_array->toArray() );
        $paginate = new LengthAwarePaginator($reports, count($reports), 10, 1, ['path'=>url('/index')]);

        return $paginate;
    }

    public static function fetchServiceByGroupOrGroupName($community_group, $group_name)
    {
        return Report::fecthReportByGroupOrGroupName($community_group, $group_name, 'Servicio');
    }

    public static function fetchSecurityByGroupOrGroupName($community_group, $group_name)
    {
        return Report::fecthReportByGroupOrGroupName($community_group, $group_name, 'Seguridad');
    }

    public static function fetchNewsByGroupOrCommunities($community_group, $group_name)
    {
        $report_array = DB::table('reports')
                ->join('community_groups', 'reports.community_group_id', '=', 'community_groups.id')
                ->select('reports.*')
                ->where('news', true)
                ->where('active', true)
                ->where(function ($query) use ($community_group, $group_name) {
                    if ($group_name != null)
                    {
                        $query->where('community_groups.name', 'LIKE', '%'.$group_name.'%')
                        ->orwhere('community_group_id', $community_group->id);
                    }else
                    {
                        $query->where('community_group_id', $community_group->id);
                    }
                })
                ->distinct()
                ->latest()
                ->get();

        $reports = Report::hydrate( $report_array->toArray() );
        $paginate = new LengthAwarePaginator($reports, count($reports), 10, 1, ['path'=>url('/index')]);

        return $paginate;
    }

    /*
        *
        * COMMUNITIES
        *
    */

    public static function fecthReportByCommunityOrGroupName($community, $group_name, $cat = '%')
    {
        $sub_cat_ids = Report::subCategories($cat);

        $report_array = DB::table('reports')
            ->join('community_groups', 'reports.community_group_id', '=', 'community_groups.id')
            ->join('communities_by_groups', 'community_groups.id', '=', 'communities_by_groups.community_group_id')
            ->join('communities', 'communities_by_groups.community_id', '=', 'communities.id')
            ->select('reports.*')
            ->where('reports.news', false)
            ->where('reports.active', true)
            ->whereIn('reports.sub_cat_report_id', $sub_cat_ids)
            ->where(function ($query) use ($community, $group_name) {
                if ($group_name != null)
                {
                    $query->where('community_groups.name', 'LIKE', '%'.$group_name.'%')
                    ->orwhere('communities.id', $community->id);
                }else
                {
                    $query->where('communities.id', $community->id);
                }
            })
            ->distinct()
            ->latest()
            ->get();
        
        $reports = Report::hydrate( $report_array->toArray() );
        $paginate = new LengthAwarePaginator($reports, count($reports), 10, 1, ['path'=>url('/index')]);

        return $paginate;
    }

    public static function fetchServiceByCommunityOrGroupName($community, $group_name)
    {
        return Report::fecthReportByCommunityOrGroupName($community, $group_name, 'Servicio');
    }

    public static function fetchSecurityByCommunityOrGroupName($community, $group_name)
    {
        return Report::fecthReportByCommunityOrGroupName($community, $group_name, 'Seguridad');
    }

    public static function fetchNewsByCommunityOrGroupName($community, $group_name)
    {
        $report_array = DB::table('reports')
                ->join('community_groups', 'reports.community_group_id', '=', 'community_groups.id')
                ->join('communities_by_groups', 'community_groups.id', '=', 'communities_by_groups.community_group_id')
                ->join('communities', 'communities_by_groups.community_id', '=', 'communities.id')
                ->select('reports.*')
                ->where('news', true)
                ->where('active', true)
                ->where(function ($query) use ($community, $group_name) {
                    if ($group_name != null)
                    {
                        $query->where('community_groups.name', 'LIKE', '%'.$group_name.'%')
                        ->orwhere('communities.id', $community->id);
                    }else
                    {
                        $query->where('communities.id', $community->id);
                    }
                })
                ->distinct()
                ->latest()
                ->get();

        $reports = Report::hydrate( $report_array->toArray() );
        $paginate = new LengthAwarePaginator($reports, count($reports), 10, 1, ['path'=>url('/index')]);
        return $paginate;
    }

    /*
        *
        * Districts
        *
    */

    public static function fecthReportByDistrictOrGroupName($district, $group_name, $cat = '%')
    {
        $sub_cat_ids = Report::subCategories($cat);

        $report_array = DB::table('reports')
            ->join('community_groups', 'reports.community_group_id', '=', 'community_groups.id')
            ->join('communities_by_groups', 'community_groups.id', '=', 'communities_by_groups.community_group_id')
            ->join('communities', 'communities_by_groups.community_id', '=', 'communities.id')
            ->join('districts', 'communities.district_id', '=', 'districts.id')
            ->select('reports.*')
            ->where('reports.news', false)
            ->where('reports.active', true)
            ->whereIn('reports.sub_cat_report_id', $sub_cat_ids)
            ->where(function ($query) use ($district, $group_name) {
                if ($group_name != null)
                {
                    $query->where('community_groups.name', 'LIKE', '%'.$group_name.'%')
                    ->orwhere('districts.id', $district->id);
                }else
                {
                    $query->where('districts.id', $district->id);
                }
            })
            ->distinct()
            ->latest()
            ->get();
        
        $reports = Report::hydrate( $report_array->toArray() );
        $paginate = new LengthAwarePaginator($reports, count($reports), 10, 1, ['path'=>url('/index')]);

        return $paginate;
    }

    public static function fetchServiceByDistrictOrGroupName($district, $group_name)
    {
        return Report::fecthReportByDistrictOrGroupName($district, $group_name, 'Servicio');
    }

    public static function fetchSecurityByDistrictOrGroupName($district, $group_name)
    {
        return Report::fecthReportByDistrictOrGroupName($district, $group_name, 'Seguridad');
    }

    public static function fetchNewsByDistrictOrGroupName($district, $group_name)
    {
        $report_array = DB::table('reports')
                ->join('community_groups', 'reports.community_group_id', '=', 'community_groups.id')
                ->join('communities_by_groups', 'community_groups.id', '=', 'communities_by_groups.community_group_id')
                ->join('communities', 'communities_by_groups.community_id', '=', 'communities.id')
                ->join('districts', 'communities.district_id', '=', 'districts.id')
                ->select('reports.*')
                ->where('news', true)
                ->where('active', true)
                ->where(function ($query) use ($district, $group_name) {
                    if ($group_name != null)
                    {
                        $query->where('community_groups.name', 'LIKE', '%'.$group_name.'%')
                        ->orwhere('districts.id', $district->id);
                    }else
                    {
                        $query->where('districts.id', $district->id);
                    }
                })
                ->distinct()
                ->latest()
                ->get();

        $reports = Report::hydrate( $report_array->toArray() );
        $paginate = new LengthAwarePaginator($reports, count($reports), 10, 1, ['path'=>url('/index')]);
        return $paginate;
    }

    /*
        *
        * Cantons
        *
    */

    public static function fecthReportByCantonOrGroupName($canton, $group_name, $cat = '%')
    {
        $sub_cat_ids = Report::subCategories($cat);

        $report_array = DB::table('reports')
            ->join('community_groups', 'reports.community_group_id', '=', 'community_groups.id')
            ->join('communities_by_groups', 'community_groups.id', '=', 'communities_by_groups.community_group_id')
            ->join('communities', 'communities_by_groups.community_id', '=', 'communities.id')
            ->join('districts', 'communities.district_id', '=', 'districts.id')
            ->join('cantons', 'districts.canton_id', '=', 'cantons.id')
            ->select('reports.*')
            ->where('reports.news', false)
            ->where('reports.active', true)
            ->whereIn('reports.sub_cat_report_id', $sub_cat_ids)
            ->where(function ($query) use ($canton, $group_name) {
                if ($group_name != null)
                {
                    $query->where('community_groups.name', 'LIKE', '%'.$group_name.'%')
                    ->orwhere('cantons.id', $canton->id);
                }else
                {
                    $query->where('cantons.id', $canton->id);
                }
            })
            ->distinct()
            ->latest()
            ->get();
        
        $reports = Report::hydrate( $report_array->toArray() );
        $paginate = new LengthAwarePaginator($reports, count($reports), 10, 1, ['path'=>url('/index')]);

        return $paginate;
    }

    public static function fetchServiceByCantonOrGroupName($canton, $group_name)
    {
        return Report::fecthReportByCantonOrGroupName($canton, $group_name, 'Servicio');
    }

    public static function fetchSecurityByCantonOrGroupName($canton, $group_name)
    {
        return Report::fecthReportByCantonOrGroupName($canton, $group_name, 'Seguridad');
    }

    public static function fetchNewsByCantonOrGroupName($canton, $group_name)
    {
        $report_array = DB::table('reports')
                ->join('community_groups', 'reports.community_group_id', '=', 'community_groups.id')
                ->join('communities_by_groups', 'community_groups.id', '=', 'communities_by_groups.community_group_id')
                ->join('communities', 'communities_by_groups.community_id', '=', 'communities.id')
                ->join('districts', 'communities.district_id', '=', 'districts.id')
                ->join('cantons', 'districts.canton_id', '=', 'cantons.id')
                ->select('reports.*')
                ->where('news', true)
                ->where('active', true)
                ->where(function ($query) use ($canton, $group_name) {
                    if ($group_name != null)
                    {
                        $query->where('community_groups.name', 'LIKE', '%'.$group_name.'%')
                        ->orwhere('cantons.id', $canton->id);
                    }else
                    {
                        $query->where('cantons.id', $canton->id);
                    }
                })
                ->distinct()
                ->latest()
                ->get();

        $reports = Report::hydrate( $report_array->toArray() );
        $paginate = new LengthAwarePaginator($reports, count($reports), 10, 1, ['path'=>url('/index')]);
        return $paginate;
    }

    /*
        *
        * Provinces
        *
    */

    public static function fecthReportByProvinceOrGroupName($province, $group_name, $cat = '%')
    {
        $sub_cat_ids = Report::subCategories($cat);

        $report_array = DB::table('reports')
            ->join('community_groups', 'reports.community_group_id', '=', 'community_groups.id')
            ->join('communities_by_groups', 'community_groups.id', '=', 'communities_by_groups.community_group_id')
            ->join('communities', 'communities_by_groups.community_id', '=', 'communities.id')
            ->join('districts', 'communities.district_id', '=', 'districts.id')
            ->join('cantons', 'districts.canton_id', '=', 'cantons.id')
            ->join('provinces', 'cantons.province_id', '=', 'provinces.id')
            ->select('reports.*')
            ->where('reports.news', false)
            ->where('reports.active', true)
            ->whereIn('reports.sub_cat_report_id', $sub_cat_ids)
            ->where(function ($query) use ($province, $group_name) {
                if ($group_name != null)
                {
                    $query->where('community_groups.name', 'LIKE', '%'.$group_name.'%')
                    ->orwhere('provinces.id', $province->id);
                }else
                {
                    $query->where('provinces.id', $province->id);
                }
            })
            ->distinct()
            ->latest()
            ->get();
        
        $reports = Report::hydrate( $report_array->toArray() );
        $paginate = new LengthAwarePaginator($reports, count($reports), 10, 1, ['path'=>url('/index')]);

        return $paginate;
    }

    public static function fetchServiceByProvinceOrGroupName($province, $group_name)
    {
        return Report::fecthReportByProvinceOrGroupName($province, $group_name, 'Servicio');
    }

    public static function fetchSecurityByProvinceOrGroupName($province, $group_name)
    {
        return Report::fecthReportByProvinceOrGroupName($province, $group_name, 'Seguridad');
    }

    public static function fetchNewsByProvinceOrGroupName($province, $group_name)
    {
        $report_array = DB::table('reports')
                ->join('community_groups', 'reports.community_group_id', '=', 'community_groups.id')
                ->join('communities_by_groups', 'community_groups.id', '=', 'communities_by_groups.community_group_id')
                ->join('communities', 'communities_by_groups.community_id', '=', 'communities.id')
                ->join('districts', 'communities.district_id', '=', 'districts.id')
                ->join('cantons', 'districts.canton_id', '=', 'cantons.id')
                ->join('provinces', 'cantons.province_id', '=', 'provinces.id')
                ->select('reports.*')
                ->where('news', true)
                ->where('active', true)
                ->where(function ($query) use ($province, $group_name) {
                    if ($group_name != null)
                    {
                        $query->where('community_groups.name', 'LIKE', '%'.$group_name.'%')
                        ->orwhere('provinces.id', $province->id);
                    }else
                    {
                        $query->where('provinces.id', $province->id);
                    }
                })
                ->distinct()
                ->latest()
                ->get();

        $reports = Report::hydrate( $report_array->toArray() );
        $paginate = new LengthAwarePaginator($reports, count($reports), 10, 1, ['path'=>url('/index')]);
        return $paginate;
    }

    /*
        *
        * Default
        *
    */

    public static function fecthReportByGroupName($group_name, $cat = '%')
    {
        $sub_cat_ids = Report::subCategories($cat);

        $report_array = DB::table('reports')
            ->join('community_groups', 'reports.community_group_id', '=', 'community_groups.id')
            ->select('reports.*')
            ->where('reports.news', false)
            ->where('reports.active', true)
            ->whereIn('reports.sub_cat_report_id', $sub_cat_ids)
            ->where('community_groups.name', 'LIKE', '%'.$group_name.'%')
            ->distinct()
            ->latest()
            ->get();
        
        $reports = Report::hydrate( $report_array->toArray() );
        $paginate = new LengthAwarePaginator($reports, count($reports), 10, 1, ['path'=>url('/index')]);

        return $paginate;
    }

    public static function fetchServiceByGroupName($group_name)
    {
        return Report::fecthReportByGroupName($group_name, 'Servicio');
    }

    public static function fetchSecurityByGroupName($group_name)
    {
        return Report::fecthReportByGroupName($group_name, 'Seguridad');
    }

    public static function fetchNewsByGroupName($group_name)
    {
        $report_array = DB::table('reports')
                ->join('community_groups', 'reports.community_group_id', '=', 'community_groups.id')
                ->select('reports.*')
                ->where('news', true)
                ->where('active', true)
                ->where('community_groups.name', 'LIKE', '%'.$group_name.'%')
                ->distinct()
                ->latest()
                ->get();

        $reports = Report::hydrate( $report_array->toArray() );
        $paginate = new LengthAwarePaginator($reports, count($reports), 10, 1, ['path'=>url('/index')]);

        return $paginate;
    }
}