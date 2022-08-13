@extends('layouts.app')
@section('content')

<x-trip-planner-search :centers="$centers" :drivers="$drivers" :controlCenter="$controlCenter" :destinos="$destinos"
:appoinments="$appoinments" :log="$log" :date="$date" :horas="$horas"/> 
<x-trip-planner-list :appoinments="$appoinments" :drivers="$drivers" :centers="$centers" :requeriments="$requeriments"  :totalTrips="$totalTrips" :tripsAssigned="$tripsAssigned" :tripsNotAssigned="$tripsNotAssigned" 
:tripsCanceled="$tripsCanceled" :destinos="$destinos" :log="$log" :horas="$horas"/> 

@endsection
@push('child-scripts')
    <script type="text/javascript" src="{{ URL::asset ('js/trip-planner.js') }}"></script>
    <script>
        // Initialize and add the map
  /*      function initMap() {
          // The location of Uluru
          var uluru = {lat: -25.344, lng: 131.036};
          // The map, centered at Uluru
          var map = new google.maps.Map(
              document.getElementById('map'), {zoom: 4, center: uluru});
          // The marker, positioned at Uluru
          var marker = new google.maps.Marker({position: uluru, map: map});
        } */

  

    </script>


  
@endpush




