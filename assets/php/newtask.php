<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $query = 'Select * from maestrouser
    where User = "'.$_POST['id'].'";';
    $result = mysqli_query($conn,$query);
    $row_sql_result = mysqli_fetch_assoc($result);

    do{
        $output_string = '
        <input type="text" id="mast" value="'.$row_sql_result['IdMaestro'].'" hidden>
        <div class="row">
        <div class="col-md-4">
        <script>selectalumno2()</script>
        <div class="form-group">
            <label for="Nivel">Nivel: </label>
            <select class="form-control" id="Nivel" onchange="cambio(this); selectalumno2()">
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
            <label for="Curso">Curso: </label>
            <select class="form-control" id="Curso" onchange="selectalumno2()">
            <option value="kids1" selected>Kids 1</option>
            <option value="kids2">Kids 2</option>
            <option value="kids3">Kids 3</option>
            <option value="Teens">Teens</option>
            </select>
        </div>
        </div>
        <div class="col-md-4">
        <div id="zona"></div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                <label for="info">Información tarea: </label>
                <textarea id="info" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-md-4"><button type="button" class="btn btn-primary" onclick="subirtarea()" style="margin-top: 30px; width:100%;">AGREGAR NUEVA TAREA</button></div>
        </div>';
    }while ($row_sql_result=mysqli_fetch_assoc($result));
    print (json_encode("".$output_string.""));
?>