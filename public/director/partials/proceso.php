<?php 

require_once 'db.php';

$id = $_POST['id'];
$horario = $_POST['horario'];
$ficha = $_POST['ficha'];
$causa = $_POST['causa'];

if ($id == '' || $horario == '' || $ficha == '' || $causa == ''){
    echo json_encode('error');
}

else {
    
    $verificar = mysqli_query($con, "SELECT * FROM DESERCION WHERE apr_id='$id' ");

    if(mysqli_num_rows($verificar)>0){
        echo  json_encode('uso');
        exit;
    }

    else {
    $consulta = mysqli_query($con, "INSERT INTO desercion (der_fecha,apr_id,fic_numero,cad_codigo,der_fecha_desercion,peticion) VALUES ('$horario','$id','$ficha','$causa','$horario','ACEPTADO')");

    if ($consulta){
        echo json_encode('bien');
    }

    else {
        echo json_encode('error');
    }
    }
}