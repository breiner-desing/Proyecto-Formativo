<?php
session_start();
require_once 'db.php';

$id = $_GET['id'];

$ficha = mysqli_query($con,"SELECT * FROM ficha INNER JOIN programa ON ficha.pro_codigo=programa.pro_codigo");

$causa = mysqli_query($con, "SELECT * FROM causa_desercion");

// date_default_timezone_get('America/Bogota');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>desercion</title>
</head>
<body>
<header style="display:inline-block; background: rgb(252, 149, 0, 0.80); width: 100%;">
    <h3 style="display:inline-block;  padding: 25px 5px 15px 45px;">Sesión iniciada como: <?php echo $_SESSION['NOM_USU'], " ", $_SESSION['APE_USU'] ?></h3>
  </header>
  <div class="container" class="container" style="opacity: .85; margin-top: 50px; padding: 50px 50px 50px 50px; rgba(255, 255, 255, 0.28); border-radius:10px; border: 1px solid rgba(0, 0, 0,0.25);">
   <h3 style="margin-bottom: 30px; margin-left: 20px;">Desertar estudiante</h3>
<?php $fecha = date("y-m-d")  ?>
    <div class="container">
    <form action="" method="post">
        <input id="id" type="hidden" value="<?php echo $id ?>">
        <input type="hidden" value="<?php echo $fecha?>" id="horario">
        <select name="" id="ficha">
            <option value="">FICHA</option>
            <?php while($row=mysqli_fetch_assoc($ficha)){ ?>
                
                <option value="<?php echo $row['fic_numero'] ?>"><?php echo $row['fic_numero'] ?>  ||  <?php echo $row['pro_descripcion'] ?></option>
                
                <?php } ?>
        </select>
        <select name="" id="causa">
        <option value="">CAUSA</option>
            <?php while($row=mysqli_fetch_assoc($causa)){ ?>
                
                <option value="<?php echo $row['cad_codigo'] ?>"><?php echo $row['cad_descripcion'] ?></option>
                
                <?php } ?>
        </select>
            <input id="btn" type="submit">
    </form>
    </div>
    <div id="mensaje"></div>
    <script src="../js/desercion.js"></script>
            </div>
</body>
</html>