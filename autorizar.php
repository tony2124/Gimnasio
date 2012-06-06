<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Autorizando</title>
</head>

<body>
<?php

include("conexion.php");
if($_REQUEST['autorizar'] == 1)
{
mysql_query("update usuarios set autorizado = 1 where usuario = '$_REQUEST[usuario]'");

$codigohtml = '
<html>
<head>
<title>Notificación</title>
</head>

<body><h1>Hola '.$_REQUEST['nombre'].' </h1>
<p>Antes que nada te agradecemos tu preferencia por nuestro gimnasio. </p>
<p>Te notificamos que ya puedes acceder a nuestro sistema para que elijas tu horario. NO FALTES</p>

http://serviciosextraescolares.itsapatzingan.net/gimnasio

<p>Ejercitarse es saludable.</p>

<p>ATENTAMENTE: SIMPUS GYM</p>
</body></html>';

$email = $_REQUEST['mail'];
$asunto = 'NOTIFICACIÓN SIMPUS GYM';
$cabeceras = "Content-type: text/html\r\n";

mail($email,$asunto,$codigohtml,$cabeceras);
}
else 
{
mysql_query("update usuarios set autorizado = -1 where usuario = '$_REQUEST[usuario]'");

$codigohtml = '
<html>
<head>
<title>Notificación</title>
</head>

<body><h1>Hola '.$_REQUEST['nombre'].' </h1>
<p>No hemos podido comprobar la veracidad de su correo electrónico. </p>
<p>Si has recibido este mensaje es porque hemos denegado el acceso a nuestro sistema. Te pedimos de favor que llames a nuestro gimnasio para comprobar y darte el acceso. te pedimos disculpas por las molestias. Nuestro número es: 444-555-1234</p>

http://serviciosextraescolares.itsapatzingan.net/gimnasio

<p>Ejercitarse es saludable.</p>

<p>ATENTAMENTE: SIMPUS GYM</p>
</body></html>';

$email = $_REQUEST['mail'];
$asunto = 'NOTIFICACIÓN SIMPUS GYM';
$cabeceras = "Content-type: text/html\r\n";

mail($email,$asunto,$codigohtml,$cabeceras);
}
?>
<script type="text/javascript">
    	location.href='administrador.php?<?php echo $_REQUEST['ir'] ?>';
    </script>
</body>
</html>