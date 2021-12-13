<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db ='bddesercion';

$con = mysqli_connect($host,$user,$pass,$db);

$id=$_POST['apr_id'];
$nombre=$_POST['apr_nombre'];
$apellido=$_POST['apr_apellido'];
$telefono=$_POST['apr_telefono'];
$genero=$_POST['apr_genero'];
$edad=$_POST['apr_edad'];


$actualizar = "UPDATE aprendiz  SET apr_id='$id',apr_nombre='$nombre', apr_apellido='$apellido', apr_telefono='$telefono', apr_genero='$genero', apr_edad='$edad' WHERE apr_id='$id'";

$resultado=mysqli_query($con, $actualizar);

if ($resultado){
    include "aprendiz.php";
}else{
    echo "no se ah podido actualizar";
}
?>