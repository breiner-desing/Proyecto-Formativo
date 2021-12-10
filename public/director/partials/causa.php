<?php

require_once 'db.php';

$causa = $_POST["causa"];

if ($causa == ''){
    echo json_encode('error');
    exit;
}
else {

    $consulta = mysqli_query($con, "INSERT INTO causa_desercion (cad_descripcion, cad_mat_estado) VALUES ('$causa','press')");

    if ($consulta){
        echo json_encode('bien');
    }
    else {
        echo json_encode('error');
    }
}