<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script src='{{Request::root()}}/assets/leaflet/leaflet.js' type="text/javascript"></script>
    <script src='{{Request::root()}}/assets/leaflet/leaflet-src.esm.js' type="text/javascript"></script>
    <script src='{{Request::root()}}/assets/leaflet/leaflet-src.js' type="text/javascript"></script>
    <link href='{{Request::root()}}/assets/leaflet/leaflet.css' rel='stylesheet' />

    <script src="{{Request::root()}}/assets/leaflet/routing/dist/leaflet-routing-machine.js"></script>
    <link rel="stylesheet" href="{{Request::root()}}/assets/leaflet/routing/dist/leaflet-routing-machine.css" /> 
   
  </head>
  <body>
    <div id="map"></div>
    <script>
//var map = L.map('map').setView([7.825877, -72.204790], 13);
var map = L.map('map', {
    center: [{!!$origen!!}],
    zoom: 4
});

//var redIcon = new LeafIcon({iconUrl: 'assets/leaflet/images/marker-icon.png'});

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.Routing.control({
  waypoints: [
    L.latLng([{!!$origen!!}]),
    L.latLng([{!!$destino!!}])
  ]
}).addTo(map);
//Dibujar un punto en el mapa
/*L.marker([7.825877, -72.204790]).addTo(map)
    .bindPopup('xxx')
    .openPopup();      
/*
//Dibujar un area roja
var circle = L.circle([7.825870, -72.204780], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 500
}).addTo(map);*/
//
/*
//Marcar punto
var greenIcon = L.icon({
    iconUrl: '../assets/leaflet/images/marker-icon.png',
    shadowUrl: '../assets/leaflet/images/marker-icon.png',

    iconSize:     [25, 41], // size of the icon
    shadowSize:   [25, 41], // size of the shadow
    iconAnchor:   [25, 41], // point of the icon which will correspond to marker's location
    shadowAnchor: [25, 41],  // the same for the shadow
    popupAnchor:  [-1, -1] // point from which the popup should open relative to the iconAnchor
});
*/
//L.marker([7.818487, -72.177773], {icon: greenIcon}).addTo(map);

//otra forma de marcar
//L.marker([7.819167, -72.211418], {icon: redIcon}).addTo(map).bindPopup("Yonny.");



//Evento al hacer Click
/*function onMapClick(e) {
    alert("You clicked the map at " + e.latlng);
}
map.on('click', onMapClick);
//*/
    </script>
  </body>
</html>