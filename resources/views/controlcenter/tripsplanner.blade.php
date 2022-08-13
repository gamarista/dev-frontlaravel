@extends('layouts.app')
@section('content')

<x-trip-planner-search :centers="$centers" :drivers="$drivers" :controlCenter="$controlCenter" :destinos="$destinos"   
    :appoinments="$appoinments" :log="$log" :date="$date" :horas="$horas"/> 
<x-control-center :appoinments="$appoinments" :drivers="$drivers" :centers="$centers" :destinos="$destinos" :horas="$horas"/> 
<x-cancelation-code :cancellation="$cancellation"/>
<x-assign-driver :drivers="$drivers"/>
<x-send-message/>

@endsection

@push('child-scripts')
    <script type="text/javascript" src="{{ URL::asset ('js/control-center.js') }}"></script>
@endpush