<?php
  public function validarSesion(){
    if(isset($_POST["Snoempleado"])){
          $existe = Empleado::existeNoEmpleadoModel($_POST["Snoempleado"]);
          if($existe == 0 ){
           echo '<div class="alert alert-danger" role="alert">
                  No empleado y/o contraseña incorrecta
                  </div>';
          }else{ 

          }
      }      
  }
?>