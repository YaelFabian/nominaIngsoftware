<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "AutorizacionFaltas" || 
		   $enlaces == "2admonlogin" ||
		   $enlaces == "BonoProd" ||
		   $enlaces == "CapturaEmpleado" ||
		   $enlaces == "ConsultarEmpleado" ||
		   $enlaces == "ModificarEmpleado" ||
		   $enlaces == "EliminarEmpleado" ||
		   $enlaces == "ConceptosNomina" ||
		   $enlaces == "Consulta" ||
		   $enlaces == "CapturaDeduccionPercepcion" ||
		   $enlaces == "CapturaHoraExtra" ||
		   $enlaces == "Empleado" ||
		   $enlaces == "FondoAhorro" ||
		   $enlaces == "HorasExtra" ||
		   $enlaces == "navegacionRH" ||
		   $enlaces == "PrevisualizarNomina" ||		   
		   $enlaces == "Nomina" ||
		   $enlaces == "CapturaRetardo" ||
		   $enlaces == "Vadidación"
		   ){

			$module =  $enlaces.".php";
		
		}else if($enlaces == "InicioRH.php"){

			$module =  "menudesp.php";

		}else{
			$module = "menudesp.php";
		}
		return $module;

	}

}