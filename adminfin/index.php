<!DOCTYPE HTML>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="../assets/css/bootstrap.css" rel="stylesheet" />
  <link href="../assets/css/font-awesome.css" rel="stylesheet" />
  <link href="../assets/css/style.css" rel="stylesheet" />
  <!-- JQUERY SCRIPTS -->
  <script src="../assets/js/jquery-1.11.1.js"></script>
  <!-- BOOTSTRAP SCRIPTS -->
  <script src="../assets/js/bootstrap.js"></script>
  <!-- METISMENU SCRIPTS -->
  <script src="../assets/js/jquery.metisMenu.js"></script>
  <!-- CUSTOM SCRIPTS -->
  <script src="../assets/js/custom.js"></script>
  <script src="../assets/js/sweetalert2.js"></script>
  <script src="https://cdn.rawgit.com/CryptoStore/crypto-js/3.1.2/build/rollups/aes.js"></script>
  <script src="https://cdn.rawgit.com/CryptoStore/crypto-js/3.1.2/build/rollups/sha256.js"></script>
  <script src="https://cdn.rawgit.com/CryptoStore/crypto-js/3.1.2/build/components/pad-nopadding-min.js"></script>
  <title>Evolution School</title>

  <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body style="background-color: #808285">
    <div class="container-fluid bnr">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-2">
                    <img src="../assets/img/logo.png" class="img-responsive" style="max-height:60px;">
                </div>
                <div class="col-md-3" style="top:10px">
                    <p class="tittll">|</p><p class="titttl2">Dashboard de Administración</p>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-1" style="top:10px">
                    <button class="logout btn btn-primary" href="#" onClick="logout()">Salir</button>
                </div>
                <div class="col-md-2"></div>
            </div>
    </div>
    <br /><br /><br />
    <div class="container-fluid">
        <br /><br />
        <div class="row">
            <div class="col-md-2"></div>
            <a href="reportes.php"><div class="col-md-2 bloque">
                <img src="../assets/img/report.png" class="img-responsive">
                <div class="caption"><p class="text-center formtitle">REPORTES</p></div>
            </div></a>
            <a href="altamaestro.php"><div class="col-md-2 bloque">
                <img src="../assets/img/teacher.png" class="img-responsive">
                <div class="caption"><p class="text-center formtitle">ALTA DE MAESTRO</p></div>
            </div></a>
            <a href="altaalumno.php"><div class="col-md-2 bloque">
                <img src="../assets/img/alumno.png" class="img-responsive">
                <div class="caption"><p class="text-center formtitle">ALTA DE ALUMNO</p></div>
            </div></a>
            <a href="administracion.php"><div class="col-md-2 bloque">
                <img src="../assets/img/admin.png" class="img-responsive">
                <div class="caption"><p class="text-center formtitle">ADMINISTRACIÓN</p></div>
            </div></a>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>