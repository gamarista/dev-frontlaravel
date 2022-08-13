<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Report {{$description}}</title>
    <link  rel="icon" href="img/fav.ico" type="image/x-icon"/>   
    <style type="text/css">
        table, td, th {  
          
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
            <td width="80%" style="text-align: center;border: 1px solid #fff;">
                <br> <strong>{{$description}}</strong>
                <br> <Strong>Date:  {{$date}}</Strong> 
                <br> <Strong>Total Trips:  {{$totalTrips}}</Strong> 
          
            </td>
            <td width="10%" style="text-align: center;border: 1px solid #fff;"></td>
          </tr>
    </table>

    <br>
    <table border="1px" cellspacing="0" cellpadding="0" width="100%" height="12%" style="text-align: center;background-color: white;">
        <tr>
        <td width="15%" style="text-align:center;border:1px solid;"> <strong> Pending  </strong> </td>
        <td width="15%" style="text-align:center;border:1px solid;"> <strong> Total: {{$pendings->count()}}  </strong></td>
        <td width="15%" style="text-align:center;border:1px solid;"> 
            @php
                $percent = ($pendings->count() / $totalTrips ) * 100;
            @endphp
           <strong> {{ round($percent, 2)  }} %  </strong>
        </td>
        </tr>
  </table>

  <br>
  <table border="1px" cellspacing="0" cellpadding="0" width="100%" style="text-align: center;background-color: white;">
    <thead>
      <tr>
        <th scope="col" width="50%">Patient Name</th>
        <th scope="col" width="50%" >Driver</th>
      </tr>
    </thead>
    <tbody>
        @foreach($pendings as $pending)
        <tr>
            <td   >{{   $pending->FirstName . " " .  $pending->LastName }}</td>
            <td  >{{ $pending->driver->Driver }}</td>
        </tr>
        @endforeach
    </tbody>
  </table>

  <br>
  <table border="1px" cellspacing="0" cellpadding="0" width="100%" height="12%" style="text-align: center;background-color: white;">
      <tr>
      <td width="15%" style="text-align: center;border: 1px solid; "> <strong>  On Way  </strong> </td>
      <td width="15%" style="text-align: center;border: 1px solid ; "> <strong> Total: {{$onWay->count()}}  </strong></td>
      <td width="15%" style="text-align: center;border: 1px solid; "> 
          @php
              $percent = ($onWay->count() / $totalTrips ) * 100;
          @endphp
         <strong> {{ round($percent, 2)  }} %  </strong>
      </td>

      
      </tr>
</table>

<br>
<table width="100%"  class="table">
  <thead>
    <tr>
      <th scope="col"  width="50%">Patient Name</th>
      <th scope="col" width="50%" >Driver</th>
    </tr>
  </thead>
  <tbody>
      @foreach($onWay as $way)
      <tr>
          <td>{{   $way->FirstName . " " .  $way->LastName }}</td>
          <td>{{ $way->driver->Driver }}</td>
      </tr>
      @endforeach
  </tbody>
</table>

<br>
  <table border="1px" cellspacing="0" cellpadding="0" width="100%" height="12%" style="text-align: center;background-color: white;">
      <tr>
      <td width="15%" style="text-align: center;border: 1px solid;"> <strong>  Completed  </strong> </td>
      <td width="15%" style="text-align: center;border: 1px solid ; "> <strong> Total: {{$completed->count()}}  </strong></td>
      <td width="15%" style="text-align: center;border: 1px solid; "> 
          @php
              $percent = ($completed->count() / $totalTrips ) * 100;
          @endphp
         <strong> {{ round($percent, 2)  }} %  </strong>
      </td>

      
      </tr>
</table>

<br>
<table width="100%"  class="table">
  <thead>
    <tr>
      <th scope="col" width="50%">Patient Name</th>
      <th scope="col" width="50%">Driver</th>
    </tr>
  </thead>
  <tbody>
      @foreach($completed as $complete)
      <tr>
          <td   >{{   $complete->FirstName . " " .  $complete->LastName }}</td>
          <td   >{{ $complete->driver->Driver }}</td>
      </tr>
      @endforeach
  </tbody>
</table>

<br>
  <table border="1px" cellspacing="0" cellpadding="0" width="100%" height="12%" style="text-align: center;background-color: white;">
      <tr>
      <td width="15%" style="text-align: center;border: 1px solid; "> <strong>  Cancelled  </strong> </td>
      <td width="15%" style="text-align: center;border: 1px solid ;"> <strong> Total: {{$cancelled->count()}}  </strong></td>
      <td width="15%" style="text-align: center;border: 1px solid; "> 
          @php
              $percent = ($cancelled->count() / $totalTrips ) * 100;
          @endphp
         <strong> {{ round($percent, 2)  }} %  </strong>
      </td>

      
      </tr>
</table>

<br>
<table width="100%"  class="table">
  <thead>
    <tr>
      <th scope="col"  width="50%">Patient Name</th>
      <th scope="col"  width="50%">Driver</th>
    </tr>
  </thead>
  <tbody>
      @foreach($cancelled as $cancel)
      <tr>
          <td>{{   $cancel->FirstName . " " .  $cancel->LastName }}</td>
          <td>{{ $cancel->driver->Driver }}</td>
      </tr>
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