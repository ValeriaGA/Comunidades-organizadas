@extends('layouts.master')

@section('content')
<style>
            #legend {
            font-family: Arial, sans-serif;
            background: #fff;
            padding: 0px;
            margin: 0px;
          }
        </style>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: new google.maps.LatLng(9.8896299, -84.2203189),
          mapTypeId: 'roadmap'
        });
        
        var types = {!! json_encode($types->toArray()) !!};
        // alert(types.toSource());


        var iconBase = '/plugins/images/icons/';

        var icons = {};

        types.forEach(function(type) {
          var dict = {};

          dict['name'] = type['name'];
          dict['url'] = iconBase + type['multimedia_path'];
          dict['size'] = new google.maps.Size(30, 38);
          dict['origin'] = new google.maps.Point(0, 0);
          dict['anchor'] = new google.maps.Point(15, 38);

          icons[type['id']] = dict;
        });

        var reports = {!! json_encode($reports->toArray()) !!};

        var contentStrings = [];

        var features = [];
        var i = 0;
        reports.forEach(function(report) {
          var dict = {};

          dict['position'] = new google.maps.LatLng(report['latitud'], report['longitud']);
          dict['type'] = report['sub_cat_report_id'];
          dict['id'] = i++;
          features.push(dict);

          var content = '<div id="content">'+
              '<div id="siteNotice">'+
              '</div>'+
              '<h1 id="firstHeading" class="firstHeading">'+ icons[report['sub_cat_report_id']]['name'] +'</h1>'+
              '<div id="bodyContent">'+
              '<p><b>Fecha y Hora:</b> '+ report['date'] + ' ' + 
              report['time'] + ' </p>' +
              '<p><b>Descripcion:</b> '+ report['description'] +'</p>'+
              '</div>'+
              '</div>';
          contentStrings.push(content);
        });

        var infowindows = [];

        contentStrings.forEach(function(cz) {
          var infowindow = new google.maps.InfoWindow({
            content: cz
          });
          infowindows.push(infowindow);
        });

        // Create markers.
        features.forEach(function(feature) {
          var marker = new google.maps.Marker({
            position: feature.position,
            icon: icons[feature.type],
            map: map
          });

          marker.addListener('click', function() {
            infowindows[ feature.id ].open(map, marker);
          });

        });

        var legend = document.getElementById('legend');
        for (var key in icons) {
          var type = icons[key];
          var name = type.name;
          var icon = type.url;
          var div = document.createElement('div');
          div.innerHTML = '<img src="' + icon + '"> ' + name;
          legend.appendChild(div);
        }

        // map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);

      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEPYKB-N0arXC7NY0HKivs9_hdOHnDXiA&callback=initMap">
    </script>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Búsqueda</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="/">Inicio</a></li>
                            <li class="active">Búsqueda</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                @auth
                <!-- row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <button type='submit' onclick="window.location.href='/reporte'" class="btn btn-success">Agregar reporte</button>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                @endauth
                <div class="row">
                  <div class="col-sm-2">
                      <div class="white-box">
                        <p class="box-title"><a class="btn btn-primary" data-toggle="collapse" href="#collapseLegend" role="button" aria-expanded="false" aria-controls="collapseLegend">Leyenda</a></p>
                        <div class="collapse in" id="collapseLegend">
                          <div class="card card-body" id="legend">
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="col-sm-10">
                      <div class="white-box">
                          <!-- <h3 class="box-title">Map</h3> -->
                          <!-- <div id="gmaps-simple" class="gmaps"></div> -->
                          <div id="map" style="width: 100%; height: 480px"></div>
                      </div>
                  </div>
                  <div class="col-sm-2">
                      <div class="white-box">
                        <h3 class="box-title">Numero de Reportes</h3> 
                        <h4 class="counter text-success" title="incidentes">{{ count($reports) }}</h4>
                      </div>
                  </div>
                  <form action="/search" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-sm-2">
                        <div class="white-box">
                          <h3 class="box-title">Filtrar Por Tipo</h3>
                                @foreach ($types as $type)
                                  @if (in_array($type->id, $type_ids))
                                  <div class="checkbox checkbox-success checkbox-circle">
                                      <input id="checkbox-{{$type->id}}" type="checkbox" name="{{$type->id}}" value="{{$type->name}}" checked>
                                      <label for="checkbox-{{$type->id}}"> {{$type->name}} </label>
                                  </div>
                                    <!-- <input type="checkbox" name="{{$type->id}}" value="{{$type->name}}" checked> {{$type->name}}<br> -->
                                  @else
                                    <div class="checkbox checkbox-success checkbox-circle">
                                        <input id="checkbox-{{$type->id}}" type="checkbox" name="{{$type->id}}" value="{{$type->name}}">
                                        <label for="checkbox-{{$type->id}}"> {{$type->name}} </label>
                                    </div>
                                    <!-- <input type="checkbox" name="{{$type->id}}" value="{{$type->name}}" > {{$type->name}}<br> -->
                                  @endif
                                @endforeach
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="white-box">
                          <h3 class="box-title">Filtrar Por Fecha</h3>
                                <input id="date" type="date" placeholder="" class="form-control form-control-line" name="date" value="{{$date}}">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="white-box">
                          <h3 class="box-title">Filtrar Por Sexo</h3>
                                <select class="form-control" name="sex">
                                  <option value="Ambos">Ambos</option>
                                  <option value="Masculino">Masculino</option>
                                  <option value="Femenino">Femenino</option>
                                  <option value="Otro">Otro</option>
                                </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="white-box">
                          <h3 class="box-title">Filtrar Por Comunidad</h3>

                          <label class="col-md-12">Provincia</label>
                          <select name="province" id="provinces" class="form-control dynamic" data-dependent="cantons">
                              <option value="">Provincia</option>
                          </select>

                          <label class="col-md-12">Canton</label>
                          <select name="canton" id="cantons" class="form-control dynamic" data-dependent="districts">
                              <option value="">Canton</option>
                          </select>

                          <label class="col-md-12">Distrito</label>
                          <select name="district" id="districts" class="form-control dynamic" data-dependent="communities">
                              <option value="">Distrito</option>
                          </select>

                          <label class="col-md-12">Comunidad</label>
                          <select name="community" id="communities" class="form-control" data-dependent="community_groups">
                              <option value="">Comunidad</option>
                          </select>
                          
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="white-box">
                                <button class="btn btn-success">Filtrar</button>
                        </div>
                    </div>
                  </form>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com </footer>
        </div>

@endsection