<?php
include_once 'CrudEmpleado.php';
$Busqueda = $_GET['valorBusqueda'];

		//Filtro anti-XSS
		$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
		$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
		$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $Busqueda);

		//Variable vacía (para evitar los E_NOTICE)
		$mensaje = "";

		//Comprueba si $consultaBusqueda está seteado
		if (isset($Busqueda)) {

			//Selecciona tabla
			//donde el nombre sea igual a $consultaBusqueda
		    $a = new Empleado();
			$respuesta = $a -> BusquedaModel("empleado","detalleempleado",$Busqueda);

			//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
			if (isset($respuesta)) {
						foreach($respuesta as $row => $item){
							//Output
							$mensaje .= '
							<tr>
							<td>&nbsp;&nbsp;' . $item["no_empleado"] . '</td>
							<td>' . $item["nombre"] . '</td>
							<td>' . $item["curp"] . '</td>
							<td>' . $item["estado"] . '</td>
							<td> 
							<input type="radio" name="curp" value='.$item["curp"].'>
							</td>
							</tr>';
						}
			
			} else {
				$mensaje = '<tr>No hay ningún Empleado con esos datos</tr>';
			}
		};

		//Devolvemos el mensaje que tomará jQuery
		echo "<thead>
		            <tr>
		                <th>&nbsp;&nbsp;No.Empleado</th>
		                <th>Nombre</th>
		                <th>CURP</th>
		                <th>Estado</th>
		                <th>Seleccionar</th>
		            </tr>
		      </thead> 
		      <tbody> 
		      ".$mensaje."
		     </tbody>";
?>