<?php
mysql_connect("localhost", "root", "") or die(mysql_error()) ;
mysql_select_db("main") or die(mysql_error()) ;

$id=1;

if ($id > 0){
	$consulta = "SELECT imagen, tipo_imagen FROM imagenes WHERE id = $id";
	$resultado= @mysql_query($consulta) or die(mysql_error());
	$datos = mysql_fetch_assoc($resultado);
	$imagen = $datos['imagen'];
	$tipo = $datos['tipo_imagen'];
	header("Content-type: $tipo");

	echo $imagen;
}

?>
<img src="imagen.php" />