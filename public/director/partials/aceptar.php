<?php

require_once 'db.php';

$id = $_POST['id'];

$fecha = date("y-m-d");

$consulta = mysqli_query($con,"UPDATE DESERCION SET peticion='ACEPTADO', der_fecha='$fecha', der_fecha_desercion='$fecha' where der_id='$id'");

if ($consulta){
    echo json_encode($respuesta ['actualizar']="actualizar");
}

else {
    echo json_encode($respuesta ['error']="error");

}