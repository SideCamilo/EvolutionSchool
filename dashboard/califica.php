<?php
  session_start();
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="../assets/css/bootstrap.css" rel="stylesheet" />
  <link href="../assets/css/font-awesome.css" rel="stylesheet" />
  <link href="../assets/css/style.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
  <!-- JQUERY SCRIPTS -->
  <script src="../assets/js/jquery-1.11.1.js"></script>
  <!-- BOOTSTRAP SCRIPTS -->
  <script src="../assets/js/bootstrap.js"></script>
  <!-- METISMENU SCRIPTS -->
  <script src="../assets/js/jquery.metisMenu.js"></script>
  <!-- CUSTOM SCRIPTS -->
  <script src="../assets/js/custom.js"></script>
  <script src="../assets/js/sweetalert2.js"></script>
  <script src="../assets/js/jspdf.min.js"></script>
  
  <title>Escuela</title>

  <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<header>
<?php
  if(!isset($_SESSION['userid']) || $_SESSION['tipo'] != 2){
    echo "<div class='error-wall load-error'>
      <div class='error-container'>
        <h1>oh no...</h1>
        <h3>Hay un error</h3>
        <h4>Error 404</h4>
        <p>Esta página está restringida para su acceso</p>
        <p>Si tiene algún problema porfavor contacte este número: <b>449 999 9999</b></p>
      </div>
    </div>";
  }else{
?>
<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0;">
      <div class="navbar-header" style="width:100%">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <img src="../assets/img/logo.png" style="max-height:50px"> <p class="titttl" id="texttipo"></p>
          <button class="logout btn btn-primary" href="#" onClick="logout()">SALIR</button>
      </div>
</nav>
</header>
<body>
<div id="wrapper" style="background: #444;"> 
  <nav class="navbar-inverse navbar-side" role="navigation" >
    <div class="sidebar-collapse" >
      <ul class="nav" id="main-menu" >
        <li>
          <a href="index.php">INICIO</a>
        </li>
        <li>
          <a href="#">ALUMNOS <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="altaalumno.php">Alta alumno</a>
            </li>
            <li class="active-menu">
              <a href="califica.php">Calificaciones y promedios</a>
            </li>
            <li>
              <a href="administraalumno.php">Administración Alumno</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="tareas.php">TAREAS</a>
        </li>
      </ul>
    </div>
  </nav>
</div>

<div id="page-wrapper" class="page-wrapper-cls" >
  <div id="page-inner" style="padding: 40px; border: solid 1px #333;">
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="alumnos">Alumnos: </label>
          <select class="form-control" id="alumnos">
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <button type="button" class="btn btn-primary" onclick="VerCalifica()" style="margin-top:30px;">VER CALIFICACIONES</button>
      </div>
    </div>
    <div id="information"></div>
  </div>
</div>
</body>
<script>
window.onload = function what(){
  alumnos_asignados();
};
</script>
  <?php
};
	?>