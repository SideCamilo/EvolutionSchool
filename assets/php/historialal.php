<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $query = 'Select * from Calificaciones where IdAlumno = "'.$_POST['id'].'";';

    $result = mysqli_query($conn,$query);
    $row_sql_result = mysqli_fetch_assoc($result);
    $a = 0;
    $objective = mysqli_num_rows($result);
    $output_string = '{ "content": [ { "text": "Historial Academico", "style":"header" },{"table": {"body": [
        ["Curso","Calificacion"],';
    if($objective > 0){
        $a++;
    }

    do{
        if($a == $objective){
            $output_string .= '[
                "'.$row_sql_result['Curso'].'",  "'.$row_sql_result['Calificacion'].'"
            ]';        
        }else{
            $output_string .= '[
                "'.$row_sql_result['Curso'].'",  "'.$row_sql_result['Calificacion'].'"
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