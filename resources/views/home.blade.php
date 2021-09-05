<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
   <style>
       #map { height: 500px; }
   </style>
</head>
<body>
    <div id="map" class="col-md-10"></div>
<script>
    
    let marker = [-5.381352767262557, 105.27396798133852]
    var map = L.map('map').setView(marker, 17);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);
let start = L.marker(marker).addTo(map)
        .bindPopup('sdaasld')
        .openPopup();


    map.on('click', function(e) {
        map.removeLayer(start)
        marker = [e.latlng.lat, e.latlng.lng]
        start = L.marker(marker).addTo(map)
            .bindPopup("latitude nya : "+ e.latlng.lat+" <br> longitude nya : "+ e.latlng.lng)
            .openPopup()
        // start = L.marker(marker).addTo(map)
        //     .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
        //     .openPopup()
        // marker = [e.latlng.lat, e.latlng.lng]
        // markers()
    // alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng)
    // console.log(L.marker(marker).removeFrom(map))
        // marker = [e.latlng.lat, e.latlng.lng]
        // console.log(marker)
    });
</script>
</body>
</html>