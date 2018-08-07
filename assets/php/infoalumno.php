<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $query = 'Select * from alumnos where IdAlumno = "'.$_POST['id'].'";';
    $result = mysqli_query($conn,$query);
    $row_sql_result = mysqli_fetch_assoc($result);

    $output_string = '';
    do{
        $output_string .= '<div class="row">
        <input type="text" id="idalm" value="'.$row_sql_result['IdAlumno'].'" disabled hidden>
        <div class="col-md-4">
        <div class="form-group">
          <label for="Nombre">Nombre: </label>
          <input type="text" class="form-control" id="Nombre" value="'.$row_sql_result['Nombre'].'" disabled="">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="Apellido_Paterno">Apellido_Paterno: </label>
          <input type="text" class="form-control" id="Apellido_Paterno" value="'.$row_sql_result['Apellido_Paterno'].'" disabled="">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="Apellido_Materno">Apellido_Materno: </label>
          <input type="text" class="form-control" id="Apellido_Materno" value="'.$row_sql_result['Apellido_Materno'].'" disabled="">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="Telefono">Telefono: </label>
          <input type="number" class="form-control" id="Telefono" value="'.$row_sql_result['Telefono'].'" disabled="">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <script>seleccionado('.$row_sql_result['Nivel'].')</script>
          <label for="Nivel2">Nivel: </label>
          <select class="form-control" id="Nivel2" onchange="cambio2(this)">
            <option>0</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="Curso2">Curso: </label>
          <select class="form-control" id="Curso2">
            <option></option>
            <option selected>'.$row_sql_result['Curso'].'</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="Hora">Hora: </label>
          <input type="time" class="form-control" value="'.$row_sql_result['Hora'].'" id="Hora" disabled="">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="Domicilio">Domicilio: </label>
          <textarea class="form-control" rows="2" id="Domicilio" disabled="">'.$row_sql_result['Domicilio'].'</textarea>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="Telefono_tutor">Telefono_Tutor: </label>
          <input type="number" class="form-control" id="Telefono_tutor" value="'.$row_sql_result['Tel_tutor'].'" disabled="">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="Parentesco_tutor">Parentesco_Tutor: </label>
          <input type="text" class="form-control" id="Parentesco_tutor" value="'.$row_sql_result['Parentesco_tutor'].'" disabled="">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="obs">Observaciones: </label>
          <input type="text" class="form-control" id="obs" value="'.$row_sql_result['Observaciones'].'" disabled="">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="sabatino">Sabatino: </label>
          <select class="form-control" id="sabatino" disabled="">
            <option>'.$row_sql_result['Sabatino'].'</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="faltas">Faltas: </label>
          <input type="text" class="form-control" id="faltas" value="'.$row_sql_result['faltas'].'" disabled="">
        </div>
      </div>
      <div class="col-md-4"><button type="button" style="margin-top:30px; width:100%" class="btn btn-primary" onclick="falta(1)">Agregar falta</button></div>
      <div class="col-md-4"><button type="button" style="margin-top:30px; width:100%" class="btn btn-primary" onclick="falta(2)">Quitar falta</button></div>
    </div>
    <div class="row">
      <div class="col-md-4"><button type="button" class="btn btn-primary" style="width:100%" onclick="Actualizarinfo()">Actualizar información</button></div>
    </div></div>';
    }while ($row_sql_result=mysqli_fetch_assoc($result));

    print (json_encode("".$output_string.""));
?>