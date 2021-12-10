<?php
include '../../partials/databases.php';

//almacenar datos de la peticion en variables
$apr_id = $_POST['apr_id'];
$fic_num = $_POST['fic_num'];
$cau_des = $_POST['cau_des'];

if($apr_id == "" || $fic_num == "" || $cau_des == ""){
    echo json_encode("Campos Vacios");
}

// almacernar datos en la base de datos
$query = "INSERT INTO desercion (der_fecha, apr_id, fic_numero, cad_codigo, der_fecha_desercion, peticion) VALUES (NOW(), $apr_id, $fic_num, $cau_des, NOW(), 'APRENDIZ')";

$ejecutar = mysqli_query($conex, $query);

//Verificar funcionamiento
if($ejecutar){
    echo json_encode("Bien");
} else{
    echo json_encode("Mal");    
}