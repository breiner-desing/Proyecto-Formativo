<header style="display:inline-block; background: rgb(252, 149, 0, 0.80); width: 100%;">
<label for="btn-menu" style="display:inline-block;  margin: 3px; padding: 0px 5px 15px 10px; position: relative;"><img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/44/0000/external-menu-basic-ui-elements-flatart-icons-outline-flatarticons-1.png"/></label>
<input type="checkbox" id="btn-menu">
<div class="container-menu">
	<div class="cont-menu">
		<nav>
            <div style="padding: 25px">
                <img src="https://setalpro.cdtiapps.com/img/logo_sena.ico" alt="">
            </div>
            <a style="color:#ffff"><?php echo "Sesion: ",$_SESSION['NOM_USU'], " ", $_SESSION['APE_USU'] ?></a>
            <a href="instructor.php">Instructor</a>
			<a href="peticiones.php">Peticiones</a>
            <a href="desercion.php">Solicitud</a>
            <a href="contrasena.php">contraseña</a>
            <a href="../director/partials/cerrar.php" class="btn btn-outline-danger ">Cerrar Sesion</a>
		</nav>
		<label for="btn-menu">✖️</label>
	</div>
</div>
