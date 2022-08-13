@extends('layouts.app')
@section('content')


    <div id="map" style="height: 80%;width: 100%;"></div>
  <footer class="py-4 bg-dark mt-auto">
    <div class="container-fluid px-4">
      <div class="d-flex align-items-left justify-content-between small">
        <form  method="POST" action="{{route('mapsrouteoneride')}}" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                   @csrf
                <div class="input-group">
                    <select class="form-control" id="iddriver" name="iddriver" onchange="">
                      <option value='0' selected>All Drivers...</option>
                      @foreach($drivers as $driver)
                       <option  value='{{$driver->Id}}'>{{$driver->Driver}}</option>  
                      @endforeach 
                    </select>
                    <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
                    <button class="btn btn-success" id="btnNavbarRefresh" type="submit"><i class="fas fa-sync-alt"></i></button>{{$namedriver}}
                    <a href="{{route('tripsplanner')}}" type="button"  class="btn btn-primary"><i class="fa-solid fa-square-left"> Back</i></a> 
                </div>
        </form>
      </div>
      <div class="d-flex align-items-left justify-content-between small">
            <div class="text-muted">Copyright SACS 2021</div>
      </div>
    </div>
  </footer>  
    
@endsection  

<script type="text/javascript">
    let map;
    let infoWindow;
   
    function initMap() {
      
      var waypoints=[{!!$dirname!!}]; 
      var patientname=[{!!$strname!!}];
      var latitude=[{!!$latorig!!}];
      var longitude=[{!!$lngorig!!}];
      var xlat = {!!$xlat!!}
      var xlng = {!!$xlng!!}
      //var imagen="http://localhost/sacsweb/public/img/male-red.png";
      //const myLatLng = { lat: 25.8918, lng: -80.2511 };
      const myLatLng = { lat: xlat, lng: xlng };
      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        center: myLatLng
      });

      const styles = {
        default: [],
        hide: [
          {
            featureType: "poi.business",
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

      for (var i = 0; i < waypoints.length-1; i++) {
         var xDir = waypoints[i]
         var namepat= patientname[i]

         new google.maps.Marker({
            position:  new google.maps.LatLng(latitude[i], longitude[i]),
            icon: {
              strokeColor: "#FF0000",
              strokeOpacity: 0.8,
              strokeWeight: 2,
              fillColor: "#FF0000",
              fillOpacity: 0.35,
              path: google.maps.SymbolPath.CIRCLE,
              scale: 6,
            },
            draggable: false,
            map: map,
          });
          namepat=""
        }
         xlat=latitude[i+1];
         xlng=longitude[i+1];        
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
 }  

 function loadScript() {
  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBR07z3N-U3Q1LfY_WaVDK7XDGVNGzu2Qk&callback=initMap";
  document.body.appendChild(script);
}

window.onload = loadScript;  
</script>


