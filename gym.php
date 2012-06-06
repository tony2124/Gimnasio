<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::SIMPUS GYM::</title>
<style type="text/css">
.encabezado
{
	width:1000px;
	height:150px;
	/*background:#000;*/
	opacity:0.98;
	background:url(imagenes/encabezado.png);
	border-radius: 10px 10px 0px 0px;
}

.menus
{
	width:1000px;
	height:40px;
	background:#000;
	opacity:0.7;
	color:#FFF;
	padding-top:5px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:10px
}

.contenido
{
	width:960px;
	height:350px;
	background:#666;
	opacity:0.8;
	padding-left:40px;
	padding-top:40px;
}

.pie
{
	width:1000px;
	height:20px;
	background:#000;
	opacity: 0.7;
	color: #FFF;
	padding-top:5px;
	padding-bottom:5px;
	border-radius: 0px 0px 10px 10px;
}

.informacion
{
	width:550px;
	height:300px;
	background:#000;
	float:left;
	border-radius: 10px 10px 10px 10px;
	margin-left:20px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
	color:#FFF;
	padding:10px 10px 10px 10px;
}


.iniciosesion
{
	width:350px;
	height:200px;
	background:#000;
	border-radius: 20px 20px 20px 20px;	
	float:left;


}

body {
	background-image: url(imagenes/fondo.png);
	background-repeat: repeat;
}
.contenido .iniciosesion #form1 table {
	color: #FFF;
}
.titulo {
	font-size: 18px;
}
</style>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div align="center" style="width:100%;">
<div class="encabezado"></div>
<div class="menus">
	<span class="titulo">SIMPUS GYM</span>
<br />
  &quot;EL EJERCICIO ES SALUD&quot;</div>

<div class="contenido" <?php if(isset($_SESSION['usuario'])) { ?> style="height:650px;" <?php } ?> align="left">
	<?php if(isset($_SESSION['usuario'])) { 
	//include("GimnasioAlfonso.php");
	include("comprobaciones.php");
	
	verificarHora();
	
	if(multa() >= 2)
	{
		?>
        <table width="300" border="0" align="center" cellpadding="0" cellspacing="0" style="color:#FFF">
              <tr>
                <td align="center" bgcolor="#990000">LO SENTIMOS</td>
              </tr>
              <tr>
                <td height="103" align="center" bgcolor="#000000"> TIENE DOS DÍAS DE ADEUDO, DEBES PAGARLO PARA ENTRAR.</td>
              </tr>
              <tr>
                <td height="81" align="center" bgcolor="#000000">YA NO PODRÁ ACCEDER MÁS AL GIMNASIO DURANTE LA SEMANA, DEBERÁ PAGAR PARA VOLVER A AGENDAR OTRA SEMANA DE ACTIVIADES.</td>
              </tr>
    </table>
       
        
        <?php
	}
	else if(isDia())
	{
		//echo "Hoy es día";
		
		if(isHora())
		{
			include("conexion.php");
			$consulta = mysql_query("select * from usuarios where usuario = '$_SESSION[usuario]'");
			if($row = mysql_fetch_array($consulta))
			{
			?>

          
    <table width="371" border="0" align="center" cellpadding="0" cellspacing="0" style="background:#000; color:#FFF; width:auto; font-family:Tahoma, Geneva, sans-serif; font-size:18px;">
  <tr>
    <td width="150" rowspan="3"><img src="imagenes/usuarios/<?php echo $row['foto'] ?>" width="150" height="120" /></td>
    <td width="221" height="38" align="center">Bienvenido al gimnasio</td>
  </tr>
  <tr>
    <td height="39" align="center"><?php echo $row['nombre_usuario']. " ".$row['apellidos_usuario'] ?></td>
  </tr>
  <tr>
    <td align="center">Pasa a realizar tus rutinas</td>
  </tr>
</table>

            <?php
			}
			
			if(horaactual() >= $fechacardio && horaactual() < mediaHora($fechacardio))
			{
			mysql_query("update agenda set asistencia = 1 where usuario = '$_SESSION[usuario]' and fecha = '".fechaactual()."' and hora = '".$fechacardio."'");
			}
			else if(horaactual() >= $fechaotros && horaactual() < unaHora($fechaotros))
			{
			mysql_query("update agenda set asistencia = 1 where usuario = '$_SESSION[usuario]' and fecha = '".fechaactual()."' and hora = '".$fechaotros."'");
			}
			mysql_close($conexion);
			if(multa() == 1)
			{ ?>
            <br /><br />
				<table width="300" border="0" align="center" cellpadding="0" cellspacing="0" style="color:#FFF">
              <tr>
                <td align="center" bgcolor="#990000">ADEDUDOS</td>
              </tr>
              <tr>
                <td height="103" align="center" bgcolor="#000000">TIENE UN ADEUDO DE 1 DÍA.</td>
              </tr>
              <tr>
                <td height="81" align="center" bgcolor="#000000">LE PEDIMOS DE LA MANERA MÁS ATENTA QUE CUBRA DICHO ADEUDO YA QUE DE TENER 2 DÍAS DEBIDOS PERDERÁ EL ACCESO AL GIMNASIO.</td>
              </tr>
    </table>
			  <?php
			}
		}
		else /*if(isHoraAntes())*/
		{ ?>
				<table width="300" border="0" align="center" cellpadding="0" cellspacing="0" style="color:#FFF">
              <tr>
                <td align="center" bgcolor="#990000">LO SENTIMOS</td>
              </tr>
              <tr>
                <td height="103" align="center" bgcolor="#000000">HOY SÍ ESTÁ AGENDADO PARA RELIZAR ACTIVIDADES PERO NO ES HORA DE SU RUTINA.</td>
              </tr>
              <tr>
                <td height="81" align="center" bgcolor="#000000">POR FAVOR INICIE SESIÓN EN NUESTRO SITIO WEB PARA QUE VERIFIQUE SU HORARIO.</td>
              </tr>
    </table>
          <?php
		}
	}
	else
	{
	?>
		
    <table width="300" border="0" align="center" cellpadding="0" cellspacing="0" style="color:#FFF">
              <tr>
                <td align="center" bgcolor="#990000">LO SENTIMOS</td>
              </tr>
              <tr>
                <td height="103" align="center" bgcolor="#000000">HOY NO LE TOCA ENTRAR AL GIMNASIO, NO SE ENCUENTRA AGENDADA SU ENTRADA A NINGUNA HORA DE HOY.</td>
              </tr>
              <tr>
                <td height="81" align="center" bgcolor="#000000">POR FAVOR INICIE SESIÓN EN NUESTRO SITIO WEB PARA QUE VERIFIQUE SU HORARIO.</td>
              </tr>
    </table>
    <?php
	}
	
	?>
    
    <p><input style="background:#900; width:80px; border-radius: 5px 5px 0px 0px; color:#FFF" type="button" name="salir" onclick="location.href='logout.php'" value="Salir" /></p>
    
    <?php }else{ ?>
    

  <?php } ?>
</div>

<div class="pie">Todos los derechos reservados &copy; Desarrollado por<a href="http://www.facebook.com/GREENTURNNER"> Alfonso Calderón</a> y <a href="http://www.facebook.com">Gersaín Aguilar</a></div>
</div>
</body>
</html>
