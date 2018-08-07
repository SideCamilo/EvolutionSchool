<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $query = 'insert into cita_asesor(IdAlumno, fecha)values("'.$_POST['id'].'","'.$_POST['fecha'].'");';
    $result = mysqli_query($conn,$query);
?>