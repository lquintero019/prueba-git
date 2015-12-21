<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<title>Recetas de Postres</title>
		<script type="text/javascript" src="ajax.js"></script>
		<link rel="STYLESHEET" type="text/css" href="../../estilos/reset.css"></link>
		<script type="text/javascript" src="../../js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="../../js/semantic.min.js"></script>
		<script type="text/javascript" src="../../js/semantic.js"></script>
		<link rel="STYLESHEET" type="text/css" href="../../estilos/semantic.css"></link>
		<link rel="STYLESHEET" type="text/css" href="../../estilos/semantic.min.css"></link>
		<link rel="stylesheet" type="text/css" href="../../estilos/modificar_platillos.css">
		<style type="text/css">
			div.size{width: 80%; margin-left: 150px; margin-bottom: 10px;}
		</style> 
	</head>
	<body>
		<div class="ui form">
			<div id="listado" class="size">
				<center><h1>Postres</h1></center>
				<center>
					<a href="nuevaReceta.php"><button class="ui button">Nueva Receta</button></a>
					<a href="http://localhost/recetario/admin/modificar/mod_dishes.php"><button class="ui button">Salir</button></a>
				</center>
				<? include('listado.php');?>
			</div>
		</div>
	</body>
</html>