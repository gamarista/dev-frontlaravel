@extends('layouts.app')
@section('content')
<div class="container">
 <div class="row justify-content-center">
  <div class="col-md-8">
   <div class="card">
    <div class="card-header">Rides</div>
    <div id="mimsg"></div>
    <div class="card-body">
     <form method="POST" action="{{route('mapsarearides')}}">
      @csrf
     <div class="container">
       @php $medicalc = json_decode($medicalc); @endphp     
       <div class="form-row">
        <div class="col-md-10 mb-3">
           <label for="patientaddress"><i class="fas fa-map"></i>&nbsp;Patient address</label>
           <input class="form-control" id="patientaddress" name="patientaddress">
        </div>
       </div>  
       <div class="form-row">
        <div class="col-md-6 mb-3">
         <label for="MedicalDest"><i class="fas fa-map"></i>&nbsp;Medical Center</label>
         <select id="MedicalDest" name="MedicalDest" class="form-control">
           <option value='0' selected>Select one...</option>
            @foreach($medicalc as $dato)
              <option selected value='{{$dato->AddressMedicalC}}'>{{$dato->Name}}</option>  
            @endforeach
         </select>
        </div>
        <div class="col-md-4 mb-3">
          <label for="triptype"><i class="fas fa-maps"></i>Select trip type</label>
          <select class="form-control" id="triptype" name="triptype" onchange="loadDoc('{{Request::root()}}')">
              <option value='00' selected>Select one...</option>
              <option selected value='01'>Pickup</option>  
              <option selected value='02'>Return</option>  
          </select> 
        </div>        
       </div>
 
     </div>
     <div class="card-footer">
       <button type="submit" name="xDiscard" id="xDiscard"  class="btn btn-primary">Rides Map</button>
       <a href="{{route('tripsplanner')}}"  type="button" name="xDiscard" id="xDiscard" value="Discard" class="btn btn-primary">Back</a>
     </div>
     </form>
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
  var xlink = xURL + "/showroutesd/"+xDate+"/"+xTimeB+"/"+xTimeE+"/"+xDest+"/"+xIdDriver; //.php?xdate=" + xDate + "&xtime=" + xTime;
  $('#xDiscard').attr("href", xlink);
 }; 
</script>
@endsection
