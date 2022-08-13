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

{{ Form::open(['route' => 'resource.zone.store', 'method' => 'POST', 'class' => 'container']) }}
@csrf

    <div class="form-group">
        <h3> New Zone </h3>
    
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        {{Form::text('name',null,['class' => 'form-control','id' => 'namezone']) }}
       
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Description</label>
        {{Form::textarea('description', null,['class' => 'form-control','rows' => '3','id' => 'descriptionzone']) }}
      </div>
      <div class="modal-footer">
        <a href="{{route('resource.zone')}}"   class="btn btn-secondary" data-dismiss="modal">Cancel</a>
        {{Form::submit('Save', ['class' =>'btn btn-primary' ])}}
        
    </div>

{{ Form::close() }}


@endsection