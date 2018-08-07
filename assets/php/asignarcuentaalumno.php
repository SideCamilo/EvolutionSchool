<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $query = 'Select alumnos.IdAlumno as aidi, User from alumnos left join alumnouser on alumnos.IdAlumno = alumnouser.IdAlumno where alumnos.IdAlumno = "'.$_POST['id'].'";';
    $result = mysqli_query($conn,$query);
    $row_sql_result = mysqli_fetch_assoc($result);
    
    $output_string = '';
    
    do{
        $output_string .= '<input value="'.$row_sql_result['aidi'].'" id="idal" hidden>';
        if($row_sql_result['User'] == ''){
            $output_string .= '
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <p class="formtitle">Usuario: </p>
                        <input type="text" class="form-control iuser" id="user">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <p class="formtitle">Password: </p>
                        <input type="text" class="form-control ipass" id="pass">
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary" onclick="AltaCuentaAlumno()" style="margin-top: 30px; width:100%;">Dar de alta Cuenta</button>
                </div>
            </div>';
        }else{
            $output_string .= '<p class="formtitle">Este alumno ya tiene su cuenta creada</p>';
        }
    }while ($row_sql_result=mysqli_fetch_assoc($result));
    print (json_encode("".$output_string.""));
?>