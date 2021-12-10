<?php

require_once 'db.php';

$id = $_POST['id'];
$tipoId = $_POST['tipoId'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$numero = $_POST['numero'];
$edad = $_POST['edad'];
$ciudad = $_POST['ciudad'];
$Genero = $_POST['Genero'];
$rh = $_POST['rh'];

$contrasenia = hash('sha512', $id);
if ($id == '' ||$tipoId == '' || $nombre == '' || $apellido == '' || $numero =='' || $edad =='' || $ciudad =='' || $Genero =='' || $rh ==''){
    
    json_encode('llenar datos');
}

else{

    $verificar = mysqli_query($con, "SELECT * FROM aprendiz WHERE  apr_id= '$id' ");

    if(mysqli_num_rows($verificar) > 0){

        echo  json_encode('uso');
        
        exit;
    }

    else{
        $insert = "INSERT INTO aprendiz VALUES ('$id','$nombre','$apellido','$numero','$ciudad','$tipoId','$rh','$Genero','$edad')";
        $consulta = mysqli_query($con, $insert);

        if ($consulta){
            $consulta2 = mysqli_query($con,"INSERT INTO usuario VALUES ('$id','$nombre','$apellido','$nombre','3','$contrasenia')");

            echo json_encode('bien');        

        }
        else{
            echo json_encode('error');
        }
    }
}
