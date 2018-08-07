<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $query = 'update alumnos set 
    Nombre = "'.$_POST['Nombre'].'",
    Apellido_Paterno = "'.$_POST['Apellido_Paterno'].'",
    Apellido_Materno = "'.$_POST['Apellido_Materno'].'",
    Telefono = "'.$_POST['Telefono'].'",
    Pago = "'.$_POST['pago'].'",
    Nivel = "'.$_POST['Nivel'].'",
    Curso = "'.$_POST['Curso'].'",
    Hora = "'.$_POST['Hora'].'",
    Domicilio = "'.$_POST['Domicilio'].'",
    Tel_tutor = "'.$_POST['Telefono_tutor'].'",
    Parentesco_tutor = "'.$_POST['Parentesco_tutor'].'",
    Entero = "'.$_POST['Entero'].'",
    Observaciones = "'.$_POST['observa'].'",
    Sabatino = "'.$_POST['sabatino'].'",
    IdStatus = '.$_POST['estado'].'
    where IdAlumno = "'.$_POST['idall'].'"';
    $result = mysqli_query($conn,$query);
?>