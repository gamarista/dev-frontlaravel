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
        float: right;
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

      .puntos {
        width: 30px;
        height: 30px;  
        padding: 5px;
        border: 1px solid red;
        box-sizing: border-box;
        border-radius: 50px;
        background: red;
        text-align: center;
        color: white;
        font-weight: bold;
        line-height: 1.9;
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
        <strong>Routes Results</strong>
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
        var labels = ['B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q'];
        var o = '[{!!$origin!!}]';
        var d = '[{!!$dest!!}]'; 
        var checkboxArray = waypoints;
        var xtime = 0;
        for (var i = 0; i < waypoints.length; i++) {
            waypts.push({
              location: waypoints[i],
              stopover: true
            });
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
            var endroute=route.legs.length-1;
            var totaltime=0;
            var totaldist=0;
            // For each route, display summary information.
            for (var i = 0; i < route.legs.length; i++) {
              totaldist = totaldist + route.legs[i].distance.value;
              totaltime = totaltime + route.legs[i].duration.value;
              var routeSegment = i + 1;

              summaryPanel.innerHTML += "<span class='puntos'>"+labels[i]+'</span><b> Route Segment: ' + routeSegment;

              if(i===0){
                summaryPanel.innerHTML += '</b><br><b>Patient: </b>' + patients[i] + '<br><b>Start address:</b> ';      
                summaryPanel.innerHTML += route.legs[i].start_address + '<br><br>';
              } else if(i===endroute) {
                summaryPanel.innerHTML += '<br><b>Central Medical address:</b> ';      
                summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
                summaryPanel.innerHTML += '<b>Distance:</b> ' + route.legs[i].distance.text + '<br>';
                summaryPanel.innerHTML += '<b>Duration:</b> ' + route.legs[i].duration.text + '<br>';
                summaryPanel.innerHTML += '<b>Total route time:</b> '+ (totaltime/60).toFixed(2) + ' min<br>';
                summaryPanel.innerHTML += '<b>Total route distance:</b> '+ (totaldist/1609).toFixed(2) + ' mi';
              }
               else {
                summaryPanel.innerHTML += '</b><br><b>Patient: </b>' + patients[i] + '<br><b>From:</b> ';    
                summaryPanel.innerHTML += route.legs[i].start_address + '<br><b>To:</b> ';
                summaryPanel.innerHTML += route.legs[i].end_address + '<br><b>Distance:</b> ';
                summaryPanel.innerHTML += route.legs[i].distance.text + '<br><b>Duration:</b> ';
                summaryPanel.innerHTML += route.legs[i].duration.text + '<br><br>';
              }   
            }
            //document.getElementById('output').innerHTML = '<h3>Total distance: '+xtime+'</h3>';
            document.getElementById('output').innerHTML = '<h2>ROUTE DATE: {!!$fecha!!} | BEG TIME: {!!$horaini!!} | END TIME: {!!$horaend!!}<br>Origin : '+o+'<br> Destination : '+d+'<br></h2>';
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