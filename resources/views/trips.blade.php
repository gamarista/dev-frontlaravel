@extends('layouts.app')
@section('content')

 
<div class="container">
 <div class="row justify-content-center">
  <div class="col-md-14">
   <div class="card">
    <div class="card-header">
      <table>
        <tr>
          <td>Dashboard Trips</td>
                             
        </tr>
      </table>
    </div>
      <div class="card-body">
       <!--<div class="container">-->
        @if (isset($numproc)) 
          <div class="alert alert-success alert-dismissible">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Success! </strong>Total records processed {{ ' '.$numproc }}
           </div>
        @endif
  <!--<div class="table-sm">-->
  <div style="height:300px;overflow:scroll;">
    <table class="table" style="border-collapse: collapse;width: 100%;">
      <thead>
        <tr>
          
          <th style="width: 25%">Patient</th>
          <th style="width: 35%">Route</th>
          <th style="width: 20%">Special Needs</th>
          <th style="width: 10%">Distance</th>
          <th style="width: 10%">Duration</th>
        </tr>
      </thead>
      <tbody>
        @foreach($appoinments as $appoinment)
        <tr>
          <td>
            
  <button type="button" class="btn btn-standard" data-toggle="collapse" data-target="#demo{{$appoinment->PatNumber}}"><p class="font-weight-normal">{{$appoinment->LastName}} {{$appoinment->FirstName}}</p></button>
  <div id="demo{{$appoinment->PatNumber}}" class="collapse">
   <small> Birth day: {{$appoinment->DOB}}  <br>Phones: {{$appoinment->PhoneNumber}} / {{$appoinment->MobilNumber}} <br> Notes: {{$appoinment->Notes}}</small>
  </div> 
          </td>
          <td><small><span style="font-weight: bold;">Time:</span>{{$appoinment->Time}} <span style="font-weight: bold;">Pickup address:</span>{{$appoinment->AddressPatient}}, {{$appoinment->City}}, {{$appoinment->State}} {{$appoinment->ZipCode}} <span style="font-weight: bold;">Dropoff addres:</span> {{$appoinment->AddressDestination}}</small></td>
          <td><small>{{$appoinment->ConsultDestination}}</small></td>
          <td>{{$appoinment->dist}}</td>
          <td>{{$appoinment->duration}}</td>
        </tr>


        @endforeach
      </tbody>
    </table>
  </div>     

       <!--</div>-->

     <div class="card-footer">
      <table><tr><td>
 
        <a href="{{route('tripsplanner')}}" type="button" value="Discard" class="btn btn-primary"><i class="fas fa-edit"></i></a></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
   
        </td></tr>
       </table> 
     </div>
 
      
     </div>
    </div>
  </div>
</div>

<!----------MODAL------------->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">Search Trips</h6>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="container">
         <h5>Trip :</h5>
         <input class="form-control" id="myInput" type="text" placeholder="Search.."><br>
         <div class="container-fluid" id="listaCompra"> 
           <table class="table">
              <tr>
                 <th>Vechicle</th><th></th>
              </tr>
            <tbody id="myTable">
            @foreach($appoinments as $appoinment)  
             <tr>
                <td>{{$appoinment->FirstName}}</td>
                <td>
                  <form method="POST" action="">
                    @csrf
                  <input type="hidden" name="IdVehicle" id="IdVehicle" value="{{$appoinment->Id}}">  
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