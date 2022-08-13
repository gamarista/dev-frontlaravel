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
                <div class="card-header">Admin Drivers</div>

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
                            <a  href="{{route('resource.drivers.create')}}"  class="btn" style="background-color: #1EC96E;"><i class="fas fa-user"></i> New driver</a>
                          </div>
                   
                    </div>

                    <div class="container">
                        <table class="table ">
                            <thead>
                              <tr>
                                <th scope="col">Driver</th>
                                <th scope="col">Card Number</th>
                                <th scope="col">Vehicule</th>
                                <th scope="col">Zone</th>
                                <th scope="col">Center</th>
                                <th scope="col">Status</th>
                               
                              
                             
                              </tr>
                            </thead>
                            <tbody id="tableDrivers">
                                @foreach ($drivers as $driver)
                                <tr>

                                    <td style="">{{$driver->Driver}}</td>
                                    <td style="">{{$driver->driver_card_number}}</td>
                                    <td style="">{{$driver->vehicule['VehicleReg']}}</th>
                                    <td style="">{{$driver->zones['Name']}}</td>
                                    <td style="">{{$driver->center['Name']}}</td>

                                    <td  id= "tdstatus-{{$driver->Id}}" style="" >
                                      @if ($driver->Enable == 1)
                                        <strong> activated  </strong>
                                      @else     
                                      <strong> disabled </strong>
                                      @endif
                   
                                    </td>
                                  
                                   
                                    <td style="" >
                                      @if ($driver->Enable == 1)
                                        <button id="btnstatus-{{$driver->Id}}" value="{{$driver->Enable}}-{{$driver->Driver}}" data-toggle="modal" data-target="#statusdrivermodal" type="button" class="btn float-right" style="background-color: #EF4B4B; margin-right: 5px; width: 95px" >Disable</button>
                                      @else     
                                        <button id="btnstatus-{{$driver->Id}}"  value="{{$driver->Enable}}-{{$driver->Driver}}" data-toggle="modal" data-target="#statusdrivermodal" type="button" class="btn float-right" style="background-color: #1EC96E; margin-right: 5px; width: 95px" >Enable</button>
                                      @endif
                                      <a href="{{route('resource.drivers.edit',['id' => $driver->Id])}}" class="btn float-right" style="background-color: #AFE9EF; margin-right: 5px; width: 95px" >  Edit  </a>
                                    </td>
                                  
                                  </tr>

                                @endforeach
                                {{Form::label('idriver',null, ['id' => 'iddriver', 'style' => 'display:none'])}}
                          
                        
                           
                            </tbody>
                          </table>
                          {{  $drivers->withQueryString()->links()  }}
                    
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
    <script type="text/javascript" src="{{ URL::asset ('js/resource-driver.js') }}"></script>
@endpush



