<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- Bootstrap CSS -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <!--Conexion Css -->
    <link rel="stylesheet" href="/TareaGrafosIntegral/css/index.css">
    <!--Font awesome-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Roboto:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
    
    <title>Tarea Grafos Integral</title>
    
</head>

<body>
    <?php
    
    session_start();

    $_SESSION['arreglo']=array();
    $_SESSION['mataaux']=array();
    $_SESSION['cant_pv']=0;

    ?>
    
    <nav class ="navbar navbar-expand-lg navbar-light bg-light sticky-top p-3 aria-label">
        <div class ="container">
            <a href="/TareaGrafosIntegral" style="color:#2092af; text-align: center;"><h1> Trabajo Integral Grafos y Lenguajes Formales </h1></a>
            <a href="/TareaGrafosIntegral/templates/cargarArchivo.php" class="btn btn-outline-light px-2 ml-1" style="text-align: center; max-width: 850px;">Subir Archivo</a>
            <a href="/TareaGrafosIntegral/templates/tablaCentros.php" class="btn btn-outline-light px-2 ml-1" style="text-align: center; max-width: 850px;">Archivo ya Cargado</a>
        </div>
    </nav>

    <div class="text pt-5 pb-1">
        <h5 align="center">Este es el Trabajo integral de la asignatura Grafos y Lenguajes Formales.</h5>
        <h5 align="center">Se pide crear un software de logistica de envios de cargamentos para una empresa "D",
             la cual tiene que crear la hoja de ruta minimizando los km totales a recorrer.
        </h5> <br>
        <div align="center">
            <a class="mb-5"href="/TareaGrafosIntegral/templates/cargarArchivo.php">Subir Archivo</a>
            <a class="mb-5"href="/TareaGrafosIntegral/templates/tablaCentros.php">Archivo ya Cargado</a>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/c8152ea011.js" crossorigin="anonymous"></script>
</body>
</html>