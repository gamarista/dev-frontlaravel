

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SACS</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tripPlannerList.css') }}" rel="stylesheet">


    <link  rel="icon" href="img/fav.ico" type="image/x-icon"/>   
    <style type="text/css">
body {
    margin: 0;
    font-weight: 400;
    line-height: 1.2;
    color: #212529;
    text-align: left;
    background-color: #f8fafc;
    font-family: "Open Sans","Helvetica Neue",sans-serif;
    font-size: 14px;
    text-decoration: none;    
}

.form-control {
    display: block;
    width: 100%;
    height: calc(1em + 0.75rem + 1px);
    padding: 0.2rem;
    font-size: 1.2rem;
    font-weight: 400;
    line-height: 1;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.mb-3, .my-3 {
    margin-bottom: 0.5rem !important;
}
.pb-4, .py-4 {
    padding-bottom: 1rem !important;
}
.pt-4, .py-4 {
    padding-top: 1rem !important;
}

.pagination {
    display: flex;
    padding-left: 0;
    list-style: none;
    border-radius: 0.2rem;
    font-size: 10px;
}

      .bg-white {
         background-color: #343a40!important;
         }

      .dropdown-header {
        display: block;
        padding: 0.5rem 1.5rem;
        margin-bottom: 0;
        font-size: 1.05rem;
        color: #003333;
        white-space: nowrap;
       }

      .navbar-light .navbar-nav .nav-link {
          color: rgba(255, 255, 255, 0.5);
      }     
      
      over:: .navbar-light .navbar-nav .nav-link {
         color: #343a40!important;
      }  

      .card-header {
          padding: 0.5rem 1rem;
          margin-bottom: 0;
          color: #fff;
          background-color: #343a40;
          border-bottom: 1px solid rgba(0, 0, 0, 0.125);
      }


//filtros-->
.ui-dataview-header {
    background-color: #f4f4f4;
    color: #333;
    border: 1px solid #c8c8c8;
    padding: .571em 1em;
    font-weight: 500;
    border-bottom: 0;
}

//Div principal que contiene los viajes
.ui-dataview-content {
    padding: .571em 1em;
    border: 1px solid #c8c8c8;
    background-color: #fff;
    color: #333;
}

//font viajes
.ui-widget {
   font-family: "Open Sans","Helvetica Neue",sans-serif;
    font-size: 14px;
    text-decoration: none;
}

.table {
    width: 100%;
    margin-bottom: 0rem;
    color: #212529;
}

.table th, .table td.tripdatatd {
    padding: 0.2rem;
    vertical-align: top;
    border-top: 10px solid #ffffff;
   font-family: "Open Sans","Helvetica Neue",sans-serif;
    font-size: 14px;
    text-decoration: none;    
}

li {
    display: list-item;
    text-align: -webkit-match-parent;
    font-size: 18px;
}

.list-select{

  cursor: pointer;
  position: relative;
  padding: 12px 8px 12px 40px;
  list-style-type: none;
  background: #eee;
  font-size: 18px;
  transition: 0.2s;
  
  /* make the list items unselectable */
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;

}


//indicador
div.serviceStatusOK[_ngcontent-wum-c5] {
    display: table-cell;
    width: 1%;
    background-color: #32773f;
}

//Botones
.btn-command {
    margin-right: 3px;
    margin-top: 3px;
    width: 90px;
}

.btn-sm {
    padding: .25rem .5rem;
    font-size: .875rem;
    line-height: 1.5;
    border-radius: .2rem;
    width: 90px;
}
      
    </style>


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
               <h4 style="color: white;">Compare Areas</h4>
            </div>
        </nav>

        <main class="py-4">
<!----------- *************** --->

    <div id="left-panel" style="float: left;width: 30%;padding-right: 5px">
      <div id="directions-panel" style="margin-top: 10px;background-color: #fff;padding: 10px;height: 70%;">
  
   <div class="container">
     <div style="background-color: {{$dcolor1}};padding: 5px;">
       <h5>{{$namedriver1}}</h5>
       <p>Numr patients on area: ##</p>
      </div>
      <div style="background-color: {{$dcolor2}};padding: 5px;">
       <h5>{{$namedriver2}}</h5>
       <p>Numr patients on area: ##</p>
      </div>
   </div>  
    </div>    
  </div>
    <div id="map" style="height: 80%;width: 70%;"></div>



<!-----------**************--------->
 </main>
    </div>
    
 </body>
</html> 

<script type="text/javascript" >
 
    let rectangle;    
    let map;
    let infoWindow;

    function initMap() {

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

//RECTANGLE
        const bounds = {
          north: {!!$dnorth1!!},
          south: {!!$dsouth1!!},
          east: {!!$deast1!!},
          west: {!!$dwest1!!},
        };
        // Define the rectangle and set its editable property to true.
        rectangle1 = new google.maps.Rectangle({
          strokeColor: "{!!$dcolor1!!}",
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: "{!!$dcolor1!!}",
          fillOpacity: 0.35,
          bounds: bounds,
          editable: true,
          draggable: true,
        });
       rectangle1.setMap(map);


        const bounds2 = {
          north: {!!$dnorth2!!},
          south: {!!$dsouth2!!},
          east: {!!$deast2!!},
          west: {!!$dwest2!!},
        };
        // Define the rectangle and set its editable property to true.
        rectangle2 = new google.maps.Rectangle({
          strokeColor: "{!!$dcolor2!!}",
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: "{!!$dcolor2!!}",
          fillOpacity: 0.35,
          bounds: bounds2,
          editable: true,
          draggable: true,
        });   
        rectangle2.setMap(map);     

     }



function loadScript() {
  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBR07z3N-U3Q1LfY_WaVDK7XDGVNGzu2Qk&callback=initMap";
  document.body.appendChild(script);
}

window.onload = loadScript;    
    



 </script>
