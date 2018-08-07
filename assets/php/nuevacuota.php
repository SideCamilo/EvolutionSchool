<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $query = 'update alumnos set Cuota = "'.$_POST['cuota'].'",fecha_pago = "'.$_POST['fecha'].'" where IdAlumno = "'.$_POST['id'].'";';
    $result = mysqli_query($conn,$query);
?>