<?php session_start();

function fechaactual()
{
	return date("Y-m-d");	
}

 function mediaHora($horasuma)
	 {
		 $cad = explode(":",$horasuma);
		 $cad[1] = $cad[1] + 30;
		 if($cad[1] == 60)
		 {
			$cad[1] = 0;
		 	$cad[0] = $cad[0] + 1;
		 }
		
		return date("H:i:s",strtotime($cad[0].":".$cad[1].":00"));
	 }
	 
	 function unaHora($horasuma)
	 {
		 $cad = explode(":",$horasuma);
		 $cad[0] = $cad[0] + 1;
		 
		
		return date("H:i:s",strtotime($cad[0].":".$cad[1].":00"));
	 }


function multa()
{
	 include("conexion.php");
	 
	 $consulta = mysql_query("select * from multas where usuario = '$_SESSION[usuario]'");
	 
	 $numero = mysql_num_rows($consulta);

	 return $numero;	
}

function verificarHora()
{
	if(multa() < 2)
	{
		include("conexion.php");	
		
		$consulta = mysql_query("select * from agenda where usuario = '$_SESSION[usuario]' and fecha < '".fechaactual()."' and asistencia = 0");
		
		$numero = mysql_num_rows($consulta);
		
		$i = 0;
		$fechaant = "x";
		if($numero > 0)
		{
			while($row = mysql_fetch_array($consulta))
			{	
				if( $i < 2 )
				{				
					if($fechaant != $row['fecha'])
					{
						mysql_query("insert into multas values('$_SESSION[usuario]',50,'$row[fecha]')");
						mysql_query("update agenda set asistencia = -1 where usuario = '$_SESSION[usuario]' and fecha = '".$row['fecha']."'");
						$i++;
					}
	
					$fechaant = $row['fecha'];
					
					
				}
				else break;
			}
		}
		
		
		mysql_close($conexion);
	}
}


function isDia()
{
	include("conexion.php");
	
	$consulta = mysql_query("select * from agenda where usuario = '$_SESSION[usuario]' and fecha = '".fechaactual()."'");
	
	if(mysql_num_rows($consulta) > 0)
		return true;
	else
		return false;	
}

function horaactual()
{
	return date("H:i:s");	
}

global $fechacardio;
global $fechaotros;
function isHora()
{
	global $fechacardio;
	global $fechaotros;
	include("conexion.php");
	
	$consulta = mysql_query("select * from agenda where usuario = '$_SESSION[usuario]' and fecha = '".fechaactual()."'");
	
	$i = 0;
	if(mysql_num_rows($consulta) > 0)
	{
		while($row = mysql_fetch_array($consulta))
		{
			if($i == 0)
				$fechacardio = $row['hora'];
			else
				$fechaotros = $row['hora'];
			$i++;
			if($i == 2) break;
		}
		/*echo mediaHora($fechacardio)."   ".$fechacardio."<br>";
		echo unaHora($fechaotros)."   ".$fechaotros."<br>";*/
		if((horaactual() >= $fechacardio && horaactual() < mediaHora($fechacardio)) || 
		(horaactual() >= $fechaotros && horaactual() < unaHora($fechaotros)))
			return true;
		else
			return false;
	}
	return false;
}


?>