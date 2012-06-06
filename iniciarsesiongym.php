<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Iniciando sesión</title>
</head>

<body>
<?php
include("conexion.php");
$consulta = mysql_query("select * from usuarios where usuario = '$_REQUEST[usuario]' and contrasena = '$_REQUEST[contrasena]'");

if($row = mysql_fetch_array($consulta))
{
	if($row['autorizado'] == 1)
	{
		$_SESSION['usuario'] = $row['usuario'];
			?>
            <script type="text/javascript">
				location.href='gym.php';
			</script>            
            
			<?php	
		
	}
	else
	{
	?>	
			<script type="text/javascript">				
				location.href='entragym.php?noautorizado';
			</script>  
    <?php
	}
		
}
else
{
		?>
			<script type="text/javascript">
				location.href='entragym.php?error';
			</script>
		<?php	
}


mysql_close($conexion);

?>
</body>
</html>