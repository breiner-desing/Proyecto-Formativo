<?php

require_once 'db.php';

$codigo = $_POST['codigo'];
$depto = $_POST['depto'];

if ($codigo == '' || $depto == ''){
    echo json_encode('error');
    exit;
}

else {

    $verificar = mysqli_query($con, "SELECT * FROM depto WHERE dep_codigo='$codigo' ");

    if(mysqli_num_rows($verificar)>0){
        echo  json_encode('uso');
        exit;
    }

    $consulta = mysqli_query($con,"INSERT INTO depto VALUES ('$codigo','$depto') " );



    if ($consulta){
        echo json_encode('bien');
    }

    else {
        echo json_encode('error');
    }
}