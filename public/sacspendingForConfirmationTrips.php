<?php
// Create a Session if there is not anyone created.
if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
$_SESSION['database'] = 'live';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">

    <link  rel="icon" href="./img/fav.ico" type="image/x-icon"/>   
    <link href="./css/app.css" rel="stylesheet">
<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- <script type="text/javascript" src="./js/jquery-1.11.1.min.js"></script>
-->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="./js/assets/ie10-viewport-bug-workaround.js"></script>

<!-- plugins para datetime picker -->
<script type="text/javascript" src="./js/bootstrap.min.js"></script>
<script type="text/javascript" src="./js/moment.min.js"></script>
<script type="text/javascript" src="./js/notify.min.js"></script>
<script type="text/javascript"
	src="./js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="./js/transition.js"></script>
<script type="text/javascript" src="./js/collapse.js"></script>
<script type="text/javascript" src="./js/sacsAdminFunctions.js"></script>


<title>SACS Mobile Dashboard</title>

<!-- Bootstrap core CSS -->
<link href="./css/bootstrap.min.css" rel="stylesheet">
<link href="./css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<link href="./css/bootstrap-horizon.css" rel="stylesheet">
<link href="./css/navbar-fixed-side.css" rel="stylesheet" />

<link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" 
	rel="stylesheet" type="text/css" />

<!-- Custom styles for this template -->
<link href="./css/dashboard.css" rel="stylesheet">

<!--  SacsMobile DashBoards Styles  -->
<link href="./css/sacsAdmin_styles.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="./js/assets/ie-emulation-modes-warning.js"></script>


<script type="text/javascript" src="../js/jquery.blockUI.js"></script>
<script type="text/javascript" src="./js/sacsCoordinatorFunctions.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<script>
	window.onload = function(){
		filterPendingForConfirmationTrips(); 
		$('#example').DataTable();

		initializeDriverChangeForm();
	}
</script>

</head>

<body>
 <!--  <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid align-middlew">
            <div class="navbar-header">

            </div>

        </div>
    </nav> -->
 
<!--         <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="./img/logo.png" class="img-responsive" alt="SACS"  style="width: 180px;">
                </a>
            </div>
        </nav> -->


	<div class="container-fluid">
	 	<div class="row">
			<div class="col-sm-3 col-md-2">
				<nav class="navbar navbar-default navbar-fixed-side">
			    	<div class="navbar-header">
			            		<button type="button" class="navbar-toggle collapsed"
									data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false"	
									aria-controls="navbar">
									<span class="sr-only">Toggle navigation</span> <span
										class="icon-bar"></span> <span class="icon-bar"></span> <span
										class="icon-bar"></span>
								</button>
			        </div>
				    <div id="menuContainer" class="navbar-collapse collapse" aria-expanded="true" style="">
				                	<!-- Inserta el menu -->
									<?php 
										include_once './view/MenuView.php';
										include_once './model/Menu.php';
										$menuView = new MenuView();
										echo $menuView->getMenuHtml(Menu::PENDING_TRIPS);
									?>
					</div>
				</nav>					
			</div>
					
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="overflow-x: hidden; ">
						<h1 class="page-header">
							<?php echo Menu::PENDING_TRIPS ?>
						</h1>
						<!--  Inserta filtro  -->
						<?php
							include_once './view/FilterView.php';
							$filter = new FilterView ();
							echo ($filter->getPatientRouteFilterHtml ( 'filterPendingForConfirmationTrips()' ));
						?>
						<div class="panel panel-default">
							<div class="panel-heading"></div>
							<div id="tableContainer" style="overflow-x: auto; "></div>
						</div>
						<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-4 main">
							<div class='input-group' style='text-align:right;'>
								<button class="btn btn-primary" onClick="downloadExcelForConfirmationPendingTrips('<?php session_start(); echo $_SESSION ['reportsClientName'] ?>')">Download as Excel</button>
							</div>
					 	</div>
			</div>
		</div>	
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog" 
	     aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <!-- Modal Header -->
	            <div class="modal-header">
	                <button type="button" class="close" 
	                   data-dismiss="modal">
	                       <span aria-hidden="true">&times;</span>
	                       <span class="sr-only">Close</span>
	                </button>
	                <h4 class="modal-title" id="myModalLabel">
	                    Change Driver. 
	                </h4>
	            </div>
	            
	            <!-- Modal Body -->
	            <div class="modal-body">
	                
	                <form class="form-horizontal" role="form">
	                  <div class="form-group">
	                    <label  class="col-sm-3 control-label" for="currentDriver">Current Driver</label>
	                    <div class="col-sm-6">
	                        <input type="text" class="form-control" id="currentDriver" readonly/>
	                    </div>
	                  </div>
	                  
	                  <div class="form-group">
					  	<label for="newDriver" class="col-sm-3 control-label">Driver(Route)</label>
							<div class="col-sm-6">
								<select id="newDriver" name="newDriver" class="form-control" required>
								</select>
							</div>
					  </div>
					  
	                 <input type="hidden" id="currentDriverId" name="currentDriverId" />
	                 <input type="hidden" id="serviceId" name="serviceId" />
	                   
	                 <!--  <div class="form-group">
	                    <div class="col-sm-offset-2 col-sm-10">
	                      <button type="submit" class="btn btn-default">Sign in</button>
	                    </div>
	                  </div> -->
	                </form>
	            </div>
	            
	            <!-- Modal Footer -->
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                <button type="button" class="btn btn-primary" onClick="changeDriver();" >Save changes</button>
	            </div>
	        </div>
	    </div>
	</div>

</body>
</html>
