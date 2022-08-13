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
                <div class="card-header">Admin Centers</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                        
                        <div class="row justify-content-end">
                            <div class="col-4">
                               
                              </div>
                          <div class="col-2">
                            <a  class="btn" style="background-color: #1EC96E;" href="{{route('resource.centers.create')}}" > <i class="fas fa-hospital"></i> New center</a>
                          </div>
                   
                    </div>

                    <div class="container">
                        <table class="table ">
                            <thead>
                              <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Alias</th>
                                <th scope="col"> Address</ADdress></th>
                              
                             
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($centers as $center)
                                <tr>
                                    <td style="">{{$center->Name}}</th>
                                    <td style="">{{$center->NickName}}</td>
                                    <td style="">{{$center->AddressMedicalC}}</td>
                                    <td style="" >
                                      
                                       <a href="{{route('resource.centers.edit',['id' => $center->IdMedicalC])}}" class="btn float-right" style="background-color: #AFE9EF; margin-right: 5px;width: 90px;" ><i class="fas fa-edit"></i> Edit</a>

                                    </td>
                                  
                                  </tr>

                                @endforeach
                          
                        
                           
                            </tbody>
                          </table>
                          {{  $centers->withQueryString()->links()  }}
                    
                    </div>
                     

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->

  </div>

@endsection