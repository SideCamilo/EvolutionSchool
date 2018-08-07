<?php
    $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
    mysqli_set_charset($conn,"utf8");

    $query = 'Select * from Calificaciones where IdAlumno = "'.$_POST['id'].'";';
    $result = mysqli_query($conn,$query);
    $row_sql_result = mysqli_fetch_assoc($result);

    $output_string = '<input type="text" id="almno" value="'.$_POST['id'].'" hidden>
    <table class = "table" style = "background-color: white;">
                        <thead>
                            <tr>
                                <th>Curso</th>
                                <th>Calificación</th>
                            </tr>
                        </thead>';
    do{
        $output_string .= '<tr>
                             <td>'.$row_sql_result['Curso'].'</td>
                             <td>'.$row_sql_result['Calificacion'].'</td>
                           </tr>';
    }while ($row_sql_result=mysqli_fetch_assoc($result));

    $output_string .= '<tr>
                            <td><select id="cur" class="form-control">
                                <option value="kids1">Kids 1</option>
                                <option value="kids2">Kids 2</option>
                                <option value="kids3">Kids 3</option>
                                <option value="Teens">Teens</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select></td>
                            <td><input type="number" id="cal" class="form-control"></td>
                            <td><button type="button" class="btn btn-primary" onclick="agregarCalif()" style="width:100%;">Agregar Calificación</button></td>
                       </tr>
                       </table>';
    print (json_encode("".$output_string.""));
?>