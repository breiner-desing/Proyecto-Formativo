<?php

require_once 'db.php';

$descripcion = $_POST['descripcion'];
$estado = $_POST['estado'];

if ($descripcion == '' || $estado == ''){
    echo json_encode('error');
    exit;
}

else {

    $consulta = mysqli_query($con,"INSERT INTO programa (pro_descripcion, pro_estado) VALUES ('$descripcion','$estado')");

    if ($consulta){
        echo json_encode('bien');
    }

    else {
        echo json_encode('error');
    }
}