<?php
session_start();

if(!$_SESSION["EmpleadoRH"]){

	header("location:../../1SelecciónEA.php");

	exit();

}else{
require_once ("../../models/enlacesRH.php");
require_once ("../../models/CrudEmpleado.php");
require_once ("../../models/CrudConcepto.php");
require_once ("../../controllers/controllerAdmonRH.php");

$mvc = new MvcController();
$mvc -> pagina();

}