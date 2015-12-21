<?php
session_start();
if (isset($_SESSION['usuario']))
{
	include_once("../../libs/db.php");
	$db = db();	
	$listado = $db->query("SELECT * FROM usuarios",MYSQLI_USE_RESULT);
}
else
{
	echo '<script>alert("primero debes loguearte para ver esta pagina")</script>';
	echo '<script>location.href = "../index.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
	<meta charset="UTF-8">
		<title>BIENVENIDO</title>
		<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
		<link rel="stylesheet" href="../estilos/mod_header.css" />
		<link rel="stylesheet" href="../estilos/mod_dishes_style.css" />
		<script type="text/javascript" src="../js/mod_emi.js"></script>
	</head>
	<body>
       <div class="div_top">
				<ul class="menu" style="padding-left: 0px;margin-top: 0px;margin-bottom: 0px;">
					<li class="img_logo"> 
						<img src="../img/platillos.png" alt="" id="logo" >

					</li>
					<li class="img_user">
						<img src="../img/user.png">
					</li>
					<li class="li_name">
						<p style=" margin-bottom: 0px;margin-top: 0px;color:black;">Usuario <?php echo $_SESSION['usuario']; ?></P>
					</li>
					<li>
						<a href="../logout.php"><img src="../img/cerrar_sesion.png"/></a>
					</li>
				</ul>
		</div>
		<div class="colum_left">
			<div id="admin">
				<img src="../icons/admin.png">
				<span>Administrador</span>
			</div>
			<div id="main">
				<img src="../icons/main.png">
				<span>Contenido principal</span>
			</div>
			<div id="contact">
				<img src="../icons/contact.png">
				<span>Contacto</span>
			</div>
			<div id="users">
				<img src="../icons/users.png">
				<span>Usuarios</span>
			</div>
	    </div>
	    <div class="colum_main">
	   	    <div class="slide_efect"><img src="../icons/desplegable.gif"></div>
	   	    <div class="colum_main_top">
   				<div><p><a href="vegetales/vegetales.php">Vegetales</a></p></div>
		        <div><p><a href="carnes/carnes.php">Carnes</a></p></div>
		        <div><p><a href="pastas/pastas.php">Pastas</a></p></div>
		        <div><p><a href="postres/postres.php">Postres</a></p></div>
		        <div><p><a href="bebidas/bebidas.php">bebidas</a></p></div>
		    </div>
	    </div>
	</body>
</html>