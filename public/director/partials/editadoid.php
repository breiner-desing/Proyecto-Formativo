<?php 

require_once 'db.php';

$id = $_POST['id'];
$sigla = $_POST['sigla'];
$descripcion = $_POST['descripcion'];

$consulta = mysqli_query($con,"UPDATE tipo_id SET tii_descripcion='$descripcion', tii_sigla='$sigla' WHERE tii_id='$id' ");

if ($consulta){
    echo json_encode('bien');
}
else {
    echo json_encode('mal');
}