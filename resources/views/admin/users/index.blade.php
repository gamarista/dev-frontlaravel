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
                <div class="card-header">Admin users</div>

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
                            <a  class="btn" style="background-color: #1EC96E;" href="{{route('resource.users.create')}}" > <i class="fas fa-user"></i> New user</a>
                          </div>
                   
                    </div>

                    <div class="container">
                        <table class="table ">
                            <thead>
                              <tr>
                                <th scope="col"> Name </th>
                                <th scope="col"> Username </th>
                                <th scope="col"> Role </th>   
                                <th scope="col"> Status </th>   
                                
                              </tr>
                            </thead>
                            <tbody id="tableUsers">
                                @foreach ($users as $user)
                                <tr>
                                    <td style="">{{$user->name}}</th>
                                    <td style="">{{$user->email}}</th>
                                    <td style="">{{$user->role['Name']}} </td>
                                    <td  id= "tdstatus-{{$user->Id}}" style="" >
                                        @if ($user->enable == 1)
                                          <strong> activated  </strong>
                                        @else     
                                        <strong> disabled </strong>
                                        @endif
                     
                                      </td>
                
                                    <td style="" >
                                        <a href="{{route('resource.users.resetpassword',['id' => $user->id])}}" class="btn float-right" style="background-color: #EFEFEF; margin-right: 5px;width: 115px;" >Password</a>
                                        @if ($user->enable == 1)
                                        <button id="btnstatus-{{$user->id}}" value="{{$user->enable}}-{{$user->email}}" data-toggle="modal" data-target="#statusdrivermodal" type="button" class="btn float-right" style="background-color: #EF4B4B; margin-right: 5px; width: 111px" >Disable</button>
                                      @else     
                                        <button id="btnstatus-{{$user->id}}"  value="{{$user->enable}}-{{$user->email}}" data-toggle="modal" data-target="#statusdrivermodal" type="button" class="btn float-right" style="background-color: #1EC96E; margin-right: 5px; width: 111px" >Enable</button>
                                      @endif
                                      
                                       <a href="{{route('resource.users.edit',['id' => $user->id])}}" class="btn float-right" style="background-color: #AFE9EF; margin-right: 5px;width:111px;" >Edit</a>

                                    </td>
                                  
                                  </tr>

                                @endforeach
                                {{Form::label('iduser',null, ['id' => 'iduser', 'style' => 'display:none'])}}
                          
                        
                           
                            </tbody>
                          </table>
                          {{  $users->withQueryString()->links()  }}
                    
                    </div>
                     

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->

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
<script type="text/javascript" src="{{ URL::asset ('js/resource-user.js') }}"></script>
@endpush
