<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommunityGroupRequest;
use App\CommunityGroup;
use App\User;

class AdministrationGroupRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function store(Request $request, CommunityGroupRequest $communityGroupRequest)
    {
        $group = CommunityGroup::create([
            'name' => $communityGroupRequest->name
        ]);

        $communities = $communityGroupRequest->community()->get();
		foreach ($communities as $community)
        {
        	$group->community()->attach($community->id);
        	// $communityGroupRequest->community()->detach($community->id);
        }

        $communityGroupRequest->accept();


        session()->flash('message', 'Grupo de Comunidades Agregado');

        return redirect('/administracion/solicitudes');
    }

    public function destroy(CommunityGroupRequest $communityGroupRequest)
    {
    	$communities = $communityGroupRequest->community()->get();
		foreach ($communities as $community)
        {
        	$communityGroupRequest->community()->detach($community->id);
        }

        $communityGroupRequest->deny();

        session()->flash('message', 'Solicitud Rechazada');

        return redirect('/administracion/solicitudes');
    }
}
