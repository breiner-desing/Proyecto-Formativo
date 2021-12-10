<?php

require_once 'db.php';

$id = $_GET['id'];

$eliminar = "DELETE FROM tipo_id WHERE tii_id='$id'";

$consulta = mysqli_query($con,$eliminar);

if ($consulta){
    header("location: ../datos.php");
}
else {
    echo "<script> alert('no se pudo realizar') </script>";
}