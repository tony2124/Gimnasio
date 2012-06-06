<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::Entrar SIMPUS GYM::</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<style type="text/css">
titulo {
	color: #FFF;
}
.titulo {
	font-weight: bold;
	font-family: Tahoma, Geneva, sans-serif;
	color: #FFF;
}
</style>
</head>
<body background="imagenes/fondo.png">
<form id="form1" name="form1" method="post" action="iniciarsesiongym.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="240" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td colspan="2" align="center"><?php  if(isset($_REQUEST['error'])) echo "Error de sesión" ?></td>
    </tr>
    <tr>
      <td height="27" colspan="2" align="center" bgcolor="#000000" class="titulo">INICIO DE SESIÓN</td>
    </tr>
    <tr>
      <td width="94" height="40" bgcolor="#CCCCCC">Usuario</td>
      <td width="146" bgcolor="#CCCCCC"><label for="textfield"><span id="sprytextfield1">
      <input name="usuario" type="text" id="usuario" maxlength="16" />
      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldMinCharsMsg">Minimum number of characters not met.</span></span></label></td>
    </tr>
    <tr>
      <td height="39" bgcolor="#CCCCCC">Contraseña</td>
      <td bgcolor="#CCCCCC"><span id="sprypassword1">
      <label for="contrasena"></label>
      <input name="contrasena" type="password" id="contrasena" maxlength="16" />
      <span class="passwordRequiredMsg">A value is required.</span><span class="passwordInvalidStrengthMsg">The password doesn't meet the specified strength.</span><span class="passwordMinCharsMsg">Minimum number of characters not met.</span><span class="passwordMaxCharsMsg">Exceeded maximum number of characters.</span></span></td>
    </tr>
    <tr>
      <td height="26" colspan="2" align="center" bgcolor="#000000"><input style="width:70px;" type="submit" name="button" id="button" value="Entrar" />
      <input onclick="location.href='index.php'" style="width:70px;" type="button" name="button2" id="button2" value="Regresar" /></td>
    </tr>
  </table>
</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {minChars:8});
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {minAlphaChars:1, minNumbers:1, minChars:10, maxChars:16});
</script>
</body>
</html>