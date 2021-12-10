<?php 

include '../../partials/databases.php';

$id = $_POST['id'];
$password = hash('sha512', $_POST['contrasenia']);
$nueva = hash('sha512',$_POST['nueva']);

if ($password == '' || $id == ''){
    echo json_encode('error');
}
else {

    $verificar = mysqli_query($conex,"SELECT * FROM usuario WHERE usuario_id='$id' AND contrasenia='$password'");

    if(mysqli_num_rows($verificar)>0){
        $cambio = mysqli_query($conex,"UPDATE usuario SET contrasenia='$nueva' WHERE usuario_id='$id'");
        if ($cambio){
            echo json_encode('bien');
        }
        else {
            echo json_encode('no se pudo cambiar contraseña');
        }
    }

    else {
        echo json_encode('no es la contraseña correcta');
    }

}