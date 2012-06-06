<?php
include("conexion.php");

mysql_query("delete from multas where usuario = '$_REQUEST[usuario]'");

mysql_query("delete from agenda where usuario = '$_REQUEST[usuario]'");

mysql_close($conexion);
?>

<script type="text/javascript">
location.href='administrador.php?adeudos';
</script>