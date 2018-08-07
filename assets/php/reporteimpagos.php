<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $query = 'select * from alumnos where fecha_pago < CURDATE() order by Nombre';

    $result = mysqli_query($conn,$query);
    $row_sql_result = mysqli_fetch_assoc($result);
    $a = 0;
    $objective = mysqli_num_rows($result);
    $output_string = '{ "pageOrientation": "landscape","content": [ { "text": "Reporte impagos '.date('Y-m-d').'", "style":"header" },{"style":"smalltext","table": {"body": [
        ["Nombre Alumno","fecha_pago"],';
    if($objective > 0){
        $a++;
    }
    do{
        if($row_sql_result['fecha_pago'] == '0000-00-00'){
        }else{
            if($a == $objective){
                $output_string .= '[
                    "'.$row_sql_result['Nombre'].' '.$row_sql_result['Apellido_Paterno'].' '.$row_sql_result['Apellido_Materno'].'","'.$row_sql_result['fecha_pago'].'"
                ]';        
            }else{
                $output_string .= '[
                    "'.$row_sql_result['Nombre'].' '.$row_sql_result['Apellido_Paterno'].' '.$row_sql_result['Apellido_Materno'].'","'.$row_sql_result['fecha_pago'].'"
                ],';
            }
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
        "fontSize": 12
    }
}}';
    print (json_encode("".$output_string.""));
?>