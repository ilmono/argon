<?php
    // Check for empty fields
    if(empty($_POST['name'])  		||
       empty($_POST['email']) 		||
       empty($_POST['phone']) 		||
       empty($_POST['message'])	||
       !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
            echo "Error en alguno de los datos!";
            return false;
    }

    $para = 'mgrusconi@gmail.com';
    $titulo = 'Consulta Web - Campos Argon';
    $mensaje = 'Nombre: ' . $_POST['name'] . "\r\n";
    $mensaje .= 'Telefono: ' . $_POST['phone'] . "\r\n";
    $mensaje .= 'Mail: ' . $_POST['email'] . "\r\n";
    $mensaje .= 'Consulta: ' . $_POST['message'];
    $cabeceras = 'From: info@camposargon.com.ar' . "\r\n" .
        'Reply-To: ' . $_POST['mail'] . "\r\n";

    mail($para, $titulo, $mensaje, $cabeceras);
    return true;

?>
