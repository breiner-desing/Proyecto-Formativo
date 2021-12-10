<?php
include '../partials/databases.php';

session_start();
$_SESSION['ROL_NAME'];
$_SESSION['apr_id'];

if (isset($_SESSION['ROL_NAME'])) {
    if ($_SESSION['ROL_NAME']  == 'INSTRUCTOR') {
        header('location: profesor.php');
    } else if ($_SESSION['ROL_NAME'] == 'DIRECTOR') {
        header('location: ../director/director.php');
    }
} else {
    header('location: ../login.html');
}

//Consultas Select
$consulta = mysqli_query($conex, "SELECT * FROM causa_desercion");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css/estilos.css">
    <title>Peticion de desercion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos.css/estilo.css">
</head>

<body>
    <!-- Barra de navegacion -->
    <header style="display:inline-block; background: rgb(252, 149, 0, 0.80); width: 100%;">
        <label for="btn-menu" style="display:inline-block;  margin: 3px; padding: 0px 5px 15px 10px; position: relative;"><img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/44/0000/external-menu-basic-ui-elements-flatart-icons-outline-flatarticons-1.png" /></label>
        <input type="checkbox" id="btn-menu">
        <div class="container-menu">
            <div class="cont-menu">
                <nav>
                    <a href="./aprendiz.php"><img src="https://setalpro.cdtiapps.com/img/logo_sena.ico" alt=""></a>
                    <a style="color:#ffff"><?php echo "Sesion: ", $_SESSION['NOM_USU'], " ", $_SESSION['APE_USU'] ?></a>
                    <a href="./aprendiz.php">Inicio</a>
                    <a href="php/cerrar.php" class="btn btn-outline-danger ">Cerrar Sesion</a>
                </nav>
                <label for="btn-menu">✖️</label>
            </div>
        </div>
        <h3 style="display:inline-block;  padding: 25px 5px 15px 45px;">Pedir desercion</h3>
    </header>
    <!-- Formulario de peticion -->
    <div style="opacity: .85; margin-top: 50px; padding: 100px 100px 100px 100px; rgba(255, 255, 255, 0.28); border-radius:10px; border: 1px solid rgba(0, 0, 0,0.25);">
        <div class="container" style="margin-right: -95px;">
            <div class="row row-cols-2">
                <form method="POST">


                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text">Ficha</label>
                        </div>
                        <input id="apr_id" type="hidden" value="<?php echo $_SESSION['apr_id'] ?>" placeholder="N° de Identificacion" name="apr_id"></input>
                        <select class="custom-select" name="fic_num" id="fic_num">
                            <option value="">Ficha</option>
                            <?php
                            $ficha = mysqli_query($conex, "SELECT * FROM ficha INNER JOIN programa ON ficha.pro_codigo=programa.pro_codigo");
                            while ($row = mysqli_fetch_assoc($ficha)) { ?>
                                <option value="<?php echo $row['fic_numero'] ?>"><?php echo $row['fic_numero']; ?>|| <?php echo $row['pro_descripcion'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                    </div>
                    <br>
                    <input id="button" type="submit" value="Enviar Petición"></input>
                </form>
            </div>
            <div id="msg"></div>
        </div>
    </div>
    <script src="./js/main.js"></script>
</body>

</html>