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

    {{ Form::open(['route' => 'resource.patients.update', 'method' => 'PUT', 'class' => 'container']) }}
        @csrf

        <div class="form-group">
            <h3> Update {{$patient->Names}} </h3>
        </div>

        <div class="form-row ">
            <div class="form-group col">
                <label for="exampleInputPassword1">Name</label>
             
                {{Form::text('Names', $patient->Names,['class' => 'form-control','required']) }}
            
            </div>
            <div class="col">
                <label for="exampleInputPassword1">Medical number</label>
                
                {{Form::text('MedicalNumber', $patient->MedicalNumber,['class' => 'form-control', 'required']) }}
               
            </div>
            <div class="col">
                <label for="exampleInputPassword1">Birtdate</label>
                
                {{Form::date('BOD', $patient->BOD,['class' => 'form-control', 'required']) }}
               
            </div>
          </div>

          <div class="form-row ">
            <div class="form-group col">
                <label for="exampleInputPassword1">Phone 1</label>
             
                {{Form::text('NumberPhone1', $patient->NumberPhone1,['class' => 'form-control','required']) }}
            
            </div>
            <div class="col">
                <label for="exampleInputPassword1">Phone2</label>
                
                {{Form::text('NumberPhone2', $patient->NumberPhone2,['class' => 'form-control', 'required']) }}
               
            </div>
            <div class="col">
                <label for="exampleInputPassword1">Preferred contact</label>
                
                {{Form::text('ContactPreference', $patient->ContactPreference,['class' => 'form-control', 'required']) }}
               
            </div>
          </div>

          <div class="form-row ">
            <div class="form-group col">
                <label for="exampleInputPassword1">Address</label>
             
                {{Form::text('PatientAddress', $patient->PatientAddress,['class' => 'form-control','required']) }}
            
            </div>
          </div>

          <div class="form-row ">
            <div class="form-group col">
                <label for="exampleInputPassword1">Email</label>
             
                {{Form::email('Email',  $patient->Email,['class' => 'form-control','required']) }}
            
            </div>
            <div class="col">
                <label for="exampleInputPassword1">Patient Type</label>
                
                {{Form::select('patient_types',  $patient_types, $patient->patient_types,['class' => 'form-control','placeholder' => 'Select ...']) }}
               
            </div>
          </div>

          <div class="form-row ">
            <div class="form-group col">
                <label for="exampleInputPassword1">Center</label>
             
                {{Form::select('IdMedicalC',$centers, $patient->IdMedicalC,['class' => 'form-control','placeholder' => 'Select ...']) }}
            
            </div>
            <div class="col">
                <label for="exampleInputPassword1">Driver</label>
                
                {{Form::select('driver',$drivers, $patient->driver,['class' => 'form-control','placeholder' => 'Select ...']) }}
               
            </div>
            <div class="col">
                 {{ Form::label('labeltransportation', 'Special requirements')}} 

                 {{ Form::select(
                    'PhysicalLimits[]',
                    [
                        'Wheelchair' =>'Wheelchair',
                        'Walker' =>'Walker',
                        'Companion' =>'Companion',
                        'Oxygen' => 'Oxygen'
                    ],
                    json_decode($patient->PhysicalLimits),
                    ['multiple' => true,'class' => 'form-control']
                )
            }}
                 
              </div>
          </div>

          {{Form::text('id',$patient->Id,['class'=> 'form-control','placeholder' => 'Id patient','style' => 'display:none'])}}

          <div class="modal-footer">
            <a href="{{route('resource.patients')}}"   class="btn btn-secondary" data-dismiss="modal">Cancel</a>
            {{Form::submit('Save', ['class' =>'btn btn-primary' ])}}
            
          </div>


    {{ Form::close() }}

@endsection