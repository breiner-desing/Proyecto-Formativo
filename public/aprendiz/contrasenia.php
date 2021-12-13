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
<header style="display:inline-block; background: rgb(252, 149, 0, 0.80); width: 100%;">
    <h3 style="display:inline-block;  padding: 25px 5px 15px 45px;">Sesión iniciada como: <?php echo $_SESSION['NOM_USU'], " ", $_SESSION['APE_USU'] ?></h3>
  </header>

   <div class="container" class="container" style="opacity: .85; margin-top: 50px; padding: 50px 50px 50px 50px; rgba(255, 255, 255, 0.28); border-radius:10px; border: 1px solid rgba(0, 0, 0,0.25);">
   <h3 style="margin-bottom: 30px; margin-left: 20px;">Cambio de contraseña</h3>
   <form action="" method="post">
        <input type="hidden" id="id" value="<?php echo $_SESSION['apr_id']; ?>" >
        <input type="password" name="" id="contrasenia" placeholder="contraseña">
        <input type="password" id="confirmar" placeholder="confirmar">
        <input type="password" id="nueva" placeholder="nueva contraseña">
        <input type="submit" id="btn" >
    </form>

    <div id="mensaje"></div>
    <script src="js/password.js"></script>
    </div>
</body>
</html>