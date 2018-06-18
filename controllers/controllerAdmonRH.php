<?php
//require_once '../models/CrudEmpleado.php';
//require_once '../models/CrudConcepto.php';
class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "templateRH.php";
	
	}
	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			
			$enlaces = $_GET['action'];
		
		}

		else{

			$enlaces = "InicioRH.php";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}

	public function capturaEmpleadoController(){
     $a = new Empleado();

		if(isset($_POST["RCURP"])){
				$datosController = array( 'curp' => $_POST['RCURP'],
											'rfc' =>$_POST['RRFC'],
											'nombre'=>$_POST['RNombre'],
											'ap_paterno'=>$_POST['RPaterno'],
											'ap_materno'=>$_POST['RMaterno'],
											'calle'=>$_POST['Rcalle'],
											'no_exterior'=>$_POST['RNoExterior'],
											'colonia'=>$_POST['RColonia'],
											'codigo_postal'=>$_POST['RCodigoPostal'],
											'telefono'=>$_POST['Rtelefono'],
											'correo'=>$_POST['REmail'],
											'no_empleado'=>$_POST['Rnoempleado'],
											'tipo_empleado'=>$_POST['Rtipoempleado'],
											'id_area'=>$_POST['Rarea'],
											'id_puesto'=>$_POST['Rpuesto'],
											'tipo_nomina'=>$_POST['RtipoNomina'],
											'sueldo'=>$_POST['RSueldo']
											);
			//	var_dump($datosController);
				
				$respuesta = $a -> registrarEmpleadoModel($datosController);

				if($respuesta == "success"){

					    
	       			echo "<script type=\"text/javascript\">\n";
              echo "alert('Registro Exitoso!');\n";
              echo "window.location.replace('CapturaEmpleado');";
	        		echo "</script>"; 
    

				}else{
					echo "<script type=\"text/javascript\">\n";
          echo "alert('EL Curp o No de empleado ya Existen!');\n";
          echo "window.location.replace('CapturaEmpleado');";    	
          echo "</script>";
				}
		  }	
    }
	public function vistaTipoEmpleadoController(){
		$respuesta = Empleado::vistaTipoEmpleadoModel("tipoempleado");

		foreach($respuesta as $row => $item){

		echo'<option value='.$item["tipo_empleado"].'>'.$item["descripcion"].'</option>';

		}
	}
	public function vistaAreaController(){
		$respuesta = Empleado::vistaAreaModel("area");

		foreach($respuesta as $row => $item){

		echo'<option value='.$item["id_area"].'>'.$item["descripcionA"].'</option>';

		}
	}
	public function vistaPuestoController(){
		$respuesta = Empleado::vistaPuestoModel("puesto");

		foreach($respuesta as $row => $item){

		echo'<option value='.$item["id_puesto"].'>'.$item["descripcionP"].'</option>';

		}
	}
	public function vistaTipoNominaController(){
		$respuesta = Empleado::vistaTipoNominaModel("tiponomina");

		foreach($respuesta as $row => $item){

		echo'<option value='.$item["tipo_nomina"].'>'.$item["descripcionTN"].'</option>';

		}
	}
	public function vistaEmpleadoController(){
		$respuesta = Empleado::vistaEmpleadoModel("empleado","detalleempleado");

		foreach($respuesta as $row => $item){

		echo'<tr>
			       <td>'.$item["no_empleado"].'</td>
			       <td>'.$item["nombre"].'</td>
             <td>'.$item["curp"].'</td>
             <td>'.$item["telefono"].'</td>
             <td>'.$item["correo"].'</td>
             <td>           
	             <a href="InicioRH.php?action=EliminarEmpleado&no_empleado='.$item["no_empleado"].'">
	             <button onclick="confirmacion()"><span class="icon icon-user-minus"></span></button>
             </td>
             </tr>';

		}
	}
	public function vistaActualizarEmpleadoController($Acurp){

			$a = new Empleado();
			$respuesta = $a -> vistaActualizarEmpleadoModel($Acurp);
			return $respuesta;
		
	}
	public function borrarEmpleadoController(){

		if(isset($_GET["no_empleado"])){

			$datosController = $_GET["no_empleado"];

				$a = new Empleado();
				$respuesta = $a -> borrarEmpleadoModel($datosController);

				if($respuesta == "success"){

	       			echo "<script type=\"text/javascript\">\n";
	        		echo "alert('Registro Eliminado!');\n";
	        		echo "window.location.replace('EliminarEmpleado');";
	                echo "</script>"; 
	               
	               // echo  "<a href='InicioRH.php?action=EliminarEmpleado'>";
    

				}else{

					echo "<script type=\"text/javascript\">\n";
        			echo "alert('Fallido!');\n";
        			echo "window.location.replace('EliminarEmpleado');";
                    echo "</script>"; 
                   
                    //echo  "<a href='InicioRH.php?action=EliminarEmpleado'>";
				}

		}
	}
  public function actualizarEmpleadoController(){
      if(isset($_POST["Anoempleado"])){
        $datosController = array( 'curp' => $_POST['Acurp'],
                                  'calle'=>$_POST['Acalle'],
                                  'no_exterior'=>$_POST['ANoExterior'],
                                  'colonia'=>$_POST['AColonia'],
                                  'codigo_postal'=>$_POST['ACodigoPostal'],
                                  'telefono'=>$_POST['Atelefono'],
                                  'correo'=>$_POST['AEmail'],
                                  'no_empleado'=>$_POST['Anoempleado'],
                                  'tipo_empleado'=>$_POST['Atipoempleado'],
                                  'id_area'=>$_POST['Aarea'],
                                  'id_puesto'=>$_POST['Apuesto'],
                                  'tipo_nomina'=>$_POST['AtipoNomina'],
                                  'sueldo'=>$_POST['ASueldo'],
                                  'estado'=>$_POST['Aestado']
                                );
        //var_dump( $datosController);
                     $Z = new Empleado();
        $respuesta = $Z -> actualizarEmpleadoModel($datosController);
        
        if($respuesta == "success"){

              echo "<script type=\"text/javascript\">\n";
              echo "alert('Registro Actualizado!');\n";
              echo "window.location.replace('ConsultarEmpleado');";
                  echo "</script>"; 
                 
                 // echo  "<a href='InicioRH.php?action=EliminarEmpleado'>";
    

        }else{

          echo "<script type=\"text/javascript\">\n";
              echo "alert('Actualización Fallida!');\n";
              echo "window.location.replace('ConsultarEmpleado');";
                    echo "</script>"; 
                   
                    //echo  "<a href='InicioRH.php?action=EliminarEmpleado'>";
        } 
      }
  } 
  # CAPTURAR CONCEPTO DEDUCCIONES Y PERCEPCIONES
  public function capturaConceptoController(){

      if(isset($_POST["CCnoempleado"])){
          $existe = Empleado::existeNoEmpleadoModel($_POST["CCnoempleado"]);
          if($existe == 0 ){
          echo "<script type=\"text/javascript\">\n";
          echo "alert('No existe No. Empleado!');\n";
          echo "window.location.replace('CapturaDeduccionPercepcion');";   
          echo "</script>";
          }else{ 

            $sueldo = Empleado::BuscarSueldoModel($_POST["CCnoempleado"]);
          
            if(empty($_POST['CCmonto'])){
                $porcentaje = $_POST['CCporcentaje'];
                $monto = ($sueldo['sueldo'] * $porcentaje)/100;

            }elseif(empty($_POST['CCporcentaje'])){
                $monto = $_POST['CCmonto'];
                $porcentaje = 0;  
            }else{
                $monto = 0;
                $porcentaje = 0;
            }

              $datosController = array( 
                              'no_empleadoC'=> $_POST["CCnoempleado"],
                              'porcentaje' => $porcentaje,
                              'numero_periodos' =>$_POST['CCnoperiodos'],
                              'monto'=>$monto,
                              'cve_cpto'=>'P',
                              'Cve_tipo_cpto'=>$_POST['CCCve_tipo_cpto'],
                              'descripcion'=>$_POST['CCdescripcion']
                              );
            // var_dump($datosController);
                $concep = new Concepto();
               
                $respuesta = $concep -> capturaConceptoModel($datosController);
                if($respuesta == "success"){

                      
                      echo "<script type=\"text/javascript\">\n";
                      echo "alert('Exito!');\n";
                      echo "window.location.replace('CapturaDeduccionPercepcion');";
                      echo "</script>"; 
            

                }else{
                  echo "<script type=\"text/javascript\">\n";
                  echo "alert('Error!');\n";
                  echo "window.location.replace('CapturaDeduccionPercepcion');";   
                  echo "</script>";
                }
      
          }
      }      
  }
  public function vistaClaveTipoController(){
    
    $respuesta = Concepto::claveTipoConceptoModel("tipoconcepto");

    foreach($respuesta as $row => $item){

    echo'<option value='.$item["Cve_tipo_cpto"].'>'.$item["descripcion"].'</option>';

    }
  }
  public function tipoRetardoController(){
    $respuesta = Concepto::tipoRetardoModel("tiporetardo");

    foreach($respuesta as $row => $item){

    echo'<option value='.$item["id_tipoRetardo"].'>'.$item["descripcion"].'</option>';

    }
  }
  public function capturaRetardoController(){
    if(isset($_POST["CRnoempleado"])){

          $existe = Empleado::existeNoEmpleadoModel($_POST["CRnoempleado"]);
          //echo $existe;
          if($existe == 0 ){
          echo "<script type=\"text/javascript\">\n";
          echo "alert('No existe No. Empleado!');\n";
          echo "window.location.replace('CapturaRetardo');";   
          echo "</script>";
          }else{ 

              $datosController = array( 
                              'no_empleadoC'=> $_POST["CRnoempleado"],
                              'id_tipoRetardo' =>$_POST['TipoRet']
                              );
            //var_dump($datosController);
                $concepR = new Concepto();
               
                $respuesta = $concepR -> capturaRetardoModel($datosController);
                if($respuesta == "success"){

                      
                      echo "<script type=\"text/javascript\">\n";
                      echo "alert('Exito!');\n";
                      echo "window.location.replace('CapturaRetardo');";
                      echo "</script>"; 
            

                }elseif ($respuesta == "falta") {
                      echo "<script type=\"text/javascript\">\n";
                      echo "alert('Empleado junto retardos suficientes para una Falta!');\n";
                      echo "window.location.replace('CapturaRetardo');";
                      echo "</script>"; 
                }else{
                  echo "<script type=\"text/javascript\">\n";
                  echo "alert('Error Retardo!');\n";
                  echo "window.location.replace('CapturaRetardo');";   
                  echo "</script>";
                }
      
          }
      }      

  }
  public function capturaHorasExtraController(){
    if(isset($_POST["CHnoempleado"])){

          $existe = Empleado::existeNoEmpleadoModel($_POST["CHnoempleado"]);
           $concepH = new Concepto();
            $tHoras = $concepH -> totalHoraExtraModel($_POST["CHnoempleado"]);
          //echo $existe;
          if($existe == 0 ){
          echo "<script type=\"text/javascript\">\n";
          echo "alert('No existe No. Empleado!');\n";
          echo "window.location.replace('CapturaHoraExtra');";   
          echo "</script>";
          }elseif(($tHoras+$_POST["RHExtra"])>16){
            echo "<script type=\"text/javascript\">\n";
          echo "alert('El Empleado ya tiene ' + '$tHoras' +' horas y excede el maximo de Horas Extra');\n";
          echo "alert('Intente de nuevo');\n";
          echo "window.location.replace('CapturaHoraExtra');";   
          echo "</script>";

          }else{ 

              $datosController = array( 
                              'no_empleadoC'=> $_POST["CHnoempleado"],
                              'horasExtra' =>$_POST['RHExtra']
                              );
            //var_dump($datosController);
               
               
                $respuesta = $concepH -> horaExtraModel($datosController);
                if($respuesta == "success"){

                      
                      echo "<script type=\"text/javascript\">\n";
                      echo "alert('Exito!');\n";
                      echo "window.location.replace('CapturaHoraExtra');";
                      echo "</script>"; 
                }else{
                  echo "<script type=\"text/javascript\">\n";
                  echo "alert('Error Horas Extra!');\n";
                  echo "window.location.replace('CapturaHoraExtra');";   
                  echo "</script>";
                }
      
          }
      } 
  }
  public function autorizacionFaltaController(){
      if(isset($_POST["JFnoempleado"])){

          $existe = Empleado::existeNoEmpleadoModel($_POST["JFnoempleado"]);
           $concepJF = new Concepto();
            $Faltas = $concepJF -> noFaltasModel($_POST["JFnoempleado"]);
          //echo $existe;
          if($existe == 0 ){
            echo "<script type=\"text/javascript\">\n";
            echo "alert('No existe No. Empleado!');\n";
            echo "window.location.replace('AutorizacionFaltas');";   
            echo "</script>";
          }elseif($Faltas<1){
            echo "<script type=\"text/javascript\">\n";
            echo "alert('El Empleado no tiene Faltas es buen chic@!');\n";
            echo "alert('Intente de nuevo');\n";
            echo "window.location.replace('AutorizacionFaltas');";   
            echo "</script>";
          }elseif($Faltas<$_POST["JNFaltas"]){
            echo "<script type=\"text/javascript\">\n";
            echo "alert('El Empleado tiene: ' + '$Faltas' +' no es tan mal chic@!');\n";
            echo "alert('Intente de nuevo');\n";
            echo "window.location.replace('AutorizacionFaltas');";   
            echo "</script>";
          }else{ 

              $datosController = array( 
                              'no_empleadoC'=> $_POST["JFnoempleado"],
                              'no_faltas' =>$_POST['JNFaltas']
                              );
            //var_dump($datosController);
               
               
                $respuesta = $concepJF -> autorizacionFaltaModel($datosController);
                if($respuesta == "success"){

                      
                      echo "<script type=\"text/javascript\">\n";
                      echo "alert('Exito!');\n";
                      echo "window.location.replace('AutorizacionFaltas');";
                      echo "</script>"; 
                }else{
                  echo "<script type=\"text/javascript\">\n";
                  echo "alert('Error!');\n";
                  echo "window.location.replace('AutorizacionFaltas');";   
                  echo "</script>";
                }
      
          }
      }
  }
  public function reviewNominaController(){
    if(isset($_POST["GPnoempleado"])){

          $existe = Empleado::existeNoEmpleadoModel($_POST["GPnoempleado"]);
           $RNomina = new Concepto();
          //echo $existe;
          if($existe == 0 ){
            echo "<script type=\"text/javascript\">\n";
            echo "alert('No existe No. Empleado!');\n";
            echo "window.location.replace('PrevisualizarNomina');";   
            echo "</script>";
          }else{
            $datosController =$_POST["GPnoempleado"];
            //Traer los Datos del Empleado
            $respuesta = $RNomina ->  reviewNominaModel($datosController);
            //Calculo ISR y IMSS
            $I = new Deduccion();
            $isr = $I->ISR($respuesta['sueldo'],$respuesta['tipo_nomina']);
            $TiempoExtra=$RNomina->validarHorasExtraModel($_POST["GPnoempleado"]);
            $imss = $I->IMSS($respuesta['sueldo'],$TiempoExtra);
            //Traer Conceptos
            $percepciones= $this->conceptoCalculoController($respuesta['no_empleado'],'P');
            $deducciones = $this->conceptoCalculoController($respuesta['no_empleado'],'D');
            //Suma de Precepciones y deducciones del Empleado
            if($isr<0){
             $totalPer=$RNomina->totalConceptoModel($respuesta['no_empleado'],'P')+($isr*(-1));
             $totalDec=$RNomina->totalConceptoModel($respuesta['no_empleado'],'D')+$imss;
            }else{
             $totalPer=$RNomina->totalConceptoModel($respuesta['no_empleado'],'P');
             $totalDec=$RNomina->totalConceptoModel($respuesta['no_empleado'],'D')+$imss+$isr; 
            }

             $suedoNeto=$respuesta['sueldo']+ $totalPer-$totalDec;
             //Imprimir las tablas y valores del empleado
             echo"<table class='table table-striped'>
                    <thead>
                        <tr>
                            <th>No. Empleado</th>   
                            <th>Nombre</th>
                            <th>RFC</th>
                            <th>CURP</th>
                            <th>Teléfono</th>
                            <th>Tipo de Empleado</th>
                            <th>Area</th>
                            <th>Puesto</th>
                            <th>Tipo Nomina</th>
                            <th>Sueldo</th>
                        </tr>
                    </thead> 
                      <tbody>
                           <tr>
                             <td>{$respuesta['no_empleado']}</td>
                             <td>{$respuesta['nombre']} {$respuesta['ap_paterno']} {$respuesta['ap_materno']}</td>
                             <td>{$respuesta['rfc']}</td>
                             <td>{$respuesta['curp']}</td>
                             <td>{$respuesta['telefono']}</td>
                             <td>{$respuesta['Dtipoempleado']}</td>
                             <td>{$respuesta['descripcionA']}</td>
                             <td>{$respuesta['descripcionP']}</td>
                             <td>{$respuesta['descripcionTN']}</td>
                             <td>\${$respuesta['sueldo']}</td>
                           </tr>                           
                      </tbody>   
                  </table>  

      <table style='width:100%; float:left; background-color:#04B4AE' class='table table-striped'>

                    <thead class='thead-dark'>
                            <th>PERCEPCIONES</th>
                            <th>DEDUCCIONES</th>
                     </thead>

      </table>

      <table style='width:50%; float:left' class='table table-striped'>
                    <thead style='background-color:#04B4AE'>
                        <tr>
                            <th>No Recibo</th>   
                            <th>Tipo de Concepto</th>
                            <th>Descripción</th>
                            <th>Total</th>
                        </tr>
                    </thead> 
          <tbody>
              "; if($isr<0){
              $isrN=$isr*-1; 
              echo       
               "<tr>
                <td>0B</td>
                <td>ISR</td>
                <td>Subsidio a entregar al empleado</td>  
                <td>\$$isrN</td>
               </tr>";
               }
              echo"$percepciones
          </tbody>  
      </table>
      <table style='width:50%; float:rigth' class='table table-bordered'>
                    <thead style='background-color:#04B4AE'>
                        <tr>
                            <th>No Recibo</th>   
                            <th>Tipo de Concepto</th>
                            <th>Descripción</th>
                            <th>Total</th>
                        </tr>
                     </thead> 
          <tbody> 
              ";  if($isr>0){ 
                      echo       
                       "<tr>
                        <td>0B</td>
                        <td>ISR</td>
                        <td>ISR</td>  
                        <td>\$$isr</td>
                       </tr>";
                  }
              echo"
               <tr> 
                <td>0B</td>
                <td>IMSS</td>
                <td>IMSS</td>
                <td>\$$imss</td>
                </tr>  
                $deducciones
             
          </tbody> 
      </table> 
      <table style='width:40%; float:left;' class='table table-hover'>
            <thead style='background-color:#04B4AE'>
              <th style='text-align:center'>Totales</th>
            </thead>    
      <tbody> 
      <tr>
      <td>Sueldo: \${$respuesta['sueldo']}</td>
      </tr>
       <tr>
      <td>Total de Percepciones: \$$totalPer</td>
      </tr>
       <tr>
      <td>Total de Deducciones: \$$totalDec</td>
      </tr>
      <tr>
      <td>Sueldo Neto: \$$suedoNeto</td>
      </tr>
      </tbody> 
     </table>
                ";   
          }
      }    
  }
  ///traer los datos de las tablas del empleado
  public function conceptoCalculoController($no_empleado,$tipoCon){

    $respuesta = Concepto:: conceptoCalculoModel($no_empleado,$tipoCon);

    $conceptolista = "";

    foreach($respuesta as $row => $item){

     $conceptolista .= '
              <tr>
              <td>' . $item["no_recibo"] . '</td>
              <td>' . $item["Cve_tipo_cpto"] . '</td>
              <td>' . $item["descripcion"] . '</td>
              <td> $' . $item["monto"] . '</td>
              </tr>
              ';       
    }
     
    return $conceptolista;

  }
  public function capturaFondoAhorroController(){

      if(isset($_POST["FAnoempleado"])){
          $existe = Empleado::existeNoEmpleadoModel($_POST["FAnoempleado"]);
          $FAex = Concepto::validarFondoAhorro($_POST["FAnoempleado"]);
          if($existe == 0 ){
          echo "<script type=\"text/javascript\">\n";
          echo "alert('No existe No. Empleado!');\n";
          echo "window.location.replace('FondoAhorro');";   
          echo "</script>";
          }elseif ($FAex > 0) {
          echo "<script type=\"text/javascript\">\n";
          echo "alert('EL empleado ya tiene Fondo de Ahorro!');\n";
          echo "window.location.replace('FondoAhorro');";   
          echo "</script>";
          }else{ 

            $sueldo = Empleado::BuscarSueldoModel($_POST["FAnoempleado"]);
          
                $porcentaje = $_POST['FAporcentaje'];
                $monto = ($sueldo['sueldo'] * $porcentaje)/100;



              $datosController = array( 
                              'no_empleadoC'=> $_POST["FAnoempleado"],
                              'porcentaje' => $porcentaje,
                              'numero_periodos' =>$_POST['FAnoperiodos'],
                              'monto'=>$monto
                              );
            // var_dump($datosController);
                $concepFA = new Concepto();
               
                $respuesta = $concepFA -> capturaFondoAhorro($datosController);

                if($respuesta == "success"){

                      
                      echo "<script type=\"text/javascript\">\n";
                      echo "alert('Exito!');\n";
                      echo "window.location.replace('FondoAhorro');";
                      echo "</script>"; 
            

                }else{
                  echo "<script type=\"text/javascript\">\n";
                  echo "alert('Error!');\n";
                  echo "window.location.replace('FondoAhorro');";   
                  echo "</script>";
                }
      
          }
      }      
  }
}
/*
  $a= new MvcController();
  $b= new MvcController();

  echo $a->conceptoCalculoController('2017a',1);
  echo $b->conceptoCalculoController('2017a',2);*/