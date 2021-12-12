<?php 

require_once 'db.php';

$id = $_POST['id'];
$rh = $_POST['rh'];

$consulta = mysqli_query($con,"UPDATE rh SET rh_descripcion='$rh' WHERE rh_id='$id' ");

if ($consulta){
    echo json_encode('bien');
}
else {
    echo json_encode('mal');
}