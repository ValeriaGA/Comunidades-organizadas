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
        <!-- <script>
      function initMap() {
        var myLatLng = {lat:9.934739, lng: -84.087502};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });
      }
    </script> -->
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: new google.maps.LatLng(-33.91722, 151.23064),
          mapTypeId: 'roadmap'
        });
        // var types = {!! json_encode($types->toArray()) !!};

        var iconBase = '/plugins/images/icons/';

        var icons = {
          assault: {
            name: 'Asalto',
            icon: iconBase + 'assault_small.png'
          },
          autotheft: {
            name: 'Robo de Autos',
            icon: iconBase + 'autotheft_small.png'
          },
          burglary: {
            name: 'Robo',
            icon: iconBase + 'burglary_small.png'
          },
          drugs: {
            name: 'Drogas',
            icon: iconBase + 'drugs_small.png'
          },
          homicide: {
            name: 'Homicidio',
            icon: iconBase + 'homicide_small.png'
          },
          other: {
            name: 'Otro',
            icon: iconBase + 'other_small.png'
          },
          shoplifting: {
            name: 'Robo de Tienda',
            icon: iconBase + 'shoplifting_small.png'
          },
          suspactivity: {
            name: 'Actividades Sospechosas',
            icon: iconBase + 'suspactivity_small.png'
          },
          vandalism: {
            name: 'Vandalismo',
            icon: iconBase + 'vandalism_small.png'
          }
        };

        var features = [
          {
            position: new google.maps.LatLng(-33.91721, 151.22630),
            type: 'assault'
          }, {
            position: new google.maps.LatLng(-33.91539, 151.22820),
            type: 'autotheft'
          }, {
            position: new google.maps.LatLng(-33.91747, 151.22912),
            type: 'burglary'
          }, {
            position: new google.maps.LatLng(-33.91910, 151.22907),
            type: 'drugs'
          }, {
            position: new google.maps.LatLng(-33.91725, 151.23011),
            type: 'homicide'
          }, {
            position: new google.maps.LatLng(-33.91872, 151.23089),
            type: 'shoplifting'
          }, {
            position: new google.maps.LatLng(-33.91784, 151.23094),
            type: 'suspactivity'
          }, {
            position: new google.maps.LatLng(-33.91682, 151.23149),
            type: 'vandalism'
          }, {
            position: new google.maps.LatLng(-33.91790, 151.23463),
            type: 'assault'
          }, {
            position: new google.maps.LatLng(-33.91666, 151.23468),
            type: 'autotheft'
          }, {
            position: new google.maps.LatLng(-33.916988, 151.233640),
            type: 'burglary'
          }, {
            position: new google.maps.LatLng(-33.91662347903106, 151.22879464019775),
            type: 'drugs'
          }, {
            position: new google.maps.LatLng(-33.916365282092855, 151.22937399734496),
            type: 'homicide'
          }, {
            position: new google.maps.LatLng(-33.91665018901448, 151.2282474695587),
            type: 'shoplifting'
          }, {
            position: new google.maps.LatLng(-33.919543720969806, 151.23112279762267),
            type: 'suspactivity'
          }, {
            position: new google.maps.LatLng(-33.91608037421864, 151.23288232673644),
            type: 'vandalism'
          }, {
            position: new google.maps.LatLng(-33.91851096391805, 151.2344058214569),
            type: 'assault'
          }, {
            position: new google.maps.LatLng(-33.91818154739766, 151.2346203981781),
            type: 'autotheft'
          }, {
            position: new google.maps.LatLng(-33.91727341958453, 151.23348314155578),
            type: 'burglary'
          }
        ];

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
            icon: icons[feature.type].icon,
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
          var icon = type.icon;
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
                        <h3 class="box-title">Filtrar Por Tipo</h3> 
                          <form action="/action_page.php">
                              @foreach ($types as $type)
                                <input type="checkbox" name="{{$type->name}}" value="{{$type->name}}"> {{$type->name}}<br>
                              @endforeach
                          </form>
                      </div>
                  </div>
                  <div class="col-sm-2">
                      <div class="white-box">
                        <h3 class="box-title">Filtrar Por Fecha</h3> 
                          <form action="/action_page.php">
                              <input id="date" type="date" placeholder="" class="form-control form-control-line" name="date" value="{{$date}}" required>
                          </form>
                      </div>
                  </div>
                  <div class="col-sm-2">
                      <div class="white-box">
                        <h3 class="box-title">Filtrar Por Sexo</h3> 
                          <form action="/action_page.php">
                              <select class="form-control" name="sex" required>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                              </select>
                          </form>
                      </div>
                  </div>
                  <div class="col-sm-2">
                      <div class="white-box">
                        <h3 class="box-title">Filtrar Por Lugar</h3> 
                          <form action="/action_page.php">
                              <input id="location" type="text" placeholder="" class="form-control form-control-line" name="location" required>
                          </form>
                      </div>
                  </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com </footer>
        </div>

@endsection