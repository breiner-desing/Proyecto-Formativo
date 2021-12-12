<?php 

require_once 'db.php';

$id = $_POST['id'];
$causa = $_POST['causa'];
$estado = $_POST['estado'];

$consulta = mysqli_query($con,"UPDATE causa_desercion SET cad_descripcion='$causa', cad_mat_estado='$estado' WHERE cad_codigo='$id' ");

if ($consulta){
    echo json_encode('bien');
}
else {
    echo json_encode('mal');
}