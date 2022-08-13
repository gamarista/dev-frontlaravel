@extends('layouts.app')
@section('content')
<div class="container">
 <div class="row justify-content-center">
  <div class="col-md-12">
   <div class="card">
    <div class="card-header">Generate Routes Destinations</div>
    <div id="mimsg"></div>
    <div class="card-body">
     <div class="container">
     @php $medicalc = json_decode($medicalc); @endphp     
     <div class="form-row">
       <div class="col-md-4 mb-2">
        <!--<label for="MedicalDest"><i class="fas map-marker-alt"></i> Destination Point</label>-->
        <div class="form-check-inline">
          <label class="form-check-label" for="radio1">
            <input type="radio" class="form-check-input" id="radio1" name="radiodestinations" checked>Destination Point&nbsp;
          </label>
          <label class="form-check-label" for="radio2">  
            <input type="radio" class="form-check-input" id="radio2" name="radiodestinations">All Destinations Points
          </label>
        </div> 

        <select id="MedicalDest" name="MedicalDest" class="form-control">
           <option value='0' selected>Select one...</option>
            @foreach($medicalc as $dato)
              <option selected value='{{$dato->AddressDestination}}'>{{$dato->AddressDestination}}</option>  
            @endforeach
         </select>
       </div>  


       <div class="col-md-3 mb-3">
         <!--<label for="Driver"><i class="fas user-tie"></i> Driver</label>-->
        <div class="form-check-inline">
          <label class="form-check-label" for="radio3">
            <input type="radio" class="form-check-input" id="radio3" name="radiodrivers" checked>Driver&nbsp;
          </label>
          <label class="form-check-label" for="radio4">  
            <input type="radio" class="form-check-input" id="radio4" name="radiodrivers">All drivers
          </label>
        </div> 
        
         <select id="idDriver" name="idDriver" class="form-control" onchange="loadDoc('{{Request::root()}}')">
           <option value='0' selected>Select one...</option>
           @foreach($drivers as $driver)
            <option selected value='{{$driver->Driver}}'>{{$driver->Driver}}</option>  
           @endforeach
         </select>
       </div>    
       <div class="col-md-4 mb-3">
         <!--<label for="Driver"><i class="fas user-tie"></i> Driver</label>-->
        <div class="form-check-inline">
          <label class="form-check-label" for="radio5">
            <input type="radio" class="form-check-input" id="radio5" name="radioareas">Routes by Zip Codes&nbsp;
          </label>
        </div>      
      </div>
    </div>
 
  <div class="form-row">
   <div class="col-md-2 mb-3">
    <label for="dateGen"><i class="fas fa-calendar"></i> Date</label>
      <input type="date" id="dateGen" name="dateGen" onchange="loadDoc('{{Request::root()}}')" placeholder="Select a date" class="form-control">
       
   </div>
   <div class="col-md-2 mb-3">
       <label for="timeGenBegin"><i class="fas fa-hourglass"></i>Begin Time</label>
              <select class="form-control" id="timeGenBegin" name="timeGenBegin" onchange="loadDoc('{{Request::root()}}')">
                <option value='' selected>Select one...</option>
                <option selected value='07:00'>07:00</option>  
                <option selected value='08:00'>08:00</option>  
                <option selected value='09:00'>09:00</option>  
                <option selected value='10:00'>10:00</option>  
                <option selected value='11:00'>11:00</option>  
                <option selected value='12:00'>12:00</option>
                <option selected value='13:00'>13:00</option>
                <option selected value='14:00'>14:00</option>
                <option selected value='15:00'>15:00</option>
                <option selected value='16:00'>16:00</option>
                <option selected value='17:00'>17:00</option>
                <option selected value='18:00'>18:00</option>
            </select> 
          
   </div>
   <div class="col-md-3 mb-3">
       <label for="timeGenEnd"><i class="fas fa-hourglass"></i>End Time&nbsp;
       </label>
       <div class="form-check-inline">
        <input type="checkbox" class="form-check-input" value="">All blocking times
      </div>
            <select class="form-control" id="timeGenEnd" name="timeGenEnd" onchange="loadDoc('{{Request::root()}}')">
                <option value='' selected>Select one...</option>
                <option selected value='07:00'>07:00</option>  
                <option selected value='08:00'>08:00</option>  
                <option selected value='09:00'>09:00</option>  
                <option selected value='10:00'>10:00</option>  
                <option selected value='11:00'>11:00</option>  
                <option selected value='12:00'>12:00</option>
                <option selected value='13:00'>13:00</option>
                <option selected value='14:00'>14:00</option>
                <option selected value='15:00'>15:00</option>
                <option selected value='16:00'>16:00</option>
                <option selected value='17:00'>17:00</option> 
                <option selected value='18:00'>18:00</option>                
            </select> 
    </div>
       <div class="col-md-4 mb-3">
         <!--<label for="Driver"><i class="fas user-tie"></i> Driver</label>-->
        <div class="form-check-inline">
          <label class="form-check-label" for="radio6">  
            <input type="radio" class="form-check-input" id="radio6" name="radioareas">Routes by Areas
          </label>
        </div>      
      </div>
</div>
</div>

  <div class="card-footer">
     
         <div class="input-group mb-3">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <input type="checkbox" id="AssignDriver" onchange="loadDoc('{{Request::root()}}')">  &nbsp;Assign driver?
        </div>
      </div>
      
      <a href="#" target="_blank" type="button" name="xDiscard" id="xDiscard" value="Discard" class="btn btn-primary">Generate</a>
    </div>
  </div>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">

function loadDoc(xURL) {
  var xDate = $('#dateGen').val();
  var xTimeB = $('#timeGenBegin').val();
  var xTimeE = $('#timeGenEnd').val();
  var xOrig = $('#MedicalOrigin').val();
  var xDest = $('#MedicalDest').val();
  var xIdDriver = $('#idDriver').val();
  var xAssignDriver = $('#AssignDriver').is(':checked');
  if(xAssignDriver){xAssignDriver='1'} else {xAssignDriver='0'};
  //var d = xDate.getDate();
  //var m = xDate.getMonth()+1;
  //var y = xDate.getFullYear();
  //var fecha  = m + '' + d + '' + y;
  var xlink = xURL + "/showroutesd/"+xDate+"/"+xTimeB+"/"+xTimeE+"/"+xDest+"/"+xIdDriver+"/"+xAssignDriver; //.php?xdate=" + xDate + "&xtime=" + xTime;
  $('#xDiscard').attr("href", xlink);
 }; 

</script>
@endsection
