
   
            
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

            {{ Form::open(['route' => 'resource.vehicles.store', 'method' => 'POST', 'class' => 'container']) }}
            @csrf

            <div class="form-group">
              <h3> New Vehicle </h3>
              
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Model</label>
                {{Form::text('Model', null,['class' => 'form-control', 'required']) }}
              
            </div>
             
              <div class="form-group">
                  
                <label for="exampleInputPassword1">Brand</label>
             
                {{Form::text('VehicleBrand', null,['class' => 'form-control', 'required']) }}
              
              </div>
              <div class="form-group">
                  
                  <label for="exampleInputPassword1">license </label>
                  {{Form::text('VehicleReg', null,['class' => 'form-control', 'required']) }}     
              </div>

            <div class="form-group">
                  
                <label for="exampleInputPassword1">Seats</label>
               
                {{Form::number('NumSeats', null,['class' => 'form-control', 'required']) }}
               
            </div>

            <div class="form-group">
                  
                <label for="exampleInputPassword1">Notes</label>
               
                {{Form::text('Notes', null,['class' => 'form-control', 'required']) }}
               
            </div>

                <div class="modal-footer">
                    <a href="{{route('resource.vehicles')}}"   class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                    {{Form::submit('Save', ['class' =>'btn btn-primary' ])}}
                    
                </div>
            
      
    
            {{ Form::close() }}
    @endsection

 

   
      


