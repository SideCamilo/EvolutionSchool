<?php
    header("Content-Type: application/json; charset=UTF-8");
    $obj = json_decode($_GET["afdsaw"], false);

    $headers = "From: comments@evolutionschool.com.mx \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";


    $email = "admin@evolutionschool.com.mx";
    $msg = "
    <html>
    <body>
    <h3>Solicitud de cambio de información por: ".$obj->Nombre."</h3>

    <p>Id del Alumno: ".$obj->Id."</p>
    <p>Nombre: ".$obj->Nombre."</p>
    <p>Descripción: ".$obj->comentario."</p>



    </table>
    </body>
    </html>
    ";

    //echo $msg;
    //echo $email."<br>";
    mail($email,"Cambio de información ".$obj->Nombre,$msg,$headers);
    echo '1';
?>