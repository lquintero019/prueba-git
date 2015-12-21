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
		<link rel="stylesheet" href="../estilos/mod_main_style.css" />
		<link rel="stylesheet" href="../estilos/modal_img_contain.css" />
		<script type="text/javascript" src="../js/mod_emi.js"></script>
		<script type="text/javascript" src="../js/mod_emi_main.js"></script>
	</head>
	<body>
		<div id="modal_img">
           <form action="" id="form" method="POST" enctype="multipart/form-data">
				<p>x</p>
				<div id="modal_img_container">
					<div id="children_modal_img">
						<h1>Seleccione las imajenes que desea eliminar</h1>
						<div>	
							<?php 
	                             $directorio="../../img/";
	                             if($dir = opendir($directorio)){
	                             	while ($archivo = readdir($dir)) {
	                             		if(filetype($directorio.$archivo)!="directorio"){
	                             			if($archivo !='.' && $archivo !='..'){
	                             				if( ($archivo !="Thumbs.db") && ($archivo != ".htaccess") && ($archivo != ".txt")){

	                             					$i++;
	                             		   			echo '<div class="div_img"><input type="checkbox" name="Errase[]" value="'.$archivo.'"/><img id="'.$archivo.' "src="'.$directorio.$archivo.'"/></div>'; 
	                             				}
	                             			}
	                             		}
	                             	}
	                             }
							?>
						</div>	
					</div>
				</div>
				<label for="imagen">Imagen:</label>
				<input id="select_file" type="file" name="fileToUpload" value=""/>
				<input id="chose_option1" type="submit" name="submit" value="Actualizar slider"/>
				<input id="chose_option2" type="submit" name="mostrar" value="Mostrar imagenes"/>
				<input id="chose_option3" type="submit" name="borrar" value="Borrar imagenes"/>

           </form>
		</div> 
		<div id="modal_contain">
           <form action="" method="POST">
				<div><p>x</p></div>
				<div id="modal_contain_container">
                   <textarea id="dato" name="dato" value=""></textarea> 
				</div>
				<div> 
				    <button id="chose_option1" name="actualizar">Actualizar contenido</button>
					<button id="chose_option2" name="mostrar">Mostrar contenido</button>

				</div>
           </form>
		</div> 
       <div class="div_top">
				<ul class="menu" style="padding-left: 0px;margin-top: 0px;margin-bottom: 0px;">
					<li class="img_logo"> 
						<img src="../img/main.png" alt="" id="logo" >

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
			<div id="users">
				<img src="../icons/users.png">
				<span>Usuarios</span>
			</div>
	    </div>
	    <div class="colum_main">
	        <div class="slide_efect"><img src="../icons/desplegable.gif"></div>
		    <div class="colum_main_top">
   				<div><p>Slider Foto 1</p></div>
		        <div><p>Slider Foto 2</p></div>
		        <div><p>Slider Foto 3</p></div>
		        
		    </div>
		    <div class="colum_main_bottom">
                <div><p>Bienvenidos</p></div>
		        <div><p>Contenido</p></div>
		        <div><p>Acerca de</p></div>
		        <div><p>Un gusto</p></div>
		        <div><p>Un arte</p></div>
		    </div>   
	    </div>
	</body>
</html>

