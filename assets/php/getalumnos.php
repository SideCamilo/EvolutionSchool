<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $query = 'Select * from alumnos order by Nombre;';
    $result = mysqli_query($conn,$query);
    $row_sql_result = mysqli_fetch_assoc($result);
    
    $output_string = '<div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <p class="formtitle">Alumnos: </p>
                                <select class="form-control" id="alumno">';
    
    do{
        $output_string .= '<option value="'.$row_sql_result['IdAlumno'].'">'.$row_sql_result['Nombre'].' '.$row_sql_result['Apellido_Paterno'].' '.$row_sql_result['Apellido_Materno'].'</option>';
    }while ($row_sql_result=mysqli_fetch_assoc($result));
    $output_string .= '</select></div>
    </div></div>
    <div class="row">
        <div class="col-md-4"><button type="button" class="btn btn-primary" onclick="asignarcuentaalumno()" style="width:100%;">Asignar Cuenta</button></div>
        <div class="col-md-4"><button type="button" class="btn btn-primary" onclick="cambiarinfoalumno()" style="width:100%;">Cambiar información</button></div>
        <div class="col-md-4"><button type="button" class="btn btn-primary" onclick="verfinanzas()" style="width:100%;">Ver finanzas</button></div>
    </div>';
    print (json_encode("".$output_string.""));
?>