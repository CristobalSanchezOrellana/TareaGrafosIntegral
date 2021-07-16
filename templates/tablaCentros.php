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
    </div>
  </nav>



  <h2 class="text-center display-2 pt-5">HOJA DE RUTA</h2>

  <div class="container">
    <div class="col-md-12 pl-2 mt-0">

      <table class="table table-bordered bg-white">
        <caption> </caption>
        <thead class="thead-dark">
          <tr class="text-center">
            <th id="Centros" class="">Puntos de distribución</th>
            <th id="Identificador" class="">Centro de distribución</th>
            <th id="Camiones" class="">Camión</th>
          </tr>
        </thead>
        <?php


        session_start();
        include "conexion.php";

        $sql2 = "SELECT * from locales where TipoLocal='P'";
        $result = mysqli_query($conexion, $sql2);

        $num = 'NumeroIdentificador';
        $arre = 'arreglo';

        if ($_SESSION['cant_pv'] == 0) {
          while ($mostrar2 = mysqli_fetch_array($result)) {
            array_push($_SESSION[$arre], $mostrar2[$num]);
          }
          $_SESSION['mataaux'] = $_SESSION[$arre];
          $_SESSION['cant_pv'] = count($_SESSION[$arre]);
        }

        $sql = "SELECT * from locales where TipoLocal='C'";
        $result = mysqli_query($conexion, $sql);
        while ($mostrar = mysqli_fetch_array($result)) {

        ?>

          <tbody>

            <tr class="text-center">
              <td><?php echo $mostrar['TipoLocal'] ?></td>
              <td><?php echo $mostrar[$num] ?></td>

              <td>

                <form action="planificacion.php" method="POST">

                  <?php

                  echo "<input type='hidden' name='cant_pv' value='" . count($_SESSION[$arre]) . "'>";


                  for ($a = 0; $a < count($_SESSION[$arre]); $a++) {
                    if (isset($_SESSION[$arre][$a])) {
                      echo "<input type='hidden' name='pto_venta" . $a . "' value='" . $_SESSION[$arre][$a] . "'>";
                    }
                  }



                  ?>
                  <input type="hidden" name="centro_dib" value="<?php echo $mostrar[$num] ?>">
                  <input type="submit" class="btn btn-secondary" value="Crear Ruta"> Ruta para Camión <?php echo $mostrar[$num] ?>

              </td>

              </form>
            </tr>
          <?php
        }

          ?>

          <br><br>

          </tbody>
      </table>
    </div>
  </div>


  <div class="container">
    <div class="row">
      <div class="col-4"></div>
      <div class="col-4">
        <table class="table table-striped table-bordered bg-white table-sm">
          <caption> </caption>
          <thead class="thead-dark">
            <tr class="text-center">
              <th id="puntos">Puntos de ventas</th>
              <th id="identificador">Centro de Venta</th>

            </tr>
            <?php
            $sql2 = "SELECT * from locales where TipoLocal='P'";
            $result = mysqli_query($conexion, $sql2);
            while ($mostrar2 = mysqli_fetch_array($result)) {
              $num_camion = 1;

            ?>
          </thead>
          <tbody>
            <tr class="text-center">
              <td><?php echo $mostrar2['TipoLocal'] ?></td>
              <td><?php


                  echo $mostrar2[$num];



                  ?></td>
            </tr>
          <?php
            }

          ?>
          </tbody>
        </table>
      </div>
      <div class="col-4"></div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
  <script src="https://kit.fontawesome.com/c8152ea011.js" crossorigin="anonymous"></script>
</body>