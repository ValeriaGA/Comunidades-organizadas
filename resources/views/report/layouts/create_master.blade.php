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
            map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: 9.8896299, lng: -84.2203189},
              zoom: 8
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
                    <div class="row">
                        <div id="map" style="width: 100%; height: 480px"></div>
                    </div>
                    <div class="row">
                        <p class="text-muted">
                            Presione dentro del mapa para seleccionar la Latitud y Longitud del formulario.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="white-box">
                    <div class="vtabs customvtab" style="width: 100%;">
                        <ul class="nav tabs-vertical">
                            <li id="li_tab1" class="tab active">
                                <a data-toggle="tab" href="#tab1" aria-expanded="true"> <span class="visible-xs"><i class="fa fa-globe fa-fw"></i></span> <span class="hidden-xs">Comunidades</span> </a>
                            </li>
                            <li id="li_tab2" class="tab">
                                <a data-toggle="tab" href="#tab2" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog fa-fw"></i></span> <span class="hidden-xs">Detalles</span> </a>
                            </li>
                            @yield ('tabs')
                            <li id="li_tabN" class="tab">
                                <a aria-expanded="false" data-toggle="tab" href="#tabN"> <span class="visible-xs"><i class="fa fa-legal fa-fw"></i></span> <span class="hidden-xs">Evidencia</span> </a>
                            </li>
                        </ul>
                        
                        <form class="form-horizontal form-material" action="@yield ('form')" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="tab-content" style="width: 800px;">


                                <!-- Communities -->

                                <div id="tab1" class="tab-pane active">

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="progress">
                                                <div class="progress-bar bg-success " role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0" style="width:0%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-12">Provincia</label>
                                        <div class="col-md-12">
                                            <select name="province" id="provinces" class="form-control dynamic" data-dependent="cantons">
                                                @foreach($provinces as $province)
                                                  <option value="{{ $province->id}}" {{ $activeCommunity->district->canton->province_id == $province->id ? 'selected' : '' }}>{{ $province->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Cantón</label>
                                        <div class="col-md-12">
                                            <select name="canton" id="cantons" class="form-control dynamic" data-dependent="districts">
                                                @foreach($cantons as $canton)
                                                  <option value="{{ $province->id}}" {{ $activeCommunity->district->canton_id == $canton->id ? 'selected' : '' }}>{{ $canton->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Distrito</label>
                                        <div class="col-md-12">
                                            <select name="district" id="districts" class="form-control dynamic" data-dependent="communities">
                                                @foreach($districts as $district)
                                                  <option value="{{ $district->id}}" {{ $activeCommunity->district_id == $district->id ? 'selected' : '' }}>{{ $district->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Comunidad</label>
                                        <div class="col-md-12">
                                            <select name="community" id="communities" class="form-control" data-dependent="community_groups">
                                                @foreach($communities as $community)
                                                  <option value="{{ $community->id}}" {{ $activeCommunity->id == $community->id ? 'selected' : '' }}>{{ $community->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Grupos de Comunidades</label>
                                        <div class="col-md-12">
                                            <select name="community_group" id="community_groups" class="form-control">
                                                @foreach($communityGroups as $group)
                                                  <option value="{{ $group->id}}">{{ $group->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <a href="/comunidades/solicitar-grupo"> ¿No ve su grupo de comunidades? Haga click aquí para solicitarla.</a>
                                        </div>
                                    </div>
                                        
                                    <div class="clearfix"></div>

                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-primary" style="width: 100%;" value="2" onclick="nextTab(this)">Siguiente</button>
                                    </div>
                                </div>
                            
                                <!-- Details -->

                                <div id="tab2" class="tab-pane">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="progress">
                                                <div class="progress-bar bg-success " role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:25%;"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Título de publicación</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="" class="form-control form-control-line" name="title" value="{{ old('title') }}" required> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Tipo</label>
                                        <div class="col-md-12">
                                            <select class="form-control" name="type" required>
                                              @foreach ($categories as $cat)
                                                <option value="{{$cat->name}}" {{ $cat->name == old('type') ? 'selected' : '' }}>{{$cat->name}}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="date">Fecha</label>
                                        <div class="col-md-12">
                                            <input id="date" type="date" placeholder="" class="form-control form-control-line" name="date" value="{{ $errors->any() ? old('date') : $date }}" required> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="time">Hora</label>
                                        <div class="col-md-12">
                                            <input id="time" type="time" placeholder="" class="form-control form-control-line" name="time" value="{{ $errors->any() ? old('time') : $time }}" required> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="InputLongitud">Longitud</label>
                                        <div class="col-md-12">
                                            <input id="InputLongitud" type="decimal" placeholder="" class="form-control form-control-line" name="longitud" value="{{ old('longitud') }}" required> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="InputLatitud">Latitud</label>
                                        <div class="col-md-12">
                                            <input id="InputLatitud" type="decimal" placeholder="" class="form-control form-control-line" name="latitud" value="{{ old('latitud') }}" required> </div>
                                    </div>
                                    @yield ('details')
                                    <div class="form-group">
                                        <label class="col-md-12" for="exampleInputDescription">Descripción</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" class="form-control form-control-line" name="description" placeholder="Ingrese el relato de los sucesos, especificación del medio de transporte (placa, modelo/marca de carro), pertenencias perdidas, entre otros detalles pertinentes al incidente." required>{{ old('description') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-primary" style="width: 100%;" value="3" onclick="nextTab(this)">Siguiente</button>
                                    </div>
                                </div>

                                <!-- Evidence -->

                                <div id="tabN" class="tab-pane">

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="progress">
                                                <div class="progress-bar bg-success " role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%;"></div>
                                            </div>
                                        </div>
                                    </div>

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

                                @yield ('tab-content')

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