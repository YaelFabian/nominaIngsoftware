
            <br>
            <form class="form-horizontal" method="post"  id="ret_form">
              <fieldset>
                
                <!-- ENCABEZADO -->
                <center><legend> Datos del Empleado del Retardo</legend></center>
                
                  <!-- NO.EMPLEADO-->
                <div class="form-group">
                  <label class="col-md-4 control-label" >No.Empleado</label>
                  <div class="col-md-6  inputGroupContainer">
                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                      <input name="CRnoempleado" placeholder="" class="form-control"  type="text">
                    </div>
                  </div>
                </div>  
                <!-- Tipo de Retardo-->
                <div class="form-group">
                        <label class="col-md-4 control-label">Tipo de Retardo</label>
                        <div class="col-md-6 selectContainer">
                          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select name="TipoRet" class="form-control selectpicker" >
                              <?php
                                $ret =  new MvcController();
                                $ret->tipoRetardoController(); 

                              ?>
                            </select>
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
    $('#ret_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            CRnoempleado: {
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
            }
        })
		
 	
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#ret_form').data('bootstrapValidator').resetForm();

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
$registroCon -> capturaRetardoController();