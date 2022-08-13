@extends('layouts.app')
@section('content')
<div class="container">
 <div class="row justify-content-center">
  <div class="col-md-10">
   <div class="card">
    <div class="card-header">Generate Routes</div>
               
            <div id="mimsg"></div>
 
      <div class="card-body">
       <div class="container">
 
 @php $medicalc = json_decode($medicalc); @endphp     
 <div class="row">
   <div class="col-50">
     <label for="MedicalOrigin" class="col-md-8 col-form-label text-sm-left"><i class="fas map-marker-alt"></i> Start Point</label>
     <div class="col-md-10">
      <select id="MedicalOrigin" name="MedicalOrigin" class="form-control">
        <option value='0' selected>Select one...</option>
        @foreach($medicalc as $dato)
          <option selected value='{{$dato->AddressMedicalC}}'>{{$dato->Name}}</option>  
        @endforeach
      </select>
     </div>      
   </div>
   <div class="col-50">
    <label for="MedicalDest" class="col-md-10 col-form-label text-sm-left"><i class="fas map-marker-alt"></i> Destination Point</label>
    <div class="col-md-10"> 
     <select id="MedicalDest" name="MedicalDest" class="form-control">
       <option value='0' selected>Select one...</option>
       @foreach($medicalc as $dato)
          <option selected value='{{$dato->AddressMedicalC}}'>{{$dato->Name}}</option>  
       @endforeach
     </select>
    </div>         
   </div>  

   <div class="col-50">
     <label for="Driver" class="col-md-8 col-form-label text-sm-left"><i class="fas user-tie"></i> Driver</label>
     <div class="col-md-10">
      <select id="idDriver" name="idDriver" class="form-control" onchange="loadDoc('{{Request::root()}}')">
        <option value='0' selected>All Drivers</option>

        @foreach($drivers as $driver)
          <option selected value='{{$driver->Driver}}'>{{$driver->Driver}}</option>  
        @endforeach
      </select>
     </div>      
   </div>    
 </div>
 
 <div class="row">
   <div class="col-50">
    <label for="dateGen" class="col-md-8 col-form-label text-sm-left"><i class="fas fa-calendar"></i> Date</label>
     <div class="col-md-10"> 
       <input type="date" id="dateGen" name="dateGen" onchange="loadDoc('{{Request::root()}}')" placeholder="Select a date" class="form-control">
     </div>   
   </div>
   <div class="col-50">
       <label for="timeGen" class="col-md-8 col-form-label text-sm-left"><i class="fas fa-hourglass"></i> Time</label>
       <div class="col-md-10">    
            <select class="form-control" id="timeGen" name="timeGen" onchange="loadDoc('{{Request::root()}}')">
                <option value='' selected>Select one...</option>
                <option selected value='7:00'>07:00</option>  
                <option selected value='8:00'>08:00</option>  
                <option selected value='9:00'>09:00</option>  
                <option selected value='10:00'>10:00</option>  
                <option selected value='11:00'>11:00</option>  
                <option selected value='12:00'>12:00</option>
                <option selected value='13:00'>13:00</option>
                <option selected value='14:00'>14:00</option>
                <option selected value='15:00'>14:00</option>
            </select> 
        </div>    
   </div>
    <div class="col-50">
      <label for="Optimize" class="col-md-12 col-form-label text-sm-left"><i class="fas fa-calendar"></i> Optimized</label>
      <div class="col-md-12">
            <select class="form-control" id="Optimize" name="timeGen" onchange="loadDoc('{{Request::root()}}')">
                <option selected value='0' selected>Disabled</option>
                <option  value='1'>Enabled</option> 
            </select>            
      </div>  
    </div>
  </div>
</div>
</div>

        <div class="card-footer">
     <a href="#" target="_blank" type="button" name="xDiscard" id="xDiscard" value="Discard" class="btn btn-primary">Generate</a>
        </div>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">

function loadDoc(xURL) {
  var xDate = $('#dateGen').val();
  var xTime = $('#timeGen').val();
  var xOrig = $('#MedicalOrigin').val();
  var xDest = $('#MedicalDest').val();
  var xIdDriver = $('#idDriver').val();
  //var d = xDate.getDate();
  //var m = xDate.getMonth()+1;
  //var y = xDate.getFullYear();
  //var fecha  = m + '' + d + '' + y;
  var xlink = xURL + "/showroutes/"+xDate+"/"+xTime+"/"+xOrig+"/"+xDest+"/"+xIdDriver; //.php?xdate=" + xDate + "&xtime=" + xTime;
  $('#xDiscard').attr("href", xlink);
 }; 

</script>
@endsection
