<?php 

require_once 'db.php';

$id = $_POST['id'];
$descripcion = $_POST['descripcion'];
$estado = $_POST['estado'];

$consulta = mysqli_query($con,"UPDATE programa SET pro_descripcion='$descripcion', pro_estado='$estado' WHERE pro_codigo='$id' ");

if ($consulta){
    echo json_encode('bien');
}
else {
    echo json_encode('mal');
}