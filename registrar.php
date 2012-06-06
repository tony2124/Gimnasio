<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insertar datos</title>
</head>

<body>
<?php
include("conexion.php");

$nombre = $_REQUEST['nombre'];
$apellidos = $_REQUEST['apellidos'];
$usuario = $_REQUEST['usuario'];
$contrasena1 = $_REQUEST['contrasena1'];
$email = $_REQUEST['email'];
$sexo = $_REQUEST['sexo'];
$telefono = $_REQUEST['telefono'];
$direccion = $_REQUEST['direccion'];

if (is_uploaded_file($_FILES['foto']['tmp_name'])) 
{ 
   $imagen = $_FILES['foto']['name']; 
   
   $imagen1 = explode(".",$imagen); 
   
   if ($imagen1[1] == "JPG" || $imagen1[1] == "PNG" || $imagen1[1] == "GIF" || $imagen1[1] == "jpg" || $imagen1[1] == "png" || $imagen1[1] == "gif"){
	
     move_uploaded_file($_FILES['foto']['tmp_name'], "imagenes/usuarios/".$imagen); 
   /********** SI TODO VA BIEN ************/
   
   if(mysql_query("insert into usuarios values('$usuario','$contrasena1','$nombre','$apellidos','$email','$sexo','$telefono','$direccion','$imagen',0,0,0)",$conexion)) 
   { 
   
   ?>

	<script type="text/javascript">
    	location.href='registroUsuario.php?registered';
    </script>

<?php
  }
  else
  {
	  echo mysql_error();
?>

<script type="text/javascript">
location.href='registroUsuario.php?noregistered';
</script>

<?php 
}  
   
   /***************************************/
   
   }
   else
   {?>
	   <script type="text/javascript">
location.href='registroUsuario.php?isnotaimage';
</script>
   <?php 
   }
}
else
{?>
	<script type="text/javascript">
location.href='registroUsuario.php?noimageuploaded';
</script>
<?php 
}
   mysql_close($conexion);
?>
</body>
</html>