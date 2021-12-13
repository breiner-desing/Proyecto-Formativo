<?php
 require_once 'db.php';

 session_start();
 $_SESSION['ROL_NAME'];
 
 if (isset($_SESSION['ROL_NAME'])){
     if ($_SESSION['ROL_NAME']  == 'INSTRUCTOR'){
         header('location: profesor.php');
     }
     else if ($_SESSION['ROL_NAME'] == 'ESTUDIANTE'){
         header('location: estudiante.php');
     }
 }
 else{
     header('location: ../login.html');
 }

 $id = $_GET['id'];


// $CONSULTA2="SELECT der_id, cad_descripcion FROM desercion INNER JOIN causa_desercion ON desercion.cad_codigo = causa_desercion.cad_codigo WHERE peticion = 'INSTRUCTOR";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Estudiante</title>
</head>
<body>
<header style="display:inline-block; background: rgb(252, 149, 0, 0.80); width: 100%;">
    <h3 style="display:inline-block;  padding: 25px 5px 15px 45px;">Sesión iniciada como: <?php echo $_SESSION['NOM_USU'], " ", $_SESSION['APE_USU'] ?></h3>
  </header>
    <?php 
    
    $consulta = mysqli_query($con,"SELECT * FROM aprendiz INNER JOIN ciudad ON aprendiz.ciu_id=ciudad.ciu_id INNER JOIN tipo_id ON aprendiz.tii_id=tipo_id.tii_id INNER JOIN rh ON aprendiz.rh_id=rh.rh_id WHERE apr_id = '$id' ");
    foreach ($consulta as $key ) {

        $consulta = $key['apr_id'];
        $consulta = $key['apr_nombre'];
        $consulta = $key['apr_apellido'];
        $consulta = $key['apr_telefono'];
        $consulta = $key['ciu_nombre'];
        $consulta = $key['tii_sigla'];
        $consulta = $key['rh_descripcion'];
        $consulta = $key['apr_genero'];
        $consulta = $key['apr_edad'];

        
    }
    
    $consul = mysqli_query($con,"SELECT * FROM desercion INNER JOIN causa_desercion ON desercion.cad_codigo=causa_desercion.cad_codigo WHERE apr_id = '$id'");
        
    foreach ($consul as $bat) {

        $consul = $bat['der_id'];
        $consul = $bat['cad_codigo'];
        $consul = $bat['cad_descripcion'];

    }

    ?>

<div class="container m-5">
    <div class="card">
  <h5 class="card-header">Estudiante:  <?php echo $key['apr_nombre'], "  ", $key['apr_apellido'] ?></h5>
  <div class="card-body">
      <div class="m-3">
         <?php  
          echo $bat['cad_descripcion']?>
      </div>
    <form class="row" action="" method="post">
        <input type="hidden" name="id" id="id" value="<?php echo $bat['der_id']; ?>">
        <input id="btn" class=" col-3 m-3 btn btn-secondary" type="submit" value="Aceptar">
        <a class="col-3 m-3 btn btn-secondary" href="DropDes.php?id=<?php echo $bat['der_id'] ?>">ELIMINAR SOLICITUD</a>
    <button type="button" class="col-3 m-3 btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ver datos del estudiante</div>
    </form>
    
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Estudiante</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

            <label for="">id: <?php echo $key['apr_id']?> <?php echo $key['tii_sigla']?> Años: <?php echo $key['apr_edad']?> G: <?php echo $key['apr_genero']?></label><br>
            <label for="">Nombre: <?php echo $key['apr_nombre']?></label><br>
            <label for=""></label>Apellido: <?php echo $key['apr_apellido']?></label><br>  
            <label for="">Telefono: <?php echo $key['apr_telefono']?>  </label><br>
            <label for="">ciudad: <?php echo $key['ciu_nombre']?></label><br>
            <label for="">rh: <?php echo $key['rh_descripcion']?></label>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <p></p>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>
</body>
</html>