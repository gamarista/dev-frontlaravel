
<div class="container-fluid">
   <!-- {{  $appoinments->withQueryString()->links()  }} -->
    <table class="table trip-appoinment-list" >
        <thead>
        </thead>
        <tbody>
            @foreach ( $appoinments as $appoinment)

       
          <tr>
        
            @if (isset($appoinment->Cod_Cancell))
            <td colspan="0" class="trip-type-td red">
                {{Form::label('geo_id',$appoinment->id, ['class' => 'gesidlabel', 'id' => 'geoid-'.$appoinment->id,])}}
            </td>
            @else 
           
                <td colspan="0" class="trip-type-td green">
                    {{Form::label('geo_id',$appoinment->id, ['class' => 'gesidlabel', 'id' => 'geoid-'.$appoinment->id,])}}
                </td>
            @endif
            

            <td class="tripdatatd"> 
                <table class="table table-bordered trip-appoinment-list-col-1">
                    <tbody> 
                        <tr> 
                            <td  class="control-center-type-trip">  <strong>{{$appoinment->patient['MedicalNumber']}} </strong> 
                                <br>
                                
                                @if ($appoinment->TripType == 'A')
                                    (Pickup)
                                @else 
                                    (Return)
                                    
                                @endif
                                   <br> <strong>  {{  " " . $appoinment->FirstName . " " .  $appoinment->LastName }} </strong>  
                            
                            </td>
                            <td class="control-center-time"> <strong> Appt. Date</strong>  <br>{{Form::label('', $appoinment->Time, [ 'id' => 'timelist-'.$appoinment->id])}}</td>

                            <td class="control-center-driver"> Assigned driver &nbsp; <i class="fas fa-car-side"></i>
                                <br>
                                @isset($appoinment->driver_id)
                                   <strong> {{Form::label('', $appoinment->driver->Driver, [ 'id' => 'drivername-'.$appoinment->id])}} </strong>
                                <br>
                                {{Form::label('', $appoinment->driver->zones->Name, [ 'id' => 'driverzone-'.$appoinment->id])}} -- 
                                {{Form::label('', $appoinment->driver->center->NickName, [ 'id' => 'drivercenter-'.$appoinment->id])}}
                                @endisset

                                @empty($appoinment->driver_id)
                                    <strong> {{Form::label('', "", [ 'id' => 'drivername-'.$appoinment->id])}} </strong>
                                    <br>
                                    {{Form::label('', "", [ 'id' => 'driverzone-'.$appoinment->id])}} -- 
                                    {{Form::label('', "", [ 'id' => 'drivercenter-'.$appoinment->id])}}        
                                @endempty
                            </td>

                            <td class="trip-type-pickup-td"> <strong> Pickup address </strong>  <br> {{Form::label('', $appoinment->AddressPatient, [ 'id' => 'addresspatientlist-'.$appoinment->id])}}
                                <br><br>
                                <strong>  Dropoff address </strong>  <br> {{Form::label('', $appoinment->AddressDestination, [ 'id' => 'addressdestinationtlist-'.$appoinment->id])}}
                            </td>

                           

                            <td style="text-align: center"> 
                                @if(empty($appoinment->OB))
                                    <span class="label ob">OB Time</span>
                                @else
                                    <span class="label ob" style="background-color: palegoldenrod">OB Time</span>
                                @endif
                              
                                <br> <br>
                                @php
                                    
                                    if  (!empty( $appoinment->OB)){
                                        $date = explode(" ",  $appoinment->OB);
                                        $date = $date[1];
                                    }else{
                                        $date = $appoinment->OB;
                                    }
                                @endphp
                                {{Form::label('', $date, [ 'id' => 'ob-'.$appoinment->id])}} 
                            </td>
                            
                            <td style="text-align: center">  
                                @if(empty($appoinment->RP))
                                    <span class="label dp" >DP Time</span>
                                @else
                                    <span class="label dp" style="background-color: #1EC96E">DP Time</span>
                                @endif
                                
                                <br>  <br>

                                @php
                                    
                                    if  (!empty( $appoinment->RP)){
                                        $date = explode(" ",  $appoinment->RP);
                                        $date = $date[1];
                                    }else{
                                        $date = $appoinment->RP;
                                    }
                                @endphp
                                {{Form::label('', $date, [ 'id' => 'dp-'.$appoinment->id])}}  
                               
                            </td>
                            
                            <td style="text-align: center"> 

                                @if(empty($appoinment->CD))
                                    <span class="label cd">CD Time</span> 
                                @else
                                    <span class="label cd" style="background-color: #EF4B4B">CD Time</span>
                                @endif
                                
                                <br>  <br>

                                @php
                                   
                                    if  (!empty( $appoinment->CD)){
                                        $date = explode(" ",  $appoinment->CD);
                                        $date = $date[1];
                                    }else{
                                        $date = $appoinment->CD;
                                    }
                                @endphp
                                {{Form::label('',  $date, [ 'id' => 'cd-'.$appoinment->id])}}
                               
                            </td>

                            <td style="text-align: center"> CD Code
                                <br>  <br>

                             <strong>  {{Form::label('',  $appoinment->Cod_Cancell, [ 'id' => 'cdcode-'.$appoinment->id])}} </strong>
                            </td>
  
                        </tr>
                 
                   

                    </tbody>
                     </table>
            </td>
        
             
            <td style="text-align: center" colspan="0" class="tripoptiontd">
               
                @empty( $appoinment->CD)
                    <button type="button" style=" background-color:#AFE9EF;width: 121px;" class="btn" id="message-{{$appoinment->id}}" data-toggle="modal" data-target="#sendmessagemodal"> Message </button>
                    <br> 
                    
                    <a href="{{route('message.show',['message' => $appoinment->id])}}" class="btn" style="background-color: palegoldenrod;width: 121px;" >Notifications</a>
                        <br> 
                    <button type="button" style=" background-color:#EF4B4B;width: 121px;" class="btn" id="canceltrip-{{$appoinment->id}}" data-toggle="modal" data-target="#cancellationTripModal">Cancel</button>
                        <br> 
                    <button type="button" style=" background-color:#1EC96E;width: 121px;" class="btn" id="transfer-{{$appoinment->id}}" data-toggle="modal" data-target="#assignDriverModal">Transfer</button>
        
                @endempty

                @isset($appoinment->CD)
                    <a href="{{route('message.show',['message' => $appoinment->id])}}" class="btn" style="background-color: palegoldenrod" >Notifications</a>
                @endisset
            </td>
          </tr>
         
          @endforeach
        </tbody>
      </table>
      {{  $appoinments->withQueryString()->links()  }}

    
</div>