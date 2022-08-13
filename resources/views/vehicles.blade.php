@extends('layouts.app')
@section('content')

@php 
    

    if (isset($data)) {
       
       $save='disabled';
       $update='enabled';
       $data=json_decode($data);
       $IdVehicle=$data[0]->IdVehicle;
       $Model=$data[0]->Model;
       $VehicleBrand=$data[0]->VehicleBrand;
       $VehicleReg=$data[0]->VehicleReg;
       $NumSeats=$data[0]->NumSeats;
       $Notes=$data[0]->Notes;
       $Check=$data[0]->Enable ? 'checked' : '';
    }
    else 
    {
       $save='enabled';
       $update='disabled';
       $IdVehicle='';
       $Model=''; 
       $VehicleBrand='';
       $VehicleReg='';
       $NumSeats='';
       $Notes='';
       $Check='';
    }
@endphp  
<div class="container">
 <div class="row justify-content-center">
  <div class="col-md-10">
   <div class="card">
    <div class="card-header">Vehicles Settings</div>
     <form method="POST" action="{{route('newvehicle')}}">
     
      @csrf
      <div class="card-body">
       <div class="container">
         @if (isset($status)) 
           <div class="alert alert-success alert-dismissible">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Success! </strong>{{ $status }}
           </div>
         @endif
         @if (isset($statuse))
            <div class="alert alert-danger alert-dismissible">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Error! </strong> {{ $statuse }}
            </div>                 
         @endif  
        </div> 
           <div class="form-group row">
           <div class="col-50"> 
            <label for="name" class="col-md-6 col-form-label text-sm-left">Model</label> 
            <div class="col-md-10">
              <input id="Model" type="text" class="form-control @error('Model') is-invalid @enderror" name="Model" value="{{$Model}}" required autocomplete="Model" autofocus>
              @error('Model')
               <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
               </span>
              @enderror
            </div> 
           </div> 

           <div class="col-50"> 
              <label for="VehicleBrand" class="col-md-6 col-form-label text-sm-left">Brand</label>
              <div class="col-md-10">
                  <input id="VehicleBrand" type="text" class="form-control @error('VehicleBrand') is-invalid @enderror" name="VehicleBrand" value="{{ $VehicleBrand }}" required autocomplete="VehicleBrand" autofocus>
                  @error('VehicleBrand')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
           </div> 

           <div class="col-50"> 
              <label for="VehicleReg" class="col-md-6 col-form-label text-sm-left">Register</label>
              <div class="col-md-10">
                  <input id="VehicleReg" type="text" class="form-control @error('VehicleReg') is-invalid @enderror" name="VehicleReg" value="{{ $VehicleReg }}" required autocomplete="VehicleReg" autofocus>
                  @error('VehicleReg')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
           </div>            
          </div>

          <div class="form-group row">
           <div class="col-25"> 
              <label for="NumSeats" class="col-md-6 col-form-label text-sm-left">Seats</label>
              <div class="col-md-6">
                  <input id="NumSeats" type="number" class="form-control @error('NumSeats') is-invalid @enderror" name="NumSeats" value="{{ $NumSeats }}" required autocomplete="NumSeats" autofocus>
                  @error('NumSeats')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
           </div>
           <div class="col-50"> 
              <label for="Notes" class="col-md-6 col-form-label text-sm-left">Notes</label>
              <div class="col-md-12">
                 <input id="Notes" type="text" class="form-control @error('Notes') is-invalid @enderror" name="Notes" value="{{ $Notes }}" autocomplete="Notes" autofocus>
                  @error('Notes')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
           </div> 
           <div class="col-50"> 
              <label for="Enable" class="col-md-12 col-form-label text-sm-left">Enable</label>
              <div class="col-md-8">
                  <input type="checkbox" id="Enable" name="Enable" class="form-control" {{$Check}}> 
              </div>
              <input type="hidden" id="IdVehicle" name="IdVehicle" value="{{$IdVehicle}}">
           </div> 
           </div>     
       </div>
       <div class="card-footer">
        <button type="submit" value="Save" class="btn btn-primary {{$save}}"><i class="fas fa-save"></i></button>
        <button type="button" value="Search" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fas fa-search"></i></button>
        <button type="submit" value="Update" class="btn btn-primary {{$update}}"><i class="fas fa-edit"></i></button>
        <a href="{{route('vehicles')}}" type="button" value="Discard" class="btn btn-primary"><i class="fas fa-window-close"></i></a>
       </div>
      </form>
      
     </div>
    </div>
  </div>
</div>

<!----------MODAL------------->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Search vehicles</h6>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="container">
         <h5>Vehicle brand :</h5>
         <input class="form-control" id="myInput" type="text" placeholder="Search.."><br>
         <div class="container-fluid" id="listaCompra"> 
           <table class="table">
              <tr>
                 <th>Vechicle</th><th></th>
              </tr>
            <tbody id="myTable">
            @foreach($vehicles as $vehicle)  
             <tr>
                <td>{{$vehicle->VehicleBrand}} {{$vehicle->Model}} {{$vehicle->VehicleReg}}</td>
                <td>
                  <form method="POST" action="{{route('searchvehicle')}}">
                    @csrf
                  <input type="hidden" name="IdVehicle" id="IdVehicle" value="{{$vehicle->IdVehicle}}">  
                  <button type="submit" class="btn btn-standard"><i class="fas fa-search"></i></button>
                  </form>  
                </td>
             </tr>
            @endforeach 
            </tbody>
           </table>    
         </div>  
        </div>

      </div>
      <div class="modal-footer">
        Select one
      </div>
    </div>
  </div>
</div>
<!----------MODAL------------->


@endsection

@push('child-scripts')
  <script src="{{ asset('js/vehicles.js') }}">
  </script>
@endpush