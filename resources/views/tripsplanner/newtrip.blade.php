@extends('layouts.app')
@section('content')

<x-new-trip :centers="$centers" :patient="$patient" :centersInfo="$centersInfo"/>

@endsection

@push('child-scripts')
    <script type="text/javascript" src="{{ URL::asset ('js/new-trip.js') }}"></script>
@endpush