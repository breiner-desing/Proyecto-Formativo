<?php
include("db.php");
$id=$_GET['id'];
echo $id;


$pepito= mysqli_query ($conexion,"UPDATE desercion  SET peticion='INSTRUCTOR' WHERE der_id='$id'");
if($pepito){
  header("location:peticiones.php");
}

 ?>
