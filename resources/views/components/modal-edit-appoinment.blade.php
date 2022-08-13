
  <div class="modal fade" id="editlationTripModal-{{$appoinment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog  modal-xl"  role="document">
      <div class="modal-content">
        <div class="modal-header">
          <div class="row">
          
         <h5 class="modal-title" id="exampleModalLongTitle">&nbsp;&nbsp;&nbsp;Service Id: {{ $appoinment->id}} for {{ $appoinment->LastName . " " . $appoinment->FirstName }}</h5>             
            
          </div>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <form>
     <div class="row">         
      <div class="col-6">        
             
                <div class="col-10">
                  <div class="row">
                    <div class="col-4">
                      {{Form::label('labeleditcellphone', 'Pt. cell phone')}}
                      {{Form::text('MobilNumber', $appoinment->MobilNumber,['class' => 'form-control','id' => 'editcellphone-'.$appoinment->id,'required']) }}
                    </div>
                    <div class="col-4">
                      {{Form::label('labeledithomephone', 'Pt. home phone')}}
                      {{Form::text('PhoneNumber', $appoinment->PhoneNumber,['class' => 'form-control','id' => 'edithomephone-'.$appoinment->id,'required']) }}
                      {{Form::label('labeltriptypeedit', $appoinment->TripType,['class' => 'awesome', 'id' => 'labeledittriptype-'.$appoinment->id,'style' => 'display:none'])}}
                    </div>
                    <div class="col-4">
                      {{Form::label('labeldayphone', 'Day Phone')}}
                      {{Form::text('apptDayPhone',null,['class' => 'form-control','id' => 'editapptdayphone-'.$appoinment->id]) }}
                    </div>
                    <!--<div class="col-3">
                      {{Form::label('labeleditaltphone', 'Alt. Phone')}}
                      {{Form::text('apptAltPhone',null,['class' => 'form-control','id' => 'editapptatlphone-'.$appoinment->id]) }}
                    </div>-->
                  </div>
                </div>

 
              <fieldset class="form-group">
                <div class="row">
                  <legend class="col-form-label ">Pickup address:</legend>
                  <div class="col-sm">
                    <div class="form-check">
                      {{Form::checkbox('checkanotheraddress','',true,['class' => 'form-check-input check-address','id' => 'checkanotheraddress-'.$appoinment->id])}}
                      {{Form::label('checkanotheraddressfor', 'Another address', ['class' => 'form-check-label'])}}
                    </div>
                    <div class="form-check">
                      {{Form::checkbox('checkknowaddress','',false,['class' => 'form-check-input check-address','id' => 'checkaddressknow-'.$appoinment->id])}}
                    {{Form::label('checkknowaddressfor', 'Use know address', ['class' => 'form-check-label'])}}
                    </div>
                    <div class="form-check disabled">
                      {{Form::checkbox('forcheckcenters','',false,['class' => 'form-check-input check-address','id' => 'checkboxcenters-'.$appoinment->id])}}
                      {{Form::label('labelcheckcenters', 'Centers', ['class' => 'form-check-label'])}}
                    </div>
                  </div>
                </div>
              </fieldset>

              <div class="form-group">
                {{Form::text('addressEdit', $showPickAnother(),['class' => 'form-control input-address', 'id' => 'inputknowaddress-'.$appoinment->id, 'placeholder' => 'Another Address' ])}}
                {{ Form::select('knowAddress', $addresses,$showPickKnow(),['placeholder' => '--Not assigned--','class' => 'form-control input-address','id' => 'selectknowaddressedit-'.$appoinment->id
                                             ,'style' => 'display:none']) }}
                {{ Form::select('centerEdit', $centers,$showPickCenter(),['placeholder' => '--Not assigned--','class' => 'form-control input-address','id' => 'selectcentersedit-'.$appoinment->id
                                             ,'style' => 'display:none'
                ]) }}
               </div>

               <fieldset class="form-group">
                <div class="row">
                  <legend class="col-form-label ">Dropoff address:</legend>
                  <div class="col-sm">
                    <div class="form-check">
                      {{Form::checkbox('dropoffanotheraddress','',true,['class' => 'form-check-input check-address','id' => 'dropoffanotheraddress-'.$appoinment->id])}}
                      {{Form::label('dropoffanotheraddressfor', 'Another address', ['class' => 'form-check-label'])}}
                    </div>
                    <div class="form-check">
                      {{Form::checkbox('dropoffknowaddress','',false,['class' => 'form-check-input check-address','id' => 'dropoffaddressknow-'.$appoinment->id])}}
                      {{Form::label('dropoffknowaddressfor', 'Use know address', ['class' => 'form-check-label'])}}
                    </div>
                    <div class="form-check disabled">
                      {{Form::checkbox('fordropoffcenters','',false,['class' => 'form-check-input check-address','id' => 'dropoffboxcenters-'.$appoinment->id])}}
                      {{Form::label('labeldropoffcenters', 'Centers', ['class' => 'form-check-label'])}}
                    </div>
                  </div>
                </div>
              </fieldset>

              <div class="form-group">
                {{Form::text('dropoffaddressEdit',$showDropoffAnother(),['class' => 'form-control input-address', 'id' => 'dropoffinputknowaddress-'.$appoinment->id, 'placeholder' => 'Another Address' ])}}
                {{ Form::select('dropoffknowAddress', $addresses,$showDropoffPickKnow(),['placeholder' => '--Not assigned--','class' => 'form-control input-address','id' => 'dropoffselectknowaddressedit-'.$appoinment->id
                                             ,'style' => 'display:none']) }}
                {{ Form::select('dropoffcenterEdit', $centers,$showDropoffCenter(),['placeholder' => '--Not assigned--','class' => 'form-control input-address','id' => 'dropoffselectcentersedit-'.$appoinment->id
                                             ,'style' => 'display:none'
                ]) }}
               </div>

              <div class="row">
                <div class="col">
                  {{Form::label('labeleditappttime', 'Appt. Time')}}
                  {{Form::text('apptTimeEdit', $appoinment->Time,['class' => 'form-control','id' => 'editapptime-'.$appoinment->id]) }}
                </div>
                <div class="col">
                  {{Form::label('labeleditservicetype', 'Service Type')}}
                  {{ Form::select('appTripType', [ 'A' => 'Pickup', 'B' => 'Return' ],$appoinment->TripType,['class' => 'form-control','id' => 'editapptriptype-'.$appoinment->id]) }}
                </div>
                <div class="col">
                  {{Form::label('labeleditreturntime', 'Return Time')}}
                  {{Form::text('apptReturnTimeEdit', $appoinment->return_time,['class' => 'form-control','id' => 'editreturntime-'.$appoinment->id]) }}
                </div>
              </div>

           
</div>

<div class="col">
  <div id="mapEdit-{{$appoinment->id}}" style="width: 100%;height: 100%;">
</div>
                  
</div>
</div>
           <br>  

              <div class="row">
                <div class="col-6">

                  <div class="row">
                    <div class="col-6">
                      {{Form::label('labelatentiontype', 'Attention Type')}}
                      {{ Form::select('selectatentiontype', ['PCP' => 'PCP', 'Wellness' => 'Wellness', 'Specialist' => 'Specialist'],$appoinment->attention_type,['placeholder' => '--Not assigned--','class' => 'form-control','id' => 'atettiontypeid-'.$appoinment->id
                                                  ]) }}
                    </div>
                    <div class="col-6">
                      {{Form::label('labeldestinationtype', 'Destination Type')}}
                     
                      &nbsp;  &nbsp;
                      <strong>
                      {{Form::label('destinationtype',$showDestinationType(), ['class' => 'awesome','id' => 'showdestinationtypeid-'.$appoinment->id])}}
                      </strong>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      {{Form::label('labeldestinycentername', 'Dest. Center name')}}
                      {{Form::text('textcenternamedestination', $appoinment->outside_center_name,['class' => 'form-control','id' => 'editcenternamedestination-'.$appoinment->id]) }}
                   
                    </div>
                  
                    <div class="col-6">
                      {{Form::label('labeldestinycenterphone', 'Dest. Center phone')}}
                      {{Form::text('textcenterphonedestination', $appoinment->outside_center_phone,['class' => 'form-control','id' => 'editcenterphonedestination-'.$appoinment->id]) }}
                      </strong>
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-6 ">
                      {{Form::label('labelapptdoctorresource', 'Appt. doctor / resource')}}
                      {{Form::text('textapptdoctorresource', $appoinment->outside_doctor_resource,['class' => 'form-control','id' => 'editapptdoctorresource-'.$appoinment->id]) }}
                   
                    </div>
                    <div class="col-6">
                      {{Form::label('labelapptmotive', 'Appt. motive')}}
                      {{Form::text('textapptmotive', $appoinment->outside_motive,['class' => 'form-control','id' => 'editapptmotive-'.$appoinment->id]) }}
                      </strong>
                    </div>

                  </div>


                  
                </div>


                <div class="col-6">
                  <div class="form-group">
                    {{Form::label('labeltextareanotes', 'Notes')}}
                    {{Form::textarea('textareanotes', $appoinment->notes, [
                      'class'      => 'form-control',
                      'rows'       => 1, 
                      'id'         => 'editnotes-'. $appoinment->id
                  ])}}
                  </div>
                 
                  <div class="form-group">
                    {{Form::label('labelapptdetailsmotive', 'Appt. motive details')}}
                    {{Form::textarea('textareaapptmotivedetails', $appoinment->outside_motive, [
                      'class'      => 'form-control',
                      'rows'       => 1, 
                      'id'         => 'editapptmotivedetails-'. $appoinment->id
                  ])}}
                  </div>
                </div>
              </div>

           

              <div class="card mb-3">
                <div class="card-header">
                  Special requirements
                </div>
                <div class="card-body">
                  @foreach($requeriments as $keys => $groupRequeriments)
                  
                  <div class="form">
                    <div class="row requeriments">
                    @foreach($groupRequeriments as $key => $requeriment)
                  
                      <div class="col-sm">
                        @php
                          $check = false;
                        @endphp
                       
                        @foreach($patienRequeriments as $userRequeriment)
                          @if($userRequeriment == $key)
                            @php
                              $check = true;
                            @endphp
                            @break
                          @else
                            @php
                              $check = false;
                            @endphp
                          @endif
                        @endforeach 
                       

                        @if ($check == true)

                        {{Form::checkbox('checkrequeriment'. $key ,'',true,['class' => 'form-check-input','id' => 'editrequeriment-'.  $appoinment->id . '-' . $key ])}}
                          {{Form::label('requeriment'. $key , $requeriment, ['class' => 'form-check-label','id' => 'requerimenttext-'. $appoinment->id . '-'.$key ])}}
                        @else
                          {{Form::checkbox('checkrequeriment'. $key ,'',false,['class' => 'form-check-input','id' => 'editrequeriment-'.  $appoinment->id . '-' . $key ])}}
                          {{Form::label('requeriment'. $key , $requeriment, ['class' => 'form-check-label','id' => 'requerimenttext-'. $appoinment->id . '-'.$key ])}}
                        @endif
                      </div>
                    @endforeach
                  </div>
                  </div>
  
                @endforeach
                
                </div>
              </div>
              <!--
              <div class="form">
               
                 <select multiple class="form-control" id="specialrequeriment-{{$appoinment->id}}" name="PhysicalLimits[]">
                   <option>Wheelchair</option>
                   <option>Walker</option>
                   <option>Companion</option>
                   <option>Oxygen</option>
                 </select>
              
              </div>
            -->
            </form>
    
          </div>


         
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          {{Form::button('Save', ['class' =>'btn btn-primary', 'id' => 'saveedit-'. $appoinment->id ])}}
          
        </div>
      </div>
    </div>

  </div>

