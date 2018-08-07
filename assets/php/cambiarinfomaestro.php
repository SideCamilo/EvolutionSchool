<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $query = 'Select * from maestros left join status on maestros.IdStatus = status.IdStatus where maestros.IdMaestro = '.$_POST['id'].';';
    $result = mysqli_query($conn,$query);
    $row_sql_result = mysqli_fetch_assoc($result);
    
    $output_string = '';
    
    do{
        $output_string = '
        <input type="text" value="'.$row_sql_result['IdMaestro'].'" id="idall" hidden>
        <div class="form-group">
            <p class="formtitle">Nombre:</p>
            <input type="text" class="form-control" id="Nombre" value="'.$row_sql_result['Nombre'].'">
        </div>
        <div class="form-group">
            <p class="formtitle">Apellido_Paterno: </p>
            <input type="text" class="form-control" id="Apellido_Paterno" value="'.$row_sql_result['Apellido_Paterno'].'">
        </div>
        <div class="form-group">
            <p class="formtitle">Apellido_Materno: </p>
            <input type="text" class="form-control" id="Apellido_Materno" value="'.$row_sql_result['Apellido_Materno'].'">
        </div>
        <div class="form-group">
            <p class="formtitle">Teléfono: </p>
            <input type="number" class="form-control" id="Telefono" value="'.$row_sql_result['Telefono'].'">
        </div>';

        if($row_sql_result['Estado'] == 'Activo'){
            $output_string .= '
            <div class="form-group">
                <p class="formtitle">Status:</p>
                <select class="form-control btn-success" id="estado" onchange="cambiarcolor()">
                    <option style="background-color: green" value="1" selected>Activo</option>
                    <option style="background-color: red" value="2">Inactivo</option>
                </select>
            </div>';
        }else{
            $output_string .= '
            <div class="form-group">
                <p class="formtitle">Status:</p>
                <select class="form-control btn-danger" id="estado" onchange="cambiarcolor()">
                    <option style="background-color: green" value="1">Activo</option>
                    <option style="background-color: red" value="2" selected>Inactivo</option>
                </select>
            </div>';
        }

        $output_string .= '<div class="form-group">
            <p class="formtitle">Cargo: </p>
            <input type="text" class="form-control" id="cargo" value="'.$row_sql_result['Cargo'].'">
        </div>
        <div class="form-group">
            <p class="formtitle">Email: </p>
            <input type="text" class="form-control" id="email" value="'.$row_sql_result['Email'].'">
        </div>
        <div class="form-group">
            <p class="formtitle">Fecha de cumpleaños: </p>
            <input type="date" class="form-control" id="fechacum" value="'.$row_sql_result['Fecha_cumpleanios'].'">
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <button style="width: 100%" class="btn btn-info" onclick="actualadminmtr()">CAMBIAR INFORMACIÓN</button>
        </div>';
    }while ($row_sql_result=mysqli_fetch_assoc($result));
    print (json_encode("".$output_string.""));

?>