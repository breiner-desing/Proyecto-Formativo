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
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="estilos.css/estilos2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container m-5">
    <h3 align="center">Editar datos del Aprendiz</h3>
  </div>
  <div class="container" class="container" style="opacity: .85; margin-top: 8px; padding: 50px 50px 50px 50px; rgba(255, 255, 255, 0.28); border-radius:10px; border: 1px solid rgba(0, 0, 0,0.25);">
  <from action="php/actualizar.php" method="post">
  <table class="table" >
      <thead>
        <tr id="titulos" align="center" style="background-color: rgb(252, 149, 0 , 0.80);">
          <th scope="col">IDENTIFICACIÓN</th>
          <th scope="col">NOMBRES</th>
          <th scope="col">APELLIDOS</th>
          <th scope="col">TELEFONO</th>
          <th scope="col">GENERO</th>
          <th scope="col">EDAD</th>
          <th scope="col">ACTUALIZAR</th>
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
          <tr id="contenido" align="center" >
            <td><input type="text" class="text-impu" value="<?php echo $datos["apr_id"] ?>"></td>
            <td><input type="text" class="text-impu" value="<?php echo $datos["apr_nombre"] ?>"></td>
            <td><input type="text" class="text-impu" value="<?php echo $datos["apr_apellido"] ?>"></td>
            <td><input type="text" class="text-impu" value="<?php echo $datos["apr_telefono"] ?>"></td>
            <td><input type="text" class="text-impu" value="<?php echo $datos["apr_genero"] ?>"></td>
            <td><input type="text" class="text-impu" value="<?php echo $datos["apr_edad"] ?>"></td>
            <td><a href="php/actualizar.php ?apr_id=<?php echo $row['apr_id'] ?>"><button type="button">Actualizar</button></a></td>
           </tr>
        <?php } ?>
      </tbody>
    </table>
    </from> 
  </div>
</body>
</html>

