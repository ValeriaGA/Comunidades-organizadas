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
                        <h4 class="page-title">Reporte Servicio</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="/">Inicio</a></li>
                            <li class="active">Agregar reporte de servicio</li>
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
                                                <label class="col-md-12">Tipo de reporte de servicio</label>
                                                <div class="col-md-12">
                                                    <select class="form-control" name="type" required>
                                                      @foreach ($categories_service as $cat)
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
                                                <label class="col-md-12" for="exampleInputDescription">Descripción</label>
                                                <div class="col-md-12">
                                                    <textarea id="exampleInputDescription" rows="5" class="form-control form-control-line" name="description" placeholder="Ingrese el relato de los sucesos."required></textarea>
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

                                        <!-- Evidence -->

                                        <div id="evidence_tab" class="tab-pane">
                                            <div class="col-md-6">
                                                <label class="col-sm-2 col-form-label" for="exampleInputImage">Evidencia</label>
                                            </div>
                                            <div class="col-md-5 pull-right">
                                                <input type="file" name="file">
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