<?php session_start(); 
if(isset($_SESSION['tipo']))
	if($_SESSION['tipo'] == 1)
	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrador</title>
<style type="text/css">
.botonautorizar
{
	width:110px; 
	height:30px; 
	text-align:center; 
	background:#090; 
	color:#FFF;
	font-size:15px;
	font-family:Verdana, Geneva, sans-serif;
}

.botonmenu
{
	width:180px; 
	height:25px; 
	text-align:center; 
	background:#630; 
	color:#FFF;
	font-size:15px;
	font-family:Verdana, Geneva, sans-serif;
	border-radius: 15px 15px 0px 0px;
}

.botonnoautorizar
{
	width:110px; 
	height:30px; 
	text-align:center; 
	background:#900; 
	color:#FFF;
	font-size:15px;
	font-family:Verdana, Geneva, sans-serif;
}



.textoparrafo
{
	color:#FFF;
	font-family:Tahoma, Geneva, sans-serif;
	font-size:14px;
}

body {
	background-image: url(imagenes/fondo.png);
	background-repeat: repeat;
}
.botonmenu1 {	width:180px; 
	height:25px; 
	text-align:center; 
	background:#630; 
	color:#FFF;
	font-size:15px;
	font-family:Verdana, Geneva, sans-serif;
	border-radius: 15px 15px 0px 0px;
}
</style>
</head>

<body>

<div align="center" style="width:100%">
<input type="button" class="botonmenu" <?php if(!isset($_REQUEST['autorizados']) && !isset($_REQUEST['noautorizados']) && !isset($_REQUEST['adeudos']) ) { ?>style="background:#663399"<?php } ?> onclick="location.href='administrador.php'" value="Autorizar" />
<input type="button" class="botonmenu" <?php if(isset($_REQUEST['autorizados'])) { ?>style="background:#090"<?php } ?> onclick="location.href='administrador.php?autorizados'" value="Ver autorizados" />
<input type="button" class="botonmenu" <?php if(isset($_REQUEST['noautorizados'])) { ?>style="background:#990000"<?php } ?> onclick="location.href='administrador.php?noautorizados'" value="Ver No autorizados" />
<input type="button" class="botonmenu" <?php if(isset($_REQUEST['adeudos'])) { ?>style="background:#3333CC"<?php } ?> onclick="location.href='administrador.php?adeudos'" value="Adeudos" />
<input type="button" class="botonmenu1" onclick="location.href='logout.php'" value="Salir" />
</div>
<div align="center" style="width:100%;">
<div style="width:1021px; background:#000; opacity:0.8; padding:5px 5px 5px 5px; 
border-radius:10px 10px 10px 10px;">
  <?php
if(isset($_REQUEST['autorizados']))
{
	include("conexion.php");
	
	$consulta =  mysql_query("select * from usuarios where autorizado = 1 and tipo = 0",$conexion);
	if(mysql_num_rows($consulta) > 0)
	{
		?>

    <p align="center" class="textoparrafo">En esta categoría puede ver los usuarios que han sido autorizados para que puedan agendar sus ejercicios.</p>
    <p align="center" class="textoparrafo"> Haga clic en el botón de la derecha para que pueda quitar la autorización.</p>
</div>
<br /><br />
<div style="width:1021px; background:#000; opacity:0.8; border-radius:20px 20px 10px 10px; padding-bottom:5px;">
<table class="textoparrafo" align="center" width="1021" border="0" cellspacing="1" cellpadding="1">
          <tr bgcolor="#006600" align="center">
            <td style="border-radius: 20px 0px 0px 0px;" width="35">No.</td>
            <td width="86">Foto</td>
            <td width="120">Usuario</td>
            <td width="272" bgcolor="#006600">Nombre</td>
            <td width="31">Sexo</td>
            <td width="158">Email</td>
            <td style="border-radius: 0px 20px 0px 0px;" width="179">Dirección</td>
            <td style="border-radius: 20px 20px 0px 0px;" width="115">Acción</td>
  </tr>
          <?php 
            
            $i = 0;
            while($row = mysql_fetch_array($consulta))
            {	
            $i++;
           ?>
          <tr>
            <td><?php echo $i ?></td>
            <td><img src = "imagenes/usuarios/<?php echo $row['foto'] ?>" width="80" height="60" /></td>
            <td><?php echo $row['usuario'] ?></td>
            <td><?php echo $row['nombre_usuario']." ".$row['apellidos_usuario'] ?></td>
            <td><?php echo $row['sexo'] ?></td>
            <td><?php echo $row['correo_electronico'] ?></td>
            <td style="padding-left:10px"><?php echo $row['direccion'] ?></td>
            <td><input name="Button2" onclick="location.href='autorizar.php?usuario=<?php echo $row['usuario'] ?>&amp;autorizar=0&amp;mail=<?php echo $row['correo_electronico'] ?>&amp;nombre=<?php echo $row['nombre_usuario']." ".$row['apellidos_usuario'] ?>'" type="button" class="botonnoautorizar" value="Denegar" /></td>                   
          </tr>
          <?php } ?>
</table>
        
        <?php

	}else { ?>
<table align="center" class="textoparrafo"><tr><td>
No existe ningún usuario en esta categoría.
</td></tr></table>
<?php } 
	mysql_close($conexion);	
}
else if(isset($_REQUEST['noautorizados']))
{

	include("conexion.php");
	
	$consulta =  mysql_query("select * from usuarios where autorizado = -1  and tipo = 0",$conexion);
	if(mysql_num_rows($consulta) > 0)
	{
		?>
<p align="center" class="textoparrafo">En esta categoría puede ver los usuarios que han sido denegados para entrar el sistema.</p>
<p align="center" class="textoparrafo"> Haga clic en el botón de la derecha para que pueda autorizar el acceso.</p>
</div>
<br /><br />
<div style="width:1021px; background:#000; opacity:0.8; border-radius:20px 20px 10px 10px; padding-bottom:5px;">
    <table width="1021" border="0" align="center" cellpadding="1" cellspacing="1" class="textoparrafo">
  <tr bgcolor="#990000" align="center">
            <td style="border-radius: 20px 0px 0px 0px;" width="35">No.</td>
            <td width="86">Foto</td>
            <td width="120">Usuario</td>
            <td width="272">Nombre</td>
            <td width="31">Sexo</td>
            <td width="158">Email</td>
            <td style="border-radius: 0px 20px 0px 0px;" width="177">Dirección</td>
            <td style="border-radius: 20px 20px 0px 0px;" width="117">Acción</td>
      </tr>
          <?php 
            
            $i = 0;
            while($row = mysql_fetch_array($consulta))
            {	
            $i++;
           ?>
          <tr>
            <td><?php echo $i ?></td>
            <td><img src = "imagenes/usuarios/<?php echo $row['foto'] ?>" width="80" height="60" /></td>
            <td><?php echo $row['usuario'] ?></td>
            <td><?php echo $row['nombre_usuario']." ".$row['apellidos_usuario'] ?></td>
            <td><?php echo $row['sexo'] ?></td>
            <td><?php echo $row['correo_electronico'] ?></td>
            <td style="padding-left:10px"><?php echo $row['direccion'] ?></td>
            <td><input name="Button4" onclick="location.href='autorizar.php?usuario=<?php echo $row['usuario'] ?>&amp;autorizar=1&amp;mail=<?php echo $row['correo_electronico'] ?>&amp;nombre=<?php echo $row['nombre_usuario']." ".$row['apellidos_usuario'] ?>'" type="button" class="botonautorizar" value="Autorizar" /></td>                   
          </tr>
          <?php } ?>
</table>
        
        <?php
		
	}else { ?>
<table align="center" class="textoparrafo"><tr><td>
No existe ningún usuario en esta categoría.
</td></tr></table>
<?php } 
	mysql_close($conexion);	

}
else if(isset($_REQUEST['adeudos']))
{

	include("conexion.php");
	
	$consulta =  mysql_query("select usuario, nombre_usuario, apellidos_usuario, foto, sexo, correo_electronico,direccion, sum(adeudo) from usuarios natural join multas where tipo = 0 group by usuario",$conexion);
	if(mysql_num_rows($consulta) > 0)
	{
		?>
<p align="center" class="textoparrafo">En esta categoría puede ver los usuarios que tienen adeudos con el gimnasio.</p>
<p align="center" class="textoparrafo"> Haga clic en el botón de la derecha para que los libere del pago.</p>
</div>
<br /><br />
<div style="width:1021px; background:#000; opacity:0.8; border-radius:20px 20px 10px 10px; padding-bottom:5px;">
    <table width="1021" border="0" align="center" cellpadding="1" cellspacing="1" class="textoparrafo">
  <tr bgcolor="#3333CC" align="center">
            <td style="border-radius: 20px 0px 0px 0px;" width="32">No.</td>
            <td width="84">Foto</td>
            <td width="106">Usuario</td>
            <td width="232" bgcolor="#3333CC">Nombre</td>
        <td width="31">Sexo</td>
            <td width="135" bgcolor="#3333CC">Email</td>
            <td width="81">Adeudo</td>
        <td width="224">Dirección</td>
            <td style="border-radius: 0px 20px 0px 0px;" width="124">Acción</td>
      </tr>
          <?php 
            
            $i = 0;
            while($row = mysql_fetch_array($consulta))
            {	
            $i++;
           ?>
          <tr>
            <td><?php echo $i ?></td>
            <td><img src = "imagenes/usuarios/<?php echo $row['foto'] ?>" width="80" height="60" /></td>
            <td><?php echo $row['usuario'] ?></td>
            <td><?php echo $row['nombre_usuario']." ".$row['apellidos_usuario'] ?></td>
            <td><?php echo $row['sexo'] ?></td>
            <td><?php echo $row['correo_electronico'] ?></td>
            <td align="right"><?php echo "$".$row['sum(adeudo)'] ?></td>
            <td style="padding-left:10px"><?php echo $row['direccion'] ?></td>
            <td><input name="Button3" onclick="location.href='pagar.php?usuario=<?php echo $row['usuario'] ?>'" type="button" class="botonautorizar" value="Pagado" /></td>                   
          </tr>
          <?php } ?>
</table>
        
        <?php
		
	}else { ?>
<table align="center" class="textoparrafo"><tr><td>
No existe ningún usuario en esta categoría.
</td></tr></table>
<?php } 
	mysql_close($conexion);	

	
	
	
}
else
{
include("conexion.php");
	
	$consulta =  mysql_query("select * from usuarios where autorizado = 0 and tipo = 0",$conexion);
	if(mysql_num_rows($consulta) > 0)
	{
?>
<p align="center" class="textoparrafo">En esta categoría puede ver los usuarios que se han registrado en el sistema y están en espera de una autorización.</p>
<p align="center" class="textoparrafo"> Haga clic en el botones de la derecha para autorizar o denegar.</p>
</div>
<br /><br />
<div style="width:1021px; background:#000; opacity:0.8; border-radius:20px 20px 10px 10px; padding-bottom:5px;">
<table width="1021" border="0" align="center" cellpadding="1" cellspacing="1" class="textoparrafo">
  <tr bgcolor="#663399" align="center">
    <td width="35" height="23" style="border-radius: 20px 0px 0px 0px;">No.</td>
    <td width="85">Foto</td>
    <td width="118">Usuario</td>
    <td width="267" bgcolor="#663399">Nombre</td>
    <td width="31">Sexo</td>
    <td width="155">Email</td>
    <td width="187">Dirección</td>
    <td style="border-radius: 0px 20px 0px 0px;" width="118">Acción</td>
  </tr>
  <?php
	$i = 0;
	while($row = mysql_fetch_array($consulta))
	{	
	$i++;
   ?>
  <tr>
    <td height="81"><?php echo $i ?></td>
    <td><img src = "imagenes/usuarios/<?php echo $row['foto'] ?>" width="80" height="60" /></td>
    <td><?php echo $row['usuario'] ?></td>
    <td><?php echo $row['nombre_usuario']." ".$row['apellidos_usuario'] ?></td>
    <td><?php echo $row['sexo'] ?></td>
    <td><?php echo $row['correo_electronico'] ?></td>
    <td style="padding-left:10px"><?php echo $row['direccion'] ?></td>
    <td>
    	<input name="Button" onclick="location.href='autorizar.php?usuario=<?php echo $row['usuario'] ?>&autorizar=1&mail=<?php echo $row['correo_electronico'] ?>&nombre=<?php echo $row['nombre_usuario']." ".$row['apellidos_usuario'] ?>'" type="button" class="botonautorizar" value="Autorizar" />
        
        <input name="Button" onclick="location.href='autorizar.php?usuario=<?php echo $row['usuario'] ?>&autorizar=0&mail=<?php echo $row['correo_electronico'] ?>&nombre=<?php echo $row['nombre_usuario']." ".$row['apellidos_usuario'] ?>'" type="button" class="botonnoautorizar" value="Denegar" />
    </td>
    
  </tr>
  <?php } 
  ?>
</table>

<?php 

}else { ?>
<table align="center" class="textoparrafo"><tr><td>
No existe ningún usuario en esta categoría.
</td></tr></table>

<?php } 
mysql_close($conexion);	
}
?>
</div>
</div>
</body>
</html>
<?php } ?>