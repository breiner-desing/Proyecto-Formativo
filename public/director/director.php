<?php

require_once 'partials/db.php';
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

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style-css/menu.css">
  <title>Director</title>
</head>

<body>

  <?php
  include_once './barra_navegacion.php';
  ?>
  <h3 style="display:inline-block;  padding: 25px 5px 15px 45px;">Aprendices</h3>
  </header>
  <?php
  include_once './barra_navegacion.php';
  ?>
  <div class="container" style="opacity: .85; margin-top: 50px; padding: 50px 50px 50px 50px; rgba(255, 255, 255, 0.28); border-radius:10px; border: 1px solid rgba(0, 0, 0,0.25);">
    <table class="table">
      <thead>
        <tr style="background-color: rgb(252, 149, 0 , 0.80);">
          <th scope="col">Documento</th>
          <th scope="col">Nombres</th>
          <th scope="col">Apellidos</th>
          <th scope="col">Edad</th>
          <th scope="col">Proceso</th>
        </tr>
      </thead>
      <tbody>

        <?php

        $consulta = mysqli_query($con, "SELECT apr_id, apr_nombre, apr_apellido, apr_edad FROM aprendiz");

        while ($row = mysqli_fetch_assoc($consulta)) { ?>

          <tr>
            <th scope="row"><?php echo $id = $row['apr_id'] ?></th>
            <td><?php echo $row['apr_nombre'] ?></td>
            <td><?php echo $row['apr_apellido'] ?></td>
            <td><?php echo $row['apr_edad'] ?></td>
            <?php $verificar = mysqli_query($con, "SELECT * FROM desercion WHERE apr_id='$id' AND peticion='ACEPTADO' ");

            if (mysqli_num_rows($verificar) < 1) { ?>

              <td class="text-decoration:none"><a href="partials/desercion.php?id=<?php echo $row['apr_id']; ?>">DESERCION</a></td>

            <?php } else { ?>

              <td>DESERTADO</td>

            <?php } ?>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>


</body>

</html>