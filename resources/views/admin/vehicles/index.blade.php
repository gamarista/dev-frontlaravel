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


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Admin vehicles</div>

              
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                        

                    <div class="container">

                        <div class="input-group mb-3 ">
                            <div class="input-group-prepend ">
                              <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                            </div>
                            <input style="width: 50%;"  id="myInput" type="text" placeholder="Search" >
                        </div>
                        
                        
                        <div class="row justify-content-end">
                            <div class="col-4">
                               
                              </div>
                          <div class="col-2">
                            <a  class="btn" style="background-color: #1EC96E;" href="{{route('resource.vehicles.create')}}" > <i class="fas fa-bus"></i> New vehicle</a>
                          </div>
                   
                    </div>

                    <div class="container">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">License </th>
                                <th scope="col"> Model </th>
                                <th scope="col">Brand</th>
                                <th scope="col"> Seats </th>
                                <th scope="col"> Status </th>
                              
                             
                              </tr>
                            </thead>
                            <tbody  id="tableVehicles">
                                @foreach ($vehicles as $vehicle)
                                <tr>
                                    <td style="">{{$vehicle->VehicleReg}}</td>
                                    <td style="">{{$vehicle->Model}}</td>
                                    <td style="">{{$vehicle->VehicleBrand}}</td>
                                    <td style="">{{$vehicle->NumSeats}}</td>
                                    <td  id= "tdstatus-{{$vehicle->IdVehicle}}" style="" >
                                        @if ($vehicle->Enable == 1)
                                          <strong> activated  </strong>
                                        @else     
                                        <strong> disabled </strong>
                                        @endif
                     
                                    </td>
                                    <td>
                                        @if ($vehicle->Enable == 1)
                                        <button id="btnstatus-{{$vehicle->IdVehicle}}" value="{{$vehicle->Enable}}-{{$vehicle->VehicleReg}}" data-toggle="modal" data-target="#statusdrivermodal" type="button" class="btn float-right" style="background-color: #EF4B4B; margin-right: 5px; width: 95px" >Disable</button>
                                        @else     
                                        <button id="btnstatus-{{$vehicle->IdVehicle}}"  value="{{$vehicle->Enable}}-{{$vehicle->VehicleReg}}" data-toggle="modal" data-target="#statusdrivermodal" type="button" class="btn float-right" style="background-color: #1EC96E; margin-right: 5px; width: 95px" >Enable</button>
                                         @endif
                                       <a href="{{route('resource.vehicles.edit',['id' => $vehicle->IdVehicle])}}" class="btn float-right" style="background-color: #AFE9EF; margin-right: 5px;width: 95px;" >Edit</a>

                                    </td>
                                  
                                  </tr>

                                @endforeach
                                {{Form::label('idriver',null, ['id' => 'iddriver', 'style' => 'display:none'])}}
                          
                        
                           
                            </tbody>
                          </table>
                          {{  $vehicles->withQueryString()->links()  }}
                    
                    </div>
                     

                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal"  id="statusdrivermodal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"> ... </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p id="statusdrivertext"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id ="savestatus">Yes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>
  

@endsection
@push('child-scripts')
    <script type="text/javascript" src="{{ URL::asset ('js/resource-vehicles.js') }}"></script>
    <script>
    function myFunction() {
        console.log("no funciona");
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("table-vehicles");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[0];
          if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }       
        }
      }

    </script>   

@endpush

