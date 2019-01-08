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