@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            {{ Form::open(['route' => 'getpatients', 'method' => 'GET', 'class' => 'container-fluid']) }}
            <div class="row justify-content-center">

                <div class="col-sm-6 my-1">
                 
                  <div class="input-group">
                   
                    {{Form::text('patientname',null,['class'=> 'form-control','placeholder' => 'Patient name'])}}
                    <div class="input-group-prepend">
                      <button class="btn btn-dark" style="width: 90%;" type="submit" ><i class="fas fa-search"></i></button>
                    </div>
                   
                  </div>
                </div>
            
              </div>
            {{ Form::close() }}
            
    
        </div>
        <div class="card-body">
            <x-search-patient-list :patients="$patients"/>
        </div>
      </div>
  </div>

@endsection