        <br>
            <form class="form-horizontal" method="post"  id="reg_form">
              <fieldset>
                
                <!-- ENCABEZADO -->
                <legend align="bottom"> Datos del Empleado </legend>
                <!--NOMBRE EMPLEADO-->
                <div class="form-group">
                  <label class="col-md-4 control-label">Nombre</label>
                  <div class="col-md-6  inputGroupContainer">
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  name="RNombre" placeholder="Nombre" class="form-control"  type="text">
                    </div>
                  </div>
                </div>
                <!--PATERNO EMPLEADO-->
                <div class="form-group">
                  <label class="col-md-4 control-label">Apellido Paterno</label>
                  <div class="col-md-6  inputGroupContainer">
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  name="RPaterno" placeholder="Apellido Paterno" class="form-control"  type="text">
                    </div>
                  </div>
                </div>
                <!--MATERNO EMPLEADO-->
                <div class="form-group">
                  <label class="col-md-4 control-label">Apellido Materno</label>
                  <div class="col-md-6  inputGroupContainer">
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  name="RMaterno" placeholder="Apellido Materno" class="form-control"  type="text">
                    </div>
                  </div>
                </div>

                <!-- CURP-->
                <div class="form-group">
                        <label class="col-md-4 control-label" >CURP</label>
                        <div class="col-md-6  inputGroupContainer">
                          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="RCURP" id="curp" placeholder="CURP" class="form-control"  type="text" onkeyup="this.value = this.value.toUpperCase();">
                          </div>
                        </div>
                      </div>
                      <!-- RFC-->
                <div class="form-group">
                        <label class="col-md-4 control-label" >RFC</label>
                        <div class="col-md-6  inputGroupContainer">
                          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="RRFC" placeholder="RFC" class="form-control"  type="text" onkeyup="this.value = this.value.toUpperCase();">
                          </div>
                        </div>
                      </div>
                <!--EMAIL-->
                <div class="form-group">
                     <label class="col-md-4 control-label">E-Mail</label>
                    <div class="col-md-6  inputGroupContainer">
                      <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input name="REmail" placeholder="E-Mail" class="form-control"  type="email">
                    </div>
                    </div>
                </div>
                <!--TELEFONO-->
                <div class="form-group">
                        <label class="col-md-4 control-label">Teléfono Casa</label>
                        <div class="col-md-6  inputGroupContainer">
                          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input name="Rtelefono" placeholder="(00)0000-0000" class="form-control" type="text">
                          </div>
                        </div>
                      </div>
                 <!--DIRECCION CALLE-->
                <div class="form-group">
                    <label class="col-md-4 control-label">CALLE</label>
                        <div class="col-md-6  inputGroupContainer">
                        <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="Rcalle" placeholder="Calle" class="form-control" type="text">
                        </div>
                        </div>
                    </div>
                <!--DIRECCION No Exterior-->
                <div class="form-group">
                    <label class="col-md-4 control-label">No Exterior</label>
                        <div class="col-md-6  inputGroupContainer">
                        <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="RNoExterior" placeholder="No Exterior" class="form-control" type="number">
                        </div>
                        </div>
                    </div>
                <!--DIRECCION Colonia -->
                <div class="form-group">
                    <label class="col-md-4 control-label">Colonia</label>
                        <div class="col-md-6  inputGroupContainer">
                        <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="RColonia" placeholder="Colonia" class="form-control" type="text">
                        </div>
                        </div>
                    </div>
                    <!--DIRECCION Codigo Postal-->
                <div class="form-group">
                    <label class="col-md-4 control-label">Codigo Postal</label>
                        <div class="col-md-6  inputGroupContainer">
                        <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="RCodigoPostal" placeholder="Codigo Postal" class="form-control" type="number">
                        </div>
                        </div>
                    </div>
                <!-- NO.EMPLEADO-->
                <div class="form-group">
                  <label class="col-md-4 control-label" >No.Empleado</label>
                  <div class="col-md-6  inputGroupContainer">
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                      <input name="Rnoempleado" placeholder="No.Empleado" class="form-control"  type="text">
                    </div>
                  </div>
                </div>
                <!-- Tipo Empleado-->
                <div class="form-group">
                  <label class="col-md-4 control-label" >Tipo Empleado</label>
                  <div class="col-md-6  inputGroupContainer">
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                        <select class="form-control" name="Rtipoempleado" class="form-control"  >
                            <?php
                                $RTEmpleado = new MvcController();
                                $RTEmpleado->vistaTipoEmpleadoController(); 
                            ?>
                        </select>
                    </div>
                  </div>
                </div>
                <!-- Area Empleado-->
                <div class="form-group">
                  <label class="col-md-4 control-label" >Área</label>
                  <div class="col-md-6  inputGroupContainer">
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                        <select class="form-control" name="Rarea" class="form-control"  >
                            <?php
                                $RArea = new MvcController();
                                $RArea ->vistaAreaController(); 
                            ?>

                        </select>
                    </div>
                  </div>
                </div>
                <!-- Puesto Empleado-->
                <div class="form-group">
                  <label class="col-md-4 control-label" >Puesto</label>
                  <div class="col-md-6  inputGroupContainer">
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                        <select class="form-control" name="Rpuesto" class="form-control"  >
                            <?php
                                $RPuesto = new MvcController();
                                $RPuesto ->vistaPuestoController(); 
                            ?>

                        </select>
                    </div>
                  </div>
                </div>
                <!-- Tipo Nomina Empleado-->
                <div class="form-group">
                  <label class="col-md-4 control-label" >Tipo de Nomina</label>
                  <div class="col-md-6  inputGroupContainer">
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                        <select class="form-control" name="RtipoNomina" class="form-control"  >
                            <?php
                                $RTNomina = new MvcController();
                                $RTNomina ->vistaTipoNominaController(); 
                            ?>

                        </select>
                    </div>
                  </div>
                </div>
                <!-- Sueldo-->
                <div class="form-group">
                  <label class="col-md-4 control-label" >Sueldo</label>
                  <div class="col-md-6  inputGroupContainer">
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                      <input name="RSueldo" placeholder="Sueldo" class="form-control"  type="text">
                    </div>
                  </div>
                </div>
                <!--BOTON-->
                <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                        <button type="submit" class="btn btn-warning" >Agregar <span class="glyphicon glyphicon-send"></span></button>
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
    $('#reg_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            RNombre: {
                validators: {
                        stringLength: {
                        min: 3,
                        max:25,
                         message: 'el Nombre debe contener de 3 a 25 caracteres'
                    },
                        notEmpty: {
                        message: 'Por favor ingrese su Nombre'
                    }
                }
            },
            RPaterno: {
                validators: {
                        stringLength: {
                        min: 3,
                        max:15,
                         message: 'el Apellido debe contener de 3 a 15 caracteres'
                    },
                        notEmpty: {
                        message: 'Por favor ingrese su Apellido Paterno'
                    }
                }
            },
            RMaterno: {
                validators: {
                        stringLength: {
                        min: 3,
                        max:15,
                         message: 'el Apellido debe contener de 3 a 15 caracteres'
                    },
                        notEmpty: {
                        message: 'Por favor ingrese su Apellido Materno'
                    }
                }
            },
            Rnoempleado: {
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
            Rtelefono: {
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
            Rcalle: {
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
            RNoExterior: {
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

            RColonia: {
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
           RCodigoPostal: {
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
            RCURP: {
                validators: {
                     stringLength: {
                        min: 18,
                        max: 18,
                        message: 'Ingrese CURP valido'
                    },
                    notEmpty: {
                        message: 'Por favor ingrese su CURP'
                    }
                }
            },

            RRFC: {
                validators: {
                     stringLength: {
                        min: 12,
                        max: 13,
                        message: 'Ingrese RFC valido'
                    },
                    notEmpty: {
                        message: 'Por favor ingrese su RFC'
                    }
                }
            },
            REmail: {
                validators: {
                    notEmpty: {
                        message: 'Por favor ingrese su Dirección E-Mail'
                    },
                    emailAddress: {
                        message: 'Por favor ingrese una Dirección E-mail valida'
                    }
                }
            },
            RSueldo: {
                validators: {
                    between: {
                        min: 100.00,
                        max: 99999.99,
                        message: 'El sueldo debe ser entre 100 y 99999'
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
                $('#reg_form').data('bootstrapValidator').resetForm();

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

$registro = new MvcController();
$registro -> capturaEmpleadoController();

