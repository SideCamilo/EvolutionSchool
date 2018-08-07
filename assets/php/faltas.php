<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    if($_POST['value'] == 1){
        $query = 'update alumnos set faltas = faltas+1 where IdAlumno = "'.$_POST['id'].'";';
    }else if($_POST['value'] == 2){
        $query = 'update alumnos set faltas = faltas-1 where IdAlumno = "'.$_POST['id'].'";';
    }
    $result = mysqli_query($conn,$query);
    echo $result;
?>