<?php

require_once 'db.php';

$id = $_GET['id'];

$eliminar = "DELETE FROM ciudad WHERE ciu_id='$id'";

$consulta = mysqli_query($con,$eliminar);

if ($consulta){
    header("location: ../datos.php");
}
else {
    echo "<script> alert('no se pudo realizar') </script>";
}