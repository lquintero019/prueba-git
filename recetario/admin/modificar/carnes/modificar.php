<?php
	$link = @mysql_connect("localhost", "root", "");
	mysql_select_db("main", $link);
	$id = $_GET['id'];
	$sql1 = "SELECT nombre, img FROM carnes WHERE id = $id";
	$rs1 = mysql_query($sql1);
	$row1 = mysql_fetch_assoc($rs1);

	$sql2 = "SELECT num_pasos,ingrediente FROM ingre_proce_carnes WHERE id_carne = $id";
	$rs2 = mysql_query($sql2);

	$sql3 = "SELECT num_pasos,proceso FROM proce_ingre_carnes WHERE id_carne = $id";
	$rs3 = mysql_query($sql3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<link rel="STYLESHEET" type="text/css" href="../../estilos/reset.css"></link>
	<script type="text/javascript" src="../../js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="../../js/semantic.min.js"></script>
	<script type="text/javascript" src="../../js/semantic.js"></script>
	<link rel="STYLESHEET" type="text/css" href="../../estilos/semantic.css"></link>
	<link rel="STYLESHEET" type="text/css" href="../../estilos/semantic.min.css"></link>
	<link rel="stylesheet" type="text/css" href="../../estilos/modificar_platillos.css">
	<title>Modificar Receta</title>
	<style type="text/css">
		.size{width: 30%; margin-left: 15px; margin-bottom: 10px;}
		img{width: 80%;}
		.ingredientes{
    		float: left;
    		overflow: hidden;
		}
		.ingredientes ul{
			padding: 10% 10%;
		}
		.procesos{
    		float: left;
    		overflow: hidden;
    		background-size: 100% 100%
		}
		.procesos ul{
			padding: 10% 10%;
		}
	</style>
</head>
<body>
	<h1>Modificar Receta</h1>
	<a href="http://localhost/recetario/admin/modificar/carnes/carnes.php"><button class="ui button">Salir</button></a>
	<p></p>
	<form name="modificar_receta" class="ui form size" method="POST" action="modificar_receta.php" enctype="multipart/form-data">
			<div>
				<p>
					<label for="Nombre" class="ui pointing below label">Nombre</label>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<td width="30" align="center"><input type="text" name="nombre" size="25" value="<?php echo $row1['nombre']; ?>" />
				</p>
				<p></p>
			</div>
			<div>
				<p>
					<label for="Imagen" class="ui pointing below label">Imagen</label>
					<img class='ui medium rounded image' src="../../../catalog/pastas/images/<?php echo $row1['img']; ?>" alt="">
					<input type="file" name="img" size="25" value="<?php echo $row1['img']; ?>" />
					<input type="hidden" name="tipo" value="1" > 
				</p>
				<p></p>
			</div>
			    <div class="boton">
				<p><input type="submit" value="Guardar nombre e imgen" class="ui button" /></p>
			</div>
	</form>
	<form name="modificar_receta" method="POST" action="modificar_receta.php" class="ui form ingredientes">
			<div>
				<ul>

					<?php
						while ($row2 = mysql_fetch_assoc($rs2)) {
							$numPas = $row2['num_pasos'];
							$ingrediente = htmlentities($row2['ingrediente']);
							?>
							<p>Ingrediente: <label for=""><?php print_r($numPas);?></label></p>
							<div><?php echo "<textarea name='ingre".$numPas."' cols='30' rows='5'>$ingrediente</textarea>"?></div>
						<?}
					?>
							<input type="hidden" name="id" value="<?= $id ?>" > 
							<input type="hidden" name="tipo" value="2" > 
				</ul>
			</div>
			<div class="boton">
				<p><input type="submit" value="Guardar ingredientes" class="ui button" /></p>
			</div>
			<p></p>
	</form>
	<form name="modificar_receta" method="POST" action="modificar_receta.php" class="ui form procesos">
			<div>
				<ul>
					<?php
						while ($row3 = mysql_fetch_assoc($rs3)) {
							$numPasos = $row3['num_pasos'];
							$proceso = htmlentities($row3['proceso']);
							?>
							<p>Proceso: <label for=""><?php print_r($numPasos);?></label></p>
							<div><?php echo "<textarea name='proce".$numPasos."' cols='30' rows='10'>$proceso</textarea>"?></div>
						<?}
					?>
						   <input type="hidden" name="id" value="<?= $id ?>" > 
						   <input type="hidden" name="tipo" value="3" > 
				</ul>
			</div>
			<div class="boton">
				<p><input type="submit" value="Guardar procesos" class="ui button" /></p>
			</div>		
	</form>
	
</body>
</html>