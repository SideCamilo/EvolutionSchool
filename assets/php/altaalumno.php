<?php
    header("Content-Type: application/json; charset=UTF-8");
    $obj = json_decode(file_get_contents('php://input'), true);
    
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $Nombre = $obj['Nombre'];
    $Apellido_P = $obj['Apellido_Paterno'];
    $Apellido_M = $obj['Apellido_Materno'];

    $id = 'E-'.date("ym").substr($Nombre, 0,2).substr($Apellido_P, 0,1).substr($Apellido_M, 0,1);
    $query = 'insert into alumnos(IdAlumno, Nombre, Apellido_Paterno, Apellido_Materno, Telefono, Nivel, Curso, Hora, Domicilio, Tel_tutor, Parentesco_tutor, Entero, IdMaestro, IdStatus, Sabatino, faltas)
              values ("'.$id.'","'.$obj['Nombre'].'","'.$obj['Apellido_Paterno'].'","'.$obj['Apellido_Materno'].'","'.$obj['Telefono'].'","'.$obj['Nivel'].'","'.$obj['Curso'].'","'.$obj['Hora'].'","'.$obj['Domicilio'].'","'.$obj['Telefono_tutor'].'","'.$obj['Parentesco_tutor'].'","'.$obj['Entero'].'",1,1,"'.$obj['sabatino'].'",0);';
    $result = mysqli_query($conn,$query);
    echo $result;
?>