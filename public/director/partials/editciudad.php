<?php
require_once 'db.php';

$id = $_GET['id'];

$consulta = mysqli_query($con,"SELECT * FROM ciudad WHERE ciu_id='$id' ");

foreach($consulta as $key){
    $consulta = $key['ciu_id'];
    $consulta = $key['ciu_nombre'];
    $consulta = $key['dep_codigo'];
    $consulta = $key['ciu_cant_habitantes'];
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
        <input id="idN" type="number" value="<?php echo $id ?>">
        <input id="id" type="hidden" value="<?php echo $id ?>">
        <input  id="ciudad"  type="text" value="<?php echo $key['ciu_nombre']; ?>" >
        <input type="number" id="habitantes" value="<?php echo $key['ciu_cant_habitantes'];?>">
        <input id="departamento" type="number" value="<?php echo $key['dep_codigo']; ?>">
        <input type="submit" id="btn" value="enviar">

    </form>
    <div id="mensaje"></div>
    <script src="../js/ciudad.js"></script>
</body>
</htm>