<!doctype html>
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
<link href="{{ asset('css/controlCenter.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />

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
      font-size: 0.9rem;
      font-weight: 400;
      line-height: 1;
      color: #495057;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #ced4da;
      border-radius: 0.25rem;
      transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }

  .form-group {
    margin-bottom: 0.7rem;
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
      color: rgba(255, 255, 255, 0.95);
  }

  over:: .navbar-light .navbar-nav .nav-link {
      color: #b9bfc6!important;
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
      font-size: 16px;
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

  .title-mnu {
    font-variant: small-caps;
    font-weight: bold;
  }

  .subtitle-mnu {
    padding-left: 38px;
  }

.map-control {
  background-color: #fff;
  border: 1px solid #ccc;
  box-shadow: 0 2px 2px rgba(33, 33, 33, 0.4);
  font-family: "Roboto", "sans-serif";
  font-size: 12px;
  margin: 10px;
  padding-right: 5px;
  display: none;
}

/* Display the control once it is inside the map. */
#map .map-control {
  display: block;
}

  #right-panel {
        float: right;
        width: 30%;
        padding-left: 1%;
      }
  #directions-panel {
        margin-top: 0px;
        background-color: #deefef;
        padding: 10px;

        height: 80%;
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

 </style>
</head>
<body>
  <div id="app">
   <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div></div>
     <!-- Right Side Of Navbar -->
      <ul class="navbar-nav">
       <!-- Authentication Links -->
        @guest
         <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
         </li>
        @else
         @switch(Auth::user()->userType)
          @case('AD')
           <li class="nav-item dropdown">
             <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                 Resources <span class="caret"></span>
             </a>
             <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                <a class="dropdown-item"  href="{{route('resource.zone') }}">Zones</a>
                <a class="dropdown-item" href="{{ route('resource.drivers') }}">Drivers</a>
                <a class="dropdown-item" href="{{ route('resource.centers') }}">Centers</a>
                <a class="dropdown-item" href="{{ route('resource.patients') }}">Patients</a>
                <a class="dropdown-item" href="{{ route('resource.vehicles') }}">Fleet</a>
                <a class="dropdown-item" href="{{ route('resource.users') }}">Users</a>
             </div>
           </li>
          @break

          @case('DI')
           <li class="nav-item dropdown">
             <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
               Trips Planner <span class="caret"></span>
             </a>
             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{route('importapi')}}">Import API</a>
               <a class="dropdown-item" href="{{route('importfile')}}">Import Excel</a>
               <a class="dropdown-item" href="{{route('schedule')}}" target="_blank" >Schedule</a>
               <a class="dropdown-item" href="{{route('tripsplanner')}}">Work Sheet</a>
               <a class="dropdown-item" href="{{route('frontdeskplanner')}}">Front-Desk</a>
             </div>
           </li>
           <li class="nav-item">
             <a class="nav-link" href="{{route('mapsarea')}}" >Route Planner</a>
           </li>

           <li class="nav-item">
             <a class="nav-link" href="{{route('genroutes')}}" >Route Generator</a>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="{{route('routeStatus')}}" >Route Status</a> <!--https://medgroup.sacs-web.com/routesInspector-->
           </li>
           <li class="nav-item">
               <a class="nav-link" href="{{route('controlcenter')}}" >Control Center</a>
               <!--https://medgroup.sacs-web.com/controlModule-->
           </li>
           <li class="nav-item">
               <a class="nav-link" href="https://medgroup.sacs-web.com/activityLog" target="_blank">Activity Log</a>
               <!--{{route('activitylog')}}-->
           </li>

           <li class="nav-item">
               <a class="nav-link" href="https://medgroup.sacs-web.com/activityLog" target="_blank">Reports</a>
               <!--{{route('activitylog')}}-->
           </li>
           <!--<li class="nav-item dropdown">
             <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Reports <span class="caret"></span></a>
             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <h5 class="dropdown-header title-mnu">Planning</h5>
                <a class="dropdown-item subtitle-mnu" target="_blank" href="{{route('reportinside')}}">Inside</a>
                <a class="dropdown-item subtitle-mnu" target="_blank" href="{{route('reportoutside')}}">Outside</a>
                <a class="dropdown-item subtitle-mnu" href="{{route('reports.filters',['route' => 'reporttriplist'])}}">Transportation List</a>
                <h5 class="dropdown-header  title-mnu">Drivers</h5>
                <a class="dropdown-item subtitle-mnu" href="{{route('reports.filters',['route' => 'reportdrivers'])}}">Drivers</a>
                <h5 class="dropdown-header title-mnu">Trips Status</h5>
                <a class="dropdown-item subtitle-mnu" href="{{route('reportsperfomancetrips')}}">Performance</a>
                <a class="dropdown-item subtitle-mnu" target="_blank" href="{{route('reportpickstatus',['trip' => 'A'])}}">Pickup trips status</a>
                <a class="dropdown-item subtitle-mnu" target="_blank" href="{{route('reportpickstatus',['trip' => 'B'])}}">Return trips status</a>
                <h5 class="dropdown-header title-mnu">Summary</h5>
                <a class="dropdown-item subtitle-mnu" href="{{route('reports.filters',['route' => 'reporttripsinfo'])}}">All trips info</a>
                <a class="dropdown-item subtitle-mnu"  href="{{route('reports.filters',['route' => 'reportradius'])}}">Trips by radious</a>
                <a class="dropdown-item subtitle-mnu"  href="{{route('reports.filters',['route' => 'reportscheduledtrips'])}}">All scheduled</a>
             </div>
           </li>   -->
          @break

          @case('DA')
           <li class="nav-item">
                <a class="nav-link" href="#" >Returns</a>
           </li>
          @break

          @case('FD')
          @break

          @default


         @endswitch
         <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
           <span class="fas fa-user"> </span> {{ Auth::user()->name }} <span class="caret"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
           <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
           </a>
           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
           </form>
          </div>
         </li>
        @endguest
      </ul>
    </div>
    <div class="navbar-brand" style="color: #fff;font-size: 12px;">SACS V-8.0.0. | Demo</div>
 </nav>
 <main class="py-4">
     @yield('content')
 </main>
</div>
@stack('child-scripts')
</body>
</html>
