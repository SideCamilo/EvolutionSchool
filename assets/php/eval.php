<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $query = 'update Tareas set calificacion = '.$_POST['cal'].', Evaluada = 1 where IdTarea = '.$_POST['id'].';';
    $result = mysqli_query($conn,$query);
    echo $result;
?>