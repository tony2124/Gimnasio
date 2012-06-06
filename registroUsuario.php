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
	height:450px;
	background:#666;
	opacity:0.8;
	padding-left:40px;
	padding-top:5px;
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
	width:650px;
	height:300px;
	background:#000;
	float:left;
	border-radius: 10px 10px 10px 10px;
	margin-left:20px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
	color:#FFF;
/*	padding:10px 10px 10px 10px;*/
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

.cursiva {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
	font-style: italic;
	color: #090;
	border-radius: 0px 0px 20px 20px;
	background-color: #000;
	text-align: center;
}
.registrado {
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 14px;
	background-color: #8FFB62;
	width: 600px;
	border: 3px solid #CF0;
	text-align: center;
	font-weight: normal;
}
.noregistrado {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 12px;
	font-weight: bold;
	color: #C30;
	background-color: #FEE2CD;
	width: 600px;
	border: 3px solid #F30;
	text-align: center;
}
.textoinscripcion {
	color: #FFF;
	font-size: 24;
	font-family: Tahoma, Geneva, sans-serif;
}
</style>

<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="SpryAssets/SpryTooltip.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryTooltip.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div align="center" style="width:100%;">
<div class="encabezado"></div>
<div class="menus"><span class="titulo">SIMPUS GYM</span><br />
  &quot;EL EJERCICIO ES SALUD&quot;</div>
<div class="contenido" align="left">

<table width="957" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="286" height="280" align="center" valign="top"><p>
        <input style="background:#810131; width:280px; height:40px; color:#FFF; border-radius: 15px 15px 0px 0px;" type="submit" name="button2" id="button2" value="INICIO" onclick="location.href='index.php'" />        
        <img src="imagenes/lapiz-papel.png" /></p>
        <p class="textoinscripcion">Inscríbite desde la comodidad de tu hogar y agenda tus actividades a lo largo de la semana. ;)</p></td>
      <td width="680" align="center" valign="middle">
   
      <?php if(isset($_REQUEST['registered'])) { ?>
<div class="registrado">
                <p>¡Se ha registrado correctamente en el sistema! Le pedimos de favor que espere la autorización del administrador para que pueda ingresar al sistema y elegir las actividades que desea desempeñar durante la siguiente semana. <a href="index.php">Ir a inicio</a></p>
      </div>
      <?php  }else if(isset($_REQUEST['noregistered'])) {  ?>
      <div class="noregistrado">
        <p>No se ha podido registrar en nuestro sistema, por favor contacte al administrador con la siguiente dirección de correo electrónico: alfonso.calderon.chavez@gmail.com. <a href="registroUsuario.php">Volver a registrar</a></p>
      </div>
     
        <?php } else if(isset($_REQUEST['isnotaimage'])) {  ?>

      <div class="noregistrado">
        <p>El archivo que cargaste no es una imagen que acepte el sistema, por favor intenta con una nueva extensión.<a href="registroUsuario.php"> Volver a registrar</a></p>
      </div>
      <p>&nbsp;</p>
      <?php  }else if(isset($_REQUEST['noimageuploaded'])) {  ?>
      <div class="noregistrado">
        <p>No se ha cargado una imagen, es un requisito cargar la imagen.<a href="registroUsuario.php">Volver a registrar</a></p>
      </div>
      <p>&nbsp;</p>
      <?php } else {?>
      
      <form action="registrar.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <table width="650" border="0" cellpadding="0" cellspacing="0" bgcolor="#000000" class="informacion" style="border-radius: 20px 20px 20px 20px; color:#FFF">
        <tr>
          <td style="color:#FFF; text-align:center; border-radius:20px 20px 0px 0px; font-family: Verdana, Geneva, sans-serif; font-size: 24px; font-weight: bold;" height="25" colspan="3" bgcolor="#810131">::REGISTRO::</td>
        </tr>
        <tr>
          <td width="164" align="right">Nombre</td>
          <td width="16">&nbsp;</td>
          <td width="1256"><span id="sprytextfield1">
            <label for="text3"></label>
            <input name="nombre" type="text" id="text3" size="50" maxlength="30" />
            <span class="textfieldRequiredMsg">Debe instroducir su nombre.</span></span></td>
        </tr>
        <tr>
          <td align="right">Apellidos</td>
          <td>&nbsp;</td>
          <td><span id="sprytextfield2">
            <input name="apellidos" type="text" id="apellidos" size="50" maxlength="50" />
            <span class="textfieldRequiredMsg">Debes introducir los apellidos.</span></span></td>
        </tr>
        <tr>
          <td align="right"><label for="usuario">Usuario</label></td>
          <td>&nbsp;</td>
          <td><span id="sprytextfield3">
            <input name="usuario" type="text" id="usuario" size="25" maxlength="25" />
            <span class="textfieldRequiredMsg">Introduce un usuario.</span><span class="textfieldMinCharsMsg">El usuario debe estar entre los 8 y 16 caracteres.</span><span class="textfieldMaxCharsMsg">.</span><span class="textfieldInvalidFormatMsg">Formato inválido.</span></span></td>
        </tr>
        <tr>
          <td align="right">Contraseña</td>
          <td>&nbsp;</td>
          <td><span id="sprypassword1">
          <input name="contrasena1" type="password" id="contrasena1" size="25" maxlength="16" />
          <span class="passwordRequiredMsg">Debes introducir una contraseña.</span><span class="passwordMinCharsMsg">La contraseña debe estar entre los 8 y 16 caracteres.</span><span class="passwordMaxCharsMsg">La contraseña debe estar entre los 8 y 16 caracteres.</span><span class="passwordInvalidStrengthMsg">La contraseña debe tener letras y números.</span></span></td>
        </tr>
        <tr>
          <td align="right"><label for="contrasena2">Repetir contraseña</label></td>
          <td>&nbsp;</td>
          <td><span id="spryconfirm1">
            <input name="contrasena2" type="password" id="contrasena2" size="25" maxlength="16" />
            <span class="confirmRequiredMsg">Debe introducir la contraseña.</span><span class="confirmInvalidMsg">Las contraseñas no coinciden.</span></span></td>
        </tr>
        <tr>
          <td align="right">Email</td>
          <td>&nbsp;</td>
          <td><span id="sprytextfield4">
            <input name="email" type="text" id="email" size="50" maxlength="50" />
            <span class="textfieldRequiredMsg">Introduce un correo electrónico..</span><span class="textfieldInvalidFormatMsg">Formato inválido.</span></span></td>
        </tr>
        <tr>
          <td align="right">Sexo</td>
          <td>&nbsp;</td>
          <td><input name="sexo" type="radio" id="radio" value="H" checked="checked" />
            <label for="radio">Hombre</label>
            <input type="radio" name="sexo" id="radio2" value="M" />
            <label for="radio2">Mujer</label></td>
        </tr>
        <tr>
          <td align="right">Teléfono</td>
          <td>&nbsp;</td>
          <td><span id="sprytextfield7">
            <input type="text" name="telefono" id="telefono" />
            <span class="textfieldRequiredMsg">Introduzca un teléfono.</span><span class="textfieldInvalidFormatMsg">Introduzca un teléfono válido.</span><span class="textfieldMinCharsMsg">Faltan caracteres.</span><span class="textfieldMaxCharsMsg">Se excedió del número de caracteres.</span></span></td>
        </tr>
        <tr>
          <td align="right">Dirección</td>
          <td>&nbsp;</td>
          <td><span id="sprytextarea1">
            <label for="direccion"></label>
            <textarea name="direccion" id="direccion" cols="45" rows="5"></textarea>
            <span class="textareaRequiredMsg">Introduzca la dirección.</span></span></td>
        </tr>
        <tr>
          <td align="right"><label for="foto">Subir una imagen. </label></td>
          <td>&nbsp;</td>
          <td><input type="file" name="foto" id="foto" /></td>
        </tr>
        <tr>
          <td colspan="3" align="center"><input type="submit" name="button" id="button" value="Registrar" /></td>
        </tr>
        <tr>
          <td style="border-radius:0px 0px 20px 20px;" height="25" colspan="3" align="center">&nbsp;</td>
        </tr>
      </table>
  </form>
      <p>&nbsp;</p>
    	
   <?php } ?>   
      </td>
</tr>
  </table>


</div>

<div class="pie">Todos los derechos reservados &copy; Desarrollado por<a href="http://www.facebook.com/GREENTURNNER"> Alfonso Calderón</a> y Gersaín Aguilar</div>
</div>

<?php if(!isset($_REQUEST['registered']) && !isset($_REQUEST['noregistered']) && 
!isset($_REQUEST['noimageuploaded']) && !isset($_REQUEST['isnotaimage'])) { ?>
<script type="text/javascript">
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "custom");
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {minChars:10, maxChars:16, minAlphaChars:1, minNumbers:1});
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "contrasena1");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "email");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "integer", {minChars:10, maxChars:12});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
</script>
<?php } ?>
</body>
</html>