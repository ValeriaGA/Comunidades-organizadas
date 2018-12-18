@extends('layouts.master')

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
                document.getElementById("exampleInputLatitud").value = event.latLng.lat();
                document.getElementById("exampleInputLongitud").value = event.latLng.lng();
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
                    <div class="col-md-6">
                        <div class="white-box">
                            <div id="map" style="width: 100%; height: 480px"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="white-box">
                            <div class="vtabs">
                                <ul class="nav tabs-vertical">
                                    <li class="tab active">
                                        <a data-toggle="tab" href="#details_tab" aria-expanded="true"> <span class="visible-xs"><i class="ti-home"></i></span> <span class="hidden-xs">Detalles</span> </a>
                                    </li>
                                    <li class="tab">
                                        <a data-toggle="tab" href="#involved_tab" aria-expanded="false"> <span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Involucrados</span> </a>
                                    </li>
                                    <li class="tab">
                                        <a data-toggle="tab" href="#communities_tab" aria-expanded="false"> <span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Comunidades</span> </a>
                                    </li>
                                    <li class="tab">
                                        <a aria-expanded="false" data-toggle="tab" href="#evidence_tab"> <span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">Evidencia</span> </a>
                                    </li>
                                </ul>
                                <form class="form-horizontal form-material" action="/seguridad" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="tab-content">

                                        <!-- Details -->

                                        <div id="details_tab" class="tab-pane active">
                                            <div class="form-group">
                                                <label class="col-md-12">Tipo de reporte de seguridad</label>
                                                <div class="col-md-12">
                                                    <select class="form-control" name="type" required>
                                                      @foreach ($categories_security as $cat)
                                                        <option value="{{$cat->name}}">{{$cat->name}}</option>
                                                      @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12" for="date">Fecha</label>
                                                <div class="col-md-12">
                                                    <input id="date" type="date" placeholder="" class="form-control form-control-line" name="date" value="{{$date}}" required> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12" for="time">Hora</label>
                                                <div class="col-md-12">
                                                    <input id="time" type="time" placeholder="" class="form-control form-control-line" name="time" value="{{$time}}" required> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12" for="exampleInputLongitud">Longitud</label>
                                                <div class="col-md-12">
                                                    <input id="exampleInputLongitud" type="decimal" placeholder="" class="form-control form-control-line" name="longitud" required> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12" for="exampleInputLatitud">Latitud</label>
                                                <div class="col-md-12">
                                                    <input id="exampleInputLatitud" type="decimal" placeholder="" class="form-control form-control-line" name="latitud" required> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Tipo de Arma (Si aplica)</label>
                                                <div class="col-md-12">
                                                    <select class="form-control" name="weapon" required>
                                                      @foreach ($cat_weapon as $weapon)
                                                        @if ($weapon->name == 'No Aplica')
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
                                                        @if ($transport == 'Sin vehiculo')
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
                                                    <textarea id="exampleInputDescription" rows="5" class="form-control form-control-line" name="description" placeholder="Ingrese el relato de los sucesos, especificación del medio de transporte (placa, modelo/marca de carro), pertenencias perdidas, entre otros detalles pertinentes al incidente."required></textarea>
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
                                            <div class="form-group">
                                                
                                            </div>

                                            <div class="form-group">
                                                <label style="margin-left: 10px;">Víctimas</label>

        
                                                <button style="margin-left: 170px;" id="add_perpetrator_button" class="btn btn-success btn-rounded">Agregar</button>

                                                <br>
                                                <br>
                                                <div class="col-md-4">
                                                    <div class="container">
                                                        <table class="table table-bordered" style="width: 250px;">
                                                            <tr class="header" >
                                                                <td colspan="2">
                                                                    Víctima 1
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Género</strong></td>
                                                                <td><strong>Descripción</strong></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Masculino</td>
                                                                <td>Tatuaje en el hombro</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <button style="margin-left: 75px;" id="remove_perpetrator_button" class="btn btn-danger btn-rounded">Remover</button>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label style="margin-left: 10px;">Perpetradores</label>
    
                                                <button style="margin-left: 125px;" id="add_perpetrator_button" class="btn btn-success btn-rounded">Agregar</button>

                                                <br>
                                                <br>
                                                <div class="col-md-4">
                                                    <div class="container">
                                                        <table class="table table-bordered" style="width: 250px;">
                                                            <tr class="header" >
                                                                <td colspan="2">
                                                                    Perpetrador 1
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Género</strong></td>
                                                                <td><strong>Descripción</strong></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Masculino</td>
                                                                <td>Tatuaje en el hombro</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <button style="margin-left: 75px;" id="remove_perpetrator_button" class="btn btn-danger btn-rounded">Remover</button>
                                                                </td>
                                                            </tr>
                                                            <tr class="header">
                                                                <td colspan="2">
                                                                    Perpetrador 2
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Género</strong></td>
                                                                <td><strong>Descripción</strong></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Femenino</td>
                                                                <td>Pelo Rubio</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <button style="margin-left: 75px;" id="remove_perpetrator_button" class="btn btn-danger btn-rounded">Remover</button>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="clearfix"></div>
                                        </div>

                                        <!-- Evidence -->

                                        <div id="evidence_tab" class="tab-pane">
                                            <!-- <div class="col-md-5 pull-right">
                                                <input type="file" name="file">
                                             </div> -->
                                             <div class="form-group">
                                                <label style="margin-left: 10px;">Evidencia</label>
                                                <button style="margin-left: 125px;" id="add_evidence_button" class="btn btn-success btn-rounded">Agregar</button>
                                     
                                                <br/>
                                                <br/>
                                                <div class="col-md-4">
                                                    <div class="container">
                                                        <table class="table table-bordered" style="width: 250px;">
                                                            <tr class="header" >
                                                                <td colspan="2">
                                                                    Evidencia 1
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Tipo de Evidencia</strong></td>
                                                                <td><strong>Archivo</strong></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Imagen</td>
                                                                <td><img  height="100" width="100"  src="{{ asset('/plugins/images/large/ice_e.jpg') }}" class="all studio" alt="gallery"></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <button id="remove_evidence_button" class="btn btn-danger btn-rounded">Remover</button>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com </footer> 
        </div>

@endsection