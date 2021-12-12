<?php 

require_once 'db.php';

$id = $_POST['id'];
$idN = $_POST['idN'];
$departamento = $_POST['departamento'];

$consulta = mysqli_query($con,"UPDATE depto SET dep_codigo='$idN', dep_nombre='$departamento' WHERE dep_codigo='$id' ");

if ($consulta){
    echo json_encode('bien');
}
else {
    echo json_encode('mal');
}