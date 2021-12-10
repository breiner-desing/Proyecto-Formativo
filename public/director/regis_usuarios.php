<?php
session_start()
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style-css/menu.css">
    <title>Registrar Usuarios</title>
</head>

<body>

    <?php
    include_once './barra_navegacion.php';
    ?>


    <h3 style="display:inline-block;  padding: 25px 5px 15px 45px;">Registro Usuarios</h3>
    </header>
    <br>
    <div class="container m-5" class="container" style=" opacity: .85; margin-top: 50px; padding: 50px 50px 50px 50px; rgba(255, 255, 255, 0.28); border-radius:10px; border: 1px solid rgba(0, 0, 0,0.25);">
        <h3>Registro de Usuario</h3>
        <form action="" method="post">
            <input type="number" id="id2" placeholder="Identificacion">
            <input type="text" id="nombre2" placeholder="Nombres">
            <input type="text" id="apellido2" placeholder="Apellido">
            <input type="text" id="usuario" placeholder="Usuario">
            <select id="rol">
                <option value="">Cargo</option>
                <option value="2">Instructor</option>
                <option value="1">Director</option>
            </select>
            <input type="submit" id="btn2" value="Enviar">
        </form>
    </div>

    <div class="container" id="mensaje2"></div>

    <script src="js/usu.js"></script>
</body>

</html>