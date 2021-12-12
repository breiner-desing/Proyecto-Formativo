<?php
require_once 'partials/db.php';
session_start();
$_SESSION['ROL_NAME'];

if (isset($_SESSION['ROL_NAME'])) {
  if ($_SESSION['ROL_NAME']  == 'INSTRUCTOR') {
    header('location: profesor.php');
  } else if ($_SESSION['ROL_NAME'] == 'ESTUDIANTE') {
    header('location: estudiante.php');
  }
} else {
  header('location: ../login.html');
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/estilo.css">
  <link rel="stylesheet" href="style-css/menu.css">
  <title>Configurar Datos</title>
</head>

<body>

  <?php
  include_once './barra_navegacion.php';
  ?>
  <h3 style="display:inline-block;  padding: 25px 5px 15px 45px;">Configuracion</h3>
  </header>
  <div class="container" style=" opacity: .85; margin-top: 50px; padding: 50px 50px 50px 50px; rgba(255, 255, 255, 0.28); border-radius:10px; border: 1px solid rgba(0, 0, 0,0.25);">
    <h3>Datos y Configuaciones</h3>
    <div class="row" style="margin-top: 50px">
      <!-- height: 30rem; -->

      <!-- tipo de sangre -->
      <div class=" col-4">
        <div class="card m-5" style="width: 24rem; height: 38rem;">
          <h5>TIPO RH</h5>
          <div class="scroll">
            <ul class="list-group list-group-flush">
              <?php

              $consulta = mysqli_query($con, "SELECT * FROM rh");

              while ($row = mysqli_fetch_assoc($consulta)) { ?>
                <li class="list-group-item">Tipo de rh: <?php echo $row['rh_descripcion'] ?>
                 <br> 
                 <a class="eliminar" href="partials/DropList2.php?id=<?php echo $row['rh_id'] ?>">ELIMINAR |</a>
                 <a  href="partials/editrh.php?id=<?php echo $row['rh_id'] ?>">| EDITAR</a>
                </li>
              <?php } ?>
              <li class="list-group-item" id="mensaje"></li>
              <li class="list-group-item">
                <form action="" method="post">
                  <input id="rh" type="text">
                  <input id="btn" type="submit" value="Agregar">
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- causa de desercion -->
      <div class=" col-4 offset-md-2">
        <div class="card m-5" style="width: 24rem;  height: 38rem; ">
          <h5>CAUSA DESERCION</h5>
          <div class="scroll">
            <ul class="list-group list-group-flush">
              <?php

              $consulta = mysqli_query($con, "SELECT * FROM causa_desercion");

              while ($row = mysqli_fetch_assoc($consulta)) { ?>
                <li class="list-group-item ">Causa: <?php echo $row['cad_descripcion'] ?>||Estado: <?php echo $row['cad_mat_estado'] ?> <br> <a class="eliminar" href="partials/DropList.php?id=<?php echo $row['cad_codigo'] ?>">ELEMINAR</a>
              <a href="partials/editcausa.php?id=<?php echo $row['cad_codigo'] ?>">EDITAR</a></li>
              <?php } ?>
              <li class="list-group-item" id="mensaje2"></li>
              <li class="list-group-item">
                <form action="" method="post">
                  <input type="text" id="causa">
                  <input id="btn2" type="submit" value="Agregar">
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row" style="margin-top: 50px">

      <!-- tipo id -->
      <div class="col-4">
        <div class="card m-5" style="width: 25rem; height: 38rem; ">
          <h5>TIPO ID</h5>
          <div class="scroll">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Tipo Id</li>
              <?php

              $consulta = mysqli_query($con, "SELECT * FROM tipo_id");

              while ($row = mysqli_fetch_assoc($consulta)) { ?>
                <li class="list-group-item ">Sigla: <?php echo $row['tii_sigla'] ?> || <?php echo $row['tii_descripcion'] ?> <br>
                  <a class="eliminar" href="partials/DropList3.php?id=<?php echo $row['tii_id'] ?>">ELIMINAR</a>
                  <a href="partials/editid.php?id=<?php echo $row['tii_id'] ?>">EDITAR</a>
                </li>
              <?php } ?>
              <li id="mensaje3" class="list-group-item"></li>
              <li class="list-group-item">
                <form action="" method="post">
                  <input id="id" type="text" placeholder="Sigla">
                  <input id="id2" type="text" placeholder="Descrpcion">
                  <input id="btn3" type="submit" value="Agregar">
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- programa -->
      <div class="col-4 offset-md-2">
        <div class="card m-5" style="width: 25rem; height: 38rem; ">
          <h5>PROGRAMAS</h5>
          <div class="scroll">
            <ul class="list-group list-group-flush">
              <?php

              $consulta = mysqli_query($con, "SELECT * FROM programa");

              while ($row = mysqli_fetch_assoc($consulta)) { ?>
                <li class="list-group-item ">Descrpcion: <?php echo $row['pro_descripcion'] ?> || Estado: <?php echo $row['pro_estado'] ?>
                  <a class="eliminar" href="partials/DropList4.php?id=<?php echo $row['pro_codigo'] ?>">ELIMINAR</a>||<a href="partials/editprograma.php?id=<?php echo $row['pro_codigo'] ?>">EDITAR</a>
                </li>
              <?php } ?>
              <li class="list-group-item" id="mensaje4"></li>
              <li class="list-group-item">
                <form action="" method="post">
                  <input id="descripcion" type="text" placeholder="Descripción">
                  <input id="estado" type="text" placeholder="Estado">
                  <input id="btn4" type="submit" value="Agregar">
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row" style="margin-top: 50px">

      <!-- departamento -->
      <div class="col-4">
        <div class="card m-5" style="width: 25rem; height: 38rem;">
          <h5>DEPARTAMENTO</h5>
          <div class="scroll">
            <ul class="list-group list-group-flush">
              <?php

              $consulta = mysqli_query($con, "SELECT * FROM depto");

              while ($row = mysqli_fetch_assoc($consulta)) { ?>
                <li class="list-group-item ">Codigo <?php echo $row['dep_codigo'] ?> || Departamento <?php echo $row['dep_nombre'] ?><br>
                  <a class="eliminar" href="partials/DropList5.php?id=<?php echo $row['dep_codigo'] ?>">ELIMINAR</a>||<a href="partials/editdep.php?id=<?php echo $row['dep_codigo'] ?>">EDITAR</a>
                </li>
              <?php } ?>
              <li id="mensaje5" class="list-group-item"></li>
              <li class="list-group-item">
                <form action="" method="post">
                  <input id="codigo" type="number" placeholder="Codigo">
                  <input id="departamento" type="text" placeholder="Departamento">
                  <input id="btn5" type="submit" value="Agregar">
                </form>
              </li>

            </ul>
          </div>
        </div>
      </div>


      <!-- ciudad -->
      <div class="col-4 offset-md-2">
        <div class="card m-5" style="width: 24rem; height: 38rem;">
          <h5>CIUDADES</h5>
          <div class="scroll">
            <ul class="list-group list-group-flush">
              <?php

              $consulta = mysqli_query($con, "SELECT * FROM ciudad");

              while ($row = mysqli_fetch_assoc($consulta)) { ?>
                <li class="list-group-item ">Codigo: <?php echo $row['ciu_id'] ?> ciudad: <?php echo $row['ciu_nombre'] ?><br>
                  <a class="eliminar" href="partials/DropList6.php?id=<?php echo $row['ciu_id'] ?>">ELIMINAR</a>
                  <a href="partials/editciudad.php?id=<?php echo $row['ciu_id'] ?>">EDITAR</a>
                </li>
              <?php } ?>
              <li id="mensaje6" class="list-group-item"></li>
              <li class="list-group-item">
                <form action="" method="post">
                  <input type="number" id="postal" placeholder="Codigo">
                  <input type="text" id="ciudad" placeholder="Ciudad">
                  <input type="number" id="dep" placeholder="Departamento">
                  <input id="btn6" type="submit" value="Agregar">
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row" style="margin-top: 50px">

      <!--ficha-->
      <div class="col-4">
        <div class="card m-5" style="width: 25rem; height: 38rem;">
          <h5>FICHA</h5>
          <div class="scroll">
            <ul class="list-group list-group-flush">
              <?php

              $programa = mysqli_query($con, "SELECT * FROM programa");

              $centro = mysqli_query($con, "SELECT * FROM centro");

              $consulta = mysqli_query($con, "SELECT * FROM ficha INNER JOIN programa ON ficha.pro_codigo=programa.pro_codigo");

              while ($row = mysqli_fetch_assoc($consulta)) { ?>
                <li class="list-group-item ">FICHA: <?php echo $row['fic_numero'] ?> || PROGRAMA <?php echo $row['pro_descripcion'] ?><br>
                  <a class="eliminar" href="partials/DropList7.php?id=<?php echo $row['fic_numero'] ?>">ELIMINAR</a>
                </li>
              <?php } ?>
              <li id="mensaje7" class="list-group-item"></li>
              <li class="list-group-item">
                <form action="" method="post">
                  <input id="ficha" type="number" placeholder="Ficha">
                  <div class="container my-3">
                    <select class="  form-select" name="" id="programa">
                      <option value="">Programa</option>
                      <?php while ($row = mysqli_fetch_assoc($programa)) { ?>

                        <option value="<?php echo $row['pro_codigo'] ?>"><?php echo $row['pro_descripcion'] ?></option>

                      <?php } ?>
                    </select>
                  </div>
                  <div class="container my-3">
                    <select class="  form-select" name="" id="centro">
                      <option value="">Centro</option>
                      <?php while ($row = mysqli_fetch_assoc($centro)) { ?>

                        <option value="<?php echo $row['cen_codigo'] ?>"><?php echo $row['cen_descripcion'] ?></option>

                      <?php } ?>
                    </select>
                  </div>
                  <label for="">INICIO</label>
                  <input type="date" class="my-3" name="" id="inicio"> <br>
                  <label for="">FINAL</label>
                  <input type="date" name="" class="my-3" id="final">
                  <input id="btn7" type="submit" value="Agregar">
                </form>
              </li>

            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script src="js/List.js"></script>

</body>

</html>