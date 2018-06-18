
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login|Admi</title>
    <link rel="stylesheet" href="css/cssADMLogin.css">
    <!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script>-->
    <!-- <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>--> 
  </head>
  <body>

    <div class="login-box">
      <img src="img/iconoadmin.png" class="avatar" alt="Avatar Image">
      <h1>Login Administrador </h1>
      <form id="ini_form" method="POST">
        <!-- Entrada -->
        <div class="form-group">
          <div class="col-md-6  inputGroupContainer">
        <label for="No Empleado">No. Empleado</label>
        <input name="Snoempleado" type="text" placeholder="Introduce Número de Empleado">
          </div>
        </div>
        <!--Contraseña -->
        <div class="form-group">
        <label for="contraseña">Contraseña</label>
        <input name="Spassword" type="password" placeholder="Introduce Contraseña">
        </div>
        <div class="form-group">
          <div class="col-md-4">
          <button type="submit" class="btn btn-warning" >Entrar</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
<!-- PrefixFree -->
<script src='js/2.1.3/jquery.min.js'></script>
<script src='js/3.2.0/bootstrap.min.js'></script>
<script src='js/validator/bootstrapvalidator.min.js'></script>

        <script src="js/index.js"></script>
<script type="text/javascript">
 
   $(document).ready(function() {
    $('#ini_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            Snoempleado: {
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
            Spassword: {
                validators: {
                        stringLength: {
                        min: 3,
                        max:15,
                         message: 'La contraseña debe contener de 3 a 15 caracteres'
                    },
                        notEmpty: {
                        message: 'Por favor ingrese contraseña'
                    }
                }
            },
       }
        })
    
  
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#ini_form').data('bootstrapValidator').resetForm();

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
require_once ("../../models/CrudEmpleado.php");
    if(isset($_POST["Snoempleado"])){
      if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["Snoempleado"]) &&
         preg_match('/^[a-zA-Z0-9]+$/', $_POST["Spassword"])){

          $val = new Empleado();
          $existe = $val->existeNoEmpleadoModel($_POST["Snoempleado"]);
          $contra = $val->validarEmpleadoRHModel($_POST["Snoempleado"]);
          $PermisosUser = $val->validarPermisoEmpleadoRHModel($_POST["Snoempleado"]);
          if($existe == 0){
              echo "<script type=\"text/javascript\">\n";
              echo "alert('No.Empleado y/o contraseña Invalida!');\n";
              echo "</script>"; 
          }elseif($contra == $_POST["Spassword"] && $PermisosUser==2){ 

                session_start();

                $_SESSION["EmpleadoRH"] = true;
                header("Location:InicioRH.php");
          }else{
              echo "<script type=\"text/javascript\">\n";
              echo "alert('No.Empleado y/o contraseña Invalida!');\n";
              echo "</script>"; 
          }
      }else{
        echo "<script type=\"text/javascript\">\n";
        echo "alert('Datos Invalidos!');\n";
        echo "</script>"; 

      }      
    }    
?>

