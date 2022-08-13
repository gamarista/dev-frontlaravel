@extends('layouts.app')
@section('content')
    <div class="container-fluid" style="background-color: #DEEFEF;padding-top: 15px;padding-bottom: 15px;  margin-bottom: 20px;">
        {{ Form::open(['route' => 'activitylog', 'method' => 'GET', 'class' => 'container-fluid']) }}

    
        <div class="row justify-content-start">
            <div class="col-sm-2">
                {{ Form::label('label', 'Start job', ['class' => 'awesome'])}}
                {{ Form::date('start_date', \Carbon\Carbon::now(), ['class' => 'form-control','id' => 'date-filter'])}}
            </div>

            <div class="col-sm-2">
                {{ Form::label('label', 'End job', ['class' => 'awesome'])}}
                {{ Form::date('end_date', \Carbon\Carbon::now(), ['class' => 'form-control','id' => 'date-filter'])}}
            </div>
    
            <div class="col-sm-2">
                {{ Form::label('label', 'Order By', ['class' => 'awesome'])}}
                {{ Form::select('center',$centers,null,['placeholder' => '--Medical center--','class' => 'form-control','id' => 'center-id']) }}
            </div>
        
          <div class="col-sm-2">
            <label for="Name" class="awsome" style="visibility: hidden">GO</label>
            <input type="submit" value="GO" class="form-control btn btn-dark btn-sm" style="">
          </div>
        </div>
      
      
        {{ Form::close() }}
    </div>     
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <x-activity-log :activities="$activities"/>

@endsection