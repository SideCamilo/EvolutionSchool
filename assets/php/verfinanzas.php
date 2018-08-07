<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $query = 'Select * from alumnos where IdAlumno = "'.$_POST['id'].'";';
    $result = mysqli_query($conn,$query);
    $row_sql_result = mysqli_fetch_assoc($result);

    do{
        $output_string = '<br /> <br /><input type="text" value="'.$row_sql_result['IdAlumno'].'" id="idal" hidden>';
        if($row_sql_result['Cuota'] == '0'){
            $output_string .= '<div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <p class="formtitle">Agregar cuota: </p>
                        <input type="number" class="form-control" id="nuevacuota">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <p class="formtitle">Fecha para pagar: </p>
                        <input type="date" class="form-control" id="nuevafecha">
                    </div>
                </div>
                <div class="col-md-4">
                    <button style="margin-top:30px; width: 100%" class="btn btn-info" onclick="nuevacuota()">Cambiarcuota</button>
                </div>
            </div>';
        }else{
            $output_string .= '<div class="row">
                <div class="col-md-4">
                    <input type="text" id="cota" value="'.$row_sql_result['Cuota'].'" hidden>
                    <button style="margin-top:30px; width: 100%" class="btn btn-info" onclick="pagarcuota()">Marcar como pagada</button>
                </div>
            </div>';
        }
    }while ($row_sql_result=mysqli_fetch_assoc($result));
    print (json_encode("".$output_string.""));

?>