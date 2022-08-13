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

    {{ Form::open(['route' => 'resource.users.savePassword', 'method' => 'PUT', 'class' => 'container']) }}
    @csrf

    <div class="form-group">
        <h3> Change password </h3>          
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Old password</label>
        {{Form::password('oldpassword',['class' => 'form-control', 'required']) }}
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">New password</label>
        {{Form::password('password',['class' => 'form-control', 'required']) }}
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Confirm new password</label>
        {{Form::password('confirm_password',['class' => 'form-control', 'required']) }}
    </div>

   

    {{Form::text('id',$user,['class'=> 'form-control','placeholder' => 'Id user','style' => 'display:none'])}}

    
  

    <div class="modal-footer">
        <a href="{{route('resource.users')}}"   class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                 
        {{Form::submit('Save', ['class' =>'btn btn-primary' ])}}
        
    </div>

{{ Form::close() }}



@endsection