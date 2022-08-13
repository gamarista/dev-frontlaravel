<?php
session_start ();
require_once ('MySQLDB.php');
include_once ("util.php");
include ("./lang/selector.php");
include_once ('./log4php/Logger.php');

Logger::configure ( $_SERVER ["DOCUMENT_ROOT"] . '/conf/logConfig.xml' );
$logger = Logger::getLogger ( 'localFileLogger' );

$configParameters = include $_SERVER ["DOCUMENT_ROOT"] . "/conf/sacsConfig.php";
$_SESSION ['serverTimeCorrectionFactor'] = $configParameters ['serverTimeCorrection'];

//$query = "SELECT * FROM REGISTRO WHERE NOMBRE like '" . $_POST ['username'] . "' AND PASSWORD like '" . $_POST ['password'] . "'";
$xuser='jesus';
$xpasswd='jesus';
$query = "SELECT * FROM REGISTRO WHERE NOMBRE like '" . $xuser . "' AND PASSWORD like '" . $xpasswd . "'";

$db = new MySQLDB ();
$username;
$userId;
$routeTable;
$logger->debug ( "Query validacion de login  : " . $query );
$db->connect ();
$stmt = $db->query ( $query );
if ($stmt) {
	$result = $stmt->fetchAll ( PDO::FETCH_ASSOC );
	if (count ( $result ) == 1) {
		$_SESSION ['username'] = $result [0] ['NOMBRE'];
		$_SESSION ['userId'] = $result [0] ['ID'];
		$_SESSION ['routeTable'] = $result [0] ['TABLA_RUTA'];
		$_SESSION ['routeNumber'] = $result [0] ['IDD'];
		$_SESSION ['userType'] = $result [0] ['TIPO_USUARIO'];
		$_SESSION ['tipoServicio'] = 'T';
		$_SESSION ['filterDate'] = Util::getCurrentDate ();
		$_SESSION ['reportsClientName'] = Util::getConfigValue ( 'REPORTS_CLIENT_NAME' );
		$_SESSION ['database'] = 'live'; // or 'history'  
		
		/*
		 * Codigo original , devolver cuando ya se quiera habilitar el acceso de conductores.
		 */
		// Validar tipo usuario.
		if ((strcmp ( "A", $result [0] ['TIPO_USUARIO'] ) == 0) || (strcmp ( "D", $result [0] ['TIPO_USUARIO'] ) == 0)) {
			// Usuario es un Administrador.
			unset ( $_SESSION ['message_error'] );
			$_SESSION ['isAdmin'] = 1;
			$_SESSION ['userType'] = $result [0] ['TIPO_USUARIO'];
			// Go to the main page for administrators
			header ( 'Location: /admin/index.php' );
			// header ( 'Location: /scheduler/index.php' );
		} else if (strcmp ( "F", $result[0]['TIPO_USUARIO'] ) == 0) {
		    // Usuario es un Administrador.
		    unset ( $_SESSION ['message_error'] );
		    $_SESSION ['isAdmin'] = 1;
		    $_SESSION ['userType'] = $result [0] ['TIPO_USUARIO'];
		    // Go to the main page for administrators
		    header ( 'Location: /scheduler/index.php' );
		} else if (strcmp ( "C", $result[0]['TIPO_USUARIO'] ) == 0) {
			// Logged user is a coordinator.
			$_SESSION ['isAdmin'] = 1;
			$_SESSION ['userType'] = $result[0]['TIPO_USUARIO'];
			
			// Save to the session the centers associated to the coordinator
			$query = "SELECT DA.NICKNAME NICKNAME, DA.CENTER CENTER , CEN.ADDRESS ADDRESS 
					  FROM DRIVER_ASSIGNMENTS DA
 					  JOIN WCENTROS CEN ON (DA.CENTER LIKE CEN.NAME) 
					  WHERE DRIVER_TABLET LIKE '".$_SESSION ['username']."'";
			$db->connect ();
			$stmt = $db->query ( $query );
			if ($stmt) {
				$result = $stmt->fetchAll ( PDO::FETCH_ASSOC );
				$arrayCentros = array ();
				$centerNameArray = array();
				$centerAddress = array();
				foreach ( $result as $row ) {
					array_push ( $arrayCentros, $row ['NICKNAME'] );
					array_push ( $centerNameArray, $row['CENTER']);
					array_push ( $centerAddress, $row['ADDRESS']);
				}
				$_SESSION ['idCentro'] = $arrayCentros;
				$_SESSION ['centersName'] = $centerNameArray;
				$_SESSION ['centerAddress'] = $centerAddress;
			}
		
			// Clean the previous errors. 
			unset ( $_SESSION ['message_error'] );
			
			// Go to the main page for coordinators.
			header ( 'Location: /admin/pendingForConfirmationTrips.php' );
			
		} else if (strcmp ( "R", $result[0]['TIPO_USUARIO'] ) == 0) {
		    $_SESSION ['isAdmin'] = 0;
		    $_SESSION ['userType'] = $result[0]['TIPO_USUARIO'];
		    
		    // Clean the previous errors.
		    unset ( $_SESSION ['message_error'] );
		    
		    header ( 'Location: /admin/createdServicesViewer.php' );
		} else if (strcmp ( "S", $result[0]['TIPO_USUARIO'] ) == 0) {
		    $_SESSION ['isAdmin'] = 0;
		    $_SESSION ['userType'] = $result[0]['TIPO_USUARIO'];
		    
		    // Save to the session the centers associated to the coordinator
		    $query = "SELECT DA.NICKNAME NICKNAME, DA.CENTER CENTER , CEN.ADDRESS ADDRESS
					  FROM DRIVER_ASSIGNMENTS DA
 					  JOIN WCENTROS CEN ON (DA.CENTER LIKE CEN.NAME)
					  WHERE DRIVER_TABLET LIKE '".$_SESSION ['username']."'";
		    $db->connect ();
		    $stmt = $db->query ( $query );
		    if ($stmt) {
		        $result = $stmt->fetchAll ( PDO::FETCH_ASSOC );
		        $arrayCentros = array ();
		        $centerNameArray = array();
		        $centerAddress = array();
		        foreach ( $result as $row ) {
		            array_push ( $arrayCentros, $row ['NICKNAME'] );
		            array_push ( $centerNameArray, $row['CENTER']);
		            array_push ( $centerAddress, $row['ADDRESS']);
		        }
		        $_SESSION ['idCentro'] = $arrayCentros;
		        $_SESSION ['centersName'] = $centerNameArray;
		        $_SESSION ['centerAddress'] = $centerAddress;
		    }
		    
		    // Clean the previous errors.
		    unset ( $_SESSION ['message_error'] );
		    
		    header ( 'Location: /admin/messageToDispatcher.php' );
		} else {
			// Usuario es un conductor.
			// Obtener el id del centro asociado al chofer.
			$query = "SELECT NICKNAME, CENTER 
					  FROM DRIVER_ASSIGNMENTS 
					  WHERE DRIVER_TABLET LIKE '". $_SESSION ['username']."'";
			$db->connect ();
			$stmt = $db->query ( $query );
			if ($stmt) {
				$result = $stmt->fetchAll ( PDO::FETCH_ASSOC );
				$arrayCentros = array ();
				$centerNameArray = array();
				foreach ( result as $row ) {
					array_push ( $arrayCentros, $row ['NICKNAME'] );
					array_push ( $centerNameArray, $row['CENTER']);
				}
				$_SESSION ['idCentro'] = $arrayCentros;
				$_SESSION ['centersName'] = $centerNameArray;
			}
			unset ( $_SESSION ['message_error'] );
			// Jump to secured page
			//header ( 'Location: DriverHomeView.php' );
			header ( 'Location: sacsrutaDriver.php' );
		}
	} else {
		// Jump to login page
		$_SESSION ['message_error'] = constant ( "LOGIN_ERROR_MSG" );
		header ( 'Location:/' );
	}
	
	// // Solo permite acceso al DashBoard.
	// // Validar tipo usuario.
	// if (strcmp ( "A", $result [0] ['TIPO_USUARIO'] ) == 0) {
	// // Usuario es un Administrador.
	// unset ( $_SESSION ['message_error'] );
	// header ( 'Location: /admin/index.php' );
	// } else {
	// // Jump to login page
	// $_SESSION ['message_error'] = constant ( "LOGIN_ERROR_MSG" );
	// header ( 'Location:/' );
	// }
} else {
	$logger->debug ( "Database Error, please contact the administrator" );
}

?>