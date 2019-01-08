@extends('layout.add')

@section('title', 'Reportes de servicios')   
           
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


<form id="service_report_form" data-ajax="false">

    <label for="title_service">Titulo:</label>
    <input type="text" name="title" id="title_service" value="" placeholder="Titulo" required />               

    <label for="Description_service">Descripción del incidente:</label>
    <textarea name="description" id="description_service" cols="50" rows="100" placeholder="Descripción"></textarea>
    
    <label for="date">Fecha de lo ocurrido:</label>
    <input type="date" name="date" id="date" value="">
    
    <label for="community" class="select">Comunidad:</label>
    <select name="community" id="community" data-native-menu="false">
        <option>Comunidad</option>
        <option value="1">Comunidad 1</option>
        <option value="2">Comunidad 2</option>
        <option value="3">Comunidad 3</option>
        <option value="4">Comunidad 4</option>
    </select>
    
    <label for="state" class="select">Estado de la publicación:</label>
    <select name="state" id="state" data-native-menu="false">
        <option>Estado</option>
        <option value="1">Procesado legalmente</option>
        <option value="2">Aun no procesado legalmente</option>
        <option value="3">En proceso legal</option>
    </select>
    
    <label for="sub_cat_report" class="select">Tipo de servicio:</label>
    <select name="sub_cat_report" id="sub_cat_report" data-native-menu="false">
        <option>Tipo de servicio</option>
        <option value="1">Agua</option>
        <option value="2">Recoleccion de basura</option>
        <option value="3">Electricidad</option>
    </select>
                    
    <label for="exampleInputLongitud">Longitud:</label>
    <input id="exampleInputLongitud" type="text" placeholder="" name="longitud" required>

    <label for="exampleInputLatitud">Latitud:</label>
    <input id="exampleInputLatitud" type="text" placeholder="" name="latitud" required>
    <label for="map">Seleccione un punto en el mapa para guardar la ubicacion exacta (longitud,latitud) del evento.</label><br><br>
    <div id="map" style="width:100%;height:400px;"></div>

    
    <br><br>
    <label for="evidence">Evidencia:</label>
                <input type="file" data-clear-btn="true" name="evidence" id="evidence" value="">

</form>
@endsection       
    