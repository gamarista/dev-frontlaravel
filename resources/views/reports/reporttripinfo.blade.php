<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Report Trip info by center</title>
  
      <link  rel="icon" href="img/fav.ico" type="image/x-icon"/>   
      <style type="text/css">

      
    table, td, th {  
         border-bottom: 1px solid #ddd;
          text-align: left;font-family: sans-serif;
          font-size: 10px;

      }

    
   
        </style>
    
  </head>
  <body>


      
      
            <table border="1px" cellspacing="0" cellpadding="0" width="100%" height="12%" style="text-align: center;background-color: white;  border: 1px solid #ddd;">
                <tr>
                <td width="10%" style="text-align: center;border: 1px solid #fff;"><img src="img/logoOriginal.png"  width="40" height="30"></td>
                <td width="45%" style="text-align: center;border: 1px solid #fff;"><br> <strong>Total number of trips: {{$totalTrips}}</strong>
                                                                                        <br><Strong>  Total number of completed:   {{$totalTripsComplete}} </Strong>  
                                                                                        <br><Strong>  Total number of cancelled:   {{$totalTripsCancel}}</Strong>  
                <td width="45%" style="text-align: center;border: 1px solid #fff;"><br> <strong>Route Sheet by center</strong><br>    <Strong>Date:  {{$date}}</Strong>  <br></td>
                
                </tr>
            </table>

            @foreach ($centers as  $address => $name)

                @php
                    $cantTripCenter = 0;
                    foreach($inside as $key => $in){
                        if (strcmp($address,$in->AddressDestination) == 0){
                            $cantTripCenter = $cantTripCenter + $in->driver_trips;
                        }
                    }
                    $cantComplete = 0;
                    foreach($insideComplete as $key => $complete){
                        if (strcmp($address,$complete->AddressDestination) == 0){
                            $cantComplete = $cantComplete + $complete->driver_trips;
                        }
                    }
                    $cantCancelled = 0;
                    foreach($insideCancel as $key => $cancelled){
                        if (strcmp($address,$cancelled->AddressDestination) == 0){
                            $cantCancelled = $cantCancelled + $cancelled->driver_trips;
                        }
                    }
                    
                @endphp
                @if ( $cantTripCenter > 0)
                    <br>
                    <table  width="100%" class="table">
                        <thead>
                        <tr>
                        <th width="20%" scope="col">Center: {{ $name}}</th>
                        <th width="20%" scope="col">Driver Name</th>
                        <th width="10%" scope="col">Scheduled: </th>
                        <th width="5%" scope="col"> {{ $cantTripCenter}}</th>        
                        <th width="10%" scope="col">Completed</th>
                        <th width="8%" scope="col">
                                @php
                                    if ($cantTripCenter == 0){
                                        $percentComplete = 0.00;
                                    }else{
                                        $percentComplete = ($cantComplete / $cantTripCenter ) * 100;
                                    }
                                    
                                @endphp
                                <strong> {{ round($percentComplete, 2)  }} %  </strong>
                            </th>
                            <th width="5%" scope="col">{{$cantComplete}}</th>
                            <th scope="col">Cancelled</th>
                            <th width="8%" scope="col">
                                @php
                                    if ($cantTripCenter ==  0){
                                        $percentCancelled = 0.00;
                                    }else{
                                        $percentCancelled = ($cantCancelled / $cantTripCenter ) * 100;
                                    }
                                    
                                @endphp
                                <strong> {{ round($percentCancelled, 2)  }} %  </strong>
                            </th>
                            <th width="5%" scope="col">{{$cantCancelled}}</th>
                        
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($inside as $id => $in)

                                @if(strcmp($address,$in->AddressDestination) == 0)
                                    <tr>
                                        <td> </td>
                                        <td>{{   $in->Driver}}</td>
                                        <td> </td>
                                        <td>{{  $in->driver_trips  }}</td>
                                        <td> </td>
                                        @php
                                            $ban = false;
                                            foreach($insideComplete as $i => $complete){
                                                if (strcmp($in->AddressDestination,$complete->AddressDestination) == 0 &&
                                                    strcmp($in->Driver,$complete->Driver) == 0 ){
                                                    if ($cantTripCenter == 0){
                                                        $percentComplete = 0;
                                                    }else{
                                                        $percentComplete = ($complete->driver_trips / $cantTripCenter ) * 100;
                                                    }

                                                    if ($percentComplete == 0){
                                                        $cantDriver = 0;
                                                    }else{
                                                        $cantDriver = $complete->driver_trips;
                                                    
                                                    }
                                                    $ban = true;    
                                                    
                                                    $insideComplete->forget($i);     
                                                }
                                            }
                                            
                                            if ($ban == false){
                                                $cantDriver = 0;
                                                $percentComplete = 0;
                                            }
                                                
                                        @endphp
                                        <td >  {{ round($percentComplete,2)}}</td>
                                        <td>  {{ $cantDriver}}</td>
                                        <td></td>
                                        @php
                                        $ban = false;
                                        foreach($insideCancel as $i => $cancel){
                                            if (strcmp($in->AddressDestination,$cancel->AddressDestination) == 0 &&
                                                strcmp($in->Driver,$cancel->Driver) == 0 ){
                                                if ($cantTripCenter == 0){
                                                    $percentCancelled = 0;
                                                }else{
                                                    $percentCancelled = ($cancel->driver_trips / $cantTripCenter ) * 100;
                                                }
                                                if ($percentCancelled == 0)
                                                    $cantDriver = 0;
                                                else
                                                    $cantDriver = $cancel->driver_trips;

                                                $ban = true;    
                                                $insideCancel->forget($i);     
                                            }
                                        }           
                                        
                                        if ($ban == false){
                                            $percentCancelled = 0;
                                            $cantDriver = 0;  
                                        }
                                                                            
                                    @endphp
                                    <td>  {{ round($percentCancelled,2)}}</td>
                                    <td>  {{ $cantDriver}}</td>
                                        
                                    </tr>

                                    @php
                                        $inside->forget($id);       
                                    @endphp

                                @endif
                    
            
                            @endforeach
                        
                    
                        
                        </tbody>
                    
                    </table>
                @endif
            @endforeach 


            <br>
            <br>           
        @if(strcmp($filter,"false") == 0 )    
                @php
                $cantTripSpecialist = 0;
                foreach($outsides as $key => $outside){            
                    $cantTripSpecialist = $cantTripSpecialist + $outside->driver_trips;     
                }

                $cantComplete = 0;
                foreach($outsideComplete as $key => $complete){        
                    $cantComplete = $cantComplete + $complete->driver_trips;               
                }
                $cantCancelled = 0;
                foreach($outsideCancel as $key => $cancelled){              
                    $cantCancelled = $cantCancelled + $cancelled->driver_trips;
                    
                }
                
                @endphp

                <table  width="100%"class="table">
                    <thead>
                    <tr>
                        <th width="20%" scope="col">Specialist</th>
                        <th width="20%" scope="col">Driver Name</th>
                        <th width="10%" scope="col">Scheduled: </th>
                        <th width="5%" scope="col"> {{ $cantTripSpecialist}}</th>        
                        <th width="10%" scope="col">Completed</th>
                        <th width="8%" scope="col">
                            @php
                                if ($cantTripSpecialist == 0){
                                    $percentComplete = 0.00;
                                }else{
                                    $percentComplete = ($cantComplete / $cantTripSpecialist ) * 100;
                                }
                                
                            @endphp
                            <strong> {{ round($percentComplete, 2)  }} %  </strong>
                        </th>
                        <th width="5%" scope="col">{{$cantComplete}}</th>
                        <th scope="col">Cancelled</th>
                        <th width="8%" scope="col">
                            @php
                                if ($cantTripSpecialist ==  0){
                                    $percentCancelled = 0;
                                }else{
                                    $percentCancelled = ($cantCancelled / $cantTripSpecialist ) * 100;
                                }
                                
                            @endphp
                            <strong> {{ round($percentCancelled, 2)  }} %  </strong>
                        </th>
                        <th width="5%" scope="col">{{$cantCancelled}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($outsides as $outside)
            
                            <tr>
                                <td> </td>
                                <td>{{   $outside->Driver}}</td>
                                <td> </td>
                                <td>{{  $outside->driver_trips  }}</td>
                                <td> </td>

                                @php
                                    $ban = false;
                                    foreach($outsideComplete as $i => $complete){
                                        if (strcmp($outside->Driver,$complete->Driver) == 0 ){
                                            if ($cantTripSpecialist == 0){
                                                $percentComplete =0;
                                            }else{
                                                $percentComplete = ($complete->driver_trips / $cantTripSpecialist ) * 100;
                                            }

                                            if ($percentComplete == 0){
                                                $cantDriver = 0;
                                            }else{
                                                $cantDriver = $complete->driver_trips;
                                            
                                            }
                                            $ban = true;    
                                            
                                            $outsideComplete->forget($i);     
                                        }
                                    }
                                    
                                    if ($ban == false){
                                        $cantDriver = 0;
                                        $percentComplete = 0;
                                    }
                                    
                                @endphp
                            <td>  {{ round($percentComplete,2)}}</td>
                            <td>  {{ $cantDriver}}</td>
                            <td></td>

                                    @php
                                        $ban = false;
                                        foreach($outsideCancel as $i => $cancel){
                                            if (strcmp($outside->Driver,$cancel->Driver) == 0 ){
                                                if ($cantTripSpecialist == 0){
                                                    $percentCancelled = 0;
                                                }else{
                                                    $percentCancelled = ($cancel->driver_trips / $cantTripSpecialist ) * 100;
                                                }
                                                if ($percentCancelled == 0)
                                                    $cantDriver = 0;
                                                else
                                                    $cantDriver = $cancel->driver_trips;

                                                $ban = true;    
                                                $outsideCancel->forget($i);     
                                            }
                                        }           
                                        
                                        if ($ban == false){
                                            $cantDriver = 0; 
                                            $percentCancelled = 0;    
                                        }
                                                                        
                                    @endphp
                                    <td>  {{ round($percentCancelled,2)}}</td>
                                    <td>  {{ $cantDriver}}</td>



                            </tr>
                        @endforeach
                    
                
                    
                    </tbody>
                </table>
        @endif
        <script type="text/php">
            if (isset($pdf)) {
                $text = "page {PAGE_NUM} of {PAGE_COUNT}";
                $size = 10;
                $font = $fontMetrics->getFont("Verdana");
                $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
                $x = ($pdf->get_width() - $width) / 2;
                $y = $pdf->get_height() - 35;
                $pdf->page_text($x, $y, $text, $font, $size);
            }
        </script>
  </body>
</html>