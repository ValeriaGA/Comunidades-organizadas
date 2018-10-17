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
          dict['url'] = iconBase + type['image_path'];
          dict['size'] = new google.maps.Size(30, 38);
          dict['origin'] = new google.maps.Point(0, 0);
          dict['anchor'] = new google.maps.Point(15, 38);

          icons[type['id']] = dict;
        });

        var incidents = {!! json_encode($incidents->toArray()) !!};

        var features = [];
        incidents.forEach(function(incident) {
          var dict = {};

          dict['position'] = new google.maps.LatLng(incident['latitud'], incident['longitud']);
          dict['type'] = incident['type_id'];

          features.push(dict);
        });

          var contentString = '<div id="content">'+
              '<div id="siteNotice">'+
              '</div>'+
              '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
              '<div id="bodyContent">'+
              '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
              'sandstone rock formation in the southern part of the '+
              'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
              'south west of the nearest large town, Alice Springs; 450&#160;km '+
              '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
              'features of the Uluru - Kata Tjuta National Park. Uluru is '+
              'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
              'Aboriginal people of the area. It has many springs, waterholes, '+
              'rock caves and ancient paintings. Uluru is listed as a World '+
              'Heritage Site.</p>'+
              '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
              'https://en.wikipedia.org/w/index.php?title=Uluru</a> '+
              '(last visited June 22, 2009).</p>'+
              '</div>'+
              '</div>';

          var infowindow = new google.maps.InfoWindow({
            content: contentString
          });


        // Create markers.
        features.forEach(function(feature) {
          var marker = new google.maps.Marker({
            position: feature.position,
            icon: icons[feature.type],
            map: map
          });

          marker.addListener('click', function() {
            infowindow.open(map, marker);
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
                            <button type='submit' onclick="window.location.href='/incident/create'" class="btn btn-success">Agregar incidente</button>
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
                        <h3 class="box-title">Numero de Incidentes</h3> 
                        <h4 class="counter text-success" title="incidentes">{{ count($incidents) }}</h4>
                      </div>
                  </div>
                  <form action="/search" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-sm-2">
                        <div class="white-box">
                          <h3 class="box-title">Filtrar Por Tipo</h3>
                                @foreach ($types as $type)
                                  <input type="checkbox" name="{{$type->name}}" value="{{$type->name}}" checked> {{$type->name}}<br>
                                @endforeach
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="white-box">
                          <h3 class="box-title">Filtrar Por Fecha</h3>
                                <input id="date" type="date" placeholder="" class="form-control form-control-line" name="date" value="{{$date}}" required>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="white-box">
                          <h3 class="box-title">Filtrar Por Sexo</h3>
                                <select class="form-control" name="sex" required>
                                  <option value="Masculino">Masculino</option>
                                  <option value="Femenino">Femenino</option>
                                </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="white-box">
                          <h3 class="box-title">Filtrar Por Lugar</h3> 
                                <input id="location" type="text" placeholder="" class="form-control form-control-line" name="location" required>
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