<?php
session_start();
if (isset($_SESSION['usuario']))
{
	include_once("../libs/db.php");
	$db = db();	
	$listado = $db->query("SELECT * FROM usuarios",MYSQLI_USE_RESULT);
}
else
{
	echo '<script>alert("primero debes loguearte para ver esta pagina")</script>';
	echo '<script>location.href = "index.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>BIENVENIDO</title>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="estilos/estilo.css" />
<script type="text/javascript" src="js/emi.js"></script>
</head>
<body>
  <SECTION class="father">
	<div class="div_top">
				<ul class="menu" style="padding-left: 0px;margin-top: 0px;margin-bottom: 0px;">
					<li class="img_logo"> 
						<img src="img/bienvenido.png" alt="" id="logo" >

					</li>
					<li class="img_user">
						<img src="img/user.png">
					</li>
					<li style="position: relative; top: -17%;">
						<span><p style=" margin-bottom: 0px;margin-top: 0px;color:black;">Usuario </P><?php echo $_SESSION['usuario']; ?></span>
					</li>
					<li>
						<a href="logout.php"><img src="img/cerrar_sesion.png"/></a>
					</li>
				</ul>
	</div>
	<div class="contenedor">
		<div class="top_conteiner">
			<div class="main"><a id="link" href="modificar/mod_main.php"><img class="visible" src="img/main.jpg"/><img class="hiden" src="img/main_h.jpg"/></a></div>
			<div class="users"><a id="link"div href="modificar/mod_user.php"><img class="visible" src="img/users.png"/><img class="hiden" src="img/users_h.png"/></a> </div>
		</div>
		<div class="bootom_conteiner">
			<div class="contact"><a id="link" href="modificar/mod_contact.php"><img class="visible" src="img/contact.jpg"/><img class="hiden" src="img/contact_H.jpg"/></a></div>
			<div class="dishes"><a id="link" href="modificar/mod_dishes.php"><img class="visible" src="img/dishes.jpg"/><img class="hiden" src="img/dishes_h.jpg"/></a></div>
		</div>
	</div>
	<div class="emi_container"><p></P></div>
  </SECTION>
</body>
</html>


