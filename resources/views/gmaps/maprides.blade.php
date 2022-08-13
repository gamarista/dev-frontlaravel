<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">

    <title>Distance Matrix Service</title>
    <style>
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
        width: 50%;
      }
      #right-panel {
        float: left;
        width: 48%;
        padding-left: 2%;
      }
      #directions-panel {
        margin-top: 10px;
        background-color: #deefef;
        padding: 10px;
        overflow: scroll;
        height: 500px;
      }      
      #output {
        font-size: 11px;
      }
      img{
        width:30%;}
    </style>
  </head>
  <body>
  
 
    <div id="right-panel">
      <div>
        
      </div>  
      <div>
        <strong>Rides </strong>
      </div>
      <div >
         DRIVER: {{$driver}}
          <div id="output"></div>
      </div>
      
      <div id="directions-panel"></div>
    </div>
    <div id="map"></div>


 <script type="text/javascript">
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsRenderer = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 6,
          center: {lat: 41.85, lng: -87.65}
        });
        directionsRenderer.setMap(map);

        calculateAndDisplayRoute(directionsService, directionsRenderer);
      
      }

      function calculateAndDisplayRoute(directionsService, directionsRenderer) {
        var waypts = [];
        var patients = [{!!$routes!!}];
        var waypoints =[{!!$dirpat!!}];
      
        var o = '[{!!$origin!!}]';
        var d = '[{!!$dest!!}]'; 

        var checkboxArray = waypoints;
        var xtime = 0;
        //document.getElementById('waypoints');
        for (var i = 0; i < waypoints.length; i++) {
         // if (checkboxArray.options[i].selected) {
            waypts.push({
              location: waypoints[i],
              stopover: true
            });
         // }
        }

        directionsService.route({
          origin: o,
          destination: d,
          waypoints: waypts,
          optimizeWaypoints: true,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsRenderer.setDirections(response);
            var route = response.routes[0];
            var summaryPanel = document.getElementById('directions-panel');
            summaryPanel.innerHTML = '';
            // For each route, display summary information.
            for (var i = 0; i < route.legs.length; i++) {
              var routeSegment = i + 1;
              summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
                  '</b><br>Patient: ';
              summaryPanel.innerHTML += patients[i] + '<br>FROM: [';    
              summaryPanel.innerHTML += route.legs[i].start_address + '] TO: [';
              summaryPanel.innerHTML += route.legs[i].end_address + ']<br>Distance: ';
              summaryPanel.innerHTML += route.legs[i].distance.text + '<br>Duration: ';
              summaryPanel.innerHTML += route.legs[i].duration.text + '<br><br>';
              xtime += (route.legs[i].distance.value);
            }
            //document.getElementById('output').innerHTML = '<h3>Total distance: '+xtime+'</h3>';
            document.getElementById('output').innerHTML = '<h2>ROUTE DATE: {!!$fecha!!} | BEG TIME: {!!$horaini!!} END TIME: {!!$horaend!!}<br>Start : '+o+' - Arrival : '+d+'<br></h2>';
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgdrnnl2KTeDDWwXPw_pLwjdEBt7V0qro&callback=initMap">
    </script>
  </body>
</html>    