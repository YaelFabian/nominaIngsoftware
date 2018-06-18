
          <div class="conceptos">
               <center><legend> Percepción </center></legend> 

              <br>
              <form class="form-horizontal" method="post"  id="con_form">
                <fieldset>
               <!-- NO.EMPLEADO-->
                <div class="form-group">
                  <label class="col-md-4 control-label" >No.Empleado</label>
                  <div class="col-md-6  inputGroupContainer">
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                      <input name="CCnoempleado" placeholder="" class="form-control"  type="text">
                    </div>
                  </div>
                </div>  
                  <!--No  de periodos-->
                  <div class="form-group">
                    <label class="col-md-4 control-label" >No. Periodos</label>
                    <div class="col-md-6  inputGroupContainer">
                      <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                        <input name="CCnoperiodos" placeholder="" class="form-control"  type="text">
                      </div>
                    </div>
                  </div>
                  <!-- Formato-->
                  <div class="form-group">
                          <label class="col-md-4 control-label" >Monto o Porcentaje</label>
                          <div class="col-md-6  inputGroupContainer">
                            <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                              <select class="form-control" id="selecion">
                                <option value="1" selected>Monto</option>
                                <option  value="2">Porcentaje</option>
                              </select>
                            </div>
                          </div>
                        </div>
                  <!-- Monto-->
                  <div class="form-group">
                          <label class="col-md-4 control-label" >Monto</label>
                          <div class="col-md-6  inputGroupContainer">
                            <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                              <input name="CCmonto" id="mont" placeholder="" class="form-control"  type="text">
                            </div>
                          </div>
                        </div>
                        <!-- Porcentaje-->
                  <div class="form-group">
                          <label class="col-md-4 control-label" >Porcentaje</label>
                          <div class="col-md-6  inputGroupContainer">
                            <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-ruble"></i></span>
                              <input name="CCporcentaje" id="porc" placeholder="" class="form-control"  type="text" disabled>
                            </div>
                          </div>
                        </div>

                  <!-- Clave tipo de Concepto-->
                  <div class="form-group">
                          <label class="col-md-4 control-label" >Clave tipo de Concepto</label>
                          <div class="col-md-6  inputGroupContainer">
                            <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                            <select class="form-control" name="CCCve_tipo_cpto">
                              <?php
                                    $tipo = new MvcController();
                                    $tipo-> vistaClaveTipoController();
                              ?>
                            </select>
                          </div>
                        </div>
                   </div>     
                  <!-- Descripción-->
                  <div class="form-group">
                          <label class="col-md-4 control-label" >Descripción</label>
                          <div class="col-md-6  inputGroupContainer">
                            <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
                             <textarea type="text" cols="40" name="CCdescripcion" class="form-control" rows="3" id="comment" required></textarea>
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
          <br>         
<!-- PrefixFree -->
<script src='js/2.1.3/jquery.min.js'></script>
<script src='js/3.2.0/bootstrap.min.js'></script>
<script src='js/validator/bootstrapvalidator.min.js'></script>

        <script src="js/index.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $("#selecion").change( function() {

        if ($(this).val() === "1") {
            $("#porc").prop("disabled", true);
        } else {
            $("#porc").prop("disabled", false);
        }
        if ($(this).val() === "2") {
            $("#mont").prop("disabled", true);
        } else {
            $("#mont").prop("disabled", false);
        }
      });
    });
 
   $(document).ready(function() {
    $('#con_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            CCnoempleado: {
                validators: {
                    stringLength: {
                        min: 3,
                        max: 10,
                        message: 'No. Empleado debe contener de 3 a 10 caracteres'
                    },
                    notEmpty: {
                        message: 'Por favor ingrese No. Empleado'
                    }
                }
            },
            CCnoperiodos: {
                validators: {
                    between: {
                        min: 1,
                        max: 36,
                        message: 'No. periodos debe contener de 1 a 36 periodos'
                    },
                    numeric: {
                        message: 'Por favor ingrese un Numeros'
                    },
                    notEmpty: {
                        message: 'Por favor ingrese No. periodos'
                    }

                }
            },
            CCmonto: {
                validators: {
                    between: {
                        min: 10.00,
                        max: 99999.99,
                        message: 'teclee Numeros entre 10 y 99999'
                    },

                    notEmpty: {
                        message: 'Ingrese Monto'
                    }
                }
            },
           CCporcentaje: {
                validators: {
                    between: {
                        min: 1.00,
                        max: 30.99,
                        message: 'teclee Numeros entre 1.00% y 30.99%'
                    },
                    notEmpty: {
                        message: 'Por favor ingrese Porcentaje'
                    }
                }
            },
            CCdescricion: {
                validators: {                   
                    stringLength: {
                        min: 4,
                        max: 120,
                        message: 'Descripción debe contener de 4 a 120 caracteres'
                    },

                    notEmpty: {
                        message: 'Ingrese la Descripción del Concepto'
                    }
                }
            },
            }
        })
		
 	
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#con_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});
        </script>
<?php
$registroCon = new MvcController();
$registroCon -> capturaConceptoController();