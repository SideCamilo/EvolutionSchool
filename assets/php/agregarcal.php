<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $query = 'insert into Calificaciones(IdAlumno, Calificacion, Curso) values ("'.$_POST['idal'].'",'.$_POST['cal'].',"'.$_POST['cur'].'")';
    $result = mysqli_query($conn,$query);
    $row_sql_result = mysqli_fetch_assoc($result);
?>