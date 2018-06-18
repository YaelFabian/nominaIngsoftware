
                    <br>
                        <form class="form-horizontal" action=" " method="post"  id="reg_form">
                          <fieldset>
                            
                            <!-- ENCABEZADO -->
                            <legend> Modificar Empleado </legend>
                            <!--NOMBRE EMPLEADO-->
                            <div class="form-group">
                              <label class="col-md-4 control-label">Nombre</label>
                              <div class="col-md-6  inputGroupContainer">
                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                  <input  name="Nombre" placeholder="Nombre" class="form-control"  type="text">
                                </div>
                              </div>
                            </div>
                            <!-- NO.EMPLEADO-->
                            <div class="form-group">
                              <label class="col-md-4 control-label" >No.Empleado</label>
                              <div class="col-md-6  inputGroupContainer">
                                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                  <input name="noempleado" placeholder="No.Empleado" class="form-control"  type="text">
                                </div>
                              </div>
                            </div>
                            <!-- CURP-->
                            <div class="form-group">
                                    <label class="col-md-4 control-label" >CURP</label>
                                    <div class="col-md-6  inputGroupContainer">
                                      <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input name="CURP" placeholder="CURP" class="form-control"  type="text">
                                      </div>
                                    </div>
                                  </div>
                                  <!-- RFC-->
                            <div class="form-group">
                                    <label class="col-md-4 control-label" >RFC</label>
                                    <div class="col-md-6  inputGroupContainer">
                                      <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input name="RFC" placeholder="RFC" class="form-control"  type="text">
                                      </div>
                                    </div>
                                  </div>
                            <!--EMAIL-->
                            <div class="form-group">
                                 <label class="col-md-4 control-label">E-Mail</label>
                                <div class="col-md-6  inputGroupContainer">
                                  <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input name="Email" placeholder="E-Mail" class="form-control"  type="email">
                                </div>
                                </div>
                            </div>
                            <!--TELEFONO-->
                            <div class="form-group">
                                    <label class="col-md-4 control-label">Teléfono</label>
                                    <div class="col-md-6  inputGroupContainer">
                                      <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                        <input name="telefono" placeholder="(000)000-0000" class="form-control" type="text">
                                      </div>
                                    </div>
                                  </div>
                             <!--DIRECCION-->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Dirección</label>
                                    <div class="col-md-6  inputGroupContainer">
                                    <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                        <input name="direccion" placeholder="Dirección" class="form-control" type="text">
                                    </div>
                                    </div>
                                </div>
                            <!--BOTON-->
                            <div class="form-group">
                                    <label class="col-md-4 control-label"></label>
                                    <div class="col-md-4">
                                    <button type="submit" class="btn btn-warning" >Modificar <span class="glyphicon glyphicon-send"></span></button>
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
                         noempleado: {
                            validators: {
                                 stringLength: {
                                    min: 3,
                                },
                                notEmpty: {
                                    message: 'Por favor ingrese No. Empleado'
                                }
                            }
                        },
                        telefono: {
                            validators: {
                                notEmpty: {
                                    message: 'Por favor ingrese su número telefonico'
                                },
                            }
                        },
                        direccion: {
                            validators: {
                                 stringLength: {
                                    min: 8,
                                },
                                notEmpty: {
                                    message: 'Por favor ingrese su dirección'
                                }
                            }
                        },
                        
                       CURP: {
                            validators: {
                                 stringLength: {
                                    min: 18,
                                    message: 'Ingrese CURP valido'
                                },
                                notEmpty: {
                                    message: 'Por favor ingrese su CURP'
                                }
                            }
                        },
            
                        RFC: {
                            validators: {
                                 stringLength: {
                                    min: 13,
                                    message: 'Ingrese RFC valido'
                                },
                                notEmpty: {
                                    message: 'Por favor ingrese su RFC'
                                }
                            }
                        },
            
                 Email: {
                            validators: {
                                notEmpty: {
                                    message: 'Por favor ingrese su Dirección E-Mail'
                                },
                                emailAddress: {
                                    message: 'Por favor ingrese una Dirección E-mail valida'
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
