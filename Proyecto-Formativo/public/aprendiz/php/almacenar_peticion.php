<?php
include '../../partials/databases.php';

//almacenar datos de la peticion en variables
$apr_id = $_POST['apr_id'];
$fic_num = $_POST['fic_num'];

if($apr_id == "" || $fic_num == "" ){
    echo json_encode("Campos Vacios");
}

// almacernar datos en la base de datos
$query = "INSERT INTO desercion (der_fecha, apr_id, fic_numero, cad_codigo, der_fecha_desercion, peticion) VALUES (NOW(), $apr_id, $fic_num, 6, NOW(), 'APRENDIZ')";

$ejecutar = mysqli_query($conex, $query);

//Verificar funcionamiento
if($ejecutar){
    echo json_encode("Bien");
} else{
    echo json_encode("Mal");    
}