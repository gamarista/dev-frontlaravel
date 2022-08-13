@extends('layouts.app')
@section('content')

<x-trip-planner-search :centers="$centers" :drivers="$drivers" :controlCenter="$controlCenter" :destinos="$destinos"
:appoinments="$appoinments" :log="$log" :date="$date" :horas="$horas" /> 
<x-trip-planner-list :appoinments="$appoinments" :drivers="$drivers" :centers="$centers" :requeriments="$requeriments"  :totalTrips="$totalTrips" :tripsAssigned="$tripsAssigned" :tripsNotAssigned="$tripsNotAssigned" 
:tripsCanceled="$tripsCanceled" :destinos="$destinos" :log="$log" :horas="$horas" /> 
<x-cancelation-code :cancellation="$cancellation"/>

@endsection


@push('child-scripts')
    <script type="text/javascript" src="{{ URL::asset ('js/trip-planner.js') }}"></script>

    <script type="text/javascript">
		 function loadScript() {
		  var script = document.createElement("script");
		  script.type = "text/javascript";
		  script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBR07z3N-U3Q1LfY_WaVDK7XDGVNGzu2Qk&callback=initMap";
		  document.body.appendChild(script);
		}
		window.onload = loadScript; 
	</script>
@endpush




