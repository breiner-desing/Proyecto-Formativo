<?php

require_once 'db.php';

$id = $_POST['id'];
$descripcion = $_POST['descripcion'];

if ($id == '' || $descripcion == '' ){
    echo json_encode('error');
    exit;
}

else {

    $consulta = mysqli_query($con, "INSERT INTO tipo_id (tii_descripcion,tii_sigla) VALUES ('$descripcion','$id')");

    if ($consulta){
        echo json_encode('bien');
    }
    else {
        echo json_encode('error');
    }

}