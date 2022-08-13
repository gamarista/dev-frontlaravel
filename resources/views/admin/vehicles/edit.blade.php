
   
            
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

            {{ Form::open(['route' => 'resource.vehicles.update', 'method' => 'PUT', 'class' => 'container']) }}
            @csrf
            
            <div class="form-group">
            <h3> Update Vehicle with license {{$vehicle->VehicleReg}}</h3>
              
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Model</label>
                {{Form::text('Model', $vehicle->Model,['class' => 'form-control', 'required']) }}
              
            </div>
             
              <div class="form-group">
                  
                <label for="exampleInputPassword1">Brand</label>
             
                {{Form::text('VehicleBrand', $vehicle->VehicleBrand,['class' => 'form-control', 'required']) }}
              
              </div>
              <div class="form-group">
                  
                  <label for="exampleInputPassword1">license </label>
                  {{Form::text('VehicleReg', $vehicle->VehicleReg,['class' => 'form-control', 'required']) }}     
              </div>

              <div class="form-group">
                  
                <label for="exampleInputPassword1">Seats</label>
               
                {{Form::number('NumSeats',  $vehicle->NumSeats,['class' => 'form-control', 'required']) }}
               
            </div>

            <div class="form-group">
                  
                <label for="exampleInputPassword1">Notes</label>
               
                {{Form::text('Notes', $vehicle->Notes,['class' => 'form-control', 'required']) }}
               
            </div>

                <div class="modal-footer">
                    <a href="{{route('resource.vehicles')}}"   class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                    {{Form::submit('Save', ['class' =>'btn btn-primary' ])}}
                    
                </div>
                {{Form::text('id',$vehicle->IdVehicle,['class'=> 'form-control','placeholder' => 'Id vehicle','style' => 'display:none'])}}
      
    
            {{ Form::close() }}
    @endsection

 

   
      


