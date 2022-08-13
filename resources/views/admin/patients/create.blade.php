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

    {{ Form::open(['route' => 'resource.patients.store', 'method' => 'POST', 'class' => 'container']) }}
        @csrf

        <div class="form-group">
            <h3> New patient </h3>
        </div>

        <div class="form-row ">
            <div class="form-group col">
                <label for="exampleInputPassword1">Name</label>
             
                {{Form::text('Names', null,['class' => 'form-control','required']) }}
            
            </div>
            <div class="col">
                <label for="exampleInputPassword1">Medical number</label>
                
                {{Form::text('MedicalNumber', null,['class' => 'form-control', 'required']) }}
               
            </div>
            <div class="col">
                <label for="exampleInputPassword1">Birtdate</label>
                
                {{Form::date('BOD', null,['class' => 'form-control', 'required']) }}
               
            </div>
          </div>

          <div class="form-row ">
            <div class="form-group col">
                <label for="exampleInputPassword1">Phone 1</label>
             
                {{Form::text('NumberPhone1', null,['class' => 'form-control','required']) }}
            
            </div>
            <div class="col">
                <label for="exampleInputPassword1">Phone2</label>
                
                {{Form::text('NumberPhone2', null,['class' => 'form-control', 'required']) }}
               
            </div>
            <div class="col">
                <label for="exampleInputPassword1">Preferred contact</label>
                
                {{Form::text('ContactPreference', null,['class' => 'form-control', 'required']) }}
               
            </div>
          </div>

          <div class="form-row ">
            <div class="form-group col">
                <label for="exampleInputPassword1">Address</label>
             
                {{Form::text('PatientAddress', null,['class' => 'form-control','required']) }}
            
            </div>
          </div>

          <div class="form-row ">
            <div class="form-group col">
                <label for="exampleInputPassword1">Email</label>
             
                {{Form::email('Email', null,['class' => 'form-control','required']) }}
            
            </div>
            <div class="col">
                <label for="exampleInputPassword1">Patient Type</label>
                
                {{Form::select('patient_types',$patient_types, null,['class' => 'form-control','placeholder' => 'Select ...']) }}
               
            </div>
          </div>

          <div class="form-row ">
            <div class="form-group col">
                <label for="exampleInputPassword1">Center</label>
             
                {{Form::select('IdMedicalC',$centers, null,['class' => 'form-control','placeholder' => 'Select ...']) }}
            
            </div>
            <div class="col">
                <label for="exampleInputPassword1">Driver</label>
                
                {{Form::select('driver',$drivers, null,['class' => 'form-control','placeholder' => 'Select ...']) }}
               
            </div>
            <div class="col">
                 {{ Form::label('labeltransportation', 'Special requirements')}} 
                <select multiple class="form-control" id="specialrequeriment" name="PhysicalLimits[]">
                  <option>Wheelchair</option>
                  <option>Walker</option>
                  <option>Companion</option>
                  <option>Oxygen</option>
                </select>
              </div>
          </div>

          <div class="modal-footer">
            <a href="{{route('resource.patients')}}"   class="btn btn-secondary" data-dismiss="modal">Cancel</a>
            {{Form::submit('Save', ['class' =>'btn btn-primary' ])}}
            
          </div>


    {{ Form::close() }}

@endsection