@extends('layouts.app')
@section('content')

<div class="container">
  <h3> Routes in zone </h3>
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Center</th>
        <th scope="col">Assigned Driver</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($routes as $route)
         
      <tr>
        <td >{{ $route->name}}</th>
        <td>{{ $route->description}}</td>
        <td> {{ $route->center['NickName']}} </td>
        <td>{{ $route->Driver}}</td>
      </tr>

        @endforeach
            
    </tbody>
  </table>
  <div class="modal-footer">
    <a href="{{route('resource.zone')}}"   class="btn btn-secondary" data-dismiss="modal">Cancel</a>
   
    
  </div>
  
</div>



@endsection