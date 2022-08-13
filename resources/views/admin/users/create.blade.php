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

    {{ Form::open(['route' => 'resource.users.store', 'method' => 'POST', 'class' => 'container']) }}
        @csrf

        <div class="form-group">
            <h3> New user </h3>          
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Name</label>
              {{Form::text('name', null,['class' => 'form-control', 'required']) }}
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Email</label>
              {{Form::email('email', null,['class' => 'form-control', 'required']) }}
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Password</label>
              {{Form::password('password',['class' => 'form-control', 'required']) }}
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Confirm password</label>
              {{Form::password('confirm_password',['class' => 'form-control', 'required']) }}
            </div>
        </div>

        
        <div class="form-row">
            <div class="form-group col-md-3">
              <label for="inputEmail4">Role</label>
              {{Form::select('IdRole',$roles,null,['id' =>'roleid','class' => 'form-control','placeholder' => '--Not assigned--', 'required']) }}
            </div>       
        </div>
        <div class="card" >

            <div class="card-header">
                <h5>Driver information (Only for driver role)</h5>     
            </div>

            <div class="card-body" >

                <div class="form-row">
            
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Card driver</label>
                      {{Form::text('driver_card_number', null,['id' => 'carddriver','class' => 'form-control','disabled' => 'disabled','required']) }}
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Phone</label>
                        {{Form::text('Phone1', null,['id' => 'phonedriver','class' => 'form-control',  'disabled' => 'disabled','required']) }}
                      </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="inputPassword4">Address</label>
                      {{Form::text('Address', null,['id' => 'addressdriver','class' => 'form-control',  'disabled' => 'disabled','required']) }}
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="inputEmail4">Vehicle</label>
                      {{ Form::select('IdVehicle',$vehicles,null,[ 'id' => 'vehicledriver','disabled' => 'disabled','placeholder' => '--Not assigned--','class' => 'form-control', 'required']) }}
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputPassword4">Zone</label>
                      {{ Form::select('dZone', $zones,null,[ 'id' => 'zonedriver','disabled' => 'disabled','placeholder' => '--Not assigned--','class' => 'form-control', 'required']) }}
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Medical Center</label>
                      {{ Form::select('IdMC', $centers,null,[ 'id' => 'centerdriver','disabled' => 'disabled','placeholder' => '--Not assigned--','class' => 'form-control', 'required']) }}
                    </div>
                </div>

            </div>         
        </div>

        <div class="modal-footer">
            <a href="{{route('resource.users')}}"   class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                     
            {{Form::submit('Save', ['class' =>'btn btn-primary' ])}}
            
        </div>

    {{ Form::close() }}

@endsection

@push('child-scripts')
<script type="text/javascript" src="{{ URL::asset ('js/resource-users-create.js') }}"></script>
@endpush