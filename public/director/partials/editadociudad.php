<?php 

require_once 'db.php';

$id = $_POST['id'];
$idN = $_POST['idN'];
$ciudad = $_POST['ciudad'];
$habitantes = $_POST['habitantes'];
$departamento = $_POST['departamento'];

$consulta = mysqli_query($con,"UPDATE ciudad SET ciu_id='$idN', ciu_nombre='$ciudad', ciu_cant_habitantes='$habitantes', dep_codigo='$departamento' WHERE ciu_id='$id' ");

if ($consulta){
    echo json_encode('bien');
}
else {
    echo json_encode('mal');
}