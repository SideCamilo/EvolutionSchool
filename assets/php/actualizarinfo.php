<?php
    header("Content-Type: application/json; charset=UTF-8");
    $obj = json_decode($_GET["afdsaw"], false);

    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $query = 'update alumnos set Nivel = "'.$obj->dato1.'",Curso = "'.$obj->dato2.'" where IdAlumno = "'.$obj->Id.'";';
    $result = mysqli_query($conn,$query);
    echo $result;
?>