<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");
    
    $query = 'insert into alumnos(Nombre, Apellido_Paterno, Apellido_Materno, Exp, Telefono, Cuota, Pago, Nivel, Curso, Hora, Domicilio, Tel_tutor, Parentesco_tutor, Entero, Observaciones, IdMaestro, IdStatus, Sabatino, faltas)
    values ("'.$_POST['Nombre'].'","'.$_POST['Apellido_Paterno'].'","'.$_POST['Apellido_Materno'].'","'.$_POST['exp'].'","'.$_POST['Telefono'].'","0","'.$_POST['pago'].'","'.$_POST['Nivel'].'","'.$_POST['Curso'].'"
    ,"'.$_POST['Hora'].'","'.$_POST['Domicilio'].'","'.$_POST['Telefono_tutor'].'","'.$_POST['Parentesco_tutor'].'","'.$_POST['Entero'].'","'.$_POST['observa'].'",0,1,"'.$_POST['sabatino'].'",0);';
    $result = mysqli_query($conn,$query);
    $row_sql_result = mysqli_fetch_assoc($result);
?>