@extends('layouts.app')
@section('content')




<div class="container">
    <div class="form-group">
       
        @if (strcmp($route,"reporttriplist") == 0)
            <h3 id="route-text">Transportation List </h3>
        @elseif(strcmp($route,"reportdrivers") == 0)
            <h3 id="route-text">Driver List </h3>
        @elseif(strcmp($route,"reporttripsinfo") == 0)
            <h3 id="route-text">All Trips info </h3>
        @elseif(strcmp($route,"reportradius") == 0)
            <h3 id="route-text">Trips by Radious </h3>
        @elseif(strcmp($route,"reportscheduledtrips") == 0)
            <h3 id="route-text">All scheduled </h3>
        @endif
    </div>

    <div class="row justify-content-start">
      <div class="col-4  mb-4">
        <div class="form-check">
            <input type="radio" name="exampleRadios" id="current-data" value="option1" checked>
            <label class="form-check-label" for="exampleRadios1">
                Current data
            </label>
        </div>
      </div>
     
    </div>
    <div class="row justify-content-start">
        <div class="col-4 mb-4">
            <div class="form-check">
                <input  type="radio" name="exampleRadios" id="filter-report" value="option1">
                <label class="form-check-label" for="exampleRadios1">
                    Historical facts
                </label>
            </div>
        </div>       
    </div>

    <div class="form-row">
        
        <div class="form-group col-md-3">
            <div class="form-check">
                {{ Form::label('label', 'Center', ['class' => 'awesome'])}}
                {{ Form::select('center', $centers,null,['placeholder' => '--all centers--','class' => 'form-control','id' => 'center-filter','disabled']) }}
            </div>       
        </div>

        <div class="form-group col-md-3">
            {{ Form::label('label', 'Date', ['class' => 'awesome'])}}
            {{ Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control','id' => 'date-filter','disabled'])}}
        </div>

        <div class="form-group col-md-3">
            {{ Form::label('label', 'Order By', ['class' => 'awesome'])}}
            {{ Form::select('orderby', ['1' => 'Appt Time', '2' => 'Patient'],null,['placeholder' => '--filter--','class' => 'form-control','id' => 'orderby-id','disabled']) }}
        </div>


   
    </div>



    @if (strcmp($route,"reporttriplist") == 0)

        <div class="col-2">
            <a id="currentbutton" class="btn"  target="_blank" style="background-color: #1EC96E;" href="{{route('reporttriplist')}}"> Generate</a>
        </div>
        <div class="col-2">
            <a id="historicalbutton" class="btn"  target="_blank" style="background-color: #1EC96E; display: none;" href="{{route('reporttriplist')}}"> Generate</a>
        </div>
    @elseif(strcmp($route,"reportdrivers") == 0)
        <div class="col-2">
            <a id="currentbutton" class="btn"  target="_blank" style="background-color: #1EC96E;" href="{{route('reportdrivers')}}"> Generate</a>
        </div>
        <div class="col-2">
            <a id="historicalbutton" class="btn"  target="_blank" style="background-color: #1EC96E; display: none;" href="{{route('reportdrivers')}}"> Generate</a>
        </div>
    </div>
    @elseif(strcmp($route,"reporttripsinfo") == 0)
        <div class="col-2">
            <a id="currentbutton" class="btn"  target="_blank" style="background-color: #1EC96E;" href="{{route('reporttripsinfo')}}"> Generate</a>
        </div>
        <div class="col-2">
            <a id="historicalbutton" class="btn"  target="_blank" style="background-color: #1EC96E; display: none;" href="{{route('reporttripsinfo')}}"> Generate</a>
        </div>
    @elseif(strcmp($route,"reportradius") == 0)
        <div class="col-2">
            <a id="currentbutton" class="btn"  target="_blank" style="background-color: #1EC96E;" href="{{route('reportradius')}}"> Generate</a>
        </div>
        <div class="col-2">
            <a id="historicalbutton" class="btn"  target="_blank" style="background-color: #1EC96E; display: none;" href="{{route('reportradius')}}"> Generate</a>
        </div>
    @elseif(strcmp($route,"reportscheduledtrips") == 0)
        <div class="col-2">
            <a id="currentbutton" class="btn"  target="_blank" style="background-color: #1EC96E;" href="{{route('reportscheduledtrips')}}"> Generate</a>
        </div>
        <div class="col-2">
            <a id="historicalbutton" class="btn"  target="_blank" style="background-color: #1EC96E; display: none;" href="{{route('reportscheduledtrips')}}"> Generate</a>
        </div>

    @endif


</div>

@endsection


@push('child-scripts')
<script type="text/javascript" src="{{ URL::asset ('js/report-filters.js') }}"></script>
@endpush