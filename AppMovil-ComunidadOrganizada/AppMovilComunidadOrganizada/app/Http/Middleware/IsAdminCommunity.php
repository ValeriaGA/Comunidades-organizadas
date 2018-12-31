<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
use App\Role;

class IsAdminCommunity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! Auth::user() ) return redirect('/login');

        $admin_role = Role::where('name', 'LIKE', 'Administrador de Comunidad')->get();
        $user = User::where('id', $request->user()['id'])->get();
        if ($user[0]->role_id == $admin_role[0]->id) return $next($request);
        else return redirect('/');


        // if (Auth::user() &&  Auth::user()->admin == 1) {
        //     return redirect('/administration');
        // }
        // return redirect('/administration/login');
    }
}
