<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Scheduled Trips</title>

      <link  rel="icon" href="img/fav.ico" type="image/x-icon"/>   
      <style type="text/css">

      
        table, td, th {  
          border-bottom: 1px solid #ddd;
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
                                                                                        <br><Strong>  Scheduled Trips   </Strong>  
                                                                                        <br> <strong>   Total number of trips: {{$totalTrips}}  </strong>
                <td width="45%" style="text-align: center;border: 1px solid #fff;">    <Strong> Date:  {{$date}} </Strong>  <br></td>
                
                </tr>
            </table>

            @foreach ($centers as  $address => $name)

                @php
                    $cantTripCenter = 0;
                    foreach($scheduleds as $key => $scheduled){
                        if (strcmp($address,$scheduled->AddressDestination) == 0){
                            $cantTripCenter = $cantTripCenter + $scheduled->driver_trips;
                        }
                    }
                 
                    
                @endphp

                @if( $cantTripCenter > 0)
        
                    <br>
                    <table width="100%"  class="table">
                        <thead>
                        <tr>
                            <th width="20%" scope="col">Center: {{ $name}}</th>
                            <th width="5%" scope="col">Total:</th>
                            <th width="5%" scope="col">{{ $cantTripCenter}} </th>
                            <th width="15%" scope="col"> Driver Name </th>        
                            <th width="10%" scope="col">Subtotal Scheduled Trips</th>
                        
                        </tr>
                        </thead>

                        <tbody>
                            @foreach ($scheduleds as $key => $scheduled)
                                @if(strcmp($scheduled->AddressDestination,$address) == 0)
                                    <tr>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> {{$scheduled->Driver}}   </td>
                                        <td>{{$scheduled->driver_trips}} </td>
                                    
                                            
                                        
                                    

                                    </tr>
                                    @php
                                        $scheduleds->forget($key);     
                                    @endphp
                                @endif      
                                


                            @endforeach
                        </tbody>
                    
                    </table>
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