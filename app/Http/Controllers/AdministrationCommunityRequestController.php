<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommunityRequest;
use App\CommunityAdmin;
use App\CommunityGroup;
use App\Community;
use App\User;

class AdministrationCommunityRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function store(Request $request, CommunityRequest $communityRequest)
    {
        $community = Community::create([
            'district_id' => $communityRequest->district_id,
            'name' => $communityRequest->name
        ]);

        $group = CommunityGroup::create([
            'name' => $communityRequest->name
        ]);

        $group->community()->attach($community->id);

        $user = User::findOrFail($communityRequest->user_id);

        $user->makeCommunityAdmin();

        $communityAdmin = CommunityAdmin::where('user_id', $user->id)->first();

        $communityAdmin->community()->attach($community->id);

        $communityRequest->accept();

        session()->flash('message', 'Comunidad Aprobada');

        return redirect('/administracion/solicitudes');
    }

    public function destroy(CommunityRequest $communityRequest)
    {
        $communityRequest->deny();

        session()->flash('message', 'Solicitud Rechazada');

        return redirect('/administracion/solicitudes');
    }
}
