<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    if($_POST['type'] == 1){
        $query = 'Select * from alumnos inner join alumnouser on alumnos.IdAlumno = alumnouser.IdAlumno where User = "'.$_POST['id'].'";';
    }else if($_POST['type'] == 2){
        $query = 'Select * from maestros inner join maestrouser on maestros.IdMaestro = maestrouser.IdMaestro where User = "'.$_POST['id'].'";';
    }
    $result = mysqli_query($conn,$query);
    $row_sql_result = mysqli_fetch_assoc($result);
    do{
            $output_string = "Bienvenido <b>".$row_sql_result['Nombre']." ".$row_sql_result['Apellido_Paterno']." ".$row_sql_result['Apellido_Materno']."</b>";
    }while ($row_sql_result=mysqli_fetch_assoc($result));
    print (json_encode("".$output_string.""));
?>