
   
            
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

            {{ Form::open(['route' => 'resource.centers.store', 'method' => 'POST', 'class' => 'container']) }}
            @csrf

            <div class="form-group">
              <h3> New center </h3>
              
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                {{Form::text('Name', null,['class' => 'form-control','id' => 'nicknamecenter', 'required']) }}
              
            </div>
             
              <div class="form-group">
                  
                <label for="exampleInputPassword1">Alias</label>
             
                {{Form::text('NickName', null,['class' => 'form-control','rows' => '3','id' => 'nicknamecenter', 'required']) }}
              
              </div>
              <div class="form-group">
                  
                  <label for="exampleInputPassword1">Address</label>
                 
                  {{Form::text('AddressMedicalC', null,['class' => 'form-control','id' => 'addresscenter', 'required']) }}
                 
              </div>

              <div class="form-row ">
                  <div class="form-group col">
                      <label for="exampleInputPassword1">Specialty</label>
                   
                      {{Form::text('specialty', null,['class' => 'form-control','id' => 'specialtycenter']) }}
                  
                  </div>
                  <div class="col">
                      <label for="exampleInputPassword1">Doctor</label>
                      
                      {{Form::text('doctor', null,['class' => 'form-control','id' => 'doctorcenter']) }}
                     
                  </div>
                </div>

                <div class="form-row ">
                  <div class=" form-group col">
                      <label for="exampleInputPassword1">Phone 1</label>
                      {{Form::text('NumberPhone', null,['class' => 'form-control','id' => 'phoone1center', 'required']) }}
                  </div>
                  <div class=" form-group col">
                      <label for="exampleInputPassword1">Phone 2</label>
                      {{Form::text('phone2', null,['class' => 'form-control','id' => 'phone2center', 'required']) }}
                  </div>
                  <div class="col form-group">
                      <label for="exampleInputPassword1">Fax</label>
                      {{Form::text('fax', null,['class' => 'form-control','id' => 'phone3center', 'required']) }}
                  </div>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  {{Form::email('email',null,['class' => 'form-control','id' => 'emailcenter', 'required']) }}
                </div>

                <div class="modal-footer">
                    <a href="{{route('resource.centers')}}"   class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                    {{Form::submit('Save', ['class' =>'btn btn-primary' ])}}
                    
                </div>
            
      
    
            {{ Form::close() }}
    @endsection

 

   
      


