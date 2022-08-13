@extends('layouts.app')
@section('content')
@php
 if (isset($data))
 {$tripsok='';}
 else
 {$tripsok='disabled';}
@endphp
<div class="container">
 <div class="row justify-content-center">
  <div class="col-md-12">
   <div class="card">
    <div class="card-header">Import data - API</div>
      <div class="card-body">
       <div class="container">
        @if (isset($status)) 
          <div class="alert alert-success alert-dismissible">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Success! </strong>{{ $status }}
           </div>
        @endif
        @if (isset($statuse))
            <div class="alert alert-danger alert-dismissible">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Error! </strong> {{ $statuse }}
           </div>                 
         @endif  
         
      <form  method="POST" action="{{route('importdataapi')}}" enctype="multipart/form-data">
         @csrf
        <div class="row">
          <div class="col-50">
               <label for="IdMC" class="col-md-12 col-form-label text-sm-left"><i class="fas fa-hospital"></i> Medical Center:</label>
               <div class="col-md-12">
                   <select id="IdMC" name="IdMC" class="form-control">
                     <option value="0">Select Medical Center...</option>
                     @foreach($medicalcenters as $medicalcenter)
                       <option value="{{$medicalcenter->IdMedicalC}}">{{$medicalcenter->Name}}</option>
                     @endforeach   
                   </select>
               </div>
            </div> 
            <div class="col-50">
              <div class="col-md-12">
               <label for="dateImport" class="col-md-12 col-form-label text-sm-left"><i class="fas fa-calendar"></i> Start date:</label>
                <input type="date" id="dateImport" name="dateStartImport" placeholder="Select a date" class="form-control" >                  
             </div>    
            </div>
            <div class="col-50">
              <div class="col-md-12">
               <label for="timeStartImport" class="col-md-12 col-form-label text-sm-left"><i class="fas fa-clock"></i> Start time:</label>
                <input type="time" id="timeStartImport" name="timeStartImport" placeholder="Select time" class="form-control" value="00:01:00">
             </div>    
            </div>            
            <div class="col-50"> 
             <div class="col-md-12">
               <label for="dateImport" class="col-md-12 col-form-label text-sm-left"><i class="fas fa-calendar"></i> End date:</label>
                <input type="date" id="dateImport" name="dateEndImport" placeholder="Select a date" class="form-control" >  
             </div>
           </div> 
           <div class="col-50">
              <div class="col-md-12">
               <label for="timeEndImport" class="col-md-12 col-form-label text-sm-left"><i class="fas fa-clock"></i> End time:</label>
                <input type="time" id="timeEndImport" name="timeEndImport" placeholder="Select time" class="form-control" value="23:59:00">
             </div>    
            </div> 
           <div class="col-50"> 
              <div class="col-md-12"> 
                <label for="IdMC" class="col-md-8 col-form-label text-sm-left"></label>
                <button type="submit" class="btn btn-primary"><i class="fas fa-file-import"></i> Import</button>
           </div>
         </div>
        </div>  

        <div class="row">
          <div class="col-50"> 
            <label class="col-md-12 col-form-label text-sm-left"><i class="fas fa-hospital"></i> Medical Center selected: {{isset($selectedmc) ? $selectedmc : '' }}</label>
          </div>
          
          <div class="col-50">   
            <div class="col-md-12"> 
              <label class="col-md-12 col-form-label text-sm-left"><i class="fas fa-calendar"></i> Route date selected: {{isset($selecteddate) ? $selecteddate : '' }}</label>         
            </div>  
          </div>  
        </div> 
           
         </form>
           </div>
         @if (isset($data))   
          <div class="row"> 
          <div style="height:300px;width: 100%; overflow:scroll;">
            <table class="table" style="border-collapse: collapse;width: 100%;">
              <thead>
                <tr>
                  <th style="width: 5%">Row</th>
                  <th style="width: 15%">Date</th>
                  <th style="width: 5%">IdPat</th>
                  <th style="width: 25%">Patient</th>
                  <th style="width: 30%">Patient Address</th>
                  <th style="width: 20%">Destination Address</th>
                </tr>
              </thead>
              <tbody>
                 @foreach($data as $dato)
                 <tr>
                  <td>{{$dato->id}}</td>
                  <td>{{$dato->Date}}</td>
                  <td>{{$dato->PatNumber}}</td>
                  <td>{{$dato->LastName}} {{$dato->FirstName}}</td>
                  <td><small>{{$dato->AddressPatient}}</small></td>
                  <td><small>{{$dato->ConsultDestination}}</small></td>
                 </tr>
                 @endforeach
              </tbody>
            </table>
          </div> 
          </div>

         @endif 


       </div>
      </div> 
      <div class="card-footer">


         </div> 
    </div>  
   </div> 
 </div>
</div>

@endsection

@push('child-scripts')
  <script src="{{ asset('js/procdata.js') }}">
  </script>
@endpush
