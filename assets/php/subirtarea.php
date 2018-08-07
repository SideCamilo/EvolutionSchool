<?php
    $target_dir = "../files/";
    $target_dir2 = "../assets/files/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $target_file2 = $target_dir2 . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $a = 0;
    define('MB', 1048576);
    while(file_exists($target_file)){
        $target_file = $target_dir.$a.basename($_FILES["file"]["name"]);
        $target_file2 = $target_dir2.$a.basename($_FILES["file"]["name"]);
        $a++;
    }
    if ($_FILES["file"]["size"] > 2*MB) {
        echo "Lo sentimos su archivo excedio el tamaño de 5mb.<br />";
        $uploadOk = 0;
    }
    $docFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if($docFileType != "doc" && $docFileType != "docx" && $docFileType != "xls" && $docFileType != "xlsx" && $docFileType != "ppt" && $docFileType != "pptx" && $docFileType != "pdf" ) {
        echo "La extensión de su archivo no es válida.<br />";
        $uploadOk = 0;
    }
    
    if ($uploadOk == 0) {
        echo "Lo sentimos su archivo tuvo un error.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $conn = mysqli_connect("evolutionschool.com.mx","evolutio_Camilo","encondromatosis7","evolutio_SystemEvolution");
            mysqli_set_charset($conn,"utf8");
        

            $query = 'update Tareas set Ruta = "'.$target_file2.'",Entregada = 1 where IdTarea = '.$_POST['idal'].';';
            $result = mysqli_query($conn,$query);
            echo "El archivo ". basename( $_FILES["file"]["name"]). " Ha sido subido correctamente.";
        } else {
            echo "Hubo un problema con la entrega de su archivo.";
        }
    }
?>