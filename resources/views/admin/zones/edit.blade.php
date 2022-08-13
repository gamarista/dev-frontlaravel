@extends('layouts.app')
@section('content')

{{ Form::open(['route' => 'resource.zone.update', 'method' => 'POST', 'class' => 'container']) }}
<h3> Zone {{$zone->Name}} </h3>
    <div class="form-group">
        <strong> {{ Form::label('labelname', 'Name')}}  </strong>
      {{Form::text('name',$zone->Name,['class'=> 'form-control', 'placeholder' => 'Zone name'])}}
    </div>
    <div class="form-group">
        <strong> {{ Form::label('labelname', 'Description')}}  </strong>
        {{Form::text('description',$zone->description,['class'=> 'form-control', 'placeholder' => 'description'])}}
    </div>
    {{Form::text('id',$zone->IdZone,['class'=> 'form-control','placeholder' => 'Id zone','style' => 'display:none'])}}
    
    <div class="modal-footer">
    <a href="{{route('resource.zone')}}"   class="btn btn-secondary float-right" data-dismiss="modal">Cancel</a>
    {{Form::submit('Save',['class'=> 'btn btn-primary '])}}
    </div>
  </form>

  {{ Form::close() }}
    
@endsection
