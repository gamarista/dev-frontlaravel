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

    {{ Form::open(['route' => 'resource.drivers.store', 'method' => 'POST', 'class' => 'container']) }}
    @csrf


    <div class="form-group">
        <h3> New driver </h3>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Name</label>
          {{Form::text('Driver', null,['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Card driver</label>
          {{Form::text('driver_card_number', null,['class' => 'form-control', 'required']) }}
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Phone</label>
          {{Form::text('Phone1', null,['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Address</label>
          {{Form::text('Address', null,['class' => 'form-control', 'required']) }}
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputEmail4">Vehicle</label>
          {{ Form::select('IdVehicle',$vehicles,null,['placeholder' => '--Not assigned--','class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group col-md-4">
          <label for="inputPassword4">Zone</label>
          {{ Form::select('dZone', $zones,null,['placeholder' => '--Not assigned--','class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group col-md-4">
            <label for="inputPassword4">Medical Center</label>
          {{ Form::select('IdMC', $centers,null,['placeholder' => '--Not assigned--','class' => 'form-control', 'required']) }}
        </div>
    </div>

    
    <div class="card" >

      <div class="card-header">
          <h5>User information</h5>     
      </div>

      <div class="card-body" >

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputPassword4">Email</label>
              {{Form::email('email', null,['class' => 'form-control', 'required']) }}
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Password</label>
              {{Form::password('password',['class' => 'form-control', 'required']) }}
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Confirm password</label>
              {{Form::password('confirm_password',['class' => 'form-control', 'required']) }}
            </div>
          </div>


 

      </div>         
  </div>



    <div class="modal-footer">
        <a href="{{route('resource.drivers')}}"   class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                 
        {{Form::submit('Save', ['class' =>'btn btn-primary' ])}}
        
    </div>




    {{ Form::close() }}


@endsection