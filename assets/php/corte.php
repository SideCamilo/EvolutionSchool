<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $query = 'select * from pagos inner join alumnos on pagos.IdAlumno = alumnos.IdAlumno where fecha between "'.$_POST['startdate'].'" and "'.$_POST['enddate'].'"
    order by fecha';

    $result = mysqli_query($conn,$query);
    $row_sql_result = mysqli_fetch_assoc($result);
    $a = 0;
    $objective = mysqli_num_rows($result);
    $output_string = '{ "content": [ { "text": "Corte '.$_POST['startdate'].' al '.$_POST['enddate'].'", "style":"header" },{"table": {"body": [
        ["Nombre Alumno","Pago", "Fecha de pago"],';
    if($objective > 0){
        $a++;
    }
    do{
        if($a == $objective){
            $output_string .= '[
                "'.$row_sql_result['Nombre'].' '.$row_sql_result['Apellido_Paterno'].' '.$row_sql_result['Apellido_Materno'].'","'.$row_sql_result['Cantidad'].'",  "'.$row_sql_result['fecha'].'"
            ]';        
        }else{
            $output_string .= '[
                "'.$row_sql_result['Nombre'].' '.$row_sql_result['Apellido_Paterno'].' '.$row_sql_result['Apellido_Materno'].'","'.$row_sql_result['Cantidad'].'",  "'.$row_sql_result['fecha'].'"
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
    }
}}';
    print (json_encode("".$output_string.""));
?>