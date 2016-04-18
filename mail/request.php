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

$para = 'camposargon@hotmail.com';
$titulo = 'Pedido ON-Line - Campos Argon';
$mensaje = '<html><body>';
$mensaje .= '<h1>Pedido ON-Line - Campos Argon</h1>';
$mensaje .= '<p>Nombre: ' . $_POST['name'] . '</p>';
$mensaje .= '<p>Telefono: ' . $_POST['phone'] . '</p>';
$mensaje .= '<P>Mail: ' . $_POST['email'] . '</p>';
$mensaje .= '<p>Listado: </p>';
$mensaje .= $_POST['message'];
$mensaje .= '</body></html>';
$cabeceras = 'From: info@camposargon.com.ar' . "\r\n" .
    'Reply-To: ' . $_POST['email'] . "\r\n";
$cabeceras .= "MIME-Version: 1.0\r\n";
$cabeceras .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

mail($para, $titulo, $mensaje, $cabeceras);
return true;

?>