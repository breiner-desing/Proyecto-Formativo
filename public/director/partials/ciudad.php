<?php 

require_once 'db.php';

$codigo = $_POST['codigo'];
$ciudad = $_POST['ciudad'];
$dep = $_POST['dep'];

if ($codigo == '' || $ciudad == '' || $dep == '' ){
        echo json_encode('error');
        exit;
}

else {
 
    $verificar = mysqli_query($con, "SELECT * FROM ciudad WHERE ciu_id='$codigo' ");

    if(mysqli_num_rows($verificar)>0){
        echo  json_encode('uso');
        exit;
    }

    $consulta = mysqli_query($con,"INSERT INTO ciudad (ciu_id,ciu_nombre,dep_codigo) VALUES ('$codigo','$ciudad','$dep') " );



    if ($consulta){
        echo json_encode('bien');
    }

    else {
        echo json_encode('error');
    }
}