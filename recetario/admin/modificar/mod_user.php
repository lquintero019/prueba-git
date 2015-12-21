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
		<link rel="stylesheet" href="../estilos/mod_user_style.css" />
		<link rel="stylesheet" href="../estilos/modal_contain_user.css" />
		<script type="text/javascript" src="../js/mod_emi.js"></script>
		<script type="text/javascript" src="../js/mod_emi_user.js"></script>

	</head>
	<body>
		<div id="modal_contain_status">
           <form action="" method="POST">
				<div><p>x</p></div>
				<div id="modal_contain_container"></div>
				<div> 
				    <button id="chose_option1" name="actualizar">Mostrar usuarios</button>
				</div>
           </form>
		</div> 
	   <div id="modal_contain">
           <form action="" method="POST">
				<div><p>x</p></div>
				<div id="modal_contain_container">
                   <input type="text" name="update" value="">
				</div>
				<div> 
				    <button id="chose_option1" name="actualizar">Actualizar contenido</button>
				</div>
           </form>
		</div> 
       <div class="div_top">
				<ul class="menu" style="padding-left: 0px;margin-top: 0px;margin-bottom: 0px;">
					<li class="img_logo"> 
						<img src="../img/usuarios.png" alt="" id="logo" >

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
			<div id="dishes">
				<img src="../icons/dishes.png">
				<span>Platillos</span>
			</div>
			<div id="contact">
				<img src="../icons/contact.png">
				<span>Contacto</span>
			</div>
			<div id="main">
				<img src="../icons/main.png">
				<span>Contenido principal</span>
			</div>
	    </div>
	    <div class="colum_main">
	    	<center><p></p></center>
	    	<center><a href="../registro.php"><button class="boton">Registrar</button></a></center>
	         <div class="slide_efect"><img src="../icons/desplegable.gif"></div>
	         <div class="colum_main_top">
   				<div><p>Usuario</p></div>
		        <div><p>Contraseña</p></div>  
		    </div>
		    <div class="colum_main_bottom">
                <div><p>Nombre</p></div>
		        <div><p>Correo</p></div>
		        <div><p>Estatus (altas y bajas)</p></div>
		    </div>    
	    </div>
	</body>
			
</html>