<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    
    <title>Report Drivers</title>
      <!-- Fonts -->
    <link  rel="icon" href="img/fav.ico" type="image/x-icon"/>   
      <style type="text/css">

      
        table, td, th {  
          border-bottom: 1px solid #ddd;
          text-align: center;font-family: sans-serif;
          font-size: 10px;
        }
        
      .page-break {
            page-break-after: always;
        }
   
        </style>
    
  </head>
  <body>


        @foreach ($drivers as  $key => $driver)

            <table border="1px" cellspacing="0" cellpadding="0" width="100%" height="12%" style="text-align: center;background-color: white;">
                <tr>
                <td width="10%" style="text-align: center;border: 1px solid #fff;"><img src="img/logoOriginal.png"  width="40" height="30"></td>
                <td width="40%" style="text-align: center;border: 1px solid #fff;"><br> <strong>Driver: {{$driver->Driver}}</strong><br>    <Strong>Total number of trips:   {{$driver->driver_trips}}</Strong>  <br>
                <td width="40%" style="text-align: center;border: 1px solid #fff;"><br> <strong>Route Sheet by Driver</strong><br> <Strong>Date:  {{$date}}</Strong>  <br></td>
                
                </tr>
            </table>

            <table class="table" width="100%">
                <thead>
                <tr>
                    <th scope="col"> App Time</th>
                    <th scope="col">Patient</th>
                    <th  style="text-align: left;" scope="col">PickUp</th> 
                    <th scope="col" style="text-align: left;">Destination</th>
                    <th scope="col">Driver</th>
                    <th scope="col"> Special Needs</th>           
                   
                </tr>
                </thead>
                <tbody>
                    @foreach($appoinments as $id => $appoinment)

                        @if(strcmp($appoinment->driver_id,$driver->driver_id) == 0)
                            @php
                                $time = date("g:i a", strtotime($appoinment->Time));
                            @endphp
                            <tr>
                                <td width="5%"> <Strong> {{$time}} </Strong>  </td>
                                <td width="20%"  >{{   $appoinment->FirstName . " " .  $appoinment->LastName }} <br> <br>   <Strong >  Phones: </Strong>  {{$appoinment->PhoneNumber . "," .$appoinment->MobilNumber  }} <br> <div> <strong>  Reason  </strong>:  {{ $appoinment->ConsultDestination }}   <div></td>
                                <td  width="25%"  style="text-align: left;"> {{$appoinment->AddressPatient}}   </td>
                                <td  width="25%"  style="text-align: left;"> {{ $appoinment->AddressDestination }} <br> <br>  </td>
                                <td>{{ $appoinment->driver->Driver }} </td>
                                <td  width="15%"> {{ $appoinment->format_requeriment }}</td>
                                
                                                    
                            </tr>

                        @php
                            $appoinments->forget($id);       
                        @endphp

                        @endif
            
      
                    @endforeach
                
            
                
                </tbody>
            </table>
          

        @endforeach 
        
        <br><br><br>
        <div style="text-align: right;">
            <label> Total:  {{$total}}   </label>
        </div>
      

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

