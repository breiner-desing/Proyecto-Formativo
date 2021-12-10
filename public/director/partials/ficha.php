<?php 

require_once 'db.php';

$ficha = $_POST['ficha'];
$programa = $_POST['programa'];
$centro = $_POST['centro'];
$inicio = $_POST['inicio'];
$final = $_POST['final'];

if ($ficha == '' || $programa == '' || $centro == ''){
    echo json_encode('error');
    exit;
}

else {
    $consulta = mysqli_query($con, "INSERT INTO ficha VALUES ('$ficha','$programa','$inicio','$final','$centro')");

    if ($consulta){
        echo json_encode('bien');
    }
    else {
        echo json_encode('error');
    }
}