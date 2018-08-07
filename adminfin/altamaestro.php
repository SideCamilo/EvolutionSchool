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
        <a href="index.php"><button class="btn btn-success"><span class="subtitle"><span class="glyphicon glyphicon-arrow-left"></span> regresar</span></button></a>
    </div>
    <div class="col-md-1"></div>
    <br />
</div>
<div class="container">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <h1 style="text-align:center">Dar de Alta a un maestro</h1>
        <div class="form-group">
            <p class="formtitle">Nombre:</p>
            <input type="text" class="form-control" id="Nombre">
        </div>
        <div class="form-group">
            <p class="formtitle">Apellido_Paterno: </p>
            <input type="text" class="form-control" id="Apellido_Paterno">
        </div>
        <div class="form-group">
            <p class="formtitle">Apellido_Materno: </p>
            <input type="text" class="form-control" id="Apellido_Materno">
        </div>
        <div class="form-group">
            <p class="formtitle">Teléfono: </p>
            <input type="number" class="form-control" id="Telefono">
        </div>
        <div class="form-group">
            <p class="formtitle">Cargo: </p>
            <input type="text" class="form-control" id="Cargo">
        </div>
        <div class="form-group">
            <p class="formtitle">Correo electrónico: </p>
            <input type="email" class="form-control" id="Correo">
        </div>
        <div class="form-group">
            <p class="formtitle">Fecha de cumpleaños: </p>
            <input type="date" class="form-control" id="Fecha">
        </div>
        <button style="width: 100%" class="btn btn-info" onclick="altamtroadm()">Dar de Alta</button>
    </div>
    <div class="col-md-1"></div>
    </div><br />
</div>
</body>