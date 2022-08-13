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
            <th scope="col">Patient</th>
            <th scope="col">PickUp</th> 
            <th scope="col">Destination</th>
            <th scope="col">Driver</th>
            <th scope="col"> Special Needs</th>       
          
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
              <td  width="2%"> {{$cont }}</td>
              <td> <Strong> {{$time}} </Strong> <br>  <br> <Strong> Home Phone: </Strong> </td>
              <td>{{   $appoinment->FirstName . " " .  $appoinment->LastName }} <br> <br> {{$appoinment->PhoneNumber}} </td>
              <td>{{  $appoinment->AddressPatient  }} <br> <br> <Strong> Celular Phone:</Strong> </td>
              <td>{{ $appoinment->AddressDestination }} <br> <br> {{$appoinment->MobilNumber }}</td>
              <td>
              @if(!empty($appoinment->driver_id))
                {{ $appoinment->driver->Driver}}
              @endif 
         
              </td>
              <td  width="10%"> {{ $appoinment->format_requeriment }}</td>
            
            </tr>
              @php
                $cont = $cont + 1;
              @endphp
            @endforeach
         
       
         
        </tbody>
      </table>

      
  </body>
</html>