<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $nowdte = date('Y-m-d');
    $query = 'update alumnos set Cuota = "0",fecha_pago = "0000-00-00" where IdAlumno = "'.$_POST['id'].'";';
    $query .= 'insert into pagos(Cantidad,fecha,IdAlumno) values ("'.$_POST['cuota'].'","'.$nowdte.'","'.$_POST['id'].'");';

    $result = mysqli_multi_query($conn,$query);
?>