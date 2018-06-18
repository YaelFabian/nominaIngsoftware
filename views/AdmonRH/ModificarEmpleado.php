<?php
if(isset($_POST["curp"])){
$Acurp=$_POST["curp"];   
$registro = new MvcController();
$respuesta = $registro -> vistaActualizarEmpleadoController($Acurp);

?>
            <br>
                        <form class="form-horizontal" method="post" id="actu_form">
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
                        </tr>
                     </thead> 
                        <tbody>
                           <tr>
                           <td><?php echo $respuesta["nombre"]; ?></td>
                           <td><?php echo $respuesta["ap_paterno"]; ?></td>
                           <td><?php echo $respuesta["ap_materno"]; ?></td>
                           <td><?php echo $respuesta["curp"];?></td>
                           <td><?php echo $respuesta["rfc"]; ?></td>
                           </tr>                           
                        </tbody>   
                    </table> 
              <input type="hidden" value="<?php echo $respuesta["curp"];?>" name="Acurp">  
                <!-- NO.EMPLEADO-->
                <div class="form-group">
                  <label class="col-md-4 control-label" >No.Empleado</label>
                  <div class="col-md-6  inputGroupContainer">
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                      <input name="Anoempleado" value="<?php echo $respuesta["no_empleado"];?>" placeholder="No.Empleado" class="form-control"  type="text">
                    </div>
                  </div>
                </div>      
                <!--EMAIL-->
                <div class="form-group">
                     <label class="col-md-4 control-label">E-Mail</label>
                    <div class="col-md-6  inputGroupContainer">
                      <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input name="AEmail" value="<?php echo $respuesta["correo"];?>" placeholder="E-Mail" class="form-control"  type="email">
                    </div>
                    </div>
                </div>
                <!--TELEFONO-->
                <div class="form-group">
                        <label class="col-md-4 control-label">Teléfono Casa</label>
                        <div class="col-md-6  inputGroupContainer">
                          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input name="Atelefono" value="<?php echo $respuesta["telefono"];?>" placeholder="(00)0000-0000" class="form-control" type="text">
                          </div>
                        </div>
                      </div>
                 <!--DIRECCION CALLE-->
                <div class="form-group">
                    <label class="col-md-4 control-label">CALLE</label>
                        <div class="col-md-6  inputGroupContainer">
                        <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="Acalle" value="<?php echo $respuesta["calle"];?>" placeholder="Calle" class="form-control" type="text">
                        </div>
                        </div>
                    </div>
                <!--DIRECCION No Exterior-->
                <div class="form-group">
                    <label class="col-md-4 control-label">No Exterior</label>
                        <div class="col-md-6  inputGroupContainer">
                        <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="ANoExterior" value="<?php echo $respuesta["no_exterior"];?>" placeholder="No Exterior" class="form-control" type="number">
                        </div>
                        </div>
                    </div>
                <!--DIRECCION Colonia -->
                <div class="form-group">
                    <label class="col-md-4 control-label">Colonia</label>
                        <div class="col-md-6  inputGroupContainer">
                        <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="AColonia" value="<?php echo $respuesta["colonia"];?>" placeholder="Colonia" class="form-control" type="text">
                        </div>
                        </div>
                    </div>
                    <!--DIRECCION Codigo Postal-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Codigo Postal</label>
                        <div class="col-md-6  inputGroupContainer">
                        <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="ACodigoPostal" value="<?php echo $respuesta["codigo_postal"];?>" placeholder="Codigo Postal" class="form-control" type="number">
                        </div>
                        </div>
                    </div> 
                <!-- Tipo Empleado-->
                <div class="form-group">
                  <label class="col-md-4 control-label" >Tipo Empleado</label>
                  <div class="col-md-6  inputGroupContainer">
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                        <select class="form-control" name="Atipoempleado" class="form-control">
                            <option selected='selected' value="<?php echo $respuesta["tipo_empleado"]?>"><?php echo $respuesta["Dtipoempleado"]?></option>
                            <?php  
                             $a = new MvcController();
                            $a->vistaTipoEmpleadoController();?>
                        </select>
                    </div>
                  </div>
                </div>
                <!-- Area Empleado-->
                <div class="form-group">
                  <label class="col-md-4 control-label" >Area</label>
                  <div class="col-md-6  inputGroupContainer">
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                        <select class="form-control" name="Aarea" class="form-control"  >
                        <option selected='selected' value="<?php echo $respuesta["id_area"]?>"><?php echo $respuesta["descripcionA"]?></option>
                            <?php 
                                $a ->vistaAreaController();?>

                        </select>
                    </div>
                  </div>
                </div>
                <!-- Puesto Empleado-->
                <div class="form-group">
                  <label class="col-md-4 control-label" >Puesto</label>
                  <div class="col-md-6  inputGroupContainer">
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                        <select class="form-control" name="Apuesto" class="form-control"  >
                        <option selected='selected' value="<?php echo $respuesta["id_puesto"]?>"><?php echo $respuesta["descripcionP"]?></option>
                            <?php 
                                $a ->vistaPuestoController();?>

                        </select>
                    </div>
                  </div>
                </div>
                <!-- Tipo Nomina Empleado-->
                <div class="form-group">
                  <label class="col-md-4 control-label" >Tipo de Nomina</label>
                  <div class="col-md-6  inputGroupContainer">
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                        <select class="form-control" name="AtipoNomina" class="form-control">
                        <option selected='selected' value="<?php echo $respuesta["tipo_nomina"]?>"><?php echo $respuesta["descripcionTN"]?></option>
                            <?php 
                                $a ->vistaTipoNominaController();?>

                        </select>
                    </div>
                  </div>
                </div>
                <!-- Sueldo-->
                <div class="form-group">
                  <label class="col-md-4 control-label" >Sueldo</label>
                  <div class="col-md-6  inputGroupContainer">
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                      <input name="ASueldo" value="<?php echo $respuesta["sueldo"];?>" placeholder="Sueldo" class="form-control"  type="text">
                    </div>
                  </div>
                </div>
                <!-- Estado-->
                <div class="form-group">
                  <label class="col-md-4 control-label" >Estado del Empleado</label>
                  <div class="col-md-6  inputGroupContainer">
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                         <select class="form-control" name="Aestado" class="form-control">
                        <option selected='selected' value='<?php echo $respuesta["estado"];?>'><?php echo $respuesta["estado"];?></option>
                         <option value='Activo'>Activo</option>
                         <option value='Inactivo'>Inactivo</option>
                        </select>    
                    </div>
                  </div>
                </div>
                <!--BOTON-->
                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                        <button type="submit" class="btn btn-warning" >Actualizar <span class="glyphicon glyphicon-send"></span></button>
                        </div>
                    </div>

                        </fieldset>
                        </form>          
            </br>
<!-- PrefixFree -->
<script src='js/2.1.3/jquery.min.js'></script>
<script src='js/3.2.0/bootstrap.min.js'></script>
<script src='js/validator/bootstrapvalidator.min.js'></script>

        <script src="js/index.js"></script>
<script type="text/javascript">
 
   $(document).ready(function() {
    $('#actu_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            Anoempleado: {
                validators: {
                     stringLength: {
                        min: 3,
                        max: 10,
                        message: 'el No. Empleado debe contener de 3 a 10 caracteres'
                    },
                    notEmpty: {
                        message: 'Por favor ingrese No. Empleado'
                    }
                }
            },
            Atelefono: {
                validators: {
                    stringLength: {
                        min: 8,
                        max:10,
                        message: 'el Numero debe contener de 8 a 10 digitos'
                    },
                    notEmpty: {
                        message: 'Por favor ingrese su número telefonico'
                    },
                }
            },
            Acalle: {
                validators: {
                     stringLength: {
                        min: 4,
                        max: 25,
                        message: 'La calle debe contener de 4 a 25 caracteres'
                    },
                    notEmpty: {
                        message: 'Por favor ingrese su calle'
                    }
                }
            },
            ANoExterior: {
                validators: {
                     stringLength: {
                        min: 1,
                        max: 5,
                        message: 'el No. Exterior debe contener de 1 a 5 digitos'
                    },
                    notEmpty: {
                        message: 'Por favor ingrese su No Exterior'
                    }
                }
            },

            AColonia: {
                validators: {
                     stringLength: {
                        min: 4,
                        max: 25,
                        message: 'La calle debe contener de 4 a 25 caracteres'
                    },
                    notEmpty: {
                        message: 'Por favor ingrese su Colonia'
                    }
                }
            },
            ACodigoPostal: {
                validators: {
                     stringLength: {
                        min: 4,
                        max: 6,
                        message: 'el No. Exterior debe contener de 4 a 6 digitos'
                    },
                    notEmpty: {
                        message: 'Por favor ingrese su codigo postal'
                    }
                }
            },
            AEmail: {
                validators: {
                    notEmpty: {
                        message: 'Por favor ingrese su Dirección E-Mail'
                    },
                    emailAddress: {
                        message: 'Por favor ingrese una Dirección E-mail valida'
                    }
                }
            },
            ASueldo: {
                validators: {
                    between: {
                        min: 100.00,
                        max: 99999.99,
                        message: 'El sueldo debe ser entre 100 y 100000'
                    },
                    numeric: {
                        message: 'Por favor ingrese un sueldo valido'
                    },    
                        notEmpty: {
                        message: 'Por favor ingrese Sueldo'
                    }
                }
            },
            }
        })
        
    
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#actu_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');
        });
});
</script>


<?php
}else if(isset($_POST["Anoempleado"])){
$actu = new MvcController();
$actu -> actualizarEmpleadoController();

}else{
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
            <button type="submit" class="btn btn-warning" >Modificar<span class="glyphicon glyphicon-send"></span></button>
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
<?php
}