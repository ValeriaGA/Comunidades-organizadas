<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;

class DistrictController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $districts = District::where('canton_id', $request -> input('id'))
        -> get();
        return \Response::json($districts ->toJson()); 
    }
}
