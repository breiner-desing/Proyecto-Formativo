<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos\Estilos-peticiones.css">
    <title>Peticiones</title>
</head>
<body>
  <?php
  include_once './menu.php';
  ?>
  <h1 style="display:inline-block;  padding: 25px 5px 15px 45px;">Peticiones del estudiantes.</h1>
  </header>
  <div class="capa"></div>
  <div class="container" style="opacity: .85; margin-top: 50px; padding: 50px 50px 50px 50px; rgba(255, 255, 255, 0.28); border-radius:10px; border: 1px solid rgba(0, 0, 0,0.25);">
  <div class="Menu-Peticion">
    <h2>Personas Registradas</h2>
    <table>
    <tr style="background-color: rgb(252, 149, 0 , 0.80);">
      <th>Documento</th>
      <th>Ficha del estudiante</th>
      <th>estudiante</th>
      <th>Apellido</th>
      <th>Motivo de desercion</th>
      <th>Confirmacion</th>
    </tr>
<?php
      $inc = include("db.php");
      $sql="SELECT * FROM desercion INNER JOIN aprendiz on desercion.apr_id=aprendiz.apr_id
      INNER JOIN causa_desercion on desercion.cad_codigo=causa_desercion.cad_codigo
      INNER JOIN ficha on desercion.fic_numero=ficha.fic_numero WHERE peticion='APRENDIZ'";
    $resultado=mysqli_query($conexion,$sql);
    while($mostrar=mysqli_fetch_array($resultado)){
?>
          <tr>
          <td><?php echo $mostrar['apr_id']?></td>
          <td><?php echo $mostrar['fic_numero']?></td>
          <td><?php echo $mostrar['apr_nombre']?></td>
          <td><?php echo $mostrar['apr_apellido']?></td>
          <td><?php echo $mostrar['cad_descripcion']?></td>
          <td><a class="color-link" style="color:#d2dfcc;" href="registro-Peticiones.php?id=<?php echo $mostrar['der_id']?>">Enviar</a></td>
          </tr>
<?php
}
?>
</table> 
</div>
</body>
</html>
