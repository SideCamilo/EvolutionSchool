<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $query = 'Select * from alumnos inner join maestrouser on alumnos.IdMaestro = maestrouser.IdMaestro where User = "'.$_POST['id'].'" order by Nombre;';
    $result = mysqli_query($conn,$query);
    $row_sql_result = mysqli_fetch_assoc($result);

    $output_string = '';

    do{
        $output_string .= '<option value="'.$row_sql_result['IdAlumno'].'">'.$row_sql_result['Nombre'].' '.$row_sql_result['Apellido_Paterno'].' '.$row_sql_result['Apellido_Materno'].'</option>';
    }while ($row_sql_result=mysqli_fetch_assoc($result));
    print (json_encode("".$output_string.""));
?>