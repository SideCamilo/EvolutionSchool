<?php
    if(isset($_SESSION['userid'])){
        session_destroy();
    }else{
        session_start();
        header("Content-Type: application/json; charset=UTF-8");
        $obj = json_decode($_GET["afdsaw"], false);
    
        $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
        mysqli_set_charset($conn,"utf8");
    
        if($obj->type == 1){
            $query = 'Select * from alumnouser where User = "'.$obj->user.'" AND Pass = "'.$obj->pass.'";';
        }else if($obj->type == 2){
            $query = 'Select * from maestrouser where User = "'.$obj->user.'" AND Pass = "'.$obj->pass.'";';
        }
        $result = mysqli_query($conn,$query);
        $row_sql_result = mysqli_fetch_assoc($result);
        do{
                $_SESSION['userid'] = $row_sql_result['User'];
                $_SESSION['tipo'] = $obj->type;
                echo '1';
        }while ($row_sql_result=mysqli_fetch_assoc($result));
    }
?>