<?php
include '../partials/databases.php';

session_start();
$_SESSION['ROL_NAME'];

if (isset($_SESSION['ROL_NAME'])) {
  if ($_SESSION['ROL_NAME']  == 'INSTRUCTOR') {
    header('location: profesor.php');
  } else if ($_SESSION['ROL_NAME'] == 'DIRECTOR') {
    header('location: ../director/director.php');
  }
} else {
  header('location: ../login.html');
}

$ide = $_SESSION['apr_id'];
$numero = mysqli_query($conex, "SELECT * FROM desercion WHERE apr_id='$ide' AND peticion='ACEPTADO'");
$numero2 = mysqli_query($conex, "SELECT * FROM desercion WHERE apr_id='$ide' ");
$numero3 = mysqli_query($conex, "SELECT * FROM desercion WHERE apr_id='$ide' AND peticion='INSTRUCTOR'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos.css/estilos.css">
  <title>Aprendiz</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>

  <!-- Barra de navegacion -->
  <header style="display:inline-block; background: rgb(252, 149, 0, 0.80); width: 100%;">
    <label for="btn-menu" style="display:inline-block;  margin: 3px; padding: 0px 5px 15px 10px; position: relative;"><img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/44/0000/external-menu-basic-ui-elements-flatart-icons-outline-flatarticons-1.png" /></label>
    <input type="checkbox" id="btn-menu">
    <div class="container-menu">
      <div class="cont-menu">
        <nav>
          <a href="./aprendiz.php"><img src="https://setalpro.cdtiapps.com/img/logo_sena.ico" alt=""></a>
          <a style="color:#ffff"><?php echo "Sesion: ", $_SESSION['NOM_USU'], " ", $_SESSION['APE_USU'] ?></a>
          <a href="./aprendiz.php">Inicio</a>
          <?php if (!mysqli_num_rows($numero2) > 0) { ?>
            <a href="./peticion_desercion.php">Pedir Desercion</a>
          <?php } ?>
          <a href="contrasenia.php">Contraseña</a>
          <a href="php/cerrar.php" class="btn btn-outline-danger ">Cerrar Sesion</a>
        </nav>
        <label for="btn-menu">✖️</label>
      </div>
    </div>
    <h3 style="display:inline-block;  padding: 25px 5px 15px 45px;">Sesión iniciada como: <?php echo $_SESSION['NOM_USU'], " ", $_SESSION['APE_USU'] ?></h3>
  </header>
  <!-- Tabla de datos -->
  <div class="container m-5">
    <h3 align="center">Datos del Aprendiz</h3>
  </div>
  <div class="container" class="container" style="opacity: .85; margin-top: 8px; padding: 50px 50px 50px 50px; rgba(255, 255, 255, 0.28); border-radius:10px; border: 1px solid rgba(0, 0, 0,0.25);">
    <table class="table" width="70%">
      <thead>
        <tr id="titulos" align="center" style=" padding: 50px 50px 50px 50px;  background-color: rgb(252, 149, 0 , 0.80);">
          <th scope="col">IDENTIFICACIÓN</th>
          <th scope="col">NOMBRES</th>
          <th scope="col">APELLIDOS</th>
          <th scope="col">TELEFONO</th>
          <th scope="col">GENERO</th>
          <th scope="col">EDAD</th>
        </tr>
      </thead>
      <tbody>
        <!-- Busqueda de datos del aprendiz especifico -->
        <?php
        $sql = "SELECT * FROM aprendiz WHERE apr_id = '$ide'";
        $resultado = mysqli_query($conex, $sql);

        while ($datos = mysqli_fetch_assoc($resultado)) {
        ?>

          <!-- Visualizacion de los datos -->
          <tr id="contenido" align="center">
            <td><?php echo $datos["apr_id"] ?></td>
            <td><?php echo $datos["apr_nombre"] ?></td>
            <td><?php echo $datos["apr_apellido"] ?></td>
            <td><?php echo $datos["apr_telefono"] ?></td>
            <td><?php echo $datos["apr_genero"] ?></td>
            <td><?php echo $datos["apr_edad"] ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <br><br>




  <!-- Aviso desertado -->
  <?php

  if (mysqli_num_rows($numero3) > 0 || mysqli_num_rows($numero) > 0) { ?>

    <!-- Tabla desercion pendiente -->

    <div class="container m-5">
      <h3>Deserciones del Aprendiz</h3>
    </div>
    <div class="container" class="container" style="opacity: .85; margin-top: 8px; padding: 50px 50px 50px 50px; rgba(255, 255, 255, 0.28); border-radius:10px; border: 1px solid rgba(0, 0, 0,0.25);">
      <table class="table" width="70%">
        <thead style=" padding: 50px 50px 50px 50px;  background-color: rgb(252, 149, 0 , 0.80);">
          <th scope="col">IDENTIFICACIÓN</th>
          <th scope="col">NOMBRES</th>
          <th scope="col">FICHA</th>
          <th scope="col">CAUSA DE DESERCIÓN</th>
          <th scope="col">ESTADO</th>
        </thead>
        <tbody>
          <?php
          $consulta = mysqli_query($conex, "SELECT * FROM desercion INNER JOIN causa_desercion ON desercion.cad_codigo = causa_desercion.cad_codigo INNER JOIN aprendiz ON desercion.apr_id = aprendiz.apr_id WHERE desercion.apr_id = $ide ");
          while ($row = mysqli_fetch_assoc($consulta)) { ?>
            <tr>
              <td><?php echo $row['apr_id'] ?></td>
              <td><?php echo $row['apr_nombre'] ?></td>
              <td><?php echo $row['fic_numero'] ?></td>
              <td><?php echo $row['cad_descripcion'] ?></td>
              <td><?php echo $row['peticion'] ?></td>
              <td> <a href="php/actualizar.php?id=<?php echo $row['apr_id'] ?>"></a> editar </td>
            </tr>

          <?php } ?>
        </tbody>
      </table>
    </div>
  <?php } ?>
  <?php

  $causa = mysqli_query($conex, "SELECT * FROM desercion INNER JOIN causa_desercion ON desercion.cad_codigo=causa_desercion.cad_codigo where apr_id='$ide' AND peticion='ACEPTADO'");

  while ($row = mysqli_fetch_assoc($causa)) {
  ?>
    <div class="container">
      <div class="aler container m-2 alert-danger" style="height: 50px;" role="alert">Usted esta desertado por: <?php echo $row['cad_descripcion'] ?> </div>
    </div>
  <?php } ?>
  </div>

</body>

</html>