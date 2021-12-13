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
<header style="display:inline-block; background: rgb(252, 149, 0, 0.80); width: 100%;">
    <h3 style="display:inline-block;  padding: 25px 5px 15px 45px;">Sesión iniciada como: <?php echo $_SESSION['NOM_USU'], " ", $_SESSION['APE_USU'] ?></h3>
  </header>
  <div class="container" class="container" style="opacity: .85; margin-top: 8px; padding: 50px 50px 50px 50px; rgba(255, 255, 255, 0.28); border-radius:10px; border: 1px solid rgba(0, 0, 0,0.25);">
  <h3 style="margin-bottom: 30px; margin-left: 20px;">Editar datos del Aprendiz</h3>
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
          <form action="php/actualizar.php" method="post">
            <input type="hidden" name="id" class="text-impu" value="<?php echo $datos["apr_id"] ?>">
            <td><?php echo $datos["apr_id"] ?></td>
            <td><input type="text" name="nombre" class="text-impu" value="<?php echo $datos["apr_nombre"] ?>"></td>
            <td><input type="text" name="apellido" class="text-impu" value="<?php echo $datos["apr_apellido"] ?>"></td>
            <td><input type="text" name="telefono" class="text-impu" value="<?php echo $datos["apr_telefono"] ?>"></td>
            <td><input type="text" name="genero" class="text-impu" value="<?php echo $datos["apr_genero"] ?>"></td>
            <td><input type="text" name="edad" class="text-impu" value="<?php echo $datos["apr_edad"] ?>"></td>
            <td><input type="submit" value="Actualizar"></td>
            </form>
           </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>
</html>
