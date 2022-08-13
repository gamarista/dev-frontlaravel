<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SACS</title>
    <!--AGREGADO-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href='assets/css/fullcalendar.css' rel='stylesheet' />
    <link href='assets/css/fullcalendar.print.css' rel='stylesheet' media='print' />
    <link href='assets/css/alertify.css' rel='stylesheet' />
    <link href='assets/css/alertify.min.css' rel='stylesheet' />
    <script src='assets/js/jquery-ui.custom.min.js' type="text/javascript"></script>
    <script src='assets/js/fullcalendar.js' type="text/javascript"></script>
    <script src='assets/js/alertify.js' type="text/javascript"></script>
    <script src='assets/js/alertify.min.js' type="text/javascript"></script>  
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
  <div class="row">
    <div class="col-sm-4" style="background-color:lavender;">
      <div id="sandbox-container"></div>
    </div>
    <div class="col-sm-8" style="background-color:lavenderblush;">.col-sm-8</div>
  </div>
    
</body>





</html>

<script type="text/javascript">


$(document).ready(function() {
  $('#sandbox-container').datepicker({
      format: "dd/mm/yyyy",
      startDate: "now",
    orientation: "top auto",
    todayHighlight: true      
  });
}); 

</script>

