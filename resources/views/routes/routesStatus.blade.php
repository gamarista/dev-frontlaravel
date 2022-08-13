@extends('layouts.app')
@section('content')

<div class="container-fluid" style="background-color: #DEEFEF;padding-top: 15px;padding-bottom: 15px;  margin-bottom: 20px;">
    {{ Form::open(['route' => 'routeStatus', 'method' => 'GET', 'class' => 'container-fluid']) }}
    
        <div class="row justify-content-start">
          <div class="col-2">
            {{ Form::select('center', $centers,null,['placeholder' => '--Medical Centers--','class' => 'form-control select-driver']) }}
          </div>
          <div class="col-2">
            {{ Form::select('zone', $zones,null,['placeholder' => '--Zones--','class' => 'form-control select-driver']) }}
          </div>
          <div class="col-2">
            <input type="submit" value="GO" class="btn btn-dark btn-sm" style="">
          </div>
        </div>
      
      
    {{ Form::close() }}
</div>

  <div class="container-fluid">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col" >Sel.</th>
          <th scope="col">Zone</th>
          <th scope="col">Center</th>
          <th scope="col">Driver</th>
          <th scope="col">Vehicle</th>
          <th scope="col">Total Trips</th>
          <th scope="col">Trips not sent </th>
          <th scope="col">Total distance </th>
        </tr>
      </thead>
      <tbody>
        
        @foreach ($trips_status as $status)
              <tr>

                <th scope="col">
                  {{Form::checkbox('check_trip','check_trip-'.$status->driver_id,false,['class' => 'form-check-label','id' => 'check_trip-'.$status->driver_id])}}
                </th>
                
                <th scope="col">
                {{  $status->driver->zones->Name}}
                </th>

                @isset($status->center)
                <th scope="col">
                  {{$status->center}}
                 </th>
                @endisset
                
                @empty($status->center)
                <th scope="col">
                  {{  $status->driver->center->Name}}
                 </th>
                @endempty
               
                
                <th scope="col">
                  {{  $status->driver->Driver}}
                </th>
                <th scope="col">
                  {{  $status->driver->vehicule->VehicleReg}}
                </th>
                
                <th scope="col">
                  {{  $status->total_trips}}
                </th>
                <th scope="col">
                  {{ $status->trips_not_sent  - $status->total_trips}}
                </th>
                
                <th scope="col">
                  {{  $status->total_distance}}
                </th>
                      
              </tr>
        @endforeach

      </tbody>
    </table>

  </div>

  <br>
  
  <div class="container">

  
    <div class="row justify-content-end">
    
      <div class="col-1">
        <button type="button" style="background-color:#EFEFEF; font-size : 14px; width: 126px; " class="btn float-right" id="send-trips-button"><i class="far fa-envelope"></i> Send trips</button>
      </div>
      <div class="col-1">
        <!--<button type="button" style="background-color:#AFE9EF; font-size : 14px; width: 126px;" class="btn float-left" id="compare-button" data-toggle="modal" data-target="#modalcompareroute" ><i class="far fa-list-alt"></i> Compare</button>-->

         <a href="https://demoa.sacs-web.com/routesInspector" target="_blank" type="button" style="background-color:#AFE9EF; font-size : 14px; width: 126px;" class="btn float-left"><i class="far fa-list-alt"></i> Compare</a> 
      </div>
    </div>

  </div>

  
  <div class="modal fade" id="modalcompareroute" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog  modal-xl"  role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Compare Routes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="map">
         
    
            </div>
    
          </div>


         
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          
        </div>
      </div>
    </div>

  </div>



  <script type="text/javascript">

    $(document).ready(function(){


      $( "input[id^='check_trip-']").change(function() {

        if ($("input[id^='check_trip-']:checked").length > 3) {
          $(this).prop('checked', false);
          alert("allowed only 3");
      }
          
      });

      $("#send-trips-button").click(function(){
    
            var drivers = [];
            $.each($("input[id^='check_trip-']:checked"), function(){

                var id = $(this).attr('id').split('-');
                drivers.push(parseInt(id[1]));
            });

            if (drivers.length == 0){
              alert("need select at least one trip");
              return;
            }

            var formData = {
              'drivers' : drivers
            };

            console.log(formData);

            $.ajax({
              headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
              method: "POST",
              url:  'send-trips' ,
              data: formData,
              dataType: 'json',
              success: function (data) {
                location.reload();  
                //console.log(data);
              },
              error: function (data) {
                  console.log(data);
              }
      });
           
            
    });

      $("#compare-button").click(function(){
      
      var drivers = [];
      $.each($("input[id^='check_trip-']:checked"), function(){

          var id = $(this).attr('id').split('-');
          drivers.push(parseInt(id[1]));
      });

      if (drivers.length == 0){
        alert("need select at least one trip");
        return;
      }


    
    
      
    });


    });


  </script>

@endsection