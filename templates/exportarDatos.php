<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="/TareaGrafosIntegral/css/index.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Roboto:wght@300;500&display=swap" rel="stylesheet">

  <title>Tarea Grafos Integral</title>

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top p-3 aria-label">
    <div class="container">
      <a href="/TareaGrafosIntegral" style="color:#2092af; text-align: center;">
        <h1> Trabajo Integral Grafos y Lenguajes Formales </h1>
      </a>
      <a href="/TareaGrafosIntegral/templates/cargarArchivo.php" class="btn btn-outline-light px-2 ml-1" style="text-align: center; max-width: 850px;">Subir Archivo</a>
    </div>
  </nav>


  <div class="container my-5 text-center">
    <div class="card card-body pl-5">
      <?php

      include "conexion.php";

      $sql9 = "CREATE TABLE locales(
               
              TipoLocal VARCHAR(1), 
              NumeroIdentificador INT NULL,   
              Coordenadas VARCHAR(1000),
              X INT,
              Y INT,
              PRIMARY KEY (NumeroIdentificador)
        
             )";

      if ($conexion->query($sql9) === true) {
      } else {
        echo "<h1>La base de datos ya fue creada</h1><br>";
      }
      $nombrearchivo = $_POST['nombrearchivo'];


      $sql = "LOAD DATA INFILE 'C:/xampp/htdocs/TareaGrafosIntegral/templates/$nombrearchivo'
                  INTO TABLE locales
                  FIELDS TERMINATED BY ';'
                  LINES TERMINATED BY '\n';
                  ";

      if ($conexion->query($sql) === true) {
        echo "<h1>Datos enviados a base de datos</h1><br>";
        $sql2 = "UPDATE locales
                     SET 
                   X = SUBSTRING(Coordenadas,1,LOCATE(',',Coordenadas) - 1)
                  ";
        $sql3 = "UPDATE locales
                      SET
                      Y = SUBSTRING(Coordenadas,LOCATE(',',Coordenadas) + 1)
                      ";



        if ($conexion->query($sql2) === true && $conexion->query($sql3) === true) {
          echo "<h3>Puntos de distribución y ventas identificadas y separadas</h3><br>";
          echo '<form action="tablaCentros.php">
                        <input class="btn btn-outline-light centrar-btn" type="submit" Value="Continuar">
                      </form>';
        } else {

          die("<h3>Error, no pudimos separar los datos: </h3>" . $conexion->error);
        }
      } else {
        echo '<h2>Los datos no se pudieron exportar, no repitas los identificadores de distribución y ventas</h2>';
        echo '<form action="/TareaGrafosIntegral/index.php">
                  <input class="btn btn-outline-light centrar-btn" type="submit" Value="Ir a inicio">
                </form>';
      }



      ?>

    </div>

  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
  <script src="https://kit.fontawesome.com/c8152ea011.js" crossorigin="anonymous"></script>>
</body>