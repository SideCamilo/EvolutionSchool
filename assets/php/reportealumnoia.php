<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $query = 'select * from alumnos left join alumnouser on alumnos.IdAlumno = alumnouser.IdAlumno inner join status on alumnos.IdStatus = status.IdStatus order by Nombre';

    $result = mysqli_query($conn,$query);
    $row_sql_result = mysqli_fetch_assoc($result);
    $a = 0;
    $objective = mysqli_num_rows($result);
    $output_string = '{ "pageOrientation": "landscape","content": [ { "text": "Reporte alumnos '.date('Y-m-d').'", "style":"header" },{"style":"smalltext","table": {"body": [
        ["Nombre Alumno","Telefono", "Cuota", "Fecha a pagar", "Pago", "Nivel", "Curso", "Hora", "Domicilio", "Telefono tutor", "Parentesco_tutor", "Entero", "Observaciones", "Estado", "Usuario", "Contraseña"],';
    if($objective > 0){
        $a++;
    }
    do{
        if($a == $objective){
            $output_string .= '[
                "'.$row_sql_result['Nombre'].' '.$row_sql_result['Apellido_Paterno'].' '.$row_sql_result['Apellido_Materno'].'","'.$row_sql_result['Telefono'].'","'.$row_sql_result['Cuota'].'","'.$row_sql_result['fecha_pago'].'","'.$row_sql_result['Pago'].'","'.$row_sql_result['Nivel'].'","'.$row_sql_result['Curso'].'","'.$row_sql_result['Hora'].'","'.$row_sql_result['Domicilio'].'","'.$row_sql_result['Tel_tutor'].'","'.$row_sql_result['Parentesco_tutor'].'","'.$row_sql_result['Entero'].'","'.$row_sql_result['Observaciones'].'","'.$row_sql_result['Estado'].'","'.$row_sql_result['User'].'","'.$row_sql_result['Pass'].'"
            ]';        
        }else{
            $output_string .= '[
                "'.$row_sql_result['Nombre'].' '.$row_sql_result['Apellido_Paterno'].' '.$row_sql_result['Apellido_Materno'].'","'.$row_sql_result['Telefono'].'","'.$row_sql_result['Cuota'].'","'.$row_sql_result['fecha_pago'].'","'.$row_sql_result['Pago'].'","'.$row_sql_result['Nivel'].'","'.$row_sql_result['Curso'].'","'.$row_sql_result['Hora'].'","'.$row_sql_result['Domicilio'].'","'.$row_sql_result['Tel_tutor'].'","'.$row_sql_result['Parentesco_tutor'].'","'.$row_sql_result['Entero'].'","'.$row_sql_result['Observaciones'].'","'.$row_sql_result['Estado'].'","'.$row_sql_result['User'].'","'.$row_sql_result['Pass'].'"
            ],';
        }
        $a++;
    }while ($row_sql_result=mysqli_fetch_assoc($result));
    $output_string .= '
    ]
}
}],
"styles": {
    "header": {
        "fontSize": 18,
        "bold": true
    },
    "smalltext": {
        "fontSize": 4
    }
}}';
    print (json_encode("".$output_string.""));
?>