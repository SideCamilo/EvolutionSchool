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
<div class="container">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <br />
        <a href="index.php"><button class="btn btn-success"><span class="subtitle"><span class="glyphicon glyphicon-arrow-left"></span> regresar</span></button></a>
    </div>
    <div class="col-md-1"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h1 style="text-align:center">Elegir opción</h1>
            <div class="form-group">
                <p class="formtitle">Tipo:</p>
                <select class="form-control" id="tipo" onchange="opcionesAdmin()">
                    <option value="1">Maestro</option>
                    <option value="2">Alumno</option>
                </select><br/>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <div id="adminis"></div>
</div>
<div class="container">
    <div id="data"></div>
</div>
<script>
window.onload = function what(){
    opcionesAdmin(1);

};
</script>
</body>