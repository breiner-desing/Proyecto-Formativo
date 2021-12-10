<?php

require_once 'db.php';

$id = $_GET['id'];

$consulta = mysqli_query($con, "DELETE FROM desercion WHERE der_id='$id'");

header('location: ../solicitud.php');