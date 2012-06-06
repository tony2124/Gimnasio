<?php  session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Agenda</title>
<style type="text/css">
.titulo {
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 14px;
	color: #FFF;
}
</style>
</head>

<body>
<?php 
$dias = 8 - date("w");
 if($dias == 8)
 	$dias = 1;
	
if(!isset($_REQUEST['Insertar']))
{
	$usuario = $_SESSION['usuario'];
	
	/*** VERIFICO SI YA ESTÁ INSCRITO */
	include("conexion.php");
	$U = mysql_query("select * from agenda where usuario = '$usuario'",$conexion);
	$numeroUser = mysql_num_rows($U);
	mysql_close($conexion);
	
	//SI NO EXISTE REGISTROS
	if($numeroUser==0)
	{
		$i=0;
		/******* VARIABLES PARA LAS HORAS */
	$valuehora = array("09:00","09:30","10:00","10:30","11:00",
						"11:30","12:00","12:30","13:00","13:30",
						"14:00","14:30","15:00","15:30","16:00",
						"16:30","17:00","17:30","18:00","18:30",
						"19:00","19:30","20:00");
	
	$mostrarhora = array("09:00-09:30","09:30-10:00","10:00-10:30","10:30-11:00",
						 "11:00-11:30","11:30-12:00","12:00-12:30","12:30-13:00",
						 "13:00-13:30","13:30-14:00","14:00-14:30","14:30-15:00",				
						 "15:00-15:30","15:30-16:00","16:00-16:30","16:30-17:00",
						 "17:00-17:30","17:30-18:00","18:00-18:30","18:30-19:00",
						 "19:00-19:30","19:30-20:00","20:00-20:30");
						 
	$valuehoraotros = array( "09:30","10:00","10:30","11:00",
						"11:30","12:00","12:30","13:00","13:30",
						"14:00","14:30","15:00","15:30","16:00",
						"16:30","17:00","17:30","18:00","18:30",
						"19:00","19:30","20:00","20:30");
	
	$mostrarhoraotros = array("09:30-10:30","10:00-11:00","10:30-11:30","11:00-12:00",
						 "11:30-12:30","12:00-13:00","12:30-13:30","13:00-14:00",
						 "13:30-14:30","14:00-15:00","14:30-15:30","15:00-16:00",				
						 "15:30-16:30","16:00-17:00","16:30-17:30","17:00-18:00",
						 "17:30-18:30","18:00-19:00","18:30-19:30","19:00-20:00",
						 "19:30-20:30","20:00-21:00","20:30-21:30");
	
	$otrasRutinas = array("Músculos Superiores","Músculos Inferiores","Spinning");
	
	$nombredias = array("Lunes","Martes","Miércoles","Jueves","Viernes");
	
	$libres = array(0,0,0,0,0);
	/**********************************/
	
?>
    <form id="form1" name="form1" method="post" action="index.php">
    <table width="700" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr bgcolor="#FEFAAB">
    <td colspan="4" bgcolor="#000000" style="font-family:Tahoma, Geneva, sans-serif; font-size:24px; text-align:center; color:#FFF">
    ::Agenda tus actividades::
    </td>
  </tr>
  
  
  
<?php
$diasemana = 1;
while($diasemana <= 5 )
{
	
	
?>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr bgcolor="#000000" style="color:#FFF; font-size:22px">
    <td width="125" bg>&nbsp;</td>
    <td width="133"><?php echo $nombredias[$diasemana-1] ?></td>
    <td width="163">Horario</td>
    <td width="251">Disponibilidad</td>
  </tr>
  <tr bgcolor="#FDF779">
    <td bgcolor="#FEFAAB">Rutina 1</td>
    <td bgcolor="#FEFAAB" >Cardiováscular</td>
    <td bgcolor="#FEFAAB">

    <select name="horario1<?php echo $diasemana ?>" id="horario1<?php echo $diasemana ?>">
    <?php 

	$i = 0;

	while($i < 22) 
	{ ?>      	

  <option <?php if($_REQUEST['horario1'.$diasemana] == $valuehora[$i]) { ?>selected="selected"<?php } ?> value="<?php echo $valuehora[$i] ?>">
			<?php echo $mostrarhora[$i] ?>
        </option>
        <?php 
		$i++;
	} 	?>    
     </select>
     
      
    </td>
    <td bgcolor="#FFFFFF">
	<?php 
	if(isset($_REQUEST['Verificar']))
	{
		include("conexion.php");
		$FechaLunes = date("Y-m-d",time()+($diasemana - 1 + $dias)*24*60*60);
	/*	echo "select * from agenda where fecha = '$FechaLunes' and area = 1 and hora = '".$_REQUEST['horario1'.$diasemana]."'";*/
		$consulta = mysql_query("select * from agenda where fecha = '$FechaLunes' and area = 1 and hora = '".$_REQUEST['horario1'.$diasemana]."'");
		
		if(mysql_num_rows($consulta) >= 20)	
		{	echo "Usuarios: ".mysql_num_rows($consulta)." Estado: ";	  		
			echo "OCUPADO";	
			$libre[$diasemana-1] = 0;		
		}
		else
		{
			if($_REQUEST['horario1'.$diasemana] < $_REQUEST['horario2'.$diasemana])
			{
				echo "Usuarios: ".mysql_num_rows($consulta)." Estado: ";
				echo "LIBRE";
				$libre[$diasemana-1] = 1;
			}
			else
			{
				echo "CARDIOVÁSCULAR DEBE SER PRIMERO";
				$libre[$diasemana-1] = 0;
			}
			
		}

	}
	
	?></td>
  </tr>
  <tr bgcolor="#FDF779">
    <td bgcolor="#FEFAAB">Rutina 2</td>
    <td bgcolor="#FEFAAB">
      
      <select name="rutina<?php echo $diasemana ?>" id="rutina<?php echo $diasemana ?>">
      <?php 
	  
	  $i = 2;
	  $j = 0;
	  for($i = 2; $i < 5; $i++, $j++)
	  {
	  
	  	if($_REQUEST['rutina'.$diasemana] == $i)
			echo '<option selected="selected" value="'.$i.'">';
		else
        	echo '<option value="'.$i.'">';
        
		echo $otrasRutinas[$j]; 
        
        echo '</option>';

	  }
	  
	  ?>
      </select>
    </td>
    <td bgcolor="#FEFAAB">
    <select name="horario2<?php echo $diasemana ?>" id="horario2<?php echo $diasemana ?>">        
     <?php 
	 
	$i = 0;
	
	while($i < 22) 
	{ ?>      	
     	
  <option <?php if($_REQUEST['horario2'.$diasemana] == $valuehoraotros[$i]) { ?>selected="selected"<?php } ?> value="<?php echo $valuehoraotros[$i] ?>">
			<?php echo $mostrarhoraotros[$i] ?>
        </option>
        <?php 
		$i++; 
	} 	?>    

	 </select>
     
    </td>
    <td bgcolor="#FFFFFF">
	<?php 
	if(isset($_REQUEST['Verificar']))
	{
		include("conexion.php");
		
		$FechaLunes = date("Y-m-d",time()+($diasemana - 1 + $dias)*24*60*60);
		
		//echo "select * from agenda where fecha = '$FechaLunes' and area = ".$_REQUEST['rutina'.$diasemana]." and hora = '".$_REQUEST['horario2'.$diasemana]."'<br>";
		
		$consulta = mysql_query("select * from agenda where fecha = '$FechaLunes' and area = ".$_REQUEST['rutina'.$diasemana]." and hora = '".$_REQUEST['horario2'.$diasemana]."'");


		if($_REQUEST['rutina'.$diasemana] == $_REQUEST['rutina'.($diasemana-1)])
		{
			echo "NO PUEDES ELEGIR DOS ACTIVIDADES SEGUIDAS";
			$libre[$diasemana-1] = 0;
			
		}
		else if(mysql_num_rows($consulta) >= 15)	
		{		  
			echo "Usuarios: ".mysql_num_rows($consulta)." Estado: ";		
			echo "OCUPADO";	
			$libre[$diasemana-1] = 0;
		}
		else
		{
			if($_REQUEST['horario1'.$diasemana] < $_REQUEST['horario2'.$diasemana])
			{
				echo "Usuarios: ".mysql_num_rows($consulta)." Estado: ";
				echo "LIBRE";
				$libre[$diasemana-1] = 1;
			
			}
			else
			{
				echo "CARDIOVÁSCULAR DEBE SER PRIMERO";
				$libre[$diasemana-1] = 0;
			}
			
		}

	}
	
	?></td>
  </tr>
  
  <?php 
  $diasemana++;
  } 
  
  ?>
  
  <tr bgcolor="#000000">
    <td>&nbsp;</td>
    <td>
      <input name="Verificar" type="submit" value="Verificar" />

  </td>
    <td></td>
    <td>
    <?php
	if(isset($_REQUEST['Verificar']))
	{
		if($libre[0] == 1 && $libre[1] == 1 &&
		$libre[2] == 1 && $libre[3] == 1 &&
		$libre[4] == 1 )
		{
	 ?>
    	<input type="submit" name="Insertar" id="button" value="Dar De Alta Actividades" />
    	<?php 
		}
	}
	?>
    </td>
  </tr>
</table></form>

  <?php 
	}
	else
	{ ?>
<p align="center" style="color:#FFF">YA ESTÁS REGISTRADO, A CONTINUACIÓN SE MUESTRA TU HORARIO.</p>
<?php
include("conexion.php");
$consulta = mysql_query("select * from agenda natural join area where usuario = '$_SESSION[usuario]' order by fecha");

?>
<table width="500" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr class="titulo">
    <td width="166" height="28" align="center" bgcolor="#000000">ACTIVIDADES</td>
    <td width="138" align="center" bgcolor="#000000">DIA</td>
    <td width="96" align="center" bgcolor="#000000">HORA</td>
  </tr>
  <?php
  
  while($row = mysql_fetch_array($consulta))
  {
  ?>
  <tr>
    <td bgcolor="#FEFAAB"><?php echo $row['nombre_area'] ?></td>
    <td bgcolor="#FEFAAB"><?php echo $row['fecha'] ?></td>
    <td bgcolor="#FEFAAB"><?php echo $row['hora'] ?></td>
  </tr>
  <?php
  }
  ?>
  
</table>
  <?php
	}
}
else
{
	include("conexion.php");
	
	$dias = 8 - date("w");
 if($dias == 8)
 	$dias = 1;
	
	$indice = 0;
	
	while($indice < 5)
	{
		$FechaLunes = date("Y-m-d",time()+($indice + $dias)*24*60*60);
	//	echo "insert into agenda values('$_SESSION[usuario]',1,'$FechaLunes','".$_REQUEST['horario1'.($indice+1)]."',0)<br>";
		mysql_query("insert into agenda values('$_SESSION[usuario]',1,'".$_REQUEST['horario1'.($indice+1)]."','$FechaLunes',0)");
		
		$indice++;
	}
	
	$indice = 0;

	while($indice < 5)
	{
		$FechaLunes = date("Y-m-d",time()+($indice + $dias)*24*60*60);
		mysql_query("insert into agenda values('$_SESSION[usuario]',".$_REQUEST['rutina'.($indice+1)].",'".$_REQUEST['horario2'.($indice+1)]."','$FechaLunes',0)");
		
		$indice++;
	}
	?>
<script type="text/javascript">
		location.href='index.php?introducido';
	   </script>
	<?php
}
?>

</body>
</html>