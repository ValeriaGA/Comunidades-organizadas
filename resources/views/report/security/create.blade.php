@extends('layouts.master')

@section('content')

    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 9.8896299, lng: -84.2203189},
          zoom: 8
        });
        google.maps.event.addListener(map, 'click', function (event) {
            document.getElementById("exampleInputLatitud").value = event.latLng.lat();
            document.getElementById("exampleInputLongitud").value = event.latLng.lng();
        });
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
                            <li class="active">Agregar reporte de seguridad</li>
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
                                        <a data-toggle="tab" href="#details" aria-expanded="true"> <span class="visible-xs"><i class="ti-home"></i></span> <span class="hidden-xs">Detalles</span> </a>
                                    </li>
                                    <li class="tab">
                                        <a data-toggle="tab" href="#involved" aria-expanded="false"> <span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Involucrados</span> </a>
                                    </li>
                                    <li class="tab">
                                        <a data-toggle="tab" href="#communities" aria-expanded="false"> <span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Comunidades</span> </a>
                                    </li>
                                    <li class="tab">
                                        <a aria-expanded="false" data-toggle="tab" href="#evidence"> <span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">Evidencia</span> </a>
                                    </li>
                                </ul>
                                <form class="form-horizontal form-material" action="/seguridad" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="tab-content">

                                        <!-- Details -->

                                        <div id="details" class="tab-pane active">
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

                                        <div id="communities" class="tab-pane">

                                                
                                            <div class="clearfix"></div>
                                        </div>

                                        <!-- Victims & Perpetrators w/ gender-->

                                        <div id="involved" class="tab-pane">
                                            <div class="col-md-6">
                                                <h3>Best Clean Tab ever</h3>
                                                <h4>you can use it with the small code</h4> </div>
                                            <div class="col-md-5 pull-right">
                                                <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <!-- Evidence -->

                                        <div id="evidence" class="tab-pane">
                                            <div class="form-group row">
                                              <label class="col-sm-2 col-form-label" for="exampleInputImage">Evidencia</label>
                                              <div class="col-sm-10">
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


<script type="text/javascript">

  $("select[name='id_country']").change(function(){

      var id_country = $(this).val();

      var token = $("input[name='_token']").val();

      $.ajax({

          url: "<?php echo route('select-ajax') ?>",

          method: 'POST',

          data: {id_country:id_country, _token:token},

          success: function(data) {

            $("select[name='id_state'").html('');

            $("select[name='id_state'").html(data.options);

          }

      });

  });

</script>

@endsection