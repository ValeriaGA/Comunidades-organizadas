@extends('layouts.master')

@section('js')
    <!-- FILE INPUT -->
    <script src="{{ asset('js/fileinput.js') }}"></script>

    <!-- PROVINCES -->
    <script src="{{ asset('js/comboBoxControl.js') }}"></script>

    <script src="{{ asset('js/createReportTable.js') }}"></script>
    <!-- TABS -->
     <script src="{{ asset('js/reportTabs.js') }}"></script>
@endsection

@section('content')

    <script>
      var map;
      var marker;
        function initMap() {

            var myLatLng = {lat: {!! $report->latitud !!}, lng: {!! $report->longitud !!}};

            map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: 9.8896299, lng: -84.2203189},
              zoom: 8
            });

            marker = new google.maps.Marker({
              position: myLatLng,
              map: map
            });

            google.maps.event.addListener(map, 'click', function (event) {
                document.getElementById("InputLatitud").value = event.latLng.lat();
                document.getElementById("InputLongitud").value = event.latLng.lng();
                if (marker && marker.setMap) {
                    marker.setMap(null);
                }
                placeMarker(event.latLng, map);
            });
        }

        function placeMarker(position, map) {
            marker = new google.maps.Marker({
                position: position,
                map: map
            });
            map.panTo(position);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEPYKB-N0arXC7NY0HKivs9_hdOHnDXiA&callback=initMap"
    async defer>
    </script>

<div id="page-wrapper">

    @include ('layouts.errors')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">@yield ('page-title')</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="/">Inicio</a></li>
                    <li class="active">@yield ('page-desc')</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="white-box">
                    <div id="map" style="width: 100%; height: 480px"></div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="white-box">
                    <div class="vtabs customvtab" style="width: 100%;">
                        <ul class="nav tabs-vertical">
                            <li id="li_tab1" class="tab active">
                                <a data-toggle="tab" href="#tab1" aria-expanded="true"> <span class="visible-xs"><i class="fa fa-home fa-fw"></i></span> <span class="hidden-xs">Administrativas</span> </a>
                            </li>
                            <li id="li_tab2" class="tab">
                                <a data-toggle="tab" href="#tab2" aria-expanded="true"> <span class="visible-xs"><i class="fa fa-cog fa-fw"></i></span> <span class="hidden-xs">Detalles</span> </a>
                            </li>
                            <li id="li_tab3" class="tab">
                                <a data-toggle="tab" href="#tab3" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-globe fa-fw"></i></span> <span class="hidden-xs">Comunidades</span> </a>
                            </li>
                            @yield ('tabs')
                            <li id="li_tabN" class="tab">
                                <a aria-expanded="false" data-toggle="tab" href="#tabN"> <span class="visible-xs"><i class="fa fa-legal fa-fw"></i></span> <span class="hidden-xs">Evidencia</span> </a>
                            </li>
                        </ul>
                        <form class="form-horizontal form-material" action="@yield ('form')/{{ $report->id }}" method="post" enctype="multipart/form-data">
                        @method('PATCH')

                        @csrf
                            <div class="tab-content" style="width: 800px;">

                                <!-- Settings -->

                                <div id="tab1" class="tab-pane active">

                                    @include ('report.layouts.progress_bar', ['progress' => 0])

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            @if ($report->active == TRUE)
                                                <div class="checkbox checkbox-success checkbox-circle">
                                                  <input id="active-cb" type="checkbox" name="active" checked>
                                                  <label for="active-cb"> Activo </label>
                                                </div>
                                            @else
                                                <div class="checkbox checkbox-success checkbox-circle">
                                                  <input id="active-cb" type="checkbox" name="active">
                                                  <label for="active-cb"> Activo </label>
                                                </div>
                                            @endif
                                            <small class="text-danger">Publicaciones desactivadas no seran visibles por otros usuarios. Aún podrán ser accesadas desde su perfil.</small>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-primary" style="width: 100%;" value="2" onclick="nextTab(this)">Siguiente</button>
                                    </div>
                                </div>

                                <!-- Details -->

                                <div id="tab2" class="tab-pane">

                                    @include ('report.layouts.progress_bar', ['progress' => 5])

                                    <div class="form-group">
                                        <label class="col-md-12">Título de publicación</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="" class="form-control form-control-line" name="title" value="{{ $report->title }}" required> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Tipo de reporte de servicio</label>
                                        <div class="col-md-12">
                                            <select class="form-control" name="type" required>
                                              @foreach ($categories as $cat)
                                                @if ($report->sub_cat_report_id == $cat->id)
                                                    <option value="{{$cat->name}}" selected>{{$cat->name}}</option>
                                                @else
                                                    <option value="{{$cat->name}}">{{$cat->name}}</option>
                                                @endif
                                              @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="date">Fecha</label>
                                        <div class="col-md-12">
                                            <input id="date" type="date" placeholder="" class="form-control form-control-line" name="date" value="{{$report->date}}" required> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="time">Hora</label>
                                        <div class="col-md-12">
                                            <input id="time" type="time" placeholder="" class="form-control form-control-line" name="time" value="{{$report->time}}" required> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="InputLongitud">Longitud</label>
                                        <div class="col-md-12">
                                            <input id="InputLongitud" type="decimal" placeholder="" class="form-control form-control-line" name="longitud" value="{{$report->longitud}}" required> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="InputLatitud">Latitud</label>
                                        <div class="col-md-12">
                                            <input id="InputLatitud" type="decimal" placeholder="" class="form-control form-control-line" name="latitud" value="{{$report->latitud}}" required> </div>
                                    </div>
                                    @yield ('details')
                                    <div class="form-group">
                                        <label class="col-md-12" for="exampleInputDescription">Descripción</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" class="form-control form-control-line" name="description" placeholder="Ingrese el relato de los sucesos, especificación del medio de transporte (placa, modelo/marca de carro), pertenencias perdidas, entre otros detalles pertinentes al incidente." required>{{$report->description}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-primary" style="width: 100%;" value="3" onclick="nextTab(this)">Siguiente</button>
                                    </div>
                                </div>

                                <!-- Communities -->


                                <div id="tab3" class="tab-pane">

                                    @include ('report.layouts.progress_bar', ['progress' => 55])
                                    
                                    <div class="form-group">
                                        <label class="col-md-12">Provincia</label>
                                        <div class="col-md-12">
                                            <select name="province" id="provinces" class="form-control dynamic" data-dependent="cantons">
                                                @foreach($provinces as $province)
                                                  <option value="{{ $province->id}}" {{ $report->communityGroup->community[0]->district->canton->province_id == $province->id ? 'selected' : '' }}>{{ $province->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Cantón</label>
                                        <div class="col-md-12">
                                            <select name="canton" id="cantons" class="form-control dynamic" data-dependent="districts">
                                                @foreach($cantons as $canton)
                                                  <option value="{{ $canton->id}}" {{ $report->communityGroup->community[0]->district->canton_id == $canton->id ? 'selected' : '' }}>{{ $canton->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Distrito</label>
                                        <div class="col-md-12">
                                            <select name="district" id="districts" class="form-control dynamic" data-dependent="communities">
                                                @foreach($districts as $district)
                                                  <option value="{{ $district->id}}" {{ $report->communityGroup->community[0]->district_id == $district->id ? 'selected' : '' }}>{{ $district->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Comunidad</label>
                                        <div class="col-md-12">
                                            <select name="community" id="communities" class="form-control" data-dependent="community_groups">
                                                @foreach($report->communityGroup->community[0]->district->community as $community)
                                                  <option value="{{$community->id}}" {{ in_array($community->id, $current_communities_id) ? 'selected' : '' }}>{{$community->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Grupos de Comunidades</label>
                                        <div class="col-md-12">
                                            <select name="community_group" id="community_groups" class="form-control">
                                                @foreach($communityGroups as $group)
                                                  <option value="{{ $group->id}}" {{ $report->community_group_id == $group->id ? 'selected' : '' }}>{{ $group->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                        
                                    <div class="clearfix"></div>

                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-primary" style="width: 100%;" value="4" onclick="nextTab(this)">Siguiente</button>
                                    </div>
                                </div>

                                @yield ('tab-content')

                                <!-- Evidence -->

                                <div id="tabN" class="tab-pane">

                                    @include ('report.layouts.progress_bar', ['progress' => 100])

                                    <div class="col-md-12">
                                        <label style="margin-left: 10px;">Cantidad Máxima de Archivos Permitidos: </label>
                                        <ul style="list-style-type:none">
                                            <li>3</li>
                                        </ul>
                                    </div>

                                    <div class="col-md-12">
                                        <label style="margin-left: 10px;">Tipo de Archivos Permitidos</label>
                                        <ul style="list-style-type:none">
                                            @foreach($cat_evidence as $cat)
                                                <li>{{$cat->name}}</li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="margin-left: 10px;">Evidencia</label>
                                            <a href="#" class="btn btn-default btn-sm pull-right" id="add-evidence"><span class="fa fa-plus"></span></a>
                                            <hr />
                                            <div class="evidence-item row form-group">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <button class="btn btn-primary" style="width: 100%;">Finalizar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com </footer> 
</div>
@endsection