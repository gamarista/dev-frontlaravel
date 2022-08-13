@extends('layouts.app')
@section('content')

  <div id="right-panel">
    <div id="directions-panel"></div>

  </div>
  <div id="map" style="height: 80%;width: 70%;"></div>
  <footer class="py-4 bg-dark mt-auto">
    <div class="container-fluid px-4">
      <div class="d-flex align-items-left justify-content-between small">
       <a href="{{route('genrides')}}" type="button"  class="btn btn-primary"><i class="fa-solid fa-square-left"></i> Back</a> 
      </div>

    </div>
  </footer>  
    
@endsection  

<script type="text/javascript">
  //import { faBus } from "@fortawesome/free-solid-svg-icons";   
  let map;
  let infoWindow;
 

  function initMap() {

  var directionDisplay;
      var directionsService = new google.maps.DirectionsService;
      var directionsRenderer = new google.maps.DirectionsRenderer;     
      var waypoints=[{!!$dirname!!}]; 
      var patientname=[{!!$strname!!}];
      var latitude=[{!!$latorig!!}];
      var longitude=[{!!$lngorig!!}];
      var xlat = {!!$xlat!!}
      var xlng = {!!$xlng!!}

      const myLatLng = { lat: xlat, lng: xlng };
      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        center: myLatLng
      });
        directionsRenderer.setMap(map);

        calculateAndDisplayRoute(directionsService, directionsRenderer);

      const styles = {
        default: [],
        hide: [
          {
            featureType: "poi",
            stylers: [{ visibility: "off" }],
          },
          {
            featureType: "transit",
            elementType: "labels.icon",
            stylers: [{ visibility: "off" }],
          },
        ],
      };

      map.setOptions({ styles: styles["hide"] });

      const infoWindow = new google.maps.InfoWindow();

     
      for (var i = 0; i < waypoints.length; i++) {
         var xDir = waypoints[i]
         var namepat= patientname[i]
         const marker = new google.maps.Marker({
                  position: new google.maps.LatLng(latitude[i], longitude[i]),
                  map: map,
                  title: namepat,
                  label: {
                  text: "\ue530",
                  fontFamily: "Material Icons",
                  color: "#ffffff",
                  fontSize: "18px",
                 },
               });

        marker.addListener("click", () => {
          infoWindow.close();
          infoWindow.setContent(marker.getTitle());
          infoWindow.open(marker.getMap(), marker);
        });     
           namepat=""
        };

      directionsRenderer.setMap(map);
      calculateAndDisplayRoute(directionsService, directionsRenderer);        
  }

  function calculateAndDisplayRoute(directionsService, directionsRenderer) {
        var waypts = [];
        var waypoints =["{!!$addorigen!!}"];
        var o = "{!!$addorigen!!}";
        var d = "{!!$adddest!!}"; 
        var checkboxArray = waypoints;
        var xtime = 0;

        for (var i = 0; i < waypoints.length; i++) {
            waypts.push({
              location: waypoints[i],
              stopover: true
            });
        };
        directionsService.route({
          origin: o,
          destination: d,
          waypoints: waypts,
          optimizeWaypoints: true,
          travelMode: 'DRIVING'
          } , function(response, status) {
           if (status === 'OK') {
            directionsRenderer.setDirections(response);
            const route = response.routes[0];
            const summaryPanel = document.getElementById("directions-panel");

            summaryPanel.innerHTML = "";
            summaryPanel.innerHTML += "<b>Route :</b><br>";
            summaryPanel.innerHTML += "<span class='puntos'>B</span><b> Origin {!!$origin!!}:</b>" + route.legs[0].start_address + "<br>";
            summaryPanel.innerHTML += "<span class='puntos'>C</span><b> Destination {!!$destination!!}:</b>" + route.legs[1].end_address + "<br>";
            summaryPanel.innerHTML += "<b>Distance :</b>" + route.legs[1].distance.text + "<br>";
            summaryPanel.innerHTML += "<b>Time :</b>" + route.legs[1].duration.text + "<br><br>";




           } else {
            alert('Directions request failed due to');
          }
        });
    }


//--------
function createMarker(latlng, label, html, color) {
    var contentString = '<b>'+label+'</b><br>'+html;
    var marker = new google.maps.Marker({
        position: latlng,
        draggable: false, 
        map: map,
        icon:{
          url: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
          size: new google.maps.Size(20, 34)
        },
        icon: 'red', 
        //shape: iconShape,
        title: label,
        zIndex: Math.round(latlng.lat()*-100000)<<5
        });
        marker.myname = label;
        return marker;
}
///-------------


///*********------------
 function loadScript() {
  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBR07z3N-U3Q1LfY_WaVDK7XDGVNGzu2Qk&callback=initMap";
  document.body.appendChild(script);
}

window.onload = loadScript; 
</script>

