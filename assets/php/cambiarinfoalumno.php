<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $query = 'Select * from alumnos left join status on alumnos.IdStatus = status.IdStatus where alumnos.IdAlumno = "'.$_POST['id'].'";';
    $result = mysqli_query($conn,$query);
    $row_sql_result = mysqli_fetch_assoc($result);
    
    $output_string = '';
    
    do{
            $output_string = '
            <input type="text" value="'.$row_sql_result['IdAlumno'].'" id="idall" hidden>
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
            </div>
            <div class="form-group">
                <p class="formtitle">Pago: </p>
                <input type="text" class="form-control" id="pago" value="'.$row_sql_result['Pago'].'">
            </div>';

            if($row_sql_result['Nivel'] == 'Phonics1'){
                $output_string .= '<div class="form-group">
                    <p class="formtitle">Nivel: </p>
                    <select class="form-control" id="Nivel" onchange="cambio(this)">
                    <option value="Phonics1" selected>Phonics1</option>
                    <option value="Phonics2">Phonics2</option>
                    <option value="kids1">kids1</option>
                    <option value="kids2">kids2</option>
                    <option value="kids3">kids3</option>
                    <option value="kids4">kids4</option>
                    <option value="kids5">kids5</option>
                    <option value="kids6">kids6</option>
                    <option value="Teens">Teens</option>
                    <option value="Technical English">Technical English</option>
                    <option value="Teacher\'s Course">Teacher\'s Course</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
                </div>';
            }else if($row_sql_result['Nivel'] == 'Phonics2'){
                $output_string .= '<div class="form-group">
                    <p class="formtitle">Nivel: </p>
                    <select class="form-control" id="Nivel" onchange="cambio(this)">
                    <option value="Phonics1">Phonics1</option>
                    <option value="Phonics2" selected>Phonics2</option>
                    <option value="kids1">kids1</option>
                    <option value="kids2">kids2</option>
                    <option value="kids3">kids3</option>
                    <option value="kids4">kids4</option>
                    <option value="kids5">kids5</option>
                    <option value="kids6">kids6</option>
                    <option value="Teens">Teens</option>
                    <option value="Technical English">Technical English</option>
                    <option value="Teacher\'s Course">Teacher\'s Course</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
                </div>';
            }else if($row_sql_result['Nivel'] == 'kids1'){
                $output_string .= '<div class="form-group">
                    <p class="formtitle">Nivel: </p>
                    <select class="form-control" id="Nivel" onchange="cambio(this)">
                    <option value="Phonics1">Phonics1</option>
                    <option value="Phonics2">Phonics2</option>
                    <option value="kids1" selected>kids1</option>
                    <option value="kids2">kids2</option>
                    <option value="kids3">kids3</option>
                    <option value="kids4">kids4</option>
                    <option value="kids5">kids5</option>
                    <option value="kids6">kids6</option>
                    <option value="Teens">Teens</option>
                    <option value="Technical English">Technical English</option>
                    <option value="Teacher\'s Course">Teacher\'s Course</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
                </div>';
            }else if($row_sql_result['Nivel'] == 'kids2'){
                $output_string .= '<div class="form-group">
                    <p class="formtitle">Nivel: </p>
                    <select class="form-control" id="Nivel" onchange="cambio(this)">
                    <option value="Phonics1">Phonics1</option>
                    <option value="Phonics2">Phonics2</option>
                    <option value="kids1">kids1</option>
                    <option value="kids2" selected>kids2</option>
                    <option value="kids3">kids3</option>
                    <option value="kids4">kids4</option>
                    <option value="kids5">kids5</option>
                    <option value="kids6">kids6</option>
                    <option value="Teens">Teens</option>
                    <option value="Technical English">Technical English</option>
                    <option value="Teacher\'s Course">Teacher\'s Course</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
                </div>';
            }else if($row_sql_result['Nivel'] == 'kids3'){
                $output_string .= '<div class="form-group">
                    <p class="formtitle">Nivel: </p>
                    <select class="form-control" id="Nivel" onchange="cambio(this)">
                    <option value="Phonics1">Phonics1</option>
                    <option value="Phonics2">Phonics2</option>
                    <option value="kids1">kids1</option>
                    <option value="kids2">kids2</option>
                    <option value="kids3" selected>kids3</option>
                    <option value="kids4">kids4</option>
                    <option value="kids5">kids5</option>
                    <option value="kids6">kids6</option>
                    <option value="Teens">Teens</option>
                    <option value="Technical English">Technical English</option>
                    <option value="Teacher\'s Course">Teacher\'s Course</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
                </div>';
            }else if($row_sql_result['Nivel'] == 'kids4'){
                $output_string .= '<div class="form-group">
                    <p class="formtitle">Nivel: </p>
                    <select class="form-control" id="Nivel" onchange="cambio(this)">
                    <option value="Phonics1">Phonics1</option>
                    <option value="Phonics2">Phonics2</option>
                    <option value="kids1">kids1</option>
                    <option value="kids2">kids2</option>
                    <option value="kids3">kids3</option>
                    <option value="kids4" selected>kids4</option>
                    <option value="kids5">kids5</option>
                    <option value="kids6">kids6</option>
                    <option value="Teens">Teens</option>
                    <option value="Technical English">Technical English</option>
                    <option value="Teacher\'s Course">Teacher\'s Course</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
                </div>';
            }else if($row_sql_result['Nivel'] == 'kids5'){
                $output_string .= '<div class="form-group">
                    <p class="formtitle">Nivel: </p>
                    <select class="form-control" id="Nivel" onchange="cambio(this)">
                    <option value="Phonics1">Phonics1</option>
                    <option value="Phonics2">Phonics2</option>
                    <option value="kids1">kids1</option>
                    <option value="kids2">kids2</option>
                    <option value="kids3">kids3</option>
                    <option value="kids4">kids4</option>
                    <option value="kids5" selected>kids5</option>
                    <option value="kids6">kids6</option>
                    <option value="Teens">Teens</option>
                    <option value="Technical English">Technical English</option>
                    <option value="Teacher\'s Course">Teacher\'s Course</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
                </div>';
            }else if($row_sql_result['Nivel'] == 'kids6'){
                $output_string .= '<div class="form-group">
                    <p class="formtitle">Nivel: </p>
                    <select class="form-control" id="Nivel" onchange="cambio(this)">
                    <option value="Phonics1">Phonics1</option>
                    <option value="Phonics2">Phonics2</option>
                    <option value="kids1">kids1</option>
                    <option value="kids2">kids2</option>
                    <option value="kids3">kids3</option>
                    <option value="kids4">kids4</option>
                    <option value="kids5">kids5</option>
                    <option value="kids6" selected>kids6</option>
                    <option value="Teens">Teens</option>
                    <option value="Technical English">Technical English</option>
                    <option value="Teacher\'s Course">Teacher\'s Course</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
                </div>';
            }else if($row_sql_result['Nivel'] == 'Teens'){
                $output_string .= '<div class="form-group">
                    <p class="formtitle">Nivel: </p>
                    <select class="form-control" id="Nivel" onchange="cambio(this)">
                    <option value="Phonics1">Phonics1</option>
                    <option value="Phonics2">Phonics2</option>
                    <option value="kids1">kids1</option>
                    <option value="kids2">kids2</option>
                    <option value="kids3">kids3</option>
                    <option value="kids4">kids4</option>
                    <option value="kids5">kids5</option>
                    <option value="kids6">kids6</option>
                    <option value="Teens" selected>Teens</option>
                    <option value="Technical English">Technical English</option>
                    <option value="Teacher\'s Course">Teacher\'s Course</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
                </div>';
            }else if($row_sql_result['Nivel'] == 'Technical English'){
                $output_string .= '<div class="form-group">
                    <p class="formtitle">Nivel: </p>
                    <select class="form-control" id="Nivel" onchange="cambio(this)">
                    <option value="Phonics1">Phonics1</option>
                    <option value="Phonics2">Phonics2</option>
                    <option value="kids1">kids1</option>
                    <option value="kids2">kids2</option>
                    <option value="kids3">kids3</option>
                    <option value="kids4">kids4</option>
                    <option value="kids5">kids5</option>
                    <option value="kids6">kids6</option>
                    <option value="Teens">Teens</option>
                    <option value="Technical English" selected>Technical English</option>
                    <option value="Teacher\'s Course">Teacher\'s Course</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
                </div>';
            }else if($row_sql_result['Nivel'] == 'Teacher\'s Course'){
                $output_string .= '<div class="form-group">
                    <p class="formtitle">Nivel: </p>
                    <select class="form-control" id="Nivel" onchange="cambio(this)">
                    <option value="Phonics1">Phonics1</option>
                    <option value="Phonics2">Phonics2</option>
                    <option value="kids1">kids1</option>
                    <option value="kids2">kids2</option>
                    <option value="kids3">kids3</option>
                    <option value="kids4">kids4</option>
                    <option value="kids5">kids5</option>
                    <option value="kids6">kids6</option>
                    <option value="Teens">Teens</option>
                    <option value="Technical English">Technical English</option>
                    <option value="Teacher\'s Course" selected>Teacher\'s Course</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
                </div>';
            }else if($row_sql_result['Nivel'] == '1'){
                $output_string .= '<div class="form-group">
                    <p class="formtitle">Nivel: </p>
                    <select class="form-control" id="Nivel" onchange="cambio(this)">
                    <option value="Phonics1">Phonics1</option>
                    <option value="Phonics2">Phonics2</option>
                    <option value="kids1">kids1</option>
                    <option value="kids2">kids2</option>
                    <option value="kids3">kids3</option>
                    <option value="kids4">kids4</option>
                    <option value="kids5">kids5</option>
                    <option value="kids6">kids6</option>
                    <option value="Teens">Teens</option>
                    <option value="Technical English">Technical English</option>
                    <option value="Teacher\'s Course">Teacher\'s Course</option>
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
                </div>';
            }else if($row_sql_result['Nivel'] == '2'){
                $output_string .= '<div class="form-group">
                    <p class="formtitle">Nivel: </p>
                    <select class="form-control" id="Nivel" onchange="cambio(this)">
                    <option value="Phonics1">Phonics1</option>
                    <option value="Phonics2">Phonics2</option>
                    <option value="kids1">kids1</option>
                    <option value="kids2">kids2</option>
                    <option value="kids3">kids3</option>
                    <option value="kids4">kids4</option>
                    <option value="kids5">kids5</option>
                    <option value="kids6">kids6</option>
                    <option value="Teens">Teens</option>
                    <option value="Technical English">Technical English</option>
                    <option value="Teacher\'s Course">Teacher\'s Course</option>
                    <option value="1">1</option>
                    <option value="2" selected>2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    </select>
                </div>';
            }else if($row_sql_result['Nivel'] == '3'){
                $output_string .= '<div class="form-group">
                    <p class="formtitle">Nivel: </p>
                    <select class="form-control" id="Nivel" onchange="cambio(this)">
                    <option value="Phonics1">Phonics1</option>
                    <option value="Phonics2">Phonics2</option>
                    <option value="kids1">kids1</option>
                    <option value="kids2">kids2</option>
                    <option value="kids3">kids3</option>
                    <option value="kids4">kids4</option>
                    <option value="kids5">kids5</option>
                    <option value="kids6">kids6</option>
                    <option value="Teens">Teens</option>
                    <option value="Technical English">Technical English</option>
                    <option value="Teacher\'s Course">Teacher\'s Course</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3" selected>3</option>
                    <option value="4">4</option>
                    </select>
                </div>';
            }else if($row_sql_result['Nivel'] == '4'){
                $output_string .= '<div class="form-group">
                    <p class="formtitle">Nivel: </p>
                    <select class="form-control" id="Nivel" onchange="cambio(this)">
                      <option value="Phonics1">Phonics1</option>
                      <option value="Phonics2">Phonics2</option>
                      <option value="kids1">kids1</option>
                      <option value="kids2">kids2</option>
                      <option value="kids3">kids3</option>
                      <option value="kids4">kids4</option>
                      <option value="kids5">kids5</option>
                      <option value="kids6">kids6</option>
                      <option value="Teens">Teens</option>
                      <option value="Technical English">Technical English</option>
                      <option value="Teacher\'s Course">Teacher\'s Course</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4" selected>4</option>
                    </select>
                </div>';
            }

            $output_string .= '<div class="form-group">
                <p class="formtitle">Curso: </p>
                <select class="form-control" id="Curso">
                    <option value="'.$row_sql_result['Curso'].'" selected>'.$row_sql_result['Curso'].'</option>
                </select>
            </div>
            <div class="form-group">
                <p class="formtitle">Hora: </p>
                <input type="time" class="form-control" id="Hora" value="'.$row_sql_result['Hora'].'">
            </div>
            <div class="form-group">
                <p class="formtitle">Domicilio: </p>
                <textarea class="form-control" id="Domicilio">'.$row_sql_result['Domicilio'].'</textarea>
            </div>
            <div class="form-group">
                <p class="formtitle">Telefono Tutor: </p>
                <input type="text" class="form-control" id="Telefono_tutor" value="'.$row_sql_result['Tel_tutor'].'">
            </div>
            <div class="form-group">
                <p class="formtitle">Parentesco Tutor: </p>
                <input type="text" class="form-control" id="Parentesco_tutor" value="'.$row_sql_result['Parentesco_tutor'].'">
            </div>
            <div class="form-group">
                <p class="formtitle">¿Cómo se enteró?: </p>
                <input type="text" class="form-control" id="Entero" value="'.$row_sql_result['Entero'].'">
            </div>
            <div class="form-group">
                <p class="formtitle">Observaciones: </p>
                <textarea class="form-control" id="observa">'.$row_sql_result['Observaciones'].'</textarea>
            </div>
            <div class="form-group">
                <p class="formtitle">Sabatino: </p>
                <select class="form-control" id="sabatino">';

            if($row_sql_result['Sabatino'] == 'si'){
                $output_string .= ' <option value="si" selected>Si</option>
                                    <option value="no">No</option>
                                </select>
                            </div>';
            }else{
                $output_string .= ' <option value="si">Si</option>
                                    <option value="no" selected>No</option>
                                </select>
                        </div>';
            }
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

            $output_string .= '
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <button style="width: 100%" class="btn btn-info" onclick="actualadminalm()">CAMBIAR INFORMACIÓN</button>
            </div>';
    }while ($row_sql_result=mysqli_fetch_assoc($result));
    print (json_encode("".$output_string.""));
?>