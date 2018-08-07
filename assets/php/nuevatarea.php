<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    if($_POST['id'] == "Todos"){
        $query = 'select * from alumnos where Curso = "'.$_POST['curso'].'";';
        $result = mysqli_query($conn,$query);
        $row_sql_result = mysqli_fetch_assoc($result);
        do{
            $query2 = 'insert into Tareas(IdAlumno, Evaluada, IdMaestro, Informacion, Entregada)
            values ("'.$row_sql_result['IdAlumno'].'",0,'.$_POST['idmaestro'].',"'.$_POST['informacion'].'",0)';
            $result2 = mysqli_query($conn,$query2);
        }while ($row_sql_result=mysqli_fetch_assoc($result));
    }else{
        $query = 'insert into Tareas(IdAlumno, Evaluada, IdMaestro, Informacion, Entregada)
        values ("'.$_POST['id'].'",0,'.$_POST['idmaestro'].',"'.$_POST['informacion'].'",0)';
        $result = mysqli_query($conn,$query);
        $row_sql_result = mysqli_fetch_assoc($result);
    }
?>