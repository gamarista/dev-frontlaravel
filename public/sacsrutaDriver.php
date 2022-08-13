<?php 
    include_once ("./lang/selector.php");
    include_once ("util.php");

    // Create a Session if there is not anyone created.
    if(session_id() == '' || !isset($_SESSION)) {
        // session isn't started
        session_start();
    }
    $_SESSION['database']='live';

	if (empty($_SESSION['userId']) || empty($_SESSION['username']) || empty($_SESSION['routeTable'])) {
		// Si no ha iniciado session se manda a login.
		header('Location: /');
	}
	else {
		$sessionInitiated = true ;
		$routeTable = $_SESSION['routeTable']; 
		$selectedDate = $_SESSION['filterDate'];
		if (isset ($_SESSION['routeTable']) ){
			
		}
	}
?>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple markers</title>
    <style>
      html, body, #map-canvas,#map-canvas-dp,#map-canvas-ns,#map-canvas-cd {
        height: 100%;
        width: 95%;
        margin: 5px;
        padding: 2px
      }
    </style>
    <link  rel="icon" href="img/fav.ico" type="image/x-icon"/>   
    <link href="./css/app.css" rel="stylesheet">
    <script type="text/javascript" src="./js/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="./js/hashTable.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyA5wVZCly3ulhDqJfe2lldFYumx7f5ae3s"></script>
	<script type="text/javascript" src="./js/sacsMapFunctions.js"></script>
	<script type="text/javascript" src="./js/jquery.blockUI.js"></script>
    <script>
	    initiated=false;
		tablaRuta = <?php if ($sessionInitiated) { echo substr($routeTable , 11); echo "; initiated=true;"; } else echo "0"; ?> 
		fecha = <?php if ($sessionInitiated) { echo"'".$selectedDate."';"; } ?>
		console.log (" Table Ruta : " + tablaRuta); 
		console.log (" initiated  : " + initiated); 
		console.log (" fecha  :  " + fecha);
		initialZoom = 12;
		mapa = null; 
		tipoViaje = 'A';
		tramosAMostrar = '10'; 
		calculateCurrentPosition = false ; 
		google.maps.event.addDomListener(window,'load',getCenters );
		// google.maps.event.addDomListener(window,'load',getLocations );
		
		showSpecialist = <?php echo "\"".Util::getConfigValue('ACTIVE_SPECIALIST')."\""; ?>;
        if ( !showSpecialist ) {
        	showSpecialist = 'NO';
        }
		
		window.onload = function () {
			if ("SI" === showSpecialist.toUpperCase() ) {
				$('#tipoViajeSelector').append($('<option>', {	value: 'C',
    													text: '<?php echo constant("DRIVER_SERVICE_OPTION_GO_SPECIALIST") ?>'
									}));
				$('#tipoViajeSelector').append($('<option>', {	value: 'D',
    													text:  '<?php echo constant("DRIVER_SERVICE_OPTION_RETURN_SPECIALIST") ?>'
									}));					
			}
 		}

	</script>
  </head>
  <body>

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="img/logo.png" class="img-responsive" alt="SACS"  style="width: 180px;">
                </a>
            </div>
        </nav>

<div class="container">
 <div class="row justify-content-center">
	<div id="selector">	
		<table>
			<tr><td><?php echo constant("DRIVER_ROUTE_TRAVEL_TRIP_SELECTOR") ?></td>
			<td>
			<select id='tipoViajeSelector' onChange='tipoViaje=$( "#tipoViajeSelector" ).val(); getLocations();'>
				<?php
					echo "<option value='A' selected>".constant("DRIVER_SERVICE_OPTION_GO")."</option>";
					echo "<option value='B' selected>".constant("DRIVER_SERVICE_OPTION_RETURN")."</option>";
				?>
			</select>
			
		</td></tr>
		</table>
	</div>
</div>
</div>	
	<div id="map-canvas"  ></div>
		<div id='total'>
		<table><tr>
			<td><span><?php echo constant("DRIVER_ROUTE_TOTAL_DISTANCE") ?></span></td><td><span id='totalDistance'></span><br/></td>
		</tr>
		<tr>
			<td><span><?php echo constant("DRIVER_ROUTE_TOTAL_TIME"); ?></span></td><td><span id='totalTime'></span></td>
		</tr>
		</table>
	</div>

  </body>
</html>

