<?php

require_once 'db.php';

$rh = $_POST['rh'];

if ($rh == ''){
    echo json_encode('error');
    exit;
}

else {

    $consulta = mysqli_query($con, "INSERT INTO rh (rh_descripcion) VALUES ('$rh')");

    if ($consulta){
        // echo "<script> location.href = '../datos.php' </script>";
        // header('location: ../datos.php');
        echo json_encode('bien');
    }

    else {
        echo json_encode('error');
    }
}
