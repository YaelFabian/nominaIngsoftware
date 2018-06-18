<?php
if(isset($_POST["curp"])){
$Acurp=$_POST["curp"];   
$Consulta = new MvcController();
$respuesta = $Consulta -> vistaActualizarEmpleadoController($Acurp);

?>
            <br>
                <fieldset>
                        <!-- ENCABEZADO -->
                    <legend align="bottom"> Datos del Empleado </legend>
                    <table class="table table-striped">
                    <thead>
                        <tr> 
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>CURP</th>
                            <th>RFC</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                        </tr>
                     </thead> 
                        <tbody>
                           <tr>
                            <td><?php echo $respuesta["nombre"]; ?></td>
                            <td><?php echo $respuesta["ap_paterno"]; ?></td>
                            <td><?php echo $respuesta["ap_materno"]; ?></td>
                            <td><?php echo $respuesta["curp"];?></td>
                            <td><?php echo $respuesta["rfc"]; ?></td>
                            <td><?php echo $respuesta["correo"]; ?></td>
                            <td><?php echo $respuesta["telefono"]; ?></td>
                            <td><?php echo $respuesta["calle"]." ".$respuesta["no_exterior"]." ".$respuesta["colonia"]." ".$respuesta["codigo_postal"]; ?></td>
                           </tr>                           
                        </tbody>   
                    </table> 
                    </fieldset> 
                    <br>
                <fieldset>
                    <table class="table table-striped">
                    <thead>
                        <tr> 
                            <th>No. Empleado</th> 
                            <th>Area</th>
                            <th>Puesto</th>
                            <th>Tipo Empleado</th>
                            <th>Tipo nomina</th>
                            <th>Sueldo</th>


                        </tr>
                     </thead> 
                        <tbody>
                           <tr>
                            <td><?php echo $respuesta["no_empleado"]; ?></td>
                            <td><?php echo $respuesta["descripcionA"]; ?></td>
                            <td><?php echo $respuesta["descripcionP"]; ?></td>
                            <td><?php echo $respuesta["Dtipoempleado"]; ?></td>
                            <td><?php echo $respuesta["descripcionTN"]; ?></td>
                            <td><?php echo $respuesta["sueldo"]; ?></td>
                           </tr>                           
                        </tbody>   
                    </table> 
                    </fieldset> 
<?php
}else
?>
<form class="form-horizontal" accept-charset="utf-8" method="GET">
	<div class="form-group">
    <label class="col-md-4 control-label">No. Empleado o CURP</label>
    <div class="col-md-6  inputGroupContainer">
	    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
			<input class="form-control" type="text" id="busqueda" value="" placeholder="Buscar" maxlength="30" autocomplete="off" onKeyUp="buscar();"/>
		</div>
	</div>
    <br>
	</form>
    <form method="POST">
    <table class='table table-striped' id="resultadoBusqueda"></table>
    <!--BOTON-->
        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4">
            <button type="submit" class="btn btn-warning" >Consultar<span class="glyphicon glyphicon-send"></span></button>
            </div>
        </div>
    </form>
    <script>
$(document).ready(function() {
    $("#resultadoBusqueda");
});

function buscar() {
    var textoBusqueda = $("input#busqueda").val();
 
     if (textoBusqueda != "") {
        $.get("../../models/buscar.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("#resultadoBusqueda").html(mensaje);
         }); 
     } else { 
        $("#resultadoBusqueda").html("&nbsp;&nbsp;&nbsp; No hay Opciones");
        };
};

</script>
