<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Menú</title>
        <link rel="stylesheet" href="css/cssmenudesp.css">
        <link rel="stylesheet" href="fonts.css">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
            <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
            <link href="css/style.css" rel="stylesheet" type="text/css" />
            <!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script>-->
             <!-- <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>--> 
              <script src="menudesp.js"></script>
              <script src="js/jquery-1.9.1.min.js"></script>
      </head>
      <body class="w3-light-grey" data-gr-c-s-loaded="true">
          <?php include "navegacionRH.php"; ?>
            <article>
                <?php 

                  $mvc = new MvcController();
                  $mvc -> enlacesPaginasController();

                 ?>
            </article>
              
    </body>

</html>          