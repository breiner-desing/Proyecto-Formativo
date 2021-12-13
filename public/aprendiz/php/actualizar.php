<?php

include '../../partials/databases.php';


$id=$_POST['id'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$telefono=$_POST['telefono'];
$genero=$_POST['genero'];
$edad=$_POST['edad'];


$actualizar = "UPDATE aprendiz  SET apr_nombre='$nombre', apr_apellido='$apellido', apr_telefono='$telefono', apr_genero='$genero', apr_edad='$edad' WHERE apr_id='$id'";

$resultado=mysqli_query($conex, $actualizar);

if ($resultado){
    echo "<script>location.href = '../aprendiz.php'</script>";
}else{
    echo "no se ah podido actualizar";
}
