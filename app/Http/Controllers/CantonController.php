<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Canton;

class CantonController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $cantons = Canton::where('province_id', $request -> input('id'))
                            -> get();

        return \Response::json($cantons ->toJson()); 
    }
}
