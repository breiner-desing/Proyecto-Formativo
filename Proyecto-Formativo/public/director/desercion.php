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
  <link rel="stylesheet" href="style-css/menu.css">
  <title>Deserción</title>
</head>

<body>

  <?php
  include_once './barra_navegacion.php';
  ?>
  <h3 style="display:inline-block;  padding: 25px 5px 15px 45px;">Desertados</h3>
  </header>
  <div class="container" style=" opacity: .85; margin-top: 50px; padding: 50px 50px 50px 50px; rgba(255, 255, 255, 0.28); border-radius:10px; border: 1px solid rgba(0, 0, 0,0.25);">
    <table class="table m-1">
      <thead style="background-color: rgb(252, 149, 0 , 0.80);">
        <th scope="col">Documento</th>
        <th scope="col">Nombre</th>
        <th scope="col">Ficha</th>
        <th scope="col">Descripcion</th>
      </thead>
      <tbody>
        <?php
        $consulta = mysqli_query($con, "SELECT * FROM desercion INNER JOIN causa_desercion ON desercion.cad_codigo = causa_desercion.cad_codigo INNER JOIN aprendiz ON desercion.apr_id = aprendiz.apr_id WHERE peticion='ACEPTADO'");
        while ($row = mysqli_fetch_assoc($consulta)) { ?>
          <tr>
            <td><?php echo $row['apr_id'] ?></td>
            <td><?php echo $row['apr_nombre'] ?></td>
            <td><?php echo $row['fic_numero'] ?></td>
            <td><?php echo $row['cad_descripcion'] ?></td>
          </tr>

        <?php } ?>
      </tbody>
    </table>
  </div>
</body>

</html>