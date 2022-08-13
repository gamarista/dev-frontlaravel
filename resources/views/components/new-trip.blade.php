
   
            {{ Form::open(['route' => 'trips.store', 'method' => 'POST', 'class' => 'container']) }}
            @csrf
            <div class="form-group row">

              <div class="col-sm-4 my-1">
               
                <div class="input-group">
                 
                  {{Form::text('IdMC',$patient->MedicalNumber,['class'=> 'form-control', 'id' => 'medicalnumber','placeholder' => 'Medical number', 'disabled' => 'disabled'])}}
                  <div class="input-group-prepend">
                    {{Form::text('patientId',$patient->Id,['class'=> 'form-control', 'id' => 'patientid','placeholder' => 'Id patient','style' => 'display:none'])}}
                    
                    </div>
                 
                </div>
              </div>

              <div class="col-sm-8 my-1">
                {{Form::text('patientname',$patient->Names,['class'=> 'form-control', 'placeholder' => 'patient', 'disabled' => 'disabled',])}}
            
              </div>
          
            </div>

            <div class="card">
              <div class="card-header">
                <h5>Destinantion medical center</h5>
                <div class="form-group">

                  {{ Form::select('IdMedicalC', $centers,null,['placeholder' => '--Not assigned--','class' => 'form-control','id' => 'IdMedicalC','required']) }}
                </div>
               
              </div>
              <div class="card-body" >

                <div class="form-row" >
                  <div class="form-group col-md-6">
                   <strong>  {{ Form::label('labelname', 'Name')}}  </strong>
                    {{Form::text('centername',null,['id' => 'centername','class'=> 'form-control', 'placeholder' => 'Name medical center', 'disabled' => 'disabled','required'])}}
                  </div>
                  <div class="form-group col-md-6">
                    <strong>  {{ Form::label('labelnickname', 'Nickname')}}  </strong>
                    {{Form::text('nickname',null,['id' =>'nickname','class'=> 'form-control', 'placeholder' => 'Nickname', 'disabled' => 'disabled','required'])}}
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-3">
                    <strong> {{ Form::label('labelphoneone', 'Phone 1')}}  </strong>
                    {{Form::text('phoneone',null,['id' => 'phoneone','class'=> 'form-control', 'placeholder' => 'Phone number 1', 'disabled' => 'disabled','required'])}}
                  </div>
                  <div class="form-group col-md-3">
                    <strong> {{ Form::label('labelname', 'Phone 2')}}  </strong>
                    {{Form::text('phonetwo',null,['id' => 'phonetwo','class'=> 'form-control', 'placeholder' => 'Phone number 2', 'disabled' => 'disabled'])}}
                  </div>
                  <div class="form-group col-md-3">
                    <strong> {{ Form::label('labelfax', 'Fax')}}  </strong>
                    {{Form::text('faxnumber',null,['id' => 'faxnumber','class'=> 'form-control', 'placeholder' => 'Fax number', 'disabled' => 'disabled'])}}
                  </div>
                  <div class="form-group col-md-3">
                    <strong> {{ Form::label('labelemail', 'Email')}}  </strong>
                    {{Form::text('emailcenter',null,['id' => 'emailcenter','class'=> 'form-control', 'placeholder' => 'Email', 'disabled' => 'disabled','required'])}}
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-12">
                    <strong> {{ Form::label('labelcenteraddress', 'Address')}}  </strong>
                    {{Form::text('centerAddress',null,['id' => 'centeraddress','class'=> 'form-control', 'placeholder' => 'Center address', 'disabled' => 'disabled','required'])}}
                  </div>
                </div>

              </div>

            </div>
        
            <br/>
            <div class="card">
              <div class="card-body">

                <div class="form-row">
                  <div class="form-group col-md">
                    <strong> {{ Form::label('label visittype', 'Visit type')}}  </strong>
                    {{ Form::select('visittype',[1=> 'PCP', 2 => 'Wellness', 3 => 'Specialist'],null,['placeholder' => 'select...','class' => 'form-control','required']) }}
                  </div>   
                  <div class="form-group col-md">
                    <strong>  {{ Form::label('labelservictype', 'Service type')}}  </strong>
                    {{ Form::select('servicetype',  [ 1 => 'Pickup', 2 => 'Drop off', 3 => 'PICKUP/DROP OFF' ],null,['placeholder' => 'select...','id' => 'servicetype','class' => 'form-control', 'required']) }}
                  </div>      
              
                </div>

                <div class="form-row ">
                  <div class="col-sm-6 my-1">
                    <strong> {{ Form::label('pickuphouse', 'Pick up at house')}}  </strong>
                    <input type="datetime-local" class="form-control" id="pickuptime" name="pickuptime" placeholder="mm-dd-yyy hh:mm" required>
                  </div>
                  <div class="col-sm-6 my-1">
                    <strong> {{ Form::label('Dropoffatcenter', 'Dropoff at center')}}  </strong>
                    <input type="datetime-local" class="form-control" id="Dropoffatcenter" name="dropoffcenter" placeholder="mm-dd-yyy hh:mm" required>
                  </div>
             
                </div>
                <div class="form-row ">
                  <div class="col-sm-6 my-1">
                    <strong> {{ Form::label('Pickucenter', 'Pick up at center')}} </strong>
                    <input type="datetime-local" class="form-control" id="Pickucenter" name="pickupcenter" placeholder="mm-dd-yyy hh:mm" required>
                  </div>
                  <div class="col-sm-6 my-1">
                    <strong>  {{ Form::label('DropOffTime', 'Dropoff at house')}}  </strong>
                    <input type="datetime-local" class="form-control" id="DropOffTime" name="dropofftime" placeholder="mm-dd-yyy hh:mm" required>
                  </div>
               
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <strong>  {{ Form::label('labelnotes', 'Notes')}}  </strong>
                    {{Form::textarea('notes',null,['class'=> 'form-control', 'placeholder' => 'Notes', 'rows' => 4 ])}}
                  </div>
                  <div class="form-group col-md-6">
                    <strong>  {{ Form::label('labeltransportation', 'Special requirements')}}  </strong>
                    <select multiple class="form-control" id="specialrequeriment" name="requeriments">
                      <option>Wheelchair</option>
                      <option>Walker</option>
                      <option>Companion</option>
                      <option>Oxygen</option>
                    </select>
                  </div>
                </div>
                      
                <div class="modal-footer">
                  <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>-->
                  
                  <a href="{{route('getpatients')}}" type="button"  class="btn btn-secondary">Cancel</a> 
                  {{Form::submit('Save', ['class' =>'btn btn-primary', 'id' => 'savetrip' ])}}
                  
                </div>
                 
              </div>
            </div>
      
       
         
            {{ Form::close() }}
    

 

   
      


