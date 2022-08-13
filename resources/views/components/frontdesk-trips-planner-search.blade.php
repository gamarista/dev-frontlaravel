<div class="container-fluid"
    style="background-color: #DEEFEF;padding-top: 15px;padding-bottom: 15px; width: 1490px; margin-bottom: 20px;">

    @if(empty($controlCenter) && empty($log) )
    {{ Form::open(['route' => 'tripsplanner', 'method' => 'GET', 'class' => 'container-fluid']) }}
    @elseif(!empty($controlCenter))
    {{ Form::open(['route' => 'controlcenter', 'method' => 'GET', 'class' => 'container-fluid']) }}

    @elseif(!empty($log))
    {{ Form::open(['route' => 'tripsLog', 'method' => 'GET', 'class' => 'container-fluid']) }}
    @endif


    <div class="form-row">

        <div class="col-sm-2">
            {{ Form::select('center', $centers,null,['placeholder' => '--Medical Center--','class' => 'form-control'])
            }}
        </div>
        <div class="col-sm-2">
            {{ Form::select('driver', $drivers,null,['placeholder' => '--Drivers--','class' => 'form-control']) }}
        </div>
        <div class="col-sm-2">
            {{ Form::text('patient_name',null,['placeholder' => 'Search by Patient','id' =>'patient_name',
            'class'=>'form-control' ]) }}
        </div>
        <div class="col-sm-2">
            {{ Form::select('sort_by', [1 => 'By Patient Name', 2 => 'App Time', 3 => 'SO'],null,['placeholder' =>
            '--Sort By--','class' => 'form-control']) }}
        </div>
        <!--yonny-->
        <div class="col-sm-2">
            {{ Form::select('special', [1 => 'Special T.', 2 => 'Not Special T.', 3 => 'All'],null,['placeholder' =>
            '--Special Transportations--','class' => 'form-control']) }}
        </div>
        <div class="col-sm-1">
            <input type="submit" value="GO" class="btn btn-dark" style="float: right;margin-right: 5px;">
        </div>


    </div>


</div>


<div class="row">
    <div class="col-sm-1"> </div>

    {{-- @if (!isset($date))
    <div class="col-sm-1.5">
        {{ Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control','id' => 'date-filter'])}}
    </div>
    @else
    <div class="col-sm-1.5">
        {{ Form::date('date', $date, ['class' => 'form-control','id' => 'date-filter'])}}
    </div>
    @endif --}}

    <div class="col-sm-6">

        {{ $appoinments->withQueryString()->links() }}
    </div>
    <div class="col-sm-1">

    </div>
    <div class="col-md">
        <a href="{{route('genrides')}}" class="btn btn-primary" style=" float: right;margin-right: 5px;">Rides</a>

    </div>
    <div class="col-sm-1">

    </div>

</div>

<!--
            <div class="row">
                <div class="col-sm-2">
                    qeqeqwe
                    {{ Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control','id' => 'date-filter','disabled'])}}
                </div>
                <div class="col-sm-4"> {{  $appoinments->withQueryString()->links()  }}</div>
                <div class="col-sm-1" >
                <input type="submit" value="GO" class="btn btn-dark" style="float: right;">
            </div>
            <div class="col-sm-1" >
                <a href="{{route('getpatients')}}" class="btn"   style="background-color: chartreuse; float: right;" >New Trip</a>
            </div>
            </div>

        -->
{{ Form::close() }}
