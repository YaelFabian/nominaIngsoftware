<?php
require_once "conexion.php";
require_once 'CrudEmpleado.php';
require_once "Deducciones.php";

/**
* 
*/
class Concepto extends Conexion{
	#CAPTURA CONCEPTO
	public function capturaConceptoModel($capturaModel){

		$stmt = Conexion::conectar()->prepare("call nomina.capturaConcepto
			(:no_empleadoC,:porcentaje,:numero_periodos,:monto,:cve_cpto,:Cve_tipo_cpto,:descripcion)");

		$stmt->bindParam(":no_empleadoC", $capturaModel["no_empleadoC"], PDO::PARAM_STR);
		$stmt->bindParam(":porcentaje", $capturaModel["porcentaje"], PDO::PARAM_INT);
		$stmt->bindParam(":numero_periodos", $capturaModel["numero_periodos"], PDO::PARAM_INT);
		$stmt->bindParam(":monto", $capturaModel["monto"], PDO::PARAM_STR);
		$stmt->bindParam(":cve_cpto", $capturaModel["cve_cpto"], PDO::PARAM_STR);
		$stmt->bindParam(":Cve_tipo_cpto", $capturaModel["Cve_tipo_cpto"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $capturaModel["descripcion"], PDO::PARAM_STR);

			if($stmt->execute() ){
				 return "success";
			}else{
				 return "error";
			}
			$stmt = null;
	}

	public function claveTipoConceptoModel($tabla){
		
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Cve_tipo_cpto != 'DFAL' AND Cve_tipo_cpto != 'DFA' 
																	AND Cve_tipo_cpto != 'FAE' AND Cve_tipo_cpto != 'FAED'
																	AND Cve_tipo_cpto != 'PHE'");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}
	public function tipoRetardoModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
		
	}
	##Capturar un retardo
	public function capturaRetardoModel($datosModel){

		$sueldoDia= $this->sueldoDia($datosModel["no_empleadoC"]);
		$monto=(float)$sueldoDia*1.4;
		//var_dump($datosModel);
		//$stmt = Conexion::conectar()->prepare("call nomina.capturaRetardo('Y12',1,300);");
		$stmt = Conexion::conectar()->prepare("call nomina.capturaRetardo(:no_empleadoC,:id_tipoRetardo, :sueldoDia)");
				
		$stmt->bindParam(":no_empleadoC", $datosModel["no_empleadoC"], PDO::PARAM_STR);
		$stmt->bindParam(":id_tipoRetardo", $datosModel["id_tipoRetardo"], PDO::PARAM_INT);
		$stmt->bindParam(":sueldoDia",$monto , PDO::PARAM_STR);

			if($stmt->execute() ){
				if($this->validarRetardosFaltaModel($datosModel["no_empleadoC"])){
					return "falta";
				}
				 return "success";
			}else{
				 return "error";
			}
			$stmt = null;
		
	}
	#Calcular sueldo Diario de un empleado  
	public function sueldoDia($no_empleado){
		$a= new Empleado();	
		$Sueldo = $a->BuscarSueldoModel($no_empleado);
		
		if($Sueldo['tipo_nomina']=='S'){
			$sueldoDia=$Sueldo['sueldo']/7;

			}elseif ($Sueldo['tipo_nomina']=='Q') {
				$sueldoDia=$Sueldo['sueldo']/14;

				}elseif ($Sueldo['tipo_nomina']=='M') {
					$sueldoDia=$Sueldo['sueldo']/28;
		}else{
			$sueldoDia=0;
		}
		return $sueldoDia;
	}
	##  Revisar si el numero de retardos se combierten en faltas
	public function validarRetardosFaltaModel($no_empleado){
		$sueldoDia= $this->sueldoDia($no_empleado);
		$monto=(float)$sueldoDia*1.4;
		$falta=4;

		$stmt1 = Conexion::conectar()->prepare("SELECT * FROM retardo WHERE detalleempleado_no_empleado=:no_empleado AND id_tipoRetardo = 1 AND estado='Activo'");	
		$stmt1->bindParam(":no_empleado", $no_empleado, PDO::PARAM_STR);											
		$stmt1->execute();
		$stmt2 = Conexion::conectar()->prepare("SELECT * FROM retardo WHERE detalleempleado_no_empleado=:no_empleado AND id_tipoRetardo = 2 AND estado='Activo'");	
		$stmt2->bindParam(":no_empleado", $no_empleado, PDO::PARAM_STR);											
		$stmt2->execute();
		$stmt3 = Conexion::conectar()->prepare("SELECT * FROM retardo WHERE detalleempleado_no_empleado=:no_empleado AND id_tipoRetardo = 3 AND estado='Activo'");	
		$stmt3->bindParam(":no_empleado", $no_empleado, PDO::PARAM_STR);											
		$stmt3->execute();

		if($stmt1->rowCount()>2){
			$stmt = Conexion::conectar()->prepare("call nomina.capturaRetardo(:no_empleadoC,:id_tipoRetardo, :sueldoDia)");
			$stmt->bindParam(":no_empleadoC", $no_empleado, PDO::PARAM_STR);
			$stmt->bindParam(":id_tipoRetardo",$falta, PDO::PARAM_INT);
			$stmt->bindParam(":sueldoDia",$monto , PDO::PARAM_STR);
			if($stmt->execute() ){
					for($i=0;$i<3;$i++){
					$stmtf = Conexion::conectar()->prepare("UPDATE retardo
															SET estado='Inactivo'
															WHERE detalleempleado_no_empleado=:no_empleado AND estado='Activo' AND id_tipoRetardo = 1 ORDER BY id_retardo ASC LIMIT 1");
					$stmtf->bindParam(":no_empleado", $no_empleado, PDO::PARAM_STR);	
					$stmtf->execute();
					$stmtf=null;
					}
				return TRUE;
			}else{
				return FALSE;
			}
		$stmt=null;	
		}elseif($stmt1->rowCount()==2 AND $stmt2->rowCount()==1 ){
			$stmt = Conexion::conectar()->prepare("call nomina.capturaRetardo(:no_empleadoC,:id_tipoRetardo, :sueldoDia)");
			$stmt->bindParam(":no_empleadoC", $no_empleado, PDO::PARAM_STR);
			$stmt->bindParam(":id_tipoRetardo",$falta, PDO::PARAM_INT);
			$stmt->bindParam(":sueldoDia",$monto , PDO::PARAM_STR);
			if($stmt->execute() ){
					for($i=0;$i<2;$i++){
					$stmtf = Conexion::conectar()->prepare("UPDATE retardo
															SET estado='Inactivo'
															WHERE detalleempleado_no_empleado=:no_empleado AND estado='Activo' AND id_tipoRetardo = 1 ORDER BY id_retardo ASC LIMIT 1");
					$stmtf->bindParam(":no_empleado", $no_empleado, PDO::PARAM_STR);	
					$stmtf->execute();
					$stmtf=null;
					}
					$stmtf = Conexion::conectar()->prepare("UPDATE retardo
															SET estado='Inactivo'
															WHERE detalleempleado_no_empleado=:no_empleado AND estado='Activo' AND id_tipoRetardo = 2 ORDER BY id_retardo ASC LIMIT 1");
					$stmtf->bindParam(":no_empleado", $no_empleado, PDO::PARAM_STR);	
					$stmtf->execute();
					$stmtf=null;
					
				return TRUE;
			}else{
				return FALSE;
			}
		$stmt=null;
		}elseif ($stmt2->rowCount()==2 AND $stmt3->rowCount()==1 ) {
			$stmt = Conexion::conectar()->prepare("call nomina.capturaRetardo(:no_empleadoC,:id_tipoRetardo, :sueldoDia)");
			$stmt->bindParam(":no_empleadoC", $no_empleado, PDO::PARAM_STR);
			$stmt->bindParam(":id_tipoRetardo",$falta, PDO::PARAM_INT);
			$stmt->bindParam(":sueldoDia",$monto , PDO::PARAM_STR);
			if($stmt->execute() ){
					for($i=0;$i<2;$i++){
					$stmtf = Conexion::conectar()->prepare("UPDATE retardo
															SET estado='Inactivo'
															WHERE detalleempleado_no_empleado=:no_empleado AND estado='Activo' AND id_tipoRetardo = 2 ORDER BY id_retardo ASC LIMIT 1");
					$stmtf->bindParam(":no_empleado", $no_empleado, PDO::PARAM_STR);	
					$stmtf->execute();
					$stmtf=null;
					}
					
					$stmtf = Conexion::conectar()->prepare("UPDATE retardo
															SET estado='Inactivo'
															WHERE detalleempleado_no_empleado=:no_empleado AND estado='Activo' AND id_tipoRetardo = 3 ORDER BY id_retardo ASC LIMIT 1");
					$stmtf->bindParam(":no_empleado", $no_empleado, PDO::PARAM_STR);	
					$stmtf->execute();
					$stmtf=null;
					
				return TRUE;
			}else{
				return FALSE;
			}
		$stmt=null;
		}elseif($stmt3->rowCount()==2){
			$stmt = Conexion::conectar()->prepare("call nomina.capturaRetardo(:no_empleadoC,:id_tipoRetardo, :sueldoDia)");
			$stmt->bindParam(":no_empleadoC", $no_empleado, PDO::PARAM_STR);
			$stmt->bindParam(":id_tipoRetardo",$falta, PDO::PARAM_INT);
			$stmt->bindParam(":sueldoDia",$monto , PDO::PARAM_STR);
			if($stmt->execute() ){
					for($i=0;$i<2;$i++){
					$stmtf = Conexion::conectar()->prepare("UPDATE retardo
															SET estado='Inactivo'
															WHERE detalleempleado_no_empleado=:no_empleado AND estado='Activo' AND id_tipoRetardo = 3 ORDER BY id_retardo ASC LIMIT 1");
					$stmtf->bindParam(":no_empleado", $no_empleado, PDO::PARAM_STR);	
					$stmtf->execute();
					$stmtf=null;
					}
				return TRUE;
			}else{
				return FALSE;
			}
		$stmt=null;			
		}

		//echo "no hay faltas";
		$stmt1=null;
		$stmt2=null;
		$stmt3=null;
		
	}
	public function horaExtraModel($datosModel){

		$stmt = Conexion::conectar()->prepare("call nomina.horaExtra
			(:no_empleadoC,:horasExtra)");

		$stmt->bindParam(":no_empleadoC", $datosModel["no_empleadoC"], PDO::PARAM_STR);
		$stmt->bindParam(":horasExtra", $datosModel["horasExtra"], PDO::PARAM_INT);

			if($stmt->execute() ){
				 return "success";
			}else{
				 return "error";
			}
			$stmt = null;

	}
	public function validarHorasExtraModel($no_empleado){
		$sueldoDia= $this->sueldoDia($no_empleado);
		$monto1=(float)$sueldoDia*2;
		$monto2=(float)$sueldoDia*3;
		$stmt1 = Conexion::conectar()->prepare("SELECT sum(horas) as HorasExtra FROM horaextra WHERE no_empleado=:no_empleado AND estado='Activo'");	
		$stmt1->bindParam(":no_empleado", $no_empleado, PDO::PARAM_STR);											
		$stmt1->execute();
		$TotalFaltas= $stmt1->fetch();

		if($TotalFaltas<8){
			$Total=$TotalFaltas['HorasExtra']*$monto1;
			return $Total;
		}else{

			$Total=($TotalFaltas['HorasExtra']*$monto1)+($TotalFaltas['HorasExtra']-8)*$monto2;
			return $Total;
		}	
	$stmt1 = null;

		
	}
	public function totalHoraExtraModel($no_empleado){
		$stmt1 = Conexion::conectar()->prepare("SELECT sum(horas) as TotalHE FROM horaextra WHERE no_empleado=:no_empleado AND estado='Activo'");	
		$stmt1->bindParam(":no_empleado", $no_empleado, PDO::PARAM_STR);											
		$stmt1->execute();
		$TotalHE= $stmt1->fetch();
		return $TotalHE['TotalHE'];
		$stmt1=null;
	}
	public function autorizacionFaltaModel($datosModel){
		for ($i=0; $i < $datosModel['no_faltas']; $i++) { 
			# code...
			$stmtf = Conexion::conectar()->prepare("UPDATE nomina.capturaconcepto
															SET estado='Inactivo'
															WHERE no_empleado=:no_empleado AND estado='Activo' ORDER BY idCaptura ASC LIMIT 1 ");	
			$stmtf->bindParam(":no_empleado", $datosModel['no_empleadoC'], PDO::PARAM_STR);
			$stmtf->execute();
			$stmtf=null;
		}
		return "success";	
	}
	public function noFaltasModel($no_empleado){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM nomina.capturaconcepto NATURAL JOIN nomina.concepto NATURAL JOIN nomina.detallenomina 
							WHERE capturaconcepto.idCaptura=concepto.id_con AND no_empleado=:no_empleado AND Cve_tipo_cpto='DFAL' AND estado='Activo'");
		$stmt->bindParam(":no_empleado", $no_empleado, PDO::PARAM_STR);											
		$stmt->execute();

		return $stmt->rowCount();

		$stmt->close();
	}
	public function reviewNominaModel($datosModel){

		$stmt = Conexion::conectar()->prepare("SELECT curp,rfc,nombre,ap_paterno,ap_materno
													 ,telefono,correo,no_empleado,tipo_empleado,tipoempleado.descripcion as Dtipoempleado,id_area,descripcionA,id_puesto,descripcionP,estado,sueldo,tipo_nomina, descripcionTN
												FROM empleado NATURAL JOIN detalleempleado NATURAL JOIN tipoempleado NATURAL JOIN area NATURAL JOIN puesto NATURAL JOIN tiponomina WHERE no_empleado=:no_empleado");
		$stmt->bindParam(":no_empleado", $datosModel, PDO::PARAM_STR);											
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}
	public function conceptoCalculoModel($no_empleado,$tipo){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM nomina.capturaconcepto NATURAL JOIN nomina.concepto NATURAL JOIN nomina.detallenomina 
												WHERE capturaconcepto.idCaptura=concepto.id_con AND no_empleado=:no_empleado AND cve_cpto=:tipo AND estado='Activo'");
		$stmt->bindParam(":no_empleado", $no_empleado, PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $tipo, PDO::PARAM_STR);														
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}
	public function totalConceptoModel($no_empleado,$tipo){
		$stmt = Conexion::conectar()->prepare("SELECT sum(detallenomina.monto) AS Total FROM nomina.capturaconcepto NATURAL JOIN nomina.concepto NATURAL JOIN nomina.detallenomina 
												WHERE capturaconcepto.idCaptura=concepto.id_con AND no_empleado=:no_empleado AND cve_cpto=:tipo AND estado='Activo'");
		$stmt->bindParam(":no_empleado", $no_empleado, PDO::PARAM_STR);	
		$stmt->bindParam(":tipo", $tipo, PDO::PARAM_STR);												
		$stmt->execute();
		$total=$stmt->fetch();
		return $total['Total'];

		$stmt=null;
	}
	public function capturaFondoAhorro($datosModel){
				$stmt = Conexion::conectar()->prepare("call nomina.capturaFondoAhorro
			(:no_empleadoC,:porcentaje,:numero_periodos,:monto)");

		$stmt->bindParam(":no_empleadoC", $datosModel["no_empleadoC"], PDO::PARAM_STR);
		$stmt->bindParam(":porcentaje", $datosModel["porcentaje"], PDO::PARAM_INT);
		$stmt->bindParam(":numero_periodos", $datosModel["numero_periodos"], PDO::PARAM_INT);
		$stmt->bindParam(":monto", $datosModel["monto"], PDO::PARAM_STR);

			if($stmt->execute() ){
				 return "success";
			}else{
				 return "error";
			}
			$stmt = null;
	}
	public function validarFondoAhorro($no_empleado){
		$stmt = Conexion::conectar()->prepare("SELECT *
												FROM nomina.capturaconcepto NATURAL JOIN nomina.concepto NATURAL JOIN nomina.detallenomina 
												WHERE capturaconcepto.idCaptura=concepto.id_con 
												AND no_empleado=:no_empleado AND Cve_tipo_cpto='DFA' AND estado='Activo'");
		$stmt->bindParam(":no_empleado", $no_empleado, PDO::PARAM_STR);											
		$stmt->execute();

		return $stmt->rowCount();

		$stmt->close();
	}

}





/*
$datosController = array( 
                              'no_empleadoC'=> 'Y12',
                              'porcentaje' => 12,
                              'numero_periodos' =>1,
                              'monto'=>0,
                              'cve_cpto'=>'P',
                              'Cve_tipo_cpto'=>'PAG',
                              'descripcion'=>'scassca'
                        );
                    
$datosController = array( 
                              'no_empleadoC'=> 'Y12',
                              'id_tipoRetardo' => 1
                        );
$Em='Y12';


$p = $a->percepcionCalculoModel('2017a');
$d = $a->deduccionCalculoModel('2017a');
 var_dump($p);
 var_dump($d);


 
$datosController = array( 
                              'no_empleadoC'=>'Y101',
                              'porcentaje' => 10,
                              'numero_periodos' =>12,
                              'monto'=>3000
                              );
 $a = new Concepto();
 //echo $a->capturaFondoAhorro($datosController);
 // var_dump($a->totalConceptoModel('Y101','P'));
 */
?>
