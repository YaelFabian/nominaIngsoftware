<?php
require_once "conexion.php";
/**
* 
*/
class Empleado extends Conexion{
	#REGISTRO DE EMPLEADO
	public function registrarEmpleadoModel($EmpleadoModel){
											//call nomina.registrarEmpleado('IJIODJ425SL09','23NJNVJ2','Yael','Hernandez','Canseco','CERRADA',11,'SAN JOSE',52650
						                    //                              ,5559648593,'yael_fabian@hotmail.com','Y12','B',1,1,'Alta','M',30000);

		
		$stmt = Conexion::conectar()->prepare("CALL nomina.registrarEmpleado(:curp,:rfc,:nombre,:ap_paterno,:ap_materno,:calle,:no_exterior,:colonia,:codigo_postal
																		 ,:telefono,:correo,:no_empleado,:tipo_empleado,:id_area,:id_puesto,'Alta',:tipo_nomina,:sueldo)");
			
			$stmt->bindParam(":curp", $EmpleadoModel["curp"], PDO::PARAM_STR);
			$stmt->bindParam(":rfc", $EmpleadoModel["rfc"], PDO::PARAM_STR);
			$stmt->bindParam(":nombre", $EmpleadoModel["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":ap_paterno", $EmpleadoModel["ap_paterno"], PDO::PARAM_STR);
			$stmt->bindParam(":ap_materno", $EmpleadoModel["ap_materno"], PDO::PARAM_STR);
			$stmt->bindParam(":calle", $EmpleadoModel["calle"], PDO::PARAM_STR);
			$stmt->bindParam(":no_exterior", $EmpleadoModel["no_exterior"], PDO::PARAM_INT);
			$stmt->bindParam(":colonia", $EmpleadoModel["colonia"], PDO::PARAM_STR);
			$stmt->bindParam(":codigo_postal", $EmpleadoModel["codigo_postal"], PDO::PARAM_INT);
			$stmt->bindParam(":telefono", $EmpleadoModel["telefono"], PDO::PARAM_STR);
			$stmt->bindParam(":correo", $EmpleadoModel["correo"], PDO::PARAM_STR);
			$stmt->bindParam(":no_empleado", $EmpleadoModel["no_empleado"], PDO::PARAM_STR);
			$stmt->bindParam(":tipo_empleado", $EmpleadoModel["tipo_empleado"], PDO::PARAM_STR);
			$stmt->bindParam(":id_area", $EmpleadoModel["id_area"], PDO::PARAM_INT);
			$stmt->bindParam(":id_puesto", $EmpleadoModel["id_puesto"], PDO::PARAM_INT);
			$stmt->bindParam(":tipo_nomina", $EmpleadoModel["tipo_nomina"], PDO::PARAM_STR);
			$stmt->bindParam(":sueldo",$EmpleadoModel["sueldo"], PDO::PARAM_STR);
			if($stmt->execute() ){
				 return "success";
			}else{
				 return "error";
			}
			$stmt = null;
	}
	public function vistaTipoEmpleadoModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT tipo_empleado,descripcion FROM $tabla");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}
	public function vistaAreaModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id_area,descripcionA FROM $tabla");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}
	public function vistaPuestoModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id_puesto,descripcionP FROM $tabla");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}
	public function vistaTipoNominaModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT tipo_nomina,descripcionTN FROM $tabla");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}
	public function vistaEmpleadoModel($table1,$table2){
		$stmt = Conexion::conectar()->prepare("SELECT no_empleado,nombre,curp,telefono,correo 
												FROM $table1 NATURAL JOIN $table2 WHERE estado='Activo'");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}
	public function BusquedaModel($table1,$table2,$Busqueda){
		$stmt = Conexion::conectar()->prepare("SELECT no_empleado,nombre,curp,estado
												FROM $table1 NATURAL JOIN $table2 
												WHERE no_empleado COLLATE UTF8_SPANISH_CI LIKE '%$Busqueda%'
												OR curp COLLATE UTF8_SPANISH_CI LIKE '%$Busqueda%' LIMIT 10
											");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}
	public function borrarEmpleadoModel($datosModel){
		$estado = $this->buscarEstado($datosModel);
		$stmt = Conexion::conectar()->prepare("CALL nomina.eliminarEmpleado(:no_empleado,:estado)");
		$stmt->bindParam(":no_empleado", $datosModel, PDO::PARAM_STR);
		$stmt->bindParam(":estado", $estado["estado"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	public function vistaActualizarEmpleadoModel($datosModel){

		$stmt = Conexion::conectar()->prepare("SELECT curp,rfc,nombre,ap_paterno,ap_materno,calle,no_exterior,colonia,codigo_postal
																		 ,telefono,correo,no_empleado,tipo_empleado,tipoempleado.descripcion as Dtipoempleado,id_area,descripcionA,id_puesto,descripcionP,estado,sueldo,tipo_nomina, descripcionTN
												FROM empleado NATURAL JOIN detalleempleado NATURAL JOIN tipoempleado NATURAL JOIN area NATURAL JOIN puesto NATURAL JOIN tiponomina WHERE curp=:curp");
		$stmt->bindParam(":curp", $datosModel, PDO::PARAM_STR);											
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}
	public function actualizarEmpleadoModel($EmpleadoModel){
			$curp=$EmpleadoModel["curp"];
			$no_empleadoA =$this->buscarNoEmpleadoModel($curp);
			$stmt = Conexion::conectar()->prepare("CALL nomina.actualizarEmpleado(:curp,:calle,:no_exterior,:colonia,:codigo_postal
														,:telefono,:correo,:no_empleadoN,:no_empleadoA,:tipo_empleado,:id_area,:id_puesto,:tipo_nomina,:sueldo,:estado)");
			
			$stmt->bindParam(":curp", $EmpleadoModel["curp"], PDO::PARAM_STR);
 			$stmt->bindParam(":calle", $EmpleadoModel["calle"], PDO::PARAM_STR);
			$stmt->bindParam(":no_exterior", $EmpleadoModel["no_exterior"], PDO::PARAM_INT);
			$stmt->bindParam(":colonia", $EmpleadoModel["colonia"], PDO::PARAM_STR);
			$stmt->bindParam(":codigo_postal", $EmpleadoModel["codigo_postal"], PDO::PARAM_INT);
			$stmt->bindParam(":telefono", $EmpleadoModel["telefono"], PDO::PARAM_STR);
			$stmt->bindParam(":correo", $EmpleadoModel["correo"], PDO::PARAM_STR);
			$stmt->bindParam(":no_empleadoN", $EmpleadoModel["no_empleado"], PDO::PARAM_STR);
			$stmt->bindParam(":no_empleadoA", $no_empleadoA["no_empleado"] , PDO::PARAM_STR);
			$stmt->bindParam(":tipo_empleado", $EmpleadoModel["tipo_empleado"], PDO::PARAM_STR);
			$stmt->bindParam(":id_area", $EmpleadoModel["id_area"], PDO::PARAM_INT);
			$stmt->bindParam(":id_puesto", $EmpleadoModel["id_puesto"], PDO::PARAM_INT);
			$stmt->bindParam(":tipo_nomina", $EmpleadoModel["tipo_nomina"], PDO::PARAM_STR);
			$stmt->bindParam(":sueldo",$EmpleadoModel["sueldo"], PDO::PARAM_STR);
			$stmt->bindParam(":estado",$EmpleadoModel["estado"], PDO::PARAM_STR);
			if($stmt->execute()){
				 return "success";
			}else{
				 return "error";
			}
			$stmt = null;
	}
	public function buscarNoEmpleadoModel($curp){
		$stmt = Conexion::conectar()->prepare("SELECT no_empleado 
												FROM movimientoempleado NATURAL JOIN detalleempleado WHERE curp=:curp order by id_mov DESC LIMIT 1");
		$stmt->bindParam(":curp", $curp, PDO::PARAM_STR);											
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}
	public function buscarEstado($no_empleado){
		$stmt = Conexion::conectar()->prepare("SELECT estado 
												FROM detalleempleado WHERE no_empleado=:no_empleadoA");
		$stmt->bindParam(":no_empleadoA", $no_empleado, PDO::PARAM_STR);											
		$stmt->execute();
		$Estado = $stmt->fetch();
		return $Estado;

		$stmt->close();
	}
	public function existeNoEmpleadoModel($no_empleado){
		$stmt = Conexion::conectar()->prepare("SELECT *
												FROM detalleempleado WHERE no_empleado=:no_empleado AND estado='Activo'");
		$stmt->bindParam(":no_empleado", $no_empleado, PDO::PARAM_STR);											
		$stmt->execute();

		return $stmt->rowCount();

		$stmt->close();
	}
	public function validarEmpleadoRHModel($no_empleado){
		$stmt = Conexion::conectar()->prepare("SELECT *
												FROM detalleempleado WHERE no_empleado=:no_empleado");
		$stmt->bindParam(":no_empleado", $no_empleado, PDO::PARAM_STR);											
		$stmt->execute();
		$pass = $stmt->fetch();
		return $pass['contrasenia'];

		$stmt->close();
		
	}
	public function validarPermisoEmpleadoRHModel($no_empleado){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM nomina.detalleempleado natural JOIN nomina.empleado natural join nomina.roles
											 where no_empleado=:no_empleado");
		$stmt->bindParam(":no_empleado", $no_empleado, PDO::PARAM_STR);											
		$stmt->execute();
		$iduser = $stmt->fetch();
		return $iduser['id_rol'];

		$stmt->close();
		
	}
	public function BuscarSueldoModel($no_empleado){
		$stmt = Conexion::conectar()->prepare("SELECT sueldo,tipo_nomina
												FROM detalleempleado WHERE no_empleado=:no_empleado");
		$stmt->bindParam(":no_empleado", $no_empleado, PDO::PARAM_STR);											
		$stmt->execute();
		$sueldo = $stmt->fetch();
		return $sueldo;

		$stmt->close();
	}
	public function vistaNominaEmpleadoModel($datosModel){

		$stmt = Conexion::conectar()->prepare("SELECT curp,rfc,nombre,ap_paterno,ap_materno,calle,no_exterior,colonia,codigo_postal
																		 ,telefono,correo,no_empleado,tipo_empleado,tipoempleado.descripcion as Dtipoempleado,id_area,descripcionA,id_puesto,descripcionP,estado,sueldo,tipo_nomina, descripcionTN
												FROM empleado NATURAL JOIN detalleempleado NATURAL JOIN tipoempleado NATURAL JOIN area NATURAL JOIN puesto NATURAL JOIN tiponomina WHERE no_empleado=:no_empleado");
		$stmt->bindParam(":no_empleado", $datosModel, PDO::PARAM_STR);											
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}
	public function fondoAhorroModel($no_empleado){
		$stmt = Conexion::conectar()->prepare("SELECT *
												FROM fondoahorro WHERE no_empleado=:no_empleado AND estado='Activo'");
		$stmt->bindParam(":no_empleado", $no_empleado, PDO::PARAM_STR);											
		$stmt->execute();

		return $stmt->fetchColumn();

		$stmt->close();
	}

}




/*
$a = new Empleado();
$EmpleadoModel = array( 'curp' =>'HERIODJ425SL15',
						'rfc' =>'23NJNV53',
						'nombre'=>'cairo',
						'ap_paterno'=>'Hernández',
						'ap_materno'=>'Canseco',
						'calle'=>'CERRADA',
						'no_exterior'=>11,
						'colonia'=>'SAN JOSE',
						'codigo_postal'=>52650,
						'telefono'=>5559648593,
						'correo'=>'yael_fabian@hotmail.com',
						'no_empleado'=>'Y51',
						'tipo_empleado'=>'C',
						'id_area'=>1,
						'id_puesto'=>1,
						'tipo_nomina'=>'M',
						'sueldo'=>20000,
						'P_isr'=>1
						);
$a->registrarEmpleadoModel($EmpleadoModel);


$b = new Empleado;
$contraseña = $b->validarEmpleadoRHModel('Y12');
echo 'La contra es:'.$contraseña;*/
?>