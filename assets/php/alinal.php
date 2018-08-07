<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $query = 'Select Nombre, count(IdTarea) as Tareas, Curso, faltas from alumnos
    left join Tareas on alumnos.IdAlumno = Tareas.IdAlumno
    inner join maestrouser on alumnos.IdMaestro = maestrouser.IdMaestro
    where User = "'.$_POST['id'].'"
    group by Nombre
    order by faltas desc;';
    $result = mysqli_query($conn,$query);
    $row_sql_result = mysqli_fetch_assoc($result);
    $output_string = '<table class = "table" style = "background-color: white;">
    <thead>
        <tr>
            <th>Nombre Alumno</th>
            <th>Tareas</th>
            <th>Curso</th>
            <th>faltas</th>
        </tr>
    </thead>';
    do{
        if($row_sql_result['faltas'] == 0){
            $output_string .= '<tr>
                <td>'.$row_sql_result['Nombre'].'</td>
                <td>'.$row_sql_result['Tareas'].'</td>
                <td>'.$row_sql_result['Curso'].'</td>
                <td style="color: green">'.$row_sql_result['faltas'].'</td>
            </tr>';
        }else if($row_sql_result['faltas'] == 1){
            $output_string .= '<tr>
                <td>'.$row_sql_result['Nombre'].'</td>
                <td>'.$row_sql_result['Tareas'].'</td>
                <td>'.$row_sql_result['Curso'].'</td>
                <td><b style="color: green">'.$row_sql_result['faltas'].'</b></td>
            </tr>';
        }else if($row_sql_result['faltas'] == 2){
            $output_string .= '<tr>
                <td>'.$row_sql_result['Nombre'].'</td>
                <td>'.$row_sql_result['Tareas'].'</td>
                <td>'.$row_sql_result['Curso'].'</td>
                <td><b style="color: Goldenrod">'.$row_sql_result['faltas'].'</b></td>
            </tr>';
        }else if($row_sql_result['faltas'] == 3){
            $output_string .= '<tr>
                <td>'.$row_sql_result['Nombre'].'</td>
                <td>'.$row_sql_result['Tareas'].'</td>
                <td>'.$row_sql_result['Curso'].'</td>
                <td><b style="color: Goldenrod">'.$row_sql_result['faltas'].'</b></td>
            </tr>';
        }else if($row_sql_result['faltas'] == 4){
            $output_string .= '<tr>
                <td>'.$row_sql_result['Nombre'].'</td>
                <td>'.$row_sql_result['Tareas'].'</td>
                <td>'.$row_sql_result['Curso'].'</td>
                <td><b style="color: red">'.$row_sql_result['faltas'].'</b></td>
            </tr>';
        }
    }while ($row_sql_result=mysqli_fetch_assoc($result));
    $output_string .= '</table>';
    print (json_encode("".$output_string.""));
?>