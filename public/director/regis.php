<?php
include 'partials/db.php';
session_start();
$_SESSION['ROL_NAME'];

if (isset($_SESSION['ROL_NAME'])) {
  if ($_SESSION['ROL_NAME']  == 'INSTRUCTOR') {
    header('location: profesor.php');
  } else if ($_SESSION['ROL_NAME'] == 'ESTUDIANTE') {
    header('location: estudiante.php');
  }
} else {
  header('location: ../login.html');
}

$consulta = mysqli_query($con, "SELECT * FROM rh");

$consulta2 = mysqli_query($con, "SELECT * FROM ciudad");

$consulta4 = mysqli_query($con, "SELECT * FROM tipo_id");

// while ($row = mysqli_fetch_assoc($consulta)){
//     echo $row['rh_id'];
//     echo $row['rh_descripcion'];
// }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style-css/menu.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 
  <title>Registrar Aprendices</title>
</head>

<body>

  <?php
  include_once './barra_navegacion.php';
  ?>
  <h3 style="text-align: center;  padding: 25px 5px 15px 45px;">Registro de Aprendices</h3>
  </header>
  <div class="container" style=" text-align: center; opacity: .85; margin: 0px auto; margin-top: 20px;  padding: 50px 5px 50px 50px; rgba(255, 255, 255, 0.28); border-radius:10px; border: 1px solid rgba(0, 0, 0,0.25);">
    <h3 class="container m-4">Registro de Aprendiz</h3>

    <!-- organizar bien chimba el columnas -->

    <!-- formulario -->
    <div style="justify-content: center;display: flex;flex-direction: row; height: 75vh;">
      <form method="post">
        <!-- identificacion -->
        <div class="m-3">
        <div class="row">
          <div class="col-8 col-sm-6">
            <input class="form-control" name="id" type="number" id="id" placeholder="Identificacion">
          </div>

          <!-- tipo id -->
          <div class="col-4 col-sm-6">
            <select class="form-select " name="tipoId" id="tipoId">
              <option value="">Tipo de Identificacion</option>
              <?php
              while ($row = mysqli_fetch_assoc($consulta4)) { ?>

                <option value="<?php echo $row['tii_id'] ?>"> <?php echo $row['tii_sigla'] ?></option>

              <?php } ?>

            </select>

          </div>
        </div>
              </div>
        <!-- nombre -->
        <div class="m-3">
        <div class="row">
          <div class="col-4 col-sm-6">
            <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Nombres">
          </div>

          <!-- apellido -->

          <div class="col-4 col-sm-6">
            <input class="form-control" name="apellido" id="apellido" type="text" placeholder="Apellidos">
          </div>
        </div>
              </div>
        <!-- numero -->
        <div class="m-3">
        <div class="row">
          <div class="col-8 col-sm-6">
            <input class="form-control" name="numero" id="numero" type="number" placeholder="Numero">
          </div>

          <!-- edad -->

          <div class="col-4 col-sm-6">
            <input class="form-control" name="edad" id="edad" type="number" placeholder="Edad">
          </div>
        </div>
              </div>
        <!-- rh -->
        <div class="m-3">
        <div class="row">
          <div class="col-4 col-sm-6">
            <select class="form-select" name="tipoSangre" id="rh">
              <option value="">Tipo de Sangre</option>
              <?php
              while ($row = mysqli_fetch_assoc($consulta)) { ?>

                <option value="<?php echo $row['rh_id'] ?>"><?php echo $row['rh_descripcion'] ?></option>

              <?php } ?>

            </select>
          </div>


          <!-- ciudad -->

          <div class="col-4 col-sm-6">
            <select class="form-select" id="ciudad">
              <option value="">Ciudad</option>
              <?php
              while ($row = mysqli_fetch_assoc($consulta2)) { ?>

                <option value="<?php echo $row['ciu_id'] ?>"><?php echo $row['ciu_nombre'] ?></option>

              <?php } ?>
            </select>
          </div>
        </div>
              </div>
        <!-- Genero -->
        <div class="m-3">
        <div class="row">
          <div class="col-4 col-sm-6">
            <select class="form-select" id="Genero">
              <option value="">Genero</option>
              <option value="F">Mujer</option>
              <option value="M">Hombre</option>
            </select>
          </div>
        </div>
        <div style="align-items: center; margin-top: 15px;">
          <input class="btn btn-outline-success" id="btn" type="submit">
          <div class="container" id="mensaje"></div>
        </div>
    </div>
    </form>
  </div>
              </div>

  <script src="js/regis.js"></script>
  </div><br>
</body>

</html>