<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Report {{$trip}}</title>
    <link  rel="icon" href="img/fav.ico" type="image/x-icon"/>    
     <style type="text/css">
        table, td, th {  
          border-bottom: 1px solid #ddd;
          text-align: center;font-family: sans-serif;
          font-size: 10px;
      }
      table {
          border-collapse: collapse;
          width: 100%;     
      }

      th, td {
          padding: 2px;
      }      
   
   </style>
    
  </head>
  <body>

    <table border="1px" cellspacing="0" cellpadding="0" width="100%" height="12%" style="text-align: center;background-color: white;">
          <tr>
            <td width="10%" style="text-align: center;border: 1px solid #fff;"><img src="img/logoOriginal.png"  width="40" height="30"></td>
            <td width="80%" style="text-align: center;border: 1px solid #fff;"><br>
              <span style="font-weight: bold; font-size: 14px;">Route Sheet {{$trip}}</span><br>  <Strong>Date:  {{$date}}</Strong> <br>
            </td>
            <td width="10%" style="text-align: center;border: 1px solid #fff;"></td>
          
          </tr>
    </table>


    <table class="table" width="100%">
        <thead>
          <tr>
            <th scope="col">Trip</th>
            <th scope="col">Time</th>
            <th scope="col">Patient Name</th>
            <th scope="col">Patient Address</th> 
            <th scope="col">Destination</th>
            <th scope="col">Phone Numbers </th>
          
          
          </tr>
        </thead>
        <tbody>
          @php
            $cont = 1;
          @endphp
            @foreach($appoinments as $appoinment)
              @php
                $time = date("g:i a", strtotime($appoinment->Time));
              @endphp
            <tr>
              <td width="2%"> <Strong> {{$cont}} </Strong> </td>
              <td> <Strong> {{$time}} </Strong> </td>
              <td>{{   $appoinment->FirstName . " " .  $appoinment->LastName }}</td>
              <td>{{  $appoinment->AddressPatient  }} </td>
              <td>{{ $appoinment->AddressDestination }} </td> 
              <td>{{ $appoinment->PhoneNumber }}  <br> <br> {{ $appoinment->MobilNumber }}  </td>         
            </tr>
              @php
                $cont = $cont + 1;
              @endphp
            @endforeach
         
       
         
        </tbody>
      </table>
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