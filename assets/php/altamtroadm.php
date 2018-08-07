<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");
    
    $query = 'insert into maestros(Nombre, Apellido_Paterno, Apellido_Materno, Telefono, IdStatus, Cargo, Email, Fecha_cumpleanios)
    values ("'.$_POST['Nombre'].'","'.$_POST['Apellido_Paterno'].'","'.$_POST['Apellido_Materno'].'","'.$_POST['Telefono'].'",1,"'.$_POST['Cargo'].'","'.$_POST['Correo'].'","'.$_POST['Fecha'].'");';
    $result = mysqli_query($conn,$query);
    $row_sql_result = mysqli_fetch_assoc($result);
?>