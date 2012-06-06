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
<div class="menus"><span class="titulo">SIMPUS GYM</span><br />
  &quot;EL EJERCICIO ES SALUD&quot;</div>
<div class="contenido" <?php if(isset($_SESSION['usuario'])) { ?> style="height:650px;" <?php } ?> align="left">
	<?php if(isset($_SESSION['usuario'])) { 
	include("GimnasioAlfonso.php");
	?>
    
    
    <p ><input style="background:#900; width:80px; border-radius: 5px 5px 0px 0px; color:#FFF" type="button" name="salir" onclick="location.href='logout.php'" value="Salir" /></p>
    
    <?php }else{ ?>
    <div style="height:300px; float:left">
    <div class="iniciosesion">
	  <form id="form1" name="form1" method="post" action="signin.php">
	   <div style="background:#C06D34; color:#FFF; border-radius: 20px 20px 0px 0px; padding-top:10px; padding-bottom:10px; text-align:center; font-family: Verdana, Geneva, sans-serif; font-size: 18px;">::INICIO DE SESIÓN::</div>
	   
        <table align="center" width="300" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="3" align="center">
            <?php if(isset($_REQUEST['noautorizado'])) echo "No ha sido autorizado aún"; else if(isset($_REQUEST['error'])) echo "La contraseña o usuario son incorrectos"; ?></td>
          </tr>
          <tr>
            <td rowspan="2" align="right"><img src="imagenes/Login.png" width="90" height="88" /></td>
            <td height="40" align="right">Usuario</td>
            <td><span id="sprytextfield1">
            <input type="text" name="usuario" id="text2" />
            <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldMinCharsMsg">Minimum number of characters not met.</span><span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.</span></span></td>
          </tr>
          <tr>
            <td height="37" align="right">Contrraseña</td>
            <td><span id="sprypassword1">
            <input type="password" name="contrasena" id="contrasena" />
            <span class="passwordRequiredMsg">A value is required.</span><span class="passwordInvalidStrengthMsg">The password doesn't meet the specified strength.</span><span class="passwordMinCharsMsg">Minimum number of characters not met.</span><span class="passwordMaxCharsMsg">Exceeded maximum number of characters.</span></span></td>
          </tr>
          <tr>
            <td colspan="3" align="center"><input style="background:#D2F766; width:150px; border-radius: 10px 10px 10px 10px;" type="submit" name="button" id="button" value="Entrar" /></td>
          </tr>
          <tr>
            <td colspan="3" align="center"><a href="registroUsuario.php">¿No eres usuario registrado?</a></td>
          </tr>
        </table>
	  </form>
    
  </div>
  
  <div>
  
  <div style="float:left">
  <table style="color:#FFF; text-align:justify; font-family:Tahoma, Geneva, sans-serif"><tr><td width="250" height="150">Has clic en el ícono de adelante para que puedas entrar a tu gimnasio, siempre hacemos que sea más fácil para ti entrar, ahora no tienes que llegar a registrarte con una persona sino directamente con nuestro sistema. </td></tr></table>
  </div>
  <div style="float:left">
  <table><tr><td  height="150"><a href="entragym.php">
  
  <img src="imagenes/entragym.png" />
  
  </a></td></tr></table>
  </div>
  
  </div>
  
  </div>
  <div class="informacion">
    <p>En nuestro gimnasio puedes mantenerte en forma contamos con equipo especializado.</p>
    <p>Además nos gusta mantenernos actualizados, ahora puedes visitarnos desde nuestro sitio de internet, donde podrás agendar tus rutinas. </p>
    <p>Solo haz clic en el link de registrar que está al lado izquierdo y en cuanto confirmemos tu registro podrás angendarte.</p>
    <p>También síguenos en nuestras redes sociales. Y comparte tus ideas con el resto de nuestros clientes.</p>
    <p>&nbsp;</p>
    <table width="160" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="40"><a href="http://www.facebook.com/" target="_new"><img src="imagenes/facebook.png" title="Facebook" width="32" height="32" /></a></td>
        <td width="40"><a href="http://www.youtube.com" target="_new"><img src="imagenes/youtube.png" title="Youtube" width="32" height="32" /></a></td>
        <td width="40"><a href="http://www.twitter.com" target="_new"><img src="imagenes/twitter.png" title="Twitter" width="32" height="32" /></a></td>
        <td width="40"><a href="http://www.myspace.com" target="_new"><img src="imagenes/myspace.png" title="Myspace" width="32" height="32" /></a></td>
      </tr>
    </table>
  </div>
  <?php } ?>
  </div>

<div class="pie">Todos los derechos reservados &copy; Desarrollado por<a href="http://www.facebook.com/GREENTURNNER"> Alfonso Calderón</a> y <a href="http://www.gersain.academiadesistemas.net">Gersaín Aguilar</a></div>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {minChars:8, maxChars:16});
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {minAlphaChars:1, minChars:10, maxChars:16, minNumbers:1});
</script>
</body>
</html>
