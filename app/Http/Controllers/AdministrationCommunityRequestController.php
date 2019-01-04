<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommunityRequest;
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

        $user = User::findOrFail($communityRequest->user_id);

        $user->makeCommunityAdmin($community);

        CommunityRequest::destroy($communityRequest->id);

        session()->flash('message', 'Comunidad Agregada');

        return redirect('/administracion/solicitudes');
    }

    public function destroy(Request $request, CommunityRequest $communityRequest)
    {
        CommunityRequest::destroy($communityRequest->id);

        session()->flash('message', 'Solicitud Removida');

        return redirect('/administracion/solicitudes');
    }
}
