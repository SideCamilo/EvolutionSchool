<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $query = 'Select *,alumnos.IdAlumno as aidi from alumnos inner join alumnouser on alumnos.IdAlumno = alumnouser.IdAlumno left join cita_asesor on cita_asesor.IdAlumno = alumnos.IdAlumno where User = "'.$_POST['id'].'";';
    $result = mysqli_query($conn,$query);
    $row_sql_result = mysqli_fetch_assoc($result);
    do{
        $output_string = '<div class="row">
            <div class="col-md-12">
                ';
            if($row_sql_result['Cuota'] != '0'){
                if($row_sql_result['fecha_pago'] > date("Y-m-d")){
                    $output_string .= '
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Usted debe: </h3>
                        </div>
                        <div class="panel-body">
                            <b style="color: green">'.$row_sql_result['Cuota'].'</b> y tiene para pagar hasta <b>'.$row_sql_result['fecha_pago'].'</b>
                            <button type="button" class="btn btn-primary" onclick="recibo(\''.$row_sql_result['Cuota'].'\',\''.$row_sql_result['fecha_pago'].'\',\''.$row_sql_result['Nombre'].'\',\''.$row_sql_result['Apellido_Paterno'].'\')">GENERAR RECIBO</button>
                        </div>
                    </div>';
                }else if($row_sql_result['fecha_pago'] < date("Y-m-d")){
                    $output_string .= '
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <b>Su fecha de pago ha sido excedida favor de contactar a un asesor</b>
                        </div>
                    </div>';
                }else if($row_sql_result['fecha_pago'] == date("Y-m-d")){
                    $output_string .= '
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">Usted debe: </h3>
                        </div>
                        <div class="panel-body">
                        <b style="color: Goldenrod">'.$row_sql_result['Cuota'].'</b> y hoy es su último día para pagar
                        <button type="button" class="btn btn-primary" onclick="recibo(\''.$row_sql_result['Cuota'].'\',\''.$row_sql_result['fecha_pago'].'\',\''.$row_sql_result['Nombre'].'\',\''.$row_sql_result['Apellido_Paterno'].'\')">GENERAR RECIBO</button>
                        </div>
                    </div>';
                }
            }else{
                $output_string .= '
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Felicidades usted va al corriente de sus pagos</h3>
                    </div>
                </div>
                ';
            }
            $output_string .= '<br />';
            if($row_sql_result['faltas'] == 0){
                $output_string .= '
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Felicidades usted no tiene faltas</h3>
                    </div>
                </div>';
            }else if($row_sql_result['faltas'] == 1){
                $output_string .= '
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Faltas</h3>
                    </div>
                    <div class="panel-body">
                        Usted tiene <b style="color:green;">'.$row_sql_result['faltas'].'</b> falta
                    </div>
                </div>';
            }else if($row_sql_result['faltas'] == 2){
                $output_string .= '
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">Faltas</h3>
                    </div>
                    <div class="panel-body">
                        Usted tiene <b style="color:Goldenrod;">'.$row_sql_result['faltas'].'</b> faltas
                    </div>
                </div>';
            }else if($row_sql_result['faltas'] == 3){
                $output_string .= '
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">Faltas</h3>
                    </div>
                    <div class="panel-body">
                        Usted tiene <b style="color:Goldenrod;">'.$row_sql_result['faltas'].'</b> faltas
                    </div>
                </div>';
            }else if($row_sql_result['faltas'] == 4){
                $output_string .= '
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Faltas</h3>
                    </div>
                    <div class="panel-body">
                        Usted tiene <b style="color:red;">'.$row_sql_result['faltas'].'</b> faltas cuidado! favor de contactar un asesor
                    </div>
                </div>';
            }
        if($row_sql_result['IdCita'] == 0){
            $output_string .= '<br />
            <input type="text" id="idal" value="'.$row_sql_result['aidi'].'" hidden>
            <input class="form-control" type="date" id="fechh"><br />
            <button type="button" class="btn btn-primary" onclick="generarcita()">GENERAR CITA CON ASESOR</button>
            <br />
            <button type="button" class="btn btn-primary" onclick="generarhistorial()">GENERAR HISTORIAL ACADEMICO</button>
            </div>
            </div>';
        }else{
            $output_string .= '
            <input type="text" id="idal" value="'.$row_sql_result['aidi'].'" hidden>
            <p>Su cita esta siendo revisada pronto se comunicarán con usted</p>
            <br />
            <button type="button" class="btn btn-primary" onclick="generarhistorial()">GENERAR HISTORIAL ACADEMICO</button>
            </div>
            </div>';
        }
    }while ($row_sql_result=mysqli_fetch_assoc($result));
    print (json_encode("".$output_string.""));
?>