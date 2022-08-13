@extends('layouts.app')
@section('content')

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{ Form::open(['route' => 'resource.drivers.update', 'method' => 'PUT', 'class' => 'container']) }}
    @csrf


    <div class="form-group">
    <h3> Update {{$driver->Driver}} </h3>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Name</label>
          {{Form::text('Driver', $driver->Driver,['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Card driver</label>
          {{Form::text('driver_card_number', $driver->driver_card_number,['class' => 'form-control', 'required']) }}
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Phone</label>
          {{Form::text('Phone1', $driver->Phone1,['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Address</label>
          {{Form::text('Address', $driver->Address,['class' => 'form-control', 'required']) }}
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputEmail4">Vehicle</label>
          {{ Form::select('IdVehicle',$vehicles, $driver->IdVehicle,['placeholder' => '--Not assigned--','class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group col-md-4">
          <label for="inputPassword4">Zone</label>
          {{ Form::select('dZone', $zones,$driver->dZone,['placeholder' => '--Not assigned--','class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group col-md-4">
            <label for="inputPassword4">Medical Center</label>
          {{ Form::select('IdMC', $centers,$driver->IdMC,['placeholder' => '--Not assigned--','class' => 'form-control', 'required']) }}
        </div>
    </div>

    {{Form::text('id',$driver->Id,['class'=> 'form-control','placeholder' => 'Id center','style' => 'display:none'])}}

    <div class="modal-footer">
        <a href="{{route('resource.drivers')}}"   class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                 
        {{Form::submit('Save', ['class' =>'btn btn-primary' ])}}
        
    </div>




    {{ Form::close() }}


@endsection