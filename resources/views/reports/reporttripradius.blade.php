<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Report Trip info by Radis</title>
 
      <link  rel="icon" href="img/fav.ico" type="image/x-icon"/>   
      <style type="text/css">

      
        table, td, th {  
          
          text-align: left;font-family: sans-serif;
          font-size: 12px;

      }

     
   
        </style>
    
  </head>
  <body>


      
      
            <table border="1px" cellspacing="0" cellpadding="0" width="100%" height="12%" style="text-align: center;background-color: white;">
                <tr>
                <td width="10%" style="text-align: center;border: 1px solid #fff;"><img src="img/logoOriginal.png"  width="40" height="30"></td>
                <td width="45%" style="text-align: center;border: 1px solid #fff;">
                                                                                        <br><Strong>   TRIPS BY RADIUS - ONLY PICKUPS</Strong>  
                                                                                        <br> <strong>   Total number of trips: {{$totalTrips}}  </strong>
                <td width="45%" style="text-align: center;border: 1px solid #fff;">    <Strong>   Date:  {{$date}}</Strong>  <br></td>
                
                </tr>
            </table>

            @foreach ($centers as  $address => $name)

                @php
                    $cantTripCenter = 0;
                    foreach($tripsRadius as $key => $radius){
                        if (strcmp($address,$radius->AddressDestination) == 0){
                            $cantTripCenter = $cantTripCenter + $radius->driver_trips;
                        }
                    }
                 
                    
                @endphp

            @if ($cantTripCenter > 0)
        
                <br>
                <table width="100%"  class="table">
                    <thead>
                    <tr>
                        <th width="30%" scope="col">Center: {{ $name}}</th>
                        <th width="20%" scope="col">Radius</th>
                        <th width="20%" scope="col">Number of trips </th>
                        <th width="10%" scope="col"> % </th>        
                        <th width="10%" scope="col">Subtotal</th>
                        <th scope="col">{{ $cantTripCenter}}</th>
                    

                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($tripsRadius as $key => $trip)
                            @if(strcmp($trip->AddressDestination,$address) == 0)
                                <tr>
                                    <td> </td>
                                    <td>{{$trip->distance_range}} </td>
                                    <td>{{$trip->driver_trips}} </td>
                                    <td> 
                                        @php
                                        if ($cantTripCenter == 0)
                                            $percent = 0;
                                        else
                                            $percent = ($trip->driver_trips/$cantTripCenter)*100;
                                        $tripsRadius->forget($key);     
                                        @endphp

                                        {{ round($percent, 2)  }}
                                    </td>

                                </tr>
                            @endif      
                            


                        @endforeach
                    </tbody>
                
            @endif
            @endforeach 

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