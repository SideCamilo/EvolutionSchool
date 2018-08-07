<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $query = 'Select * from Tareas
    inner join maestros on Tareas.IdMaestro = maestros.IdMaestro
    inner join alumnouser on Tareas.IdAlumno = alumnouser.IdAlumno
    where User = "'.$_POST['id'].'" order by Entregada, Evaluada';
    $result = mysqli_query($conn,$query);
    $row_sql_result = mysqli_fetch_assoc($result);
    $output_string = '';
    $a = 0;
    do{
        if($row_sql_result['Entregada'] == 0){
            $output_string .= '
            <form action="../assets/php/subirtarea.php" method="POST" enctype="multipart/form-data">
            <input type="text" value="'.$row_sql_result['IdTarea'].'" name="idal" hidden>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="info">Información tarea: </label>
                        <textarea class="form-control" disabled>'.$row_sql_result['Informacion'].'</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="NameMaestro">Maestro: </label>
                        <input type="text" value="'.$row_sql_result['Nombre'].' '.$row_sql_result['Apellido_Paterno'].' '.$row_sql_result['Apellido_Materno'].'" id="NameMaestro" class="form-control" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="archivo">Archivo menor a 2mb: </label>
                        <input type="file" name="file" id="archivo" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary" style="margin-top:30px; width:100%;">SUBIR TAREA</button>
                </div>
            </div>
            </form>
            <hr style="height:1px;border:none;color:#333;background-color:#333;"></hr><br /><br />';  
            }else{
            $output_string .= '<div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="info">Información tarea: </label>
                    <textarea class="form-control" disabled>'.$row_sql_result['Informacion'].'</textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <a href="'.$row_sql_result['Ruta'].'"><button type="button" class="btn btn-primary" style="margin-top:30px; width:100%;">DESCARGAR TAREA</button></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="NameMaestro">Maestro: </label>
                    <input type="text" value="'.$row_sql_result['Nombre'].' '.$row_sql_result['Apellido_Paterno'].' '.$row_sql_result['Apellido_Materno'].'" id="NameMaestro" class="form-control" disabled>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="Cali">Calificación: </label>
                    <input class="form-control" type="text" value="'.$row_sql_result['calificacion'].'" id="Cali" disabled>
                </div>
            </div>
        </div>
        <hr style="height:1px;border:none;color:#333;background-color:#333;"></hr><br /><br />';  
        }
    }while ($row_sql_result=mysqli_fetch_assoc($result));
    print (json_encode("".$output_string.""));
?>