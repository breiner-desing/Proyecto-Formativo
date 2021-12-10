<?php
require_once 'db.php';
$id=$_POST['apr_id'];
$verificar2=mysqli_query($conexion,"SELECT * FROM desercion WHERE apr_id='$id'");
$verificar=mysqli_query($conexion,"SELECT * FROM aprendiz WHERE apr_id='$id'");
if(mysqli_num_rows($verificar2) < 1){
    if(mysqli_num_rows($verificar) < 1){
        echo json_encode('no existe');
    }else{
            if(strlen($_POST['apr_id']) >= 1 &&
               strlen($_POST['fic_numero']) >=1 &&
               strlen($_POST['cad_codigo']) >= 1){
        
                $apr_id =($_POST['apr_id']);
                $fic_numero =($_POST['fic_numero']);
                $cad_codigo = ($_POST['cad_codigo']);
               
        
        
                $consulta = "INSERT INTO desercion (apr_id, fic_numero, cad_codigo, der_fase, peticion)
                VALUES ('$apr_id','$fic_numero','$cad_codigo','Pre','INSTRUCTOR')";
                $resultado = mysqli_query($conexion, $consulta);
                
                if($resultado){
                    echo json_encode('bien');
                }else{
                    echo  json_encode('error');
                }
            }
        
    }
}
else{
    echo json_encode('desertado');
}



