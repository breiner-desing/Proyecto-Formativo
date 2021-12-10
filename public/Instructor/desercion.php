<?php
require_once 'db.php';
$causa=mysqli_query($conexion,"SELECT cad_codigo, cad_descripcion FROM causa_desercion");
session_start()
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="Estilos\Estilos-peticiones.css">
    <title>Solicitud</title>
  </head>
  <body>
  <?php
  include_once './menu.php';
  ?>
  <h1 style="display:inline-block;  padding: 25px 5px 15px 45px;">Solicitud de desercion.</h1>
  </header>
    <Div style="margin: 10px; align-items: center;">
    <div class="container" style="opacity: .85; margin-top: 50px; padding: 50px 50px 50px 50px; rgba(255, 255, 255, 0.28); border-radius:10px; border: 1px solid rgba(0, 0, 0,0.25);">
    <form method="POST">

      <h1>Inicio de desercion</h1>
      <p>Identificacion del Aprendiz</p>
        <input  type="text" id="id"  name="apr_id"></p>
        <p>Numero de Ficha</p>
        <select name="" id="fic_num">
              <option value="">ficha</option>
              <?php 
              $ficha = mysqli_query($conexion,"SELECT * FROM ficha INNER JOIN programa ON ficha.pro_codigo=programa.pro_codigo");
              while ($row = mysqli_fetch_assoc($ficha)) {?>
                  <option value="<?php echo $row['fic_numero'] ?>"><?php echo $row['fic_numero']; ?>|| <?php echo $row['pro_descripcion'] ?></option>
              <?php } ?>
              </select>
      <p>Causa de la desercion</p>
      <select id="causa" name="cad_codigo">
        <?php while($deser = mysqli_fetch_array($causa)){ ?>

          <option value="<?php echo $deser['cad_codigo'] ?>"><?php echo $deser['cad_descripcion'] ?></option>

          <?php
          }
          ?>
</select>
<p>Envio de Peticion</p>
    <input id="btn" type="submit" name="enviar">
    <div id="mensaje"></div>
  </form>
  </Div>
  <script src="js/main.js"></script>
  </body>
</html>
