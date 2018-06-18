<?php
session_start();
define( 'MAX_SESSION_TIEMPO', 900 * 1 );
if(!$_SESSION["EmpleadoRH"]){

	header("location:../../1SelecciónEA.php");

	exit();

}else{
	if ( isset( $_SESSION[ 'ULTIMA_ACTIVIDAD' ] ) && 
     ( time() - $_SESSION[ 'ULTIMA_ACTIVIDAD' ] > MAX_SESSION_TIEMPO ) ) {

    // Si ha pasado el tiempo sobre el limite destruye la session
    header("location:../../cerrar.php");

	exit();
    }
$_SESSION[ 'ULTIMA_ACTIVIDAD' ] = time();
require_once ("../../models/enlacesRH.php");
require_once ("../../models/CrudEmpleado.php");
require_once ("../../models/CrudConcepto.php");
require_once ("../../controllers/controllerAdmonRH.php");

$mvc = new MvcController();
$mvc -> pagina();

}
