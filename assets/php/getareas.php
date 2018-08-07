<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $query = 'Select count(IdTarea) as tareas from Tareas
    inner join maestros on Tareas.IdMaestro = maestros.IdMaestro
    inner join maestrouser on Tareas.IdMaestro = maestrouser.IdMaestro
    where User = "'.$_POST['id'].'" AND Evaluada = 0 AND Entregada = 1;';
    $result = mysqli_query($conn,$query);
    $row_sql_result = mysqli_fetch_assoc($result);
    
    do{
            $output_string = '<div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Usted tiene un total de: </h3>
                    </div>
                    <div class="panel-body">
                        '.$row_sql_result['tareas'].' tareas
                    </div>
                </div>
                </div>
            </div>';
    }while ($row_sql_result=mysqli_fetch_assoc($result));
    print (json_encode("".$output_string.""));
?>