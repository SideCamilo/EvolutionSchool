<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $query = 'insert into maestrouser(User, Pass, IdMaestro)values("'.$_POST['user'].'","'.$_POST['pass'].'",'.$_POST['id'].');';
    $result = mysqli_query($conn,$query);
?>