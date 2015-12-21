<?php
	$conexion=mysql_connect('localhost','root','') or die('No hay conexión a la base de datos');
	$db=mysql_select_db('main',$conexion)or die('no existe la base de datos.');
	$id=$_GET['id'];
	$sql='DELETE  FROM pastas WHERE id = "'.$id.'"';
	$res=mysql_query($sql,$conexion);

	$sql2='DELETE  FROM ingre_proce_pastas WHERE id_pastas = "'.$id.'"';
	$res2=mysql_query($sql2,$conexion);

	$sql3='DELETE FROM proce_ingre_pastas WHERE id_pasta = "'.$id.'"';
	$res3=mysql_query($sql3,$conexion);

	

	if ($res && $res2 && $res3) {
		echo '<script language="javascript">alert("Se Elimino con exito");</script>';
		echo '<script>location.href = "pastas.php"</script>';
	}
	else{
		echo '<script language="javascript">alert("ERROR");</script>';
		echo '<script>location.href = "pastas.php"</script>';
	}
?>