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
  <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <!-- BOOTSTRAP SCRIPTS -->
  <script src="../assets/js/bootstrap.js"></script>
  <!-- METISMENU SCRIPTS -->
  <script src="../assets/js/jquery.metisMenu.js"></script>
  <!-- CUSTOM SCRIPTS -->
  <script src="../assets/js/custom.js"></script>
  <script src="../assets/js/sweetalert2.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
  <script src='../assets/js/pdfmake/build/pdfmake.min.js'></script>
  <script src='../assets/js/pdfmake/build/vfs_fonts.js'></script>
  
  
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
    <br />
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <a href="index.php"><button class="btn btn-success"><span class="subtitle"><span class="glyphicon glyphicon-arrow-left"></span> regresar</span></button></a>
        </div>
    </div>
</div><br />
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <button type="button" class="btn btn-primary" onclick="cortediario()" style="width:100%;">CORTE</button>
        </div>
        <div class="col-md-4">
            <input type="text" id="rango" class="form-control" name="daterange" value="2018-01-01 - 2018-01-01" />
        </div>
        <div class="col-md-2"></div>
    </div><br />
    <div class="row">
    <div class="col-md-2"></div>
        <div class="col-md-4">
            <button type="button" class="btn btn-primary" onclick="reportealumnoia()" style="width:100%;">ALUMNOS</button>
        </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-primary" onclick="reporteimpagos()" style="width:100%;">IMPAGOS</button>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function() {
    $('input[name="daterange"]').daterangepicker(
        {
            locale: {
                format: 'YYYY-MM-DD'
            }
        }
    );
});
</script>
</body>