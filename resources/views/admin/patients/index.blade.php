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
                <div class="card-header">Admin patients</div>

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
                            <a  class="btn" style="background-color: #1EC96E;" href="{{route('resource.patients.create')}}" > <i class="fas fa-wheelchair"></i> New patient</a>
                          </div>
                   
                    </div>

                    <div class="container">
                        <table class="table ">
                            <thead>
                              <tr>
                                <th scope="col">Name</th>
                                <th scope="col"> Medical number </th>
                                <th scope="col">Birthdate</th>
                                <th scope="col"> Address </th>
                                <th scope="col"> Phone </th>
                              
                             
                              </tr>
                            </thead>
                            <tbody id="tablePatients">
                                @foreach ($patients as $patient)
                                <tr>
                                    <td style="">{{$patient->Names}}</th>
                                    <td style="">{{$patient->MedicalNumber}}</th>
                                    <td style="">{{$patient->BOD}}</td>
                                    <td style="">{{$patient->PatientAddress}}</td>
                                    <td style="">{{$patient->ContactPreference}}</td>
                                    <td style="" >
                                      
                                       <a href="{{route('resource.patients.edit',['id' => $patient->Id])}}" class="btn float-right" style="background-color: #AFE9EF; margin-right: 5px;width: 90px;" ><i class="fas fa-edit"></i> Edit</a>

                                    </td>
                                  
                                  </tr>

                                @endforeach
                          
                        
                           
                            </tbody>
                          </table>
                          {{  $patients->withQueryString()->links()  }}
                    
                    </div>
                     

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->

  </div>

@endsection

@push('child-scripts')
    <script>
$(document).ready(function(){
    $("#myInput").on("keyup", function() {
        console.log("Ehhh");
        var value = $(this).val().toLowerCase();
        $("#tablePatients tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    
    
    </script>
@endpush
