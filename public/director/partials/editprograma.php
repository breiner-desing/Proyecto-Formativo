<?php
require_once 'db.php';

$id = $_GET['id'];

$consulta = mysqli_query($con,"SELECT * FROM programa WHERE pro_codigo='$id' ");

foreach($consulta as $key){
    $consulta = $key['pro_descripcion'];
    $consulta = $key['pro_estado'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>edit</title>
</head>
<body>
    <form action="" method="post">
        <input id="id" type="hidden" value="<?php echo $id ?>">
        <input  id="descripcion"  type="text" value="<?php echo $key['pro_descripcion']; ?>" placeholder="causa">
        <input id="estado" value="<?php echo $key['pro_estado']; ?>" type="text">
        <input type="submit" id="btn" value="enviar">

    </form>
    <div id="mensaje"></div>
    <script src="../js/programa.js"></script>
</body>
</htm>