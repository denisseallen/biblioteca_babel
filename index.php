<!DOCTYPE html>
<html style="font-size: 16px;" lang="es">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">

        <title>índice de libros</title>
        <link rel="icon" href="Vista/icons/icono.png">
        <link rel="stylesheet" href="Vista/styles/general.css" media="screen">
        <link rel="stylesheet" href="Vista/styles/indice_libros.css" media="screen">
        <link rel="stylesheet" type="text/css" href="Plugins/bootstrap.css">

        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css"/>
        
        <script src="https://kit.fontawesome.com/b13b5f11d5.js" crossorigin="anonymous"></script>
        <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
        <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Merriweather:300,300i,400,400i,700,700i,900,900i">
    </head>

    <body data-lang="es">
        <?php
	        include "Vista/header.php";
	        include "Vista/indice_libros.php";
	        include "Vista/footer.php";
	        include "Vista/modals.php";
        ?>
    </body>

<!-- ************************************************** SRCRIPTS ******************************************** -->
  <script class="u-script" type="text/javascript" src="Plugins/general.js" defer=""></script> 
  <script src="Plugins/jquery.min.js"></script>
  <script  src="Js/dtLanguaje.js"></script>  
  <script  src="Js/selectores.js"></script> 
  <script  src="Js/dtVolumenes.js"></script> 
  <script  src="Js/dtUbicacion.js"></script> 
  <script  src="Js/validacionesLadoCliente.js"></script>

  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 

</html>