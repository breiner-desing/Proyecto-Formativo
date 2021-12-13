<?php 

session_start();
$_SESSION['apr_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Contraseña</title>
</head>
<body>
    <form action="" method="post">
        <input type="hidden" id="id" value="<?php echo $_SESSION['apr_id']; ?>" >
        <input type="password" name="" id="contrasenia" placeholder="contraseña">
        <input type="password" id="confirmar" placeholder="confirmar">
        <input type="password" id="nueva" >
        <input type="submit" id="btn" placeholder="nueva contraseña" >
    </form>

    <div id="mensaje"></div>
    <script src="js/contrasena.js"></script>
</body>
</html>