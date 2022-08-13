@extends('layouts.app')
@section('content')

<div id="style-selector-control" class="map-control">
    <div class="table-responsive">
      <table>
         <tr>
          <td>
            <span style="font-weight: bold;color: black;">Total Patients </span><br>
          </td>
          <td>
            <span style="font-weight: bold;color: black;"><i class="fas fa-male"></i>&nbsp;{{$totalpatient}} </span><br>
          </td>
         </tr>
       @foreach($drivers as $driver)
         <tr>
          <td>
            <span style="font-weight: bold;color: {{$driver->pcolor}};"><i class="fas fa-car"></i>{{$driver->Driver}} </span><br>
          </td>
          <td>
            <span style="font-weight: bold;color: {{$driver->pcolor}};"><i class="fas fa-male"></i>&nbsp;{{$driver->nPAtients}} </span><br>
          </td>
         </tr>
       @endforeach
         <tr>
          <td>
            <span style="font-weight: bold;color: gray;">Total not Assigned </span><br>
          </td>
          <td>
            <span style="font-weight: bold;color: gray;"><i class="fas fa-male"></i>&nbsp;{{$totalpatient-$totald}} </span><br>
          </td>
         </tr>         
      </table>
    </div>
 </div>  

    <div id="left-panel" style="float: left;width: 20%;padding-right: 5px">
      <div id="directions-panel" style="margin-top: 10px;background-color: #fff;padding: 10px;height: 85%;">
         <label style="margin-bottom: 5px;"  for="idDriver">Select a Driver</label>
        <form method="POST" action="{{route('getarea')}}">
          @csrf
          <div class="input-group  input-group-sm mb-3">
             <select class="form-control" id="idDriver" name="idDriver" onchange="newarea()">
               <option value='0'>All Drivers</option>
               @foreach($drivers as $driver)
                       <option value='{{$driver->Id}}'>{{$driver->Driver}}</option>
               @endforeach  
             </select>          
            <div class="input-group-append">
               <button class="btn btn-success" type="submit">Go</button>  
            </div>
          </div>

        </form>  
         
  
<div class="container">
  <div  id="xnamedriver" {{$showdiv}}>
   
    <div style="background-color: {{$dcolor}};padding: 1px;"><p>Driver: {{$namedriver}}</p></div>
 
        <form method="POST" action="{{route('setarea')}}">
          @csrf
          <input type="hidden" name="anorth" id="anorth">
          <input type="hidden" name="zeast" id="zeast">
          <input type="hidden" name="asouth" id="asouth">
          <input type="hidden" name="awest" id="awest">
          <input type="hidden" name="aidd" id="aidd" value="{{$iddriver}}"><br>
          <div class="btn-group">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fas fa-edit"></i> Set</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
            
            <button type="button" class="btn btn-primary" onclick="erasepoly()"><i class="fas fa-window-close"></i> Delete</button>
          </div> 
        </form>   
  </div>
 <div class="container" style="background-color: #eff5f5;padding: 5px;">
    <label for="listpaients">Patients:</label>
    <div class="table-responsive" style="height: 60%;">
      <table>
      <!--<select multiple class="form-control" id="listpaients" name="listpaients" style="height: 40%;">-->
        @php $j=1; @endphp
        @foreach($patients as $patient)
          <tr><td><span style="font-size:12px;color: {{$patient->drivercolor}};">{{$j.'-'.$patient->FirstName}}</span></td></tr>
          @php $j=$j+1; @endphp
        @endforeach
      </table>   
    </div> 
 </div>

 <div style="background-color: #eff5f5;padding: 5px;">
   <h6>Assign Driver</h6>  
   <div class="input-group  mb-3">
     <!--<div class="input-group-prepend">
          <select class="form-control"  id="myInput">
               <option value='0'>Select driver...</option>
               @foreach($drivers as $driver)
                       <option value='{{$driver->Id}}'>{{$driver->Driver}}</option>
               @endforeach  
          </select>  
     </div>-->
    <div class="input-group-append input-group-sm mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">#</span>
      </div>
      <input type="number" class="form-control" placeholder="First number patient">
      <input type="number" class="form-control" placeholder="Last number patient">
      <div class="input-group-append">
          <button class="btn btn-success" type="submit">Go</button>  
      </div>
    </div>   

    <a href="{{route('mapsaread')}}" type="button"  class="btn btn-primary"><i class="fas fa-car"></i> Assigned Drivers</a> 
     <!--<div class="input-group-append mb-3">
      <button class="btn btn-primary btn-sm" type="button" onclick="newElement('{{Request::root()}}')">Add</button>
      <a role="button" href="" class="btn btn-success btn-sm" target="_blank" id="xcomparearea">Go</a>
     </div> 
     <input type="hidden" name="temp" id="temp"> 
   </div>
   <div class="container">
     <ul class="list-select" id="myUL"></ul> 
   </div>-->
 </div> 

</div>
  
</div>
    </div>
    </div>
    <div id="map" style="height: 85%;width: 80%;"></div>
   
  
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">NEW AREA</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div> 
       <form class="form-horizontal" method="POST" action="{{route('getarea')}}">  
       @csrf 
       <div class="modal-body">        
        
           <h5>Driver: {{$namedriver}}</h5>
           <label for="name" class="col-md-3 col-form-label text-sm-left">Select color of area</label> 
           <input type="color" id="favcolor" name="favcolor" value="{{$dcolor}}" style="height: 40px;width: 50px;">
           <input type="hidden" name="xidd" id="xidd" value="{{$iddriver}}">
       </div>       
       <div class="modal-footer">
             <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i></button>
       </div>
     </form>     
    </div>

  </div>
</div>  
@endsection  

<script type="text/javascript">
    let rectangle;    
    let map;
    let infoWindow;

    function initMap() {
      var waypoints=[{!!$dirname!!}]; 
      var patientname=[{!!$strname!!}];
      var colorpatient=[{!!$colorpatient!!}];
      var latitude=[{!!$latorig!!}];
      var drvname=[{!!$drvname!!}];
      var longitude=[{!!$lngorig!!}];
      var drvnorth=[{!!$drvnorth!!}];
      var drvsouth=[{!!$drvsouth!!}];
      var drveast=[{!!$drveast!!}];
      var drvwest=[{!!$drvwest!!}];
      var drvcolor=[{!!$drvcolor!!}];
      var xeditable=@php if($showdiv==""){print_r("true");} else {print_r("false");} @endphp
      
      var k=0;

      //var imagen="http://localhost/sacsweb/public/img/male-red.png";
      const myLatLng = { lat: 25.8918, lng: -80.2511 };
      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 10,
        center: myLatLng,
        mapTypeControl: false,
      });

      const styleControl = document.getElementById("style-selector-control");
      map.controls[google.maps.ControlPosition.TOP_LEFT].push(styleControl);      

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

      //console.log('w:'+waypoints.length + '- p:' + patientname.length);
      for (var i = 0; i < latitude.length; i++) {
         var xDir = waypoints[i];
         var namepat= patientname[i];
         k++;
/*
         new google.maps.Marker({
                 // position: resultados,
                  position: new google.maps.LatLng(latitude[i], longitude[i]),
                  map: map,
                  title: namepat,
                  label: {
                  text: k.toString(),
                  fontFamily: "Arial Black",
                  color: "#fff",
                  fontSize: "10px",
                  },                  
                  mapTypeControl: false,
               });*/
///////////
          const svgMarker = {
          //path: "M10.453 14.016l6.563-6.609-1.406-1.406-5.156 5.203-2.063-2.109-1.406 1.406zM12 2.016q2.906 0 4.945 2.039t2.039 4.945q0 1.453-0.727 3.328t-1.758 3.516-2.039 3.070-1.711 2.273l-0.75 0.797q-0.281-0.328-0.75-0.867t-1.688-2.156-2.133-3.141-1.664-3.445-0.75-3.375q0-2.906 2.039-4.945t4.945-2.039z",
          path: "M 6, 6 m 0, 0 a 6,6 0 1,0 12,0 a 6,6 0 1,0 -12,0z",
          fillColor: colorpatient[i],
          fillOpacity: 5,
          strokeWeight: 0,
          rotation: 0,
          scale: 1,
          anchor: new google.maps.Point(15, 30),
          };

          new google.maps.Marker({
            position: new google.maps.LatLng(latitude[i], longitude[i]),
            icon: svgMarker,
            map: map,
            title: namepat,
            label: {
                text: k.toString(),
                      fontFamily: "Arial Black",
                      color: "#000",
                      fontSize: "10px",
                      },                  
          });      

           namepat=""
        }
///
new google.maps.Marker({
                 // position: resultados,
                  position: new google.maps.LatLng(25.7340509,-80.3363243),
                  map: map,
                  title: "Cano Health Westchester",
                  label: {
                  text: "H",
                  fontFamily: "Arial Black",
                  color: "#fff",
                  fontSize: "10px",
                  },
                
                  mapTypeControl: false,
               });    

          new google.maps.Marker({
                 // position: resultados,
                  position: new google.maps.LatLng(25.8468549,-80.2044666),
                  map: map,
                  title: "Cano Health Hialeah",
                  label: {
                  text: "H",
                  fontFamily: "Arial Black",
                  color: "#fff",
                  fontSize: "10px",
                  },
                
                  mapTypeControl: false,
               });  


//RECTANGLE
      for (var i = 0; i < drvname.length; i++) {
        const bounds = {
          north: drvnorth[i],
          south: drvsouth[i],
          east: drveast[i],
          west: drvwest[i],
        };
        // Define the rectangle and set its editable property to true.
        rectangle = new google.maps.Rectangle({
          strokeColor: drvcolor[i],
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: drvcolor[i],
          fillOpacity: 0.35,
          bounds: bounds,
          editable: xeditable,
          draggable: xeditable,
        });
        rectangle.setMap(map);
        // Add an event listener on the rectangle.
        rectangle.addListener("bounds_changed", showNewRect);
        // Define an info window on the map.
        infoWindow = new google.maps.InfoWindow();
     }
   }
     function showNewRect() {
        const ne = rectangle.getBounds().getNorthEast();
        const sw = rectangle.getBounds().getSouthWest();
        const south = sw.lat();
        const west  = sw.lng();
        const znorth = ne.lat();
        const zeast  = ne.lng();
        $("#asouth").val(south);
        $("#awest").val(west);
        $("#anorth").val(znorth);
        $("#zeast").val(zeast);        
      }

     function erasepoly()
      {
        rectangle.setMap(null);
      } 
      
    function newarea()
    {
        var idd = $("#idDriver").val()
        $("#xidd").val(idd);
        $("#aidd").val(idd);         
    }      

function newElement(xURL) {
  var li = document.createElement("li");
  var zinputValue = document.getElementById("myInput").value;

  var xinputValue = document.getElementById("myInput");
  var inputValue = xinputValue.options[xinputValue.selectedIndex].text;

  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";


  var xlink = $('#temp').val() + "/" + zinputValue; 
  $('#temp').val(xlink);
  var wURL = xURL + "/comparearea" + xlink;
  $('#xcomparearea').attr("href", wURL);
 }

 function loadScript() {
  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBR07z3N-U3Q1LfY_WaVDK7XDGVNGzu2Qk&callback=initMap";
  document.body.appendChild(script);
}

window.onload = loadScript;
</script>

