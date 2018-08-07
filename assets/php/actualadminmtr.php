<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $query = 'update maestros set 
    Nombre = "'.$_POST['Nombre'].'",
    Apellido_Paterno = "'.$_POST['Apellido_Paterno'].'",
    Apellido_Materno = "'.$_POST['Apellido_Materno'].'",
    Telefono = "'.$_POST['Telefono'].'",
    IdStatus = '.$_POST['estado'].',
    Cargo = "'.$_POST['cargo'].'",
    Email = "'.$_POST['email'].'",
    Fecha_cumpleanios = "'.$_POST['fechacum'].'"
    where IdMaestro = '.$_POST['idall'].';';
    $result = mysqli_query($conn,$query);
?>