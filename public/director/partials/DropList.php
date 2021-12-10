<?php

//llamar base de datos
require_once 'db.php';

echo $id = $_GET['id'];

$eliminar = "DELETE FROM causa_desercion WHERE cad_codigo='$id'";

$consulta = mysqli_query($con,$eliminar);

if ($consulta){
    header("location: ../datos.php");
}
else {
    echo "<script> alert('no se pudo realizar') </script>";
}