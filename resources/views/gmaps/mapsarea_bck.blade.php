@extends('layouts.app')
@section('content')

 

<div class="container">

<div class="card-header">Groups</div>
	<div class="card-body">

    <div id="left-panel" style="float: left;width: 30%;padding-right: 5px">
      <div id="directions-panel" style="margin-top: 10px;background-color: #fff;padding: 10px;height: 70%;">
        <p  style="margin-bottom: 5px; font-size: 12px;">Select a Driver</p>

          <div class="input-group mb-3">
             <select class="form-control" id="timeGen" name="timeGen" onchange="">
               @foreach($drivers as $driver)
                <option value=''>{{$driver->Driver}}</option>
               @endforeach  
             </select>          
            <div class="input-group-append">
               <button class="btn btn-success" type="submit">Go</button>  
            </div>
          </div>
          <br>

  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Point 1</span>
    </div>
    <input type="text" class="form-control" placeholder="lat">
    <input type="text" class="form-control" placeholder="long">
  </div>
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Point 2</span>
    </div>
    <input type="text" class="form-control" placeholder="lat">
    <input type="text" class="form-control" placeholder="long">
  </div>
    <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Point 3</span>
    </div>
    <input type="text" class="form-control" placeholder="lat">
    <input type="text" class="form-control" placeholder="long">
  </div>
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Point 4</span>
    </div>
    <input type="text" class="form-control" placeholder="lat">
    <input type="text" class="form-control" placeholder="long">
  </div>
 <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Color</span>
    </div>
    <input type="color" id="favcolor" name="favcolor" value="#ff0000" style="height: 40px;width: 50px;">
  </div>

  

             <h5>Numr patients on area: ##</h5>
        <div class="btn-group">
          <button type="button" class="btn btn-primary"><i class="fas fa-save"></i></button>
          <button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button>
          <button type="button" class="btn btn-primary"><i class="fas fa-window-close"></i></button>
        </div>             
        </div>
        

       </div>

      <div id="map" style="height: 80%;width: 70%;"></div>
  </div> 
  
</div>  
@endsection  

    <script type="text/javascript" >
    // This example creates a simple polygon representing the Bermuda Triangle.
    // When the user clicks on the polygon an info window opens, showing
    // information about the polygon's coordinates.
    
    let map;
    let infoWindow;

    function initMap() {
       //var waypoints =['19700 NW 44 Ct, Opa Locka, FL, 33055','551 East 49 Street, Hialeah, FL, 330131904','2325 W 60TH St, Hialeah, FL, 33016','551 East 49 Street, Hialeah, 330131904',];
      var waypoints=[{!!$dirname!!}]; 
      var patientname=[{!!$strname!!}];
      var imagen="http://localhost/sacsweb/public/img/male-red.png";
      const myLatLng = { lat: 25.8918, lng: -80.2511 };
      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        center: myLatLng
      });

      console.log('w:'+waypoints.length + '- p:' + patientname.length);
      for (var i = 0; i < waypoints.length; i++) {
         var xDir = waypoints[i]
         var namepat= patientname[i]
         $.get('https://maps.googleapis.com/maps/api/geocode/json?address='+xDir+'&key=AIzaSyAgdrnnl2KTeDDWwXPw_pLwjdEBt7V0qro&callback=initMap', 
             function(data) {
                resultados=data.results[0].geometry.location;
               console.log(resultados);
               new google.maps.Marker({
                  position: resultados,
                  map,
                  title: namepat,
                  label: "",
                  icon: imagen,
               });
           });
        }

    //****
      // Define the LatLng coordinates for the polygon.
      const triangleCoords = [
      //  { lat: 25.8917, lng: -80.3004 },
      //  { lat: 25.9028, lng: -80.1702 },
      //  { lat: 25.8029, lng: -80.1711 },
      //  { lat: 25.8029, lng: -80.3004 }
        { lat: 25.8917, lng: -80.3004 },
        { lat: 25.9028, lng: -80.1702 },
        { lat: 25.8029, lng: -80.1711 },
        { lat: 25.8024, lng: -80.2004 }      
      ];


      // Construct the polygon.
      const bermudaTriangle = new google.maps.Polygon({
        paths: triangleCoords,
        strokeColor: "#FF0000",
        strokeOpacity: 0.8,
        strokeWeight: 3,
        fillColor: "#FF0000",
        fillOpacity: 0.35,
        title: "Yonny",
      });
      bermudaTriangle.setMap(map);
      // Add a listener for the click event.
      bermudaTriangle.addListener("click", showArrays);
      infoWindow = new google.maps.InfoWindow();
    //****

    function showArrays(event) {
      // Since this polygon has only one path, we can call getPath() to return the
      // MVCArray of LatLngs.
      const polygon = this;
      const vertices = polygon.getPath();
      let contentString =
        "<b>Driver:</b><br>" +
        "Robexy Rodriguez<br>" +
        event.latLng.lat() +
        "," +
        event.latLng.lng() +
        "<br>";
      // Iterate over the vertices.
      /*for (let i = 0; i < vertices.getLength(); i++) {
        const xy = vertices.getAt(i);
        contentString +=
          "<br>" + "Coordinate " + i + ":<br>" + xy.lat() + "," + xy.lng();
      }*/
      // Replace the info window's content and position.
      infoWindow.setContent(contentString);
      infoWindow.setPosition(event.latLng);
      infoWindow.open(map);
    }

     }; 


    </script>  
    
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgdrnnl2KTeDDWwXPw_pLwjdEBt7V0qro&callback=initMap">
    </script>  	    

