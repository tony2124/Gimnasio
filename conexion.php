<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "gimnasio";

$conexion = mysql_connect($host,$user,$pass) or die("Error ".mysql_error() );

mysql_select_db($database) or die("Error ".mysql_error());
?>