<?php

//datos para infresar a la base de datos

$host='localhost';
$user='root';
$contra='';
$basededatos = 'bddesercion';

//coneccion

$conex = @mysqli_connect($host,$user,$contra,$basededatos);

//mirar error e la coneccion 

/*

if(!$conex){
    echo (error en coneccion);
}

*/ 

// $contra_s = 'gaby';

// echo hash('sha512', $contra_s);

