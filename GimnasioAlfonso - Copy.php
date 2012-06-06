<?php  session_start();
if(isset($_SESSION['usuario'])) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Agenda</title>
</head>

<body>
<?php 
$dias = 8 - date("w");
 if($dias == 8)
 	$dias = 1;

if(!isset($_POST['Insertar']))
{
	$usuario = $_SESSION['usuario'];
	include("conexion.php");
	$U = mysql_query("select usuario from agenda where usuario = '$usuario'",$conexion);
	
	$numeroUser = mysql_num_rows($U);
	
	mysql_close($conexion);
	if($numeroUser<1)
	{
		$i=0;
	
?>
    <form id="form1" name="form1" method="post" action="">
    <table width="700" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr bgcolor="#FEFAAB">
    <td colspan="4" bgcolor="#000000" style="font-family:Tahoma, Geneva, sans-serif; font-size:24px; text-align:center; color:#FFF">
    ::Agenda tus actividades::
    </td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr bgcolor="#000000" style="color:#FFF; font-size:22px">
    <td width="125" bg>&nbsp;</td>
    <td width="133">Lunes</td>
    <td width="163">Horario</td>
    <td width="251">Disponibilidad</td>
  </tr>
  <tr bgcolor="#FDF779">
    <td bgcolor="#FEFAAB">Rutina 1</td>
    <td bgcolor="#FEFAAB" >Cardiováscular <?php $auxArea = 1;?></td>
    <td bgcolor="#FEFAAB"><select name="HorarioLunes1" id="HorarioLunes1">      <?php 
	if(!isset($_POST['HorarioLunes1'])) 
	{
	?>
      <option value="09:00">9:00-9:30</option>
        <option value="09:30">9:30-10:00</option>
        <option value="10:00">10:00-10:30</option>
        <option value="10:30">10:30-11:00</option>
        <option value="11:00">11:00-11:30</option>
        <option value="11:30">11:30-12:00</option>
        <option value="12:00">12:00-12:30</option>
        <option value="12:30">12:30-13:00</option>
        <option value="13:00">13:00-13:30</option>
        <option value="13:30">13:30-14:00</option>
        <option value="14:00">14:00-14:30</option>
        <option value="14:30">14:30-15:00</option>
        <option value="15:00">15:00-15:30</option>
        <option value="15:30">15:30-16:00</option>
        <option value="16:00">16:00-16:30</option>
        <option value="16:30">16:30-17:00</option>
        <option value="17:00">17:00-17:30</option>
        <option value="17:30">17:30-18:00</option>
        <option value="18:00">18:00-18:30</option>
        <option value="18:30">18:30-19:00</option>
        <option value="19:00">19:00-19:30</option>
        <option value="19:30">19:30-20:00</option>
        <option value="20:00">20:00-20:30</option>
        <?php } 
		else 
		{
			
			$horaCardio = $_POST['HorarioLunes1'];
			$horaRutinaLunes = $_POST['HorarioLunes2'];
			$auxL1 = substr($horaCardio,0,2);
			$auxL2 = substr($horaCardio,3,5);
			$auxLunes1=(int)('0'.$auxL1.$auxL2);
			
			$auxL3 = substr($horaRutinaLunes,0,2);
			$auxL4 = substr($horaRutinaLunes,3,5);
			$auxLunes2=(int)('0'.$auxL3.$auxL4);
			
			include("conexion.php");
		$Lunes1 = mysql_query("select usuario from agenda where fecha ='$FechaLunes' and hora = '$HoraLunes' and area = 1",$conexion);
		$Totalunes1 = mysql_num_rows($Lunes1);
			
			if($auxLunes1 < $auxLunes2 && $totalLunes<=19){
			?>
        		<option value="<?php echo $horaCardio   ?>"><?php echo $horaCardio ?></option>
        	<?php
			}
			else{
				?>
                
				<option value="09:00">9:00-9:30</option>
        		<option value="09:30">9:30-10:00</option>
       	 		<option value="10:00">10:00-10:30</option>
       		 	<option value="10:30">10:30-11:00</option>
        		<option value="11:00">11:00-11:30</option>
        		<option value="11:30">11:30-12:00</option>
        		<option value="12:00">12:00-12:30</option>
        		<option value="12:30">12:30-13:00</option>
        		<option value="13:00">13:00-13:30</option>
        		<option value="13:30">13:30-14:00</option>
        		<option value="14:00">14:00-14:30</option>
       		 	<option value="14:30">14:30-15:00</option>
        		<option value="15:00">15:00-15:30</option>
       		 	<option value="15:30">15:30-16:00</option>
        		<option value="16:00">16:00-16:30</option>
        		<option value="16:30">16:30-17:00</option>
        		<option value="17:00">17:00-17:30</option>
        		<option value="17:30">17:30-18:00</option>
        		<option value="18:00">18:00-18:30</option>
        		<option value="18:30">18:30-19:00</option>
        		<option value="19:00">19:00-19:30</option>
        		<option value="19:30">19:30-20:00</option>
       		    <option value="20:00">20:00-20:30</option>
				
				<?php
				}
		}
		
		?>
      </select>
      <?php $auxHora = 1;
	  
			
	  ?></td>
    <td bgcolor="#FFFFFF"><?php 
	if(isset($_POST['Verificar']))
	{
		
		
		$FechaLunes = date("Y-m-d",time()+(0+$dias)*24*60*60);
		
		

		
		//echo $FechaLunes;
		$HoraLunes = $_POST['HorarioLunes1'];
		include("conexion.php");
		$Lunes1 = mysql_query("select usuario from agenda where fecha ='$FechaLunes' and hora = '$HoraLunes' and area = 1",$conexion);
		$Totalunes1 = mysql_num_rows($Lunes1);
		
		if($Totalunes1>=20)
		{
			echo "Horario Ocupado";			
		}
		else
			{
				if($auxLunes1<$auxLunes2)
				{
					echo "Horario libre";
					$i=$i+1;
					
				}
				else{
					echo "Tu primer actividad debe ser Cardiováscular<br/>";
					
				}
			}
	}
	
	?></td>
  </tr>
  <tr bgcolor="#FDF779">
    <td bgcolor="#FEFAAB">Rutina 2</td>
    <td bgcolor="#FEFAAB">
      
      <select name="Rutina2Lunes" id="Rutina2Lunes">
      <?php if(!isset($_POST['Rutina2Lunes']))
	  {
		  
	  ?>
        <option value="2">Músculos Superiores</option>
        <option value="3">Músculos Inferiores</option>
        <option value="4">Spinning</option>
        <?php 
	  }
	  else
	  {
		  
		  if($auxArea==1 && $auxLunes1 < $auxLunes2){
		  $Rutina2Lunes = $_POST['Rutina2Lunes'];
		  
	  ?>
        <option value="<?php echo $Rutina2Lunes ?>"><?php
		$auxArea = 2; 
		if($Rutina2Lunes=='2')
		{
			echo "Músculos Superiores";
		}
		 if($Rutina2Lunes=='3')
		{
			echo "Músculos Inferiores";
		}
		if($Rutina2Lunes=='4')
		{
			echo "Spinning";
		}
		
		  }
		  else{
		?>
        <option value="2">Músculos Superiores</option>
        <option value="3">Músculos Inferiores</option>
        <option value="4">Spinning</option>
        <?php } ?>
        </option>  
      <?php
	  }
		?>
      </select>
    </td>
    <td bgcolor="#FEFAAB"><select name="HorarioLunes2" id="HorarioLunes2">        <?php if(!isset($_POST['HorarioLunes2']) ){	
	?>
        <option value="09:30">9:30-10:30</option>
        <option value="10:00">10:00-11:00</option>
        <option value="10:30">10:30-11:30</option>
        <option value="11:00">11:00-12:00</option>
        <option value="11:30">11:30-12:30</option>
        <option value="12:00">12:00-13:00</option>
        <option value="12:30">12:30-13:30</option>
        <option value="13:00">13:00-14:00</option>
        <option value="14:00">14:00-15:00</option>
        <option value="14:30">14:30-15:30</option>
        <option value="15:00">15:00-16:00</option>
        <option value="15:30">15:30-16:30</option>
        <option value="16:00">16:00-17:00</option>
        <option value="16:30">16:30-17:30</option>
        <option value="17:00">17:00-18:00</option>
        <option value="17:30">17:30-18:30</option>
        <option value="18:00">18:00-19:00</option>
        <option value="18:30">18:30-19:30</option>
        <option value="19:00">19:00-20:00</option>
        <option value="19:30">19:30-20:00</option>
        <option value="20:00">20:00-21:00</option>
        <?php 
		}
		
		else 
		{
			$HoraAnterior = $_POST['HorarioLunes1'];
			$HoraActual = $_POST['HorarioLunes2'];
			
			$horaCardio = $_POST['HorarioLunes1'];
			$horaRutinaLunes = $_POST['HorarioLunes2'];
			$auxL1 = substr($horaCardio,0,2);
			$auxL2 = substr($horaCardio,3,5);
			$auxLunes1=(int)('0'.$auxL1.$auxL2);
			
			$auxL3 = substr($horaRutinaLunes,0,2);
			$auxL4 = substr($horaRutinaLunes,3,5);
			$auxLunes2=(int)('0'.$auxL3.$auxL4);
			
			include("conexion.php");
			$Area = $_POST['Rutina2Lunes'];
			
		$Lunes = mysql_query("select usuario from agenda where fecha ='$FechaLunes' and hora = '$HoraLunes' and area = $Area",$conexion);
		 
		$totalLunes = mysql_num_rows($Lunes);
		
			
			
			if($auxLunes1 < $auxLunes2 && $auxArea ==2 && $totalLunes<=15){
		?>
			
            <option value="<?php echo $HoraActual ?>"><?php echo $HoraActual?>
			</option>
		<?php
			}
			else
			{?>
			<option value="09:30">9:30-10:30</option>
        <option value="10:00">10:00-11:00</option>
        <option value="10:30">10:30-11:30</option>
        <option value="11:00">11:00-12:00</option>
        <option value="11:30">11:30-12:30</option>
        <option value="12:00">12:00-13:00</option>
        <option value="12:30">12:30-13:30</option>
        <option value="13:00">13:00-14:00</option>
        <option value="14:00">14:00-15:00</option>
        <option value="14:30">14:30-15:30</option>
        <option value="15:00">15:00-16:00</option>
        <option value="15:30">15:30-16:30</option>
        <option value="16:00">16:00-17:00</option>
        <option value="16:30">16:30-17:30</option>
        <option value="17:00">17:00-18:00</option>
        <option value="17:30">17:30-18:30</option>
        <option value="18:00">18:00-19:00</option>
        <option value="18:30">18:30-19:30</option>
        <option value="19:00">19:00-20:00</option>
        <option value="19:30">19:30-20:00</option>
        <option value="20:00">20:00-21:00</option>
			<?php 
			}
			
		} 
		
		?>
        </select></td>
    <td bgcolor="#FFFFFF"><?php 
	
	if(isset($_POST['Verificar']))
	{
		
		$FechaLunes = date("Y-m-d",time()+($dias)*24*60*60);
		//echo $FechaLunes;
		$HoraLunes = $_POST['HorarioLunes2'];
		$cardioLunes = $_POST['HorarioLunes1'];
	
		include("conexion.php");
		$Area = $_POST['Rutina2Lunes'];
		$Lunes = mysql_query("select usuario from agenda where fecha ='$FechaLunes' and hora = '$HoraLunes' and area = $Area;",$conexion);
		 
		$totalLunes = mysql_num_rows($Lunes);
		
		if($totalLunes >= 15)
		{
			echo "Horario Ocupado";
		}
		else
			{
				if($auxLunes1<$auxLunes2)
				{
					echo "Horario libre"; 
					$i=$i+1;
					
				}
				else{
					echo "Tu primer actividad debe ser Cardiováscular<br/>";
					
				}
				if($HoraLunes== $cardioLunes)
				{
					echo "No puedes Elegir esto a la misma hora que Cardiováscular";
				}
			}
	}
	
	?></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
    </tr>
  <tr bgcolor="#006666" style="color:#FFF; font-size:22px">
    <td bgcolor="#000000">&nbsp;</td>
    <td bgcolor="#000000">Martes</td>
    <td bgcolor="#000000">Horario</td>
    <td bgcolor="#000000">Disponibilidad</td>
  </tr>
  <tr bgcolor="#FDF779">
    <td bgcolor="#FEFAAB">Rutina 1</td>
    <td bgcolor="#FEFAAB">Cardiováscular</td>
    <td bgcolor="#FEFAAB"><select name="HorarioMartes1" id="HorarioMartes1">
      <?php 
	if(!isset($_POST['HorarioMartes1'])) 
	{
	?>
      <option value="09:00">9:00-9:30</option>
        <option value="09:30">9:30-10:00</option>
        <option value="10:00">10:00-10:30</option>
        <option value="10:30">10:30-11:00</option>
        <option value="11:00">11:00-11:30</option>
        <option value="11:30">11:30-12:00</option>
        <option value="12:00">12:00-12:30</option>
        <option value="12:30">12:30-13:00</option>
        <option value="13:00">13:00-13:30</option>
        <option value="13:30">13:30-14:00</option>
        <option value="14:00">14:00-14:30</option>
        <option value="14:30">14:30-15:00</option>
        <option value="15:00">15:00-15:30</option>
        <option value="15:30">15:30-16:00</option>
        <option value="16:00">16:00-16:30</option>
        <option value="16:30">16:30-17:00</option>
        <option value="17:00">17:00-17:30</option>
        <option value="17:30">17:30-18:00</option>
        <option value="18:00">18:00-18:30</option>
        <option value="18:30">18:30-19:00</option>
        <option value="19:00">19:00-19:30</option>
        <option value="19:30">19:30-20:00</option>
        <option value="20:00">20:00-20:30</option>
        <?php } 
		else 
		{
			$horaCardio = $_POST['HorarioMartes1'];
			$horaRutinaMartes = $_POST['HorarioMartes2'];
			$auxM1 = substr($horaCardio,0,2);
			$auxM2 = substr($horaCardio,3,5);
			$auxMartes1=(int)('0'.$auxM1.$auxM2);
			
			$auxM3 = substr($horaRutinaMartes,0,2);
			$auxM4 = substr($horaRutinaMartes,3,5);
			$auxMartes2=(int)('0'.$auxM3.$auxM4);
			
			include("conexion.php");
			$Martes1 = mysql_query("select usuario from agenda where fecha ='$FechaMartes' and hora = '$HoraMartes' and area = 1",$conexion);
		$TotaMartes1 = mysql_num_rows($Martes1);
		
			if( $auxMartes1 < $auxMartes2 && $TotaMartes1<=19 )
			{				
			?>
        		<option value="<?php echo $horaCardio   ?>"><?php echo $horaCardio ?></option>
        	<?php
			}
			else{
				?>
                <option value="09:00">9:00-9:30</option>
        <option value="09:30">9:30-10:00</option>
        <option value="10:00">10:00-10:30</option>
        <option value="10:30">10:30-11:00</option>
        <option value="11:00">11:00-11:30</option>
        <option value="11:30">11:30-12:00</option>
        <option value="12:00">12:00-12:30</option>
        <option value="12:30">12:30-13:00</option>
        <option value="13:00">13:00-13:30</option>
        <option value="13:30">13:30-14:00</option>
        <option value="14:00">14:00-14:30</option>
        <option value="14:30">14:30-15:00</option>
        <option value="15:00">15:00-15:30</option>
        <option value="15:30">15:30-16:00</option>
        <option value="16:00">16:00-16:30</option>
        <option value="16:30">16:30-17:00</option>
        <option value="17:00">17:00-17:30</option>
        <option value="17:30">17:30-18:00</option>
        <option value="18:00">18:00-18:30</option>
        <option value="18:30">18:30-19:00</option>
        <option value="19:00">19:00-19:30</option>
        <option value="19:30">19:30-20:00</option>
        <option value="20:00">20:00-20:30</option>
                
			<?php	
				}
		}
		?>
    </select></td>
    <td bgcolor="#FFFFFF"><?php 
	if(isset($_POST['Verificar']))
	{
		
		$FechaMartes = date("Y-m-d",time()+(1+$dias)*24*60*60);
		//echo $FechaMartes;
		$HoraMartes = $_POST['HorarioMartes1'];
		include("conexion.php");
		$Martes1 = mysql_query("select usuario from agenda where fecha ='$FechaMartes' and hora = '$HoraMartes' and area=1;",$conexion);
		$TotalMartes1 = mysql_num_rows($Martes1);
		
		if($TotalMartes1>=20)
		{
			echo "Horario Ocupado";			
		}
		else
			{
				if($auxMartes1<$auxMartes2)
				{
					echo "Horario libre";
					$i=$i+1;
					
				}
				else{
					echo "Tu primer actividad debe ser Cardiováscular";
					
				}
			}
	}
	
	?></td>
  </tr>
  <tr bgcolor="#FDF779">
    <td bgcolor="#FEFAAB">Rutina 2</td>
    <td bgcolor="#FEFAAB"><select name="Rutina2Martes" id="Rutina2Martes">
      <?php if(!isset($_POST['Rutina2Martes']))
	  {
		  
	  ?>
        <option value="2">Músculos Superiores</option>
        <option value="3">Músculos Inferiores</option>
        <option value="4">Spinning</option>
        <?php 
	  }
	  else
	  {
		  $Rutina2Lunes = $_POST['Rutina2Lunes'];	
		  $Rutina2Martes = $_POST['Rutina2Martes'];
		  if($auxArea==2 && $Rutina2Lunes!=$Rutina2Martes){
		  
	  ?>
        <option value="<?php echo $Rutina2Martes ?>"><?php
		$auxArea =3; 
		if($Rutina2Martes=='2')
		{
			echo "Músculos Superiores";
		}
		 if($Rutina2Martes=='3')
		{
			echo "Músculos Inferiores";
		}
		if($Rutina2Martes=='4')
		{
			echo "Spinning";
		}
		
		  }
		  else{
		?>
        <option value="2">Músculos Superiores</option>
        <option value="3">Músculos Inferiores</option>
        <option value="4">Spinning</option>
        <?php } ?>
        </option>  
      <?php
	  }
		?>
    </select></td>
    <td bgcolor="#FEFAAB"><select name="HorarioMartes2" id="HorarioMartes2">
      <?php if(!isset($_POST['HorarioMartes2']) ){	
	?>
        <option value="09:30">9:30-10:30</option>
        <option value="10:00">10:00-11:00</option>
        <option value="10:30">10:30-11:30</option>
        <option value="11:00">11:00-12:00</option>
        <option value="11:30">11:30-12:30</option>
        <option value="12:00">12:00-13:00</option>
        <option value="12:30">12:30-13:30</option>
        <option value="13:00">13:00-14:00</option>
        <option value="14:00">14:00-15:00</option>
        <option value="14:30">14:30-15:30</option>
        <option value="15:00">15:00-16:00</option>
        <option value="15:30">15:30-16:30</option>
        <option value="16:00">16:00-17:00</option>
        <option value="16:30">16:30-17:30</option>
        <option value="17:00">17:00-18:00</option>
        <option value="17:30">17:30-18:30</option>
        <option value="18:00">18:00-19:00</option>
        <option value="18:30">18:30-19:30</option>
        <option value="19:00">19:00-20:00</option>
        <option value="19:30">19:30-20:00</option>
        <option value="20:00">20:00-21:00</option>
        <?php 
		}
		else 
		{
			$HoraAnterior = $_POST['HorarioMartes1'];
			$HoraActual = $_POST['HorarioMartes2'];
			
			include("conexion.php");
			$Area = $_POST['Rutina2Martes'];
		$Martes2 = mysql_query("select usuario from agenda where fecha ='$FechaLunes' and hora = '$HoraLunes' and area = $Area",$conexion);		 
		$totalMartes2 = mysql_num_rows($Martes2);
		
		
			
			if($auxMartes1 < $auxMartes2 && $auxArea ==3 && $totalMartes2 <= 15){
		?>
			
            <option value="<?php echo $HoraActual ?>"><?php echo $HoraActual?>
			</option>
		<?php
			}
			else
			{?>
		  <option value="09:30">9:30-10:30</option>
        <option value="10:00">10:00-11:00</option>
        <option value="10:30">10:30-11:30</option>
        <option value="11:00">11:00-12:00</option>
        <option value="11:30">11:30-12:30</option>
        <option value="12:00">12:00-13:00</option>
        <option value="12:30">12:30-13:30</option>
        <option value="13:00">13:00-14:00</option>
        <option value="14:00">14:00-15:00</option>
        <option value="14:30">14:30-15:30</option>
        <option value="15:00">15:00-16:00</option>
        <option value="15:30">15:30-16:30</option>
        <option value="16:00">16:00-17:00</option>
        <option value="16:30">16:30-17:30</option>
        <option value="17:00">17:00-18:00</option>
        <option value="17:30">17:30-18:30</option>
        <option value="18:00">18:00-19:00</option>
        <option value="18:30">18:30-19:30</option>
        <option value="19:00">19:00-20:00</option>
        <option value="19:30">19:30-20:00</option>
        <option value="20:00">20:00-21:00</option>	
			<?php 
			}
		} 
		?>
    </select></td>
    <td bgcolor="#FFFFFF"><?php 
	if(isset($_POST['Verificar']))
	{
		
		$FechaMartes = date("Y-m-d",time()+(1+$dias)*24*60*60);
		//echo $FechaMartes;
		$HoraMartes = $_POST['HorarioMartes2'];
		$cardioMartes = $_POST['HorarioMartes1'];
		
		include("conexion.php");
		
		$Area = $_POST['Rutina2Martes']; 
		
		$Martes2 = mysql_query("select usuario from agenda where fecha ='$FechaMartes' and hora = '$HoraMartes' and area =$Area;",$conexion);
		
		$AreaLunes = $_POST['Rutina2Lunes'];
		
		$totalMartes2 = mysql_num_rows($Martes2);
		
		if($totalMartes2>=15)
		{
			echo "Horario Ocupado";
			
		}
		else
			{
				if($HoraMartes!= $cardioMartes)
				{
					if($AreaLunes != $Area)
					{
						if($auxMartes1<$auxMartes2)
						{
							echo "Horario libre";
							$i=$i+1;
					
						}
						else
						{
						echo "Tu primer actividad debe ser Cardiováscular";
					
						}
					}
					else
					{
						echo "No puedes asignar la misma actividad 2 dias seguidos.";
					}
				}
				else
				{
					echo "No puedes Elegir esto a la misma hora que Cardiováscular";
				}
			}
	}
	
	?></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
    </tr>
  <tr bgcolor="#006666" style="color:#FFF; font-size:22px">
    <td bgcolor="#000000">&nbsp;</td>
    <td bgcolor="#000000">Miercoles</td>
    <td bgcolor="#000000">Horario</td>
    <td bgcolor="#000000">Disponibilidad</td>
  </tr>
  <tr bgcolor="#FDF779">
    <td bgcolor="#FEFAAB">Rutina 1</td>
    <td bgcolor="#FEFAAB">Cardiováscular</td>
    <td bgcolor="#FEFAAB"><select name="HorarioMiercoles1" id="HorarioMiercoles1">
      <?php 
	if(!isset($_POST['HorarioMiercoles1'])) 
	{
	?>
      <option value="09:00">9:00-9:30</option>
        <option value="09:30">9:30-10:00</option>
        <option value="10:00">10:00-10:30</option>
        <option value="10:30">10:30-11:00</option>
        <option value="11:00">11:00-11:30</option>
        <option value="11:30">11:30-12:00</option>
        <option value="12:00">12:00-12:30</option>
        <option value="12:30">12:30-13:00</option>
        <option value="13:00">13:00-13:30</option>
        <option value="13:30">13:30-14:00</option>
        <option value="14:00">14:00-14:30</option>
        <option value="14:30">14:30-15:00</option>
        <option value="15:00">15:00-15:30</option>
        <option value="15:30">15:30-16:00</option>
        <option value="16:00">16:00-16:30</option>
        <option value="16:30">16:30-17:00</option>
        <option value="17:00">17:00-17:30</option>
        <option value="17:30">17:30-18:00</option>
        <option value="18:00">18:00-18:30</option>
        <option value="18:30">18:30-19:00</option>
        <option value="19:00">19:00-19:30</option>
        <option value="19:30">19:30-20:00</option>
        <option value="20:00">20:00-20:30</option>
        <?php } 
		else 
		{
			$horaCardio = $_POST['HorarioMiercoles1'];
			$horaRutinaMiercoles = $_POST['HorarioMiercoles2'];
			$auxMi1 = substr($horaCardio,0,2);
			$auxMi2 = substr($horaCardio,3,5);
			$auxMiercoles1=(int)('0'.$auxMi1.$auxMi2);
			
			$auxMi3 = substr($horaRutinaMiercoles,0,2);
			$auxMi4 = substr($horaRutinaMiercoles,3,5);
			$auxMiercoles2=(int)('0'.$auxMi3.$auxMi4);
			
			include("conexion.php");
			
			$Miercoles1 = mysql_query("select usuario from agenda where fecha ='$FechaMartes' and hora = '$HoraMartes' and area = 1",$conexion);
		$TotaMiercoles1 = mysql_num_rows($Miercoles1);
		
			
			if($auxMiercoles1 < $auxMiercoles2 && $TotaMiercoles1 <=19)
			{
		?>
        <option value="<?php echo $horaCardio ?>"><?php echo $horaCardio ?></option>
        <?php 
		}
		else{
			?>
            <option value="09:00">9:00-9:30</option>
        <option value="09:30">9:30-10:00</option>
        <option value="10:00">10:00-10:30</option>
        <option value="10:30">10:30-11:00</option>
        <option value="11:00">11:00-11:30</option>
        <option value="11:30">11:30-12:00</option>
        <option value="12:00">12:00-12:30</option>
        <option value="12:30">12:30-13:00</option>
        <option value="13:00">13:00-13:30</option>
        <option value="13:30">13:30-14:00</option>
        <option value="14:00">14:00-14:30</option>
        <option value="14:30">14:30-15:00</option>
        <option value="15:00">15:00-15:30</option>
        <option value="15:30">15:30-16:00</option>
        <option value="16:00">16:00-16:30</option>
        <option value="16:30">16:30-17:00</option>
        <option value="17:00">17:00-17:30</option>
        <option value="17:30">17:30-18:00</option>
        <option value="18:00">18:00-18:30</option>
        <option value="18:30">18:30-19:00</option>
        <option value="19:00">19:00-19:30</option>
        <option value="19:30">19:30-20:00</option>
        <option value="20:00">20:00-20:30</option>
            
			<?php
			}
		}
		
		
		?>
    </select></td>
    <td bgcolor="#FFFFFF"><?php 
	if(isset($_POST['Verificar']))
	{
		$FechaMiercoles = date("Y-m-d",time()+(2+$dias)*24*60*60);	
		//echo $FechaMiercoles;
		$HoraMiercoles = $_POST['HorarioMiercoles1'];
		include("conexion.php");
		$Miercoles1 = mysql_query("select usuario from agenda where fecha ='$FechaMiercoles' and hora = '$HoraMiercoles' and area=1;",$conexion);
		$TotalMiercoles1 = mysql_num_rows($Miercoles1);
		
		if($TotalMiercoles1>=20)
		{
			echo "Horario Ocupado";			
		}
		else
			{
				if($auxMiercoles1<$auxMiercoles2)
				{
					echo "Horario libre";
					$i=$i+1;
					
				}
				else{
					echo "Tu primer actividad debe ser Cardiováscular";
					
				}
			}
	}
	
	?></td>
  </tr>
  <tr bgcolor="#FDF779">
    <td bgcolor="#FEFAAB">Rutina 2</td>
    <td bgcolor="#FEFAAB"><select name="Rutina2Miercoles" id="Rutina2Miercoles">
      <?php if(!isset($_POST['Rutina2Miercoles']))
	  {
		  
	  ?>
        <option value="2">Músculos Superiores</option>
        <option value="3">Músculos Inferiores</option>
        <option value="4">Spinning</option>
        <?php 
	  }
	  else
	  {
		  $Rutina2Martes = $_POST['Rutina2Martes'];	
		  $Rutina2Miercoles = $_POST['Rutina2Miercoles'];
		  if($auxArea==3 && $Rutina2Martes!=$Rutina2Miercoles){
		  
	  ?>
        <option value="<?php echo $Rutina2Miercoles ?>"><?php
		$auxArea =4; 
		if($Rutina2Miercoles=='2')
		{
			echo "Músculos Superiores";
		}
		 if($Rutina2Miercoles=='3')
		{
			echo "Músculos Inferiores";
		}
		if($Rutina2Miercoles=='4')
		{
			echo "Spinning";
		}
		
		  }
		  else{
		?>
        <option value="2">Músculos Superiores</option>
        <option value="3">Músculos Inferiores</option>
        <option value="4">Spinning</option>
        <?php } ?>
        </option>  
      <?php
	  }
		?>
    </select></td>
    <td bgcolor="#FEFAAB"><select name="HorarioMiercoles2" id="HorarioMiercoles2">
      <?php if(!isset($_POST['HorarioMiercoles2']) ){	
	?>
        <option value="09:30">9:30-10:30</option>
        <option value="10:00">10:00-11:00</option>
        <option value="10:30">10:30-11:30</option>
        <option value="11:00">11:00-12:00</option>
        <option value="11:30">11:30-12:30</option>
        <option value="12:00">12:00-13:00</option>
        <option value="12:30">12:30-13:30</option>
        <option value="13:00">13:00-14:00</option>
        <option value="14:00">14:00-15:00</option>
        <option value="14:30">14:30-15:30</option>
        <option value="15:00">15:00-16:00</option>
        <option value="15:30">15:30-16:30</option>
        <option value="16:00">16:00-17:00</option>
        <option value="16:30">16:30-17:30</option>
        <option value="17:00">17:00-18:00</option>
        <option value="17:30">17:30-18:30</option>
        <option value="18:00">18:00-19:00</option>
        <option value="18:30">18:30-19:30</option>
        <option value="19:00">19:00-20:00</option>
        <option value="19:30">19:30-20:00</option>
        <option value="20:00">20:00-21:00</option>
        <?php 
		}
		else 
		{
			$HoraAnterior = $_POST['HorarioMiercoles1'];
			$HoraActual = $_POST['HorarioMiercoles2'];
			
			include("conexion.php");
			$Area = $_POST['Rutina2Miercoles'];
		$Miercoles2 = mysql_query("select usuario from agenda where fecha ='$FechaLunes' and hora = '$HoraLunes' and area = $Area",$conexion);		 
		$totalMiercoles2 = mysql_num_rows($Miercoles2);
			
			if($auxMiercoles1 < $auxMiercoles2 && $auxArea == 4 && $totalMiercoles2<=15){
		?>
			
            <option value="<?php echo $HoraActual ?>"><?php echo $HoraActual?>
			</option>
		<?php
			}
			else
			{?>
		  <option value="09:30">9:30-10:30</option>
        <option value="10:00">10:00-11:00</option>
        <option value="10:30">10:30-11:30</option>
        <option value="11:00">11:00-12:00</option>
        <option value="11:30">11:30-12:30</option>
        <option value="12:00">12:00-13:00</option>
        <option value="12:30">12:30-13:30</option>
        <option value="13:00">13:00-14:00</option>
        <option value="14:00">14:00-15:00</option>
        <option value="14:30">14:30-15:30</option>
        <option value="15:00">15:00-16:00</option>
        <option value="15:30">15:30-16:30</option>
        <option value="16:00">16:00-17:00</option>
        <option value="16:30">16:30-17:30</option>
        <option value="17:00">17:00-18:00</option>
        <option value="17:30">17:30-18:30</option>
        <option value="18:00">18:00-19:00</option>
        <option value="18:30">18:30-19:30</option>
        <option value="19:00">19:00-20:00</option>
        <option value="19:30">19:30-20:00</option>
        <option value="20:00">20:00-21:00</option>
			<?php 
			}
		} 
		?>
    </select></td>
    <td bgcolor="#FFFFFF"><?php 
	if(isset($_POST['Verificar']))
	{
		$FechaMiercoles = date("Y-m-d",time()+(2+$dias)*24*60*60);	
		//echo $FechaMiercoles;
		$HoraMiercoles = $_POST['HorarioMartes2'];
		$cardioMiercoles = $_POST['HorarioMiercoles1'];
		
		include("conexion.php");
		
		$Area = $_POST['Rutina2Miercoles'];
		
		$Miercoles2 = mysql_query("select usuario from agenda where fecha ='$FechaMiercoles' and hora = '$HoraMiercoles' and area=$Area",$conexion);
		
		$Area = $_POST['Rutina2Miercoles'];
		
		$AreaMartes = $_POST['Rutina2Martes']; 
		
		$totalMiercoles2 = mysql_num_rows($Miercoles2);
		
		if($totalMiercoles2 >=15)
		{
			echo "Horario Ocupado";
			
		}
		else
			{
				if($HoraMiercoles!= $cardioMiercoles)
				{
					if($AreaMartes != $Area)
					{
						if($auxMiercoles1<$auxMiercoles2)
						{
							echo "Horario libre";
							$i=$i+1;
					
						}
						else
						{
							echo "Tu primer actividad debe ser Cardiováscular";
					
						}
					}
					else
					{
						echo "No puedes asignar la misma actividad 2 dias seguidos.";
					}
				}
				else
				{
					echo "No puedes Elegir esto a la misma hora que Cardiováscular";
				}
			}
	}
	
	?></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
    </tr>
  <tr bgcolor="#006666" style="color:#FFF; font-size:22px">
    <td bgcolor="#000000">&nbsp;</td>
    <td bgcolor="#000000">Jueves</td>
    <td bgcolor="#000000">Horario</td>
    <td bgcolor="#000000">Disponibilidad</td>
  </tr>
  <tr bgcolor="#FDF779">
    <td bgcolor="#FEFAAB">Rutina 1</td>
    <td bgcolor="#FEFAAB">Cardiováscular</td>
    <td bgcolor="#FEFAAB"><select name="HorarioJueves1" id="HorarioJueves1">
      <?php 
	if(!isset($_POST['HorarioJueves1'])) 
	{
	?>
      <option value="09:00">9:00-9:30</option>
        <option value="09:30">9:30-10:00</option>
        <option value="10:00">10:00-10:30</option>
        <option value="10:30">10:30-11:00</option>
        <option value="11:00">11:00-11:30</option>
        <option value="11:30">11:30-12:00</option>
        <option value="12:00">12:00-12:30</option>
        <option value="12:30">12:30-13:00</option>
        <option value="13:00">13:00-13:30</option>
        <option value="13:30">13:30-14:00</option>
        <option value="14:00">14:00-14:30</option>
        <option value="14:30">14:30-15:00</option>
        <option value="15:00">15:00-15:30</option>
        <option value="15:30">15:30-16:00</option>
        <option value="16:00">16:00-16:30</option>
        <option value="16:30">16:30-17:00</option>
        <option value="17:00">17:00-17:30</option>
        <option value="17:30">17:30-18:00</option>
        <option value="18:00">18:00-18:30</option>
        <option value="18:30">18:30-19:00</option>
        <option value="19:00">19:00-19:30</option>
        <option value="19:30">19:30-20:00</option>
        <option value="20:00">20:00-20:30</option>
        <?php } 
		else 
		{
			$horaCardio = $_POST['HorarioJueves1'];
			$horaRutinaJueves = $_POST['HorarioJueves2'];
			$auxJ1 = substr($horaCardio,0,2);
			$auxJ2 = substr($horaCardio,3,5);
			$auxJueves1=(int)('0'.$auxJ1.$auxJ2);
			
			$auxJ3 = substr($horaRutinaJueves,0,2);
			$auxJ4 = substr($horaRutinaJueves,3,5);
			$auxJueves2=(int)('0'.$auxJ3.$auxJ4);
			
			include("conexion.php");
		$Jueves2 = mysql_query("select usuario from agenda where fecha ='$FechaLunes' and hora = '$HoraLunes' and area = 1;",$conexion);
		 
		$totalJueves2 = mysql_num_rows($Jueves2);
			if($auxJueves1 < $auxJueves2 && $totalJueves2<=19)
			{
		?>
        <option value="<?php echo $horaCardio ?>"><?php echo $horaCardio ?></option>
        <?php
			}
			else {
				?>
				<option value="09:00">9:00-9:30</option>
        <option value="09:30">9:30-10:00</option>
        <option value="10:00">10:00-10:30</option>
        <option value="10:30">10:30-11:00</option>
        <option value="11:00">11:00-11:30</option>
        <option value="11:30">11:30-12:00</option>
        <option value="12:00">12:00-12:30</option>
        <option value="12:30">12:30-13:00</option>
        <option value="13:00">13:00-13:30</option>
        <option value="13:30">13:30-14:00</option>
        <option value="14:00">14:00-14:30</option>
        <option value="14:30">14:30-15:00</option>
        <option value="15:00">15:00-15:30</option>
        <option value="15:30">15:30-16:00</option>
        <option value="16:00">16:00-16:30</option>
        <option value="16:30">16:30-17:00</option>
        <option value="17:00">17:00-17:30</option>
        <option value="17:30">17:30-18:00</option>
        <option value="18:00">18:00-18:30</option>
        <option value="18:30">18:30-19:00</option>
        <option value="19:00">19:00-19:30</option>
        <option value="19:30">19:30-20:00</option>
        <option value="20:00">20:00-20:30</option>
				<?php
				}
		}
		?>
    </select></td>
    <td bgcolor="#FFFFFF"><?php 
	if(isset($_POST['Verificar']))
	{
		$FechaJueves = date("Y-m-d",time()+(3+$dias)*24*60*60);
		//echo $FechaJueves;
		$HoraJueves = $_POST['HorarioJueves1'];
		include("conexion.php");
		$Jueves1 = mysql_query("select usuario from agenda where fecha ='$FechaJueves' and hora = '$HoraJueves' and area=1;",$conexion);
		$TotalJueves1 = mysql_num_rows($Jueves1);
		
		if($TotalJueves1>=20)
		{
			echo "Horario Ocupado";			
		}
		else
			{
				if($auxJueves1<$auxJueves2)
				{
					echo "Horario libre";
					$i=$i+1;
					
				}
				else{
					echo "Tu primer actividad debe ser Cardiováscular";
					
				}
			}
	}
	
	?></td>
  </tr>
  <tr bgcolor="#FDF779">
    <td bgcolor="#FEFAAB">Rutina 2</td>
    <td bgcolor="#FEFAAB"><select name="Rutina2Jueves" id="Rutina2Jueves">
       <?php if(!isset($_POST['Rutina2Jueves']))
	  {
		  
	  ?>
        <option value="2">Músculos Superiores</option>
        <option value="3">Músculos Inferiores</option>
        <option value="4">Spinning</option>
        <?php 
	  }
	  else
	  {
		  $Rutina2Miercoles = $_POST['Rutina2Miercoles'];	
		  $Rutina2Jueves = $_POST['Rutina2Jueves'];
		  if($auxArea==4 && $Rutina2Miercoles!=$Rutina2Jueves){
		  
	  ?>
        <option value="<?php echo $Rutina2Jueves ?>"><?php
		$auxArea =5; 
		if($Rutina2Jueves=='2')
		{
			echo "Músculos Superiores";
		}
		 if($Rutina2Jueves=='3')
		{
			echo "Músculos Inferiores";
		}
		if($Rutina2Jueves=='4')
		{
			echo "Spinning";
		}
		
		  }
		  else{
		?>
        <option value="2">Músculos Superiores</option>
        <option value="3">Músculos Inferiores</option>
        <option value="4">Spinning</option>
        <?php } ?>
        </option>  
      <?php
	  }
		?>
    </select></td>
    <td bgcolor="#FEFAAB"><select name="HorarioJueves2" id="HorarioJueves2">
       <?php if(!isset($_POST['HorarioJueves2'])){	
	?>
        <option value="09:30">9:30-10:30</option>
        <option value="10:00">10:00-11:00</option>
        <option value="10:30">10:30-11:30</option>
        <option value="11:00">11:00-12:00</option>
        <option value="11:30">11:30-12:30</option>
        <option value="12:00">12:00-13:00</option>
        <option value="12:30">12:30-13:30</option>
        <option value="13:00">13:00-14:00</option>
        <option value="14:00">14:00-15:00</option>
        <option value="14:30">14:30-15:30</option>
        <option value="15:00">15:00-16:00</option>
        <option value="15:30">15:30-16:30</option>
        <option value="16:00">16:00-17:00</option>
        <option value="16:30">16:30-17:30</option>
        <option value="17:00">17:00-18:00</option>
        <option value="17:30">17:30-18:30</option>
        <option value="18:00">18:00-19:00</option>
        <option value="18:30">18:30-19:30</option>
        <option value="19:00">19:00-20:00</option>
        <option value="19:30">19:30-20:00</option>
        <option value="20:00">20:00-21:00</option>
        <?php 
		}
		else 
		{
			$HoraAnterior = $_POST['HorarioJueves1'];
			$HoraActual = $_POST['HorarioJueves2'];
			
			include("conexion.php");
			$Area = $_POST['Rutina2Jueves'];
		$Jueves2 = mysql_query("select usuario from agenda where fecha ='$FechaLunes' and hora = '$HoraLunes' and area = $Area",$conexion);		 
		$totalJueves2 = mysql_num_rows($Jueves2);
			
			if($HoraActual != $HoraAnterior &&  $auxArea==5 && $totalJueves2<=15){
		?>
			
            <option value="<?php echo $HoraActual ?>"><?php echo $HoraActual?>
			</option>
		<?php
			}
			else
			{?>
		  <option value="09:30">9:30-10:30</option>
        <option value="10:00">10:00-11:00</option>
        <option value="10:30">10:30-11:30</option>
        <option value="11:00">11:00-12:00</option>
        <option value="11:30">11:30-12:30</option>
        <option value="12:00">12:00-13:00</option>
        <option value="12:30">12:30-13:30</option>
        <option value="13:00">13:00-14:00</option>
        <option value="14:00">14:00-15:00</option>
        <option value="14:30">14:30-15:30</option>
        <option value="15:00">15:00-16:00</option>
        <option value="15:30">15:30-16:30</option>
        <option value="16:00">16:00-17:00</option>
        <option value="16:30">16:30-17:30</option>
        <option value="17:00">17:00-18:00</option>
        <option value="17:30">17:30-18:30</option>
        <option value="18:00">18:00-19:00</option>
        <option value="18:30">18:30-19:30</option>
        <option value="19:00">19:00-20:00</option>
        <option value="19:30">19:30-20:00</option>
        <option value="20:00">20:00-21:00</option>
			<?php 
			}
		} 
		?>
    </select></td>
    <td bgcolor="#FFFFFF"><?php 
	if(isset($_POST['Verificar']))
	{
		
		$FechaJueves = date("Y-m-d",time()+(3+$dias)*24*60*60);
		//echo $FechaJueves;
		$HoraJueves = $_POST['HorarioJueves2'];
		$cardioJueves = $_POST['HorarioJueves1'];
		
		include("conexion.php");
		$Area = $_POST['Rutina2Jueves'];
		$Jueves2 = mysql_query("select usuario from agenda where fecha ='$FechaJueves' and hora = '$HoraJueves' and area=$Area",$conexion);
		$Area = $_POST['Rutina2Jueves']; 
		$AreaMiercoles = $_POST['Rutina2Miercoles'];
		$totalJueves2 = mysql_num_rows($Jueves2);
		
		if($totalJueves2>=15)
		{
			echo "Horario Ocupado";
			
		}
		else
			{
				if($HoraJueves!= $cardioJueves)
				{
					if($AreaMiercoles != $Area)
					{
						if($auxJueves1<$auxJueves2)
						{
							echo "Horario libre";
							$i=$i+1;
					
						}
						else
						{
							echo "Tu primer actividad debe ser Cardiováscular";
					
						}
					}
					else
					{
						echo "No puedes asignar la misma actividad 2 dias seguidos.";
					}
				}
				else
				{
					echo "No puedes Elegir esto a la misma hora que Cardiováscular";
				}
			}
	}
	
	?></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
    </tr>
  <tr bgcolor="#006666" style="color:#FFF; font-size:22px">
    <td bgcolor="#000000">&nbsp;</td>
    <td bgcolor="#000000">Viernes</td>
    <td bgcolor="#000000">Horario</td>
    <td bgcolor="#000000">Disponibilidad</td>
  </tr>
  <tr bgcolor="#FDF779">
    <td bgcolor="#FEFAAB" >Rutina 1</td>
    <td bgcolor="#FEFAAB">Cardiováscular</td>
    <td bgcolor="#FEFAAB"><select name="HorarioViernes1" id="HorarioViernes1">
      <?php 
	if(!isset($_POST['HorarioViernes1'])) 
	{
	?>
      <option value="09:00">9:00-9:30</option>
        <option value="09:30">9:30-10:00</option>
        <option value="10:00">10:00-10:30</option>
        <option value="10:30">10:30-11:00</option>
        <option value="11:00">11:00-11:30</option>
        <option value="11:30">11:30-12:00</option>
        <option value="12:00">12:00-12:30</option>
        <option value="12:30">12:30-13:00</option>
        <option value="13:00">13:00-13:30</option>
        <option value="13:30">13:30-14:00</option>
        <option value="14:00">14:00-14:30</option>
        <option value="14:30">14:30-15:00</option>
        <option value="15:00">15:00-15:30</option>
        <option value="15:30">15:30-16:00</option>
        <option value="16:00">16:00-16:30</option>
        <option value="16:30">16:30-17:00</option>
        <option value="17:00">17:00-17:30</option>
        <option value="17:30">17:30-18:00</option>
        <option value="18:00">18:00-18:30</option>
        <option value="18:30">18:30-19:00</option>
        <option value="19:00">19:00-19:30</option>
        <option value="19:30">19:30-20:00</option>
        <option value="20:00">20:00-20:30</option>
        <?php } 
		else 
		{
			$horaCardio = $_POST['HorarioViernes1'];
			$horaRutinaViernes = $_POST['HorarioViernes2'];
			$auxV1 = substr($horaCardio,0,2);
			$auxV2 = substr($horaCardio,3,5);
			$auxViernes1=(int)('0'.$auxV1.$auxV2);
			
			$auxV3 = substr($horaRutinaViernes,0,2);
			$auxV4 = substr($horaRutinaViernes,3,5);
			$auxViernes2=(int)('0'.$auxV3.$auxV4);
			
			include("conexion.php");
			$Area = $_POST['Rutina2Viernes'];
			$Viernes = mysql_query("select usuario from agenda where fecha ='$FechaLunes' and hora = '$HoraLunes' and area = 1;",$conexion);		 
		$totalViernes = mysql_num_rows($Viernes);
			
			if($auxViernes1 < $auxViernes2 && $totalViernes<=19)
			{
		?>
        <option value="<?php echo $horaCardio ?>"><?php echo $horaCardio ?></option>
        <?php
			}
			else{
				?>
                <option value="09:00">9:00-9:30</option>
        <option value="09:30">9:30-10:00</option>
        <option value="10:00">10:00-10:30</option>
        <option value="10:30">10:30-11:00</option>
        <option value="11:00">11:00-11:30</option>
        <option value="11:30">11:30-12:00</option>
        <option value="12:00">12:00-12:30</option>
        <option value="12:30">12:30-13:00</option>
        <option value="13:00">13:00-13:30</option>
        <option value="13:30">13:30-14:00</option>
        <option value="14:00">14:00-14:30</option>
        <option value="14:30">14:30-15:00</option>
        <option value="15:00">15:00-15:30</option>
        <option value="15:30">15:30-16:00</option>
        <option value="16:00">16:00-16:30</option>
        <option value="16:30">16:30-17:00</option>
        <option value="17:00">17:00-17:30</option>
        <option value="17:30">17:30-18:00</option>
        <option value="18:00">18:00-18:30</option>
        <option value="18:30">18:30-19:00</option>
        <option value="19:00">19:00-19:30</option>
        <option value="19:30">19:30-20:00</option>
        <option value="20:00">20:00-20:30</option>
                
                <?php
				}
		}
		?>
    </select></td>
    <td bgcolor="#FFFFFF"><?php 
	if(isset($_POST['Verificar']))
	{		
		
		$FechaViernes = date("Y-m-d",time()+(4+$dias)*24*60*60);
		//echo $FechaViernes;
		$HoraViernes = $_POST['HorarioViernes1'];
		include("conexion.php");
		$Viernes1 = mysql_query("select usuario from agenda where fecha ='$FechaViernes' and hora = '$HoraViernes' and area=1;",$conexion);
		$TotalViernes1 = mysql_num_rows($Viernes1);
		
		if($TotalViernes1>=20)
		{
			echo "Horario Ocupado";			
		}
		else
			{
				if($auxViernes1<$auxViernes2)
				{
					echo "Horario libre";
					$i=$i+1;
					
				}
				else{
					echo "Tu primer actividad debe ser Cardiováscular";
					
				}
			}
	}
	
	?></td>
  </tr>
  <tr bgcolor="#FDF779">
    <td bgcolor="#FEFAAB">Rutina 2</td>
    <td bgcolor="#FEFAAB"><select name="Rutina2Viernes" id="Rutina2Viernes">
      <?php if(!isset($_POST['Rutina2Viernes']))
	  {
		  
	  ?>
        <option value="2">Músculos Superiores</option>
        <option value="3">Músculos Inferiores</option>
        <option value="4">Spinning</option>
        <?php 
	  }
	  else
	  {
		  $Rutina2Jueves = $_POST['Rutina2Jueves'];	
		  $Rutina2Viernes = $_POST['Rutina2Viernes'];
		  if($auxArea==5 && $Rutina2Viernes!=$Rutina2Jueves){
		  
	  ?>
        <option value="<?php echo $Rutina2Viernes ?>"><?php
		$auxArea =5; 
		if($Rutina2Viernes=='2')
		{
			echo "Músculos Superiores";
		}
		 if($Rutina2Viernes=='3')
		{
			echo "Músculos Inferiores";
		}
		if($Rutina2Viernes=='4')
		{
			echo "Spinning";
		}
		
		  }
		  else{
		?>
        <option value="2">Músculos Superiores</option>
        <option value="3">Músculos Inferiores</option>
        <option value="4">Spinning</option>
        <?php } ?>
        </option>  
      <?php
	  }
		?>
    </select></td>
    <td bgcolor="#FEFAAB"><select name="HorarioViernes2" id="HorarioViernes2">
      <?php if(!isset($_POST['HorarioViernes2']) ){	
	?>
       <option value="09:30">9:30-10:30</option>
        <option value="10:00">10:00-11:00</option>
        <option value="10:30">10:30-11:30</option>
        <option value="11:00">11:00-12:00</option>
        <option value="11:30">11:30-12:30</option>
        <option value="12:00">12:00-13:00</option>
        <option value="12:30">12:30-13:30</option>
        <option value="13:00">13:00-14:00</option>
        <option value="14:00">14:00-15:00</option>
        <option value="14:30">14:30-15:30</option>
        <option value="15:00">15:00-16:00</option>
        <option value="15:30">15:30-16:30</option>
        <option value="16:00">16:00-17:00</option>
        <option value="16:30">16:30-17:30</option>
        <option value="17:00">17:00-18:00</option>
        <option value="17:30">17:30-18:30</option>
        <option value="18:00">18:00-19:00</option>
        <option value="18:30">18:30-19:30</option>
        <option value="19:00">19:00-20:00</option>
        <option value="19:30">19:30-20:00</option>
        <option value="20:00">20:00-21:00</option>
        <?php 
		}
		else 
		{
			$HoraAnterior = $_POST['HorarioViernes1'];
			$HoraActual = $_POST['HorarioViernes2'];
			
			include("conexion.php");
			$Area = $_POST['Rutina2Viernes'];
			$Viernes2 = mysql_query("select usuario from agenda where fecha ='$FechaLunes' and hora = '$HoraLunes' and area = $Area",$conexion);		 
		$totalViernes2 = mysql_num_rows($Viernes);
			
			
			if($auxViernes1<$auxViernes2 && $totalViernes2<=15){
		?>
			
            <option value="<?php echo $HoraActual ?>"><?php echo $HoraActual?>
			</option>
		<?php
			}
			else
			{?>
		  <option value="09:30">9:30-10:30</option>
        <option value="10:00">10:00-11:00</option>
        <option value="10:30">10:30-11:30</option>
        <option value="11:00">11:00-12:00</option>
        <option value="11:30">11:30-12:30</option>
        <option value="12:00">12:00-13:00</option>
        <option value="12:30">12:30-13:30</option>
        <option value="13:00">13:00-14:00</option>
        <option value="14:00">14:00-15:00</option>
        <option value="14:30">14:30-15:30</option>
        <option value="15:00">15:00-16:00</option>
        <option value="15:30">15:30-16:30</option>
        <option value="16:00">16:00-17:00</option>
        <option value="16:30">16:30-17:30</option>
        <option value="17:00">17:00-18:00</option>
        <option value="17:30">17:30-18:30</option>
        <option value="18:00">18:00-19:00</option>
        <option value="18:30">18:30-19:30</option>
        <option value="19:00">19:00-20:00</option>
        <option value="19:30">19:30-20:00</option>
        <option value="20:00">20:00-21:00</option>	
			<?php 
			}
		} 
		?>
    </select></td>
    <td bgcolor="#FFFFFF"><?php 
	
	if(isset($_POST['Verificar']))
	{
		
		$FechaViernes = date("Y-m-d",time()+(4+$dias)*24*60*60);
		//echo $FechaViernes;
		$HoraViernes = $_POST['HorarioViernes2'];
		$cardioViernes = $_POST['HorarioViernes1'];
		include("conexion.php");
		$Area = $_POST['Rutina2Viernes'];
		$Viernes2 = mysql_query("select usuario from agenda where fecha ='$FechaViernes' and hora = '$HoraViernes' and area=$Area",$conexion);
		$Area = $_POST['Rutina2Viernes'];
		$AreaJueves = $_POST['Rutina2Jueves']; 
		$totalViernes2 = mysql_num_rows($Viernes2);
		
		if($totalViernes2>=15)
		{
			echo "Horario Ocupado";
			
		}
		else
			{
				if($HoraViernes!= $cardioViernes)
				{
					if($AreaJueves != $Area)
					{
						if($auxViernes1<$auxViernes2)
						{
							echo "Horario libre";
							$i=$i+1;
					
						}
						else
						{
							echo "Tu primer actividad debe ser Cardiováscular";
					
						}
					}
					else
					{
						echo "No puedes asignar la misma actividad 2 dias seguidos.";
					}
				}
				else
				{
					echo "No puedes Elegir esto a la misma hora que Cardiováscular";
				}
			}
	}
	
	?></td>
  </tr>
  <tr bgcolor="#000000">
    <td>&nbsp;</td>
    <td><?php if($i<=9) { ?>
      <input name="Verificar" type="submit" value="Verificar" />
      <?php } ?>
  </td>
    <td><input type="reset" name="button2" id="button2" value="Limpiar" /></td>
    <td>
    <?php
	if(isset($_POST['Verificar']))
	{
		
	 	if($i==10){?>
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
	{
		include("conexion.php");
		$usuario = $_SESSION['usuario'];
		
		$todos = mysql_query("select * from agenda where usuario = '$usuario'");
		?>
		<table width="750" border="1" align="center">
  <tr>
    <td colspan="3" bgcolor="#000000" style="font-family:Tahoma, Geneva, sans-serif; font-size:24px; text-align:center; color:#FFF">
      ::
      <?php 
	  //$unico = mysql_query("select * from agenda where usuario = '$usuario'",$conexion); 
	  echo $usuario." ";
	  ?>
    &Eacute;stas son tus actividades::</td>
    </tr>
  <tr style="font-family:Tahoma, Geneva, sans-serif; font-size:13px; color:#FFF">
    <td width="183" bgcolor="#000000">Dia de actividades</td>
    <td width="295" bgcolor="#000000"><?php 
	//$todos = mysql_query("select * from agenda order by(fecha);",$conexion); 
	
	?>Actividad Correspondiente</td>
    <td width="250" bgcolor="#000000">Horario de entrada</td>
  </tr>
  <?php while ($uno=mysql_fetch_array($todos)){?>
  <tr>
    <td><?php echo $uno['fecha'];?></td>
    <td><?php $actividad =  $uno['area'];
	switch($actividad)
	{
		case 1: {echo "Cardiováscular"; break;}
		case 2: {echo "Músculos Superiores"; break; }
		case 3: {echo "Músculos Inferiores"; break;}
		case 4: {echo "Spinning"; break;}
	}
	?></td>
    <td><?php echo $uno['hora'];?></td>
  </tr>
  
  <?php }?>
  
</table>

		
	<?php 
	}
}
else if(isset($_POST['Insertar']))
{
		echo "Insertastes tus registros con éxito";
		
		include("conexion.php");
		$usuario = $_SESSION['usuario'];
		$horaLunes1 = $_POST['HorarioLunes1'];
		$AreaLunes2 = $_POST['Rutina2Lunes'];
		$horaLunes2 = $_POST['HorarioLunes2'];
		$FechaLunes = date("Y-m-d",time()+(0+$dias)*24*60*60);
		mysql_query("insert into agenda values('$usuario',1,'$horaLunes1','$FechaLunes',0)",$conexion);
		mysql_query("insert into agenda values('$usuario',$AreaLunes2,'$horaLunes2','$FechaLunes',0)",$conexion);
		
		
		$horaMartes1 = $_POST['HorarioMartes1'];
		$AreaMartes2 = $_POST['Rutina2Martes'];
		$horaMartes2 = $_POST['HorarioMartes2'];
		$FechaMartes = date("Y-m-d",time()+(1+$dias)*24*60*60);
		mysql_query("insert into agenda values('$usuario',1,'$horaMartes1','$FechaMartes',0)",$conexion);
		mysql_query("insert into agenda values('$usuario',$AreaMartes2,'$horaMartes2','$FechaMartes',0)",$conexion);		
		
		$horaMiercoles1 = $_POST['HorarioMiercoles1'];
		$AreaMiercoles2 = $_POST['Rutina2Miercoles'];
		$horaMiercoles2 = $_POST['HorarioMiercoles2'];
		$FechaMiercoles = date("Y-m-d",time()+(2+$dias)*24*60*60);	
		mysql_query("insert into agenda values('$usuario',1,'$horaMiercoles1','$FechaMiercoles',0)",$conexion);
		mysql_query("insert into agenda values('$usuario',$AreaMiercoles2,'$horaMiercoles2','$FechaMiercoles',0)",$conexion);
		//echo $AreaMiercoles2;
		
		
		$horaJueves1 = $_POST['HorarioJueves1'];
		$AreaJueves2 = $_POST['Rutina2Jueves'];
		$horaJueves2 = $_POST['HorarioJueves2'];
		$FechaJueves = date("Y-m-d",time()+(3+$dias)*24*60*60);
		mysql_query("insert into agenda values('$usuario',1,'$horaJueves1','$FechaJueves',0)",$conexion);
		mysql_query("insert into agenda values('$usuario',$AreaJueves2,'$horaJueves2','$FechaJueves',0)",$conexion);
		//echo $AreaJueves2;
		
		$horaViernes1 = $_POST['HorarioViernes1'];
		$AreaViernes2 = $_POST['Rutina2Viernes'];
		$horaViernes2 = $_POST['HorarioViernes2'];
		$FechaViernes = date("Y-m-d",time()+(4+$dias)*24*60*60);
		mysql_query("insert into agenda values('$usuario',1,'$horaViernes1','$FechaViernes',0)",$conexion);
		mysql_query("insert into agenda values('$usuario',$AreaViernes2,'$horaViernes2','$FechaViernes',0)",$conexion);
		//echo $AreaViernes2;
		
		?>
<script type="text/javascript">
	location.href='index.php';
</script>
		
	<?php 

}
?>



</body>
</html>
<?php } ?>