            <form class="form-horizontal" action=" " method="post"  id="FA_form">
                    <fieldset>
                      
                      <!-- ENCABEZADO -->
                      <center>
                          <legend>Fondo de Ahorro</legend>
                      </center>
                      
        
                <!-- NO.EMPLEADO-->
                <div class="form-group">
                  <label class="col-md-4 control-label" >No.Empleado</label>
                  <div class="col-md-6  inputGroupContainer">
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                      <input name="FAnoempleado" placeholder="No.Empleado" class="form-control"  type="text">
                    </div>
                  </div>
                </div>

                 <!-- Porcentaje-->
                  <div class="form-group">
                          <label class="col-md-4 control-label" >Porcentaje</label>
                          <div class="col-md-6  inputGroupContainer">
                            <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-ruble"></i></span>
                              <input name="FAporcentaje" id="porc" placeholder="" class="form-control"  type="text">
                            </div>
                          </div>
                        </div> 
                <!--No  de periodos-->
                  <div class="form-group">
                    <label class="col-md-4 control-label" >No. Periodos</label>
                    <div class="col-md-6  inputGroupContainer">
                      <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                        <input name="FAnoperiodos" placeholder="" class="form-control"  type="text">
                      </div>
                    </div>
                  </div>            
                    <!-- Button -->
      <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4">
              <button type="submit" class="btn btn-warning" >Guardar <span class="glyphicon glyphicon-send"></span></button>
            </div>
          </div>

        </fieldset>
      </form>                    
<!-- PrefixFree -->
<script src='js/2.1.3/jquery.min.js'></script>
<script src='js/3.2.0/bootstrap.min.js'></script>
<script src='js/validator/bootstrapvalidator.min.js'></script>

        <script src="js/index.js"></script>
<script type="text/javascript">
 
   $(document).ready(function() {
    $('#FA_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            FAnoempleado: {
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
            FAporcentaje: {
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
           FAnoperiodos: {
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
            }
        })
		
 	
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#FA_form').data('bootstrapValidator').resetForm();

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
$capFA = new MvcController();
$capFA -> capturaFondoAhorroController();