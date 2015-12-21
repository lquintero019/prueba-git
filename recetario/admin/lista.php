<?php
include_once("../libs/db.php");
	$db = db();	
	$listado = $db->query("SELECT * FROM usuarios",MYSQLI_USE_RESULT);
	
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Catalogue de usuarios</title>
	<link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
	<h1>Lista de usuarios</h1>
	<table border=1px,>
		<thead>
				<th>Nombre</th>
				<th>Usuario</th>
				<th>Correo</th>
				<th>Acciones</th>
		</thead>
		<tbody>
		<? foreach ($listado as $li) {?>	
		<tr>
			<td><?= $li->nombre?></td>
			<td><?= $li->usuario?></td>
			<td><?= $li->correo?></td>
			<td>
					<a href="editar.php?id=<?= md5($li->id)?>"><button>Editar</button></a>
				<? if($li->estatus){?>
					<a href="cambiar_status.php?status=0&id=<?= md5($li->id)?>"><button>Desactivar</button></a>
				<? }else{?>
					<a href="cambiar_status.php?status=1&id=<?= md5($li->id)?>"><button>Activar</button></a>
				<? }?>
			</td>
		</tr>
		<? }?>
		</tbody>
	</table>
	<br/>
	<a href="registro.php"><button class="decoracion">Agregar un usuario</button></a>
</body>
</html>