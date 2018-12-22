@extends('layouts.master')

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
                <h4 class="page-title">Reporte Seguridad</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="/">Inicio</a></li>
                    <li class="active">Editar reporte de seguridad</li>
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
                            <li class="tab active">
                                <a data-toggle="tab" href="#settings_tab" aria-expanded="true"> <span class="visible-xs"><i class="fa fa-home fa-fw"></i></span> <span class="hidden-xs">Administrativas</span> </a>
                            </li>
                            <li class="tab">
                                <a data-toggle="tab" href="#details_tab" aria-expanded="true"> <span class="visible-xs"><i class="fa fa-cog fa-fw"></i></span> <span class="hidden-xs">Detalles</span> </a>
                            </li>
                            <li class="tab">
                                <a data-toggle="tab" href="#involved_tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-group fa-fw"></i></span> <span class="hidden-xs">Involucrados</span> </a>
                            </li>
                            <li class="tab">
                                <a data-toggle="tab" href="#communities_tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-globe fa-fw"></i></span> <span class="hidden-xs">Comunidades</span> </a>
                            </li>
                            <li class="tab">
                                <a aria-expanded="false" data-toggle="tab" href="#evidence_tab"> <span class="visible-xs"><i class="fa fa-legal fa-fw"></i></span> <span class="hidden-xs">Evidencia</span> </a>
                            </li>
                        </ul>
                        <form class="form-horizontal form-material" action="/seguridad/update/{{ $report->id }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="tab-content" style="width: 800px;">

                                <!-- Settings -->

                                <div id="settings_tab" class="tab-pane active">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            @if ($report->active == TRUE)
                                                <div class="checkbox checkbox-success checkbox-circle">
                                                  <input id="active-cb" type="checkbox" name="active-cb" checked>
                                                  <label for="active-cb"> Activo </label>
                                                </div>
                                            @else
                                                <div class="checkbox checkbox-success checkbox-circle">
                                                  <input id="active-cb" type="checkbox" name="active-cb">
                                                  <label for="active-cb"> Activo </label>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Estado</label>
                                        <div class="col-md-12">
                                            <select class="form-control" name="states" required>
                                              @foreach ($states as $state)
                                                @if ($report->state_id == $state->id)
                                                  <option value="{{$state->name}}" selected>{{$state->name}}</option>
                                                @else
                                                    <option value="{{$state->name}}">{{$state->name}}</option>
                                                @endif
                                              @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Details -->

                                <div id="details_tab" class="tab-pane">
                                    <div class="form-group">
                                        <label class="col-md-12">Título</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="" class="form-control form-control-line" name="title" value="{{ $report->title }}" required> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Tipo de reporte de seguridad</label>
                                        <div class="col-md-12">
                                            <select class="form-control" name="type" required>
                                              @foreach ($categories_security as $cat)
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
                                    <div class="form-group">
                                        <label class="col-md-12">Tipo de Arma (Si aplica)</label>
                                        <div class="col-md-12">
                                            <select class="form-control" name="weapon" required>
                                              @foreach ($cat_weapon as $weapon)
                                                @if ($report->securityReport->cat_weapon_id == $weapon->id)
                                                    <option value="{{$weapon->name}}" selected="selected">{{$weapon->name}}</option>
                                                @else
                                                    <option value="{{$weapon->name}}">{{$weapon->name}}</option>
                                                @endif
                                              @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Medio de Transporte</label>
                                        <div class="col-md-12">
                                            <select class="form-control" name="transportation" required>
                                              @foreach ($cat_transportation as $transport)
                                                @if ($report->securityReport->cat_transportation_id == $transport->id)
                                                  <option value="{{$transport->name}}" selected="selected">{{$transport->name}}</option>
                                                @else
                                                    <option value="{{$transport->name}}">{{$transport->name}}</option>
                                                @endif
                                              @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" for="exampleInputDescription">Descripción</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" class="form-control form-control-line" name="description" placeholder="Ingrese el relato de los sucesos, especificación del medio de transporte (placa, modelo/marca de carro), pertenencias perdidas, entre otros detalles pertinentes al incidente."required>{{$report->description}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Communities -->

                                <div id="communities_tab" class="tab-pane">
                                    
                                    <div class="form-group">
                                        <label class="col-md-12">Provincia</label>
                                        <div class="col-md-12">
                                            <select name="province" id="provinces" class="form-control dynamic" data-dependent="cantons">
                                                <option value="">Provincia</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Canton</label>
                                        <div class="col-md-12">
                                            <select name="canton" id="cantons" class="form-control dynamic" data-dependent="districts">
                                                <option value="">Canton</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Distrito</label>
                                        <div class="col-md-12">
                                            <select name="district" id="districts" class="form-control dynamic" data-dependent="communities">
                                                <option value="">Distrito</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Comunidad</label>
                                        <div class="col-md-12">
                                            <select name="community" id="communities" class="form-control" data-dependent="community_groups">
                                                <option value="">Comunidad</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Grupos de Comunidades</label>
                                        <div class="col-md-12">
                                            <select name="community_group" id="community_groups" class="form-control">
                                                <option value="">Grupo</option>
                                            </select>
                                        </div>
                                    </div>
                                        
                                    <div class="clearfix"></div>
                                </div>

                                <!-- Victims & Perpetrators w/ gender-->

                                <div id="involved_tab" class="tab-pane">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="margin-left: 10px;">Víctimas</label>
                                            <input type="button" id="add_victim_button" class="btn btn-success btn-rounded pull-right" value="Agregar" />

                                            <br>
                                            <br>
                                                <table id="victim_table" class="table table-bordered" style="width: 100%;">
                                                    <tr class="header">
                                                        <td colspan="2"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Género</strong></td>
                                                        <td><strong>Acción</strong></td>
                                                    </tr>
                                                </table>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="margin-left: 10px;">Perpetradores</label>

                                            <input type="button" id="add_perpetrator_button" class="btn btn-success btn-rounded pull-right" value="Agregar" />

                                            <br>
                                            <br>
                                                <table id="perpetrator_table" class="table table-bordered" style="width: 100%;">
                                                    <tr class="header">
                                                        <td colspan="3"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Género</strong></td>
                                                        <td><strong>Descripción</strong></td>
                                                        <td><strong>Acción</strong></td>
                                                    </tr>
                                                </table>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>

                                <!-- Evidence -->

                                <div id="evidence_tab" class="tab-pane">

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
                                            <input type="button" id="add_evidence_button" class="btn btn-success btn-rounded pull-right" value="Agregar" />

                                            <br>
                                            <br>
                                                <table id="evidence_table" class="table table-bordered" style="width: 100%;">
                                                    <tr class="header">
                                                        <td colspan="2"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Archivo</strong></td>
                                                        <td><strong>Acción</strong></td>
                                                    </tr>
                                                </table>
                                        </div>
                                    </div> 
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-primary" style="width: 100%;">Acceptar</button>
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