<?php

require_once 'db.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$rol = $_POST['rol'];

$contrasenia = hash('sha512', $id);
 
if ($id==''||$nombre == ''||$apellido == ''|| $usuario == ''){
    echo json_encode('error');
}

else {

    $verificar = mysqli_query($con, "SELECT * FROM usuario WHERE  usuario_id='$id'");

    if(mysqli_num_rows($verificar) > 0){

        echo  json_encode('uso');
        
        exit;
    }

    $consulta = mysqli_query($con,"INSERT INTO usuario VALUES ('$id','$nombre','$apellido','$usuario','$rol','$contrasenia')");

    if ($consulta){
        echo json_encode('bien');
    }

    else {
        echo json_encode('error');
    }
}