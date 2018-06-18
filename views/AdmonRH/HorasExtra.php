                    <br>
                        <form class="form-horizontal" action=" " method="post"  id="reg_form">
                          <fieldset>
                            
                            <!-- ENCABEZADO -->
                            <legend> Datos del Empleado </legend>
                            <!--NOMBRE EMPLEADO-->
                            <div class="form-group">
                              <label class="col-md-4 control-label">Nombre</label>
                              <div class="col-md-6  inputGroupContainer">
                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                  <input  name="Nombre" placeholder="Nombre" class="form-control"  type="text">
                                </div>
                              </div>
                            </div>
                            <!-- HORAS TRABAJADAS-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" >Horas Trabajadas</label>
                              <div class="col-md-6  inputGroupContainer">
                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                  <input name="htrab" placeholder="horas Trabajadas" class="form-control"  type="text">
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
                        Nombre: {
                            validators: {
                                    stringLength: {
                                    min: 3,
                                },
                                    notEmpty: {
                                    message: 'Por favor ingrese su Nombre'
                                }
                            }
                        },
                         htrab: {
                            validators: {
                                 stringLength: {
                                    min: 3,
                                },
                                notEmpty: {
                                    message: 'Por favor ingrese horas trabajadas'
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
            
                        // Use Ajax to submit form data
                        $.post($form.attr('action'), $form.serialize(), function(result) {
                            console.log(result);
                        }, 'json');
                    });
                });
            </script>





