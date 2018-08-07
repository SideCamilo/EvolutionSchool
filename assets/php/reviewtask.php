<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $query = 'Select * from Tareas
    inner join maestrouser on Tareas.IdMaestro = maestrouser.IdMaestro
    inner join alumnos on Tareas.IdAlumno = alumnos.IdAlumno
    where User = "'.$_POST['id'].'" AND Entregada = 1 AND Evaluada = 0;';
    $result = mysqli_query($conn,$query);
    $row_sql_result = mysqli_fetch_assoc($result);
    $a = 0;
    $output_string = '';
    if($row_sql_result > 0){
        do{
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
                            <label for="NameAlumno">Alumno: </label>
                            <input type="text" value="'.$row_sql_result['Nombre'].' '.$row_sql_result['Apellido_Paterno'].' '.$row_sql_result['Apellido_Materno'].'" id="NameAlumno" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Cal'.$a.'">Calificación: </label>
                            <input type="number" id="Cal'.$a.'" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" onclick="evaluartarea(\''.$row_sql_result['IdTarea'].'\',\'Cal'.$a.'\')" style="margin-top:30px; width:100%;">CALIFICAR</button>
                        </div>
                    </div>
                </div>
                <hr style="height:1px;border:none;color:#333;background-color:#333;"></hr><br /><br />';
                $a += 1;
        }while ($row_sql_result=mysqli_fetch_assoc($result));
    }else{
        $output_string .= '<p> No hay tareas por revisar </p>'.$row_sql_result;
    }
    print (json_encode("".$output_string.""));
?>