
   
            
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

            {{ Form::open(['route' => 'resource.centers.update', 'method' => 'PUT', 'class' => 'container']) }}
            @csrf

            <div class="form-group">
              <h3> New center </h3>
              
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                {{Form::text('Name', $center->Name,['class' => 'form-control','id' => 'nicknamecenter', 'required']) }}
              
            </div>
             
              <div class="form-group">
                  
                <label for="exampleInputPassword1">Alias</label>
             
                {{Form::text('NickName',  $center->NickName,['class' => 'form-control','rows' => '3','id' => 'nicknamecenter', 'required']) }}
              
              </div>
              <div class="form-group">
                  
                  <label for="exampleInputPassword1">Address</label>
                 
                  {{Form::text('AddressMedicalC',  $center->AddressMedicalC,['class' => 'form-control','id' => 'addresscenter', 'required']) }}
                 
              </div>

              <div class="form-row ">
                  <div class="form-group col">
                      <label for="exampleInputPassword1">Specialty</label>
                   
                      {{Form::text('specialty', $center->Specialty,['class' => 'form-control','id' => 'specialtycenter', 'required']) }}
                  
                  </div>
                  <div class="col">
                      <label for="exampleInputPassword1">Doctor</label>
                      
                      {{Form::text('doctor', $center->NameDr,['class' => 'form-control','id' => 'doctorcenter', 'required']) }}
                     
                  </div>
                </div>

                <div class="form-row ">
                  <div class=" form-group col">
                      <label for="exampleInputPassword1">Phone 1</label>
                      {{Form::text('NumberPhone', $center->NumberPhone1,['class' => 'form-control','id' => 'phoone1center', 'required']) }}
                  </div>
                  <div class=" form-group col">
                      <label for="exampleInputPassword1">Phone 2</label>
                      {{Form::text('phone2',  $center->NumberPhone2,['class' => 'form-control','id' => 'phone2center', 'required']) }}
                  </div>
                  <div class="col form-group">
                      <label for="exampleInputPassword1">Fax</label>
                      {{Form::text('fax', $center->FaxNumber,['class' => 'form-control','id' => 'phone3center', 'required']) }}
                  </div>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  {{Form::email('email', $center->Email,['class' => 'form-control','id' => 'emailcenter', 'required']) }}
                </div>

                {{Form::text('id',$center->IdMedicalC,['class'=> 'form-control','placeholder' => 'Id center','style' => 'display:none'])}}

                <div class="modal-footer">
                    <a href="{{route('resource.centers')}}"   class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                    {{Form::submit('Save', ['class' =>'btn btn-primary' ])}}
                    
                  </div>
            
      
    
            {{ Form::close() }}
    @endsection

 

   
      


