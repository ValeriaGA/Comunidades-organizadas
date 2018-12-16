@extends('statistics.master')


@section('stats_content')
    <input type="hidden" id="mapLocation" value="{{ asset('json')}}">
    <div class="row">
        <div class="col-md-10">
            <div id="chartdiv"></div>
        </div>
    </div>
    
@endsection