<?php

//llamar base de datos
require_once 'databases.php';

// //llamar datos
$id = $_POST['id'] ;
$contra_s = $_POST['contrasenia'];



//encriptacion

$contra = hash('sha512', $contra_s);


$consulta="SELECT * FROM usuario where usuario_id='$id' and contrasenia='$contra'";

$resultado = mysqli_query($conex, $consulta);

$filas= mysqli_num_rows($resultado);



if($filas){
    $consulta = mysqli_query($conex,"SELECT usuario_nombre, usuario_apellido, usuario_login, Rol_name FROM usuario INNER JOIN roles ON usuario.Rol_id = roles.Rol_id  where usuario_id ='$id'");
    $respuest = mysqli_fetch_assoc($consulta);

    $respuesta = $respuest['Rol_name'];

    echo  json_encode($respuesta);
    
    session_start();
    $_SESSION['apr_id']=$id;
    $_SESSION['ROL_NAME']  = $respuest['Rol_name'];
    $_SESSION['NOM_USU'] = $respuest['usuario_nombre'];
    $_SESSION['APE_USU']= $respuest['usuario_apellido'];
    $_SESSION['LOG_USU'] = $respuest['usuario_login'];

    exit;
}
else {
    echo json_encode($respuesta ['error'] = "error");
}
mysqli_free_result($resultado);
mysqli_close($conex);