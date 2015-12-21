<?php
 include_once("../libs/db.php");
	$con = db();	
if ($con->connect_errno)
{
	echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
	exit();
}
@mysqli_query($con, "SET NAMES 'utf8'");
  $sql = 'SELECT * FROM main WHERE id = 1';
  $resultado= $con->query($sql);
  $campos=$resultado->fetch_object();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" >
	<title>Resetas</title>
	<link rel="stylesheet" type="text/css" href="../css_recetario/reseter.css">
	<link rel="stylesheet" type="text/css" href="../css_recetario/main_style.css">
	<script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="../js/slider.js"></script>
	<!--<script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>-->
</head>
<body>
<div class="div_top">
	
		<h1><img src="../img/logo.png"></h1>

</div>
<section>
   	

	<div class="div_center">
		<div class="div_left">
			<div class="slider">
				  <div id="ele1" class="elemento visible"> <img src="../img/<?= $campos->slayer1?>"></div>
				  <div id="ele2" class="elemento"> <img src="../img/<?= $campos->slayer2?>"></div>
				  <div id="ele3" class="elemento"><img src="../img/<?= $campos->slayer3?>"> </div>
				  	  
			</div>
			<ul class="bullets">
                       
                        <li class="bullet_off bullet_active"></li>
                        <li class="bullet_off"></li>
                        <li class="bullet_off"></li>

			</ul>
			
				<button id="anterior" class="b_left "> &lt </button>
				<button id="siguiente" class="b_rigth"> &gt </button>
		
			  <div class="margen">

		         <div class="titulos">
		         	<p class="subtema"><strong>Bienvenidos</strong></p>
			    	 <p><?= $campos->bienvenidos?></p>
			     </div>
			    
			     <div class="titulos">
			     	<p class="subtema"><strong>Contenido</strong></p>
			     	<p><?= $campos->contenido?></p>
			     	</div>
			     
			     <div class="titulos">
			     	<p class="subtema"><strong>Acerca de  nosotros</strong></p>
			     	<p>  <?= $campos->acercade?> </P> 
			     	</div>

			 		 </div>

		</div>
		<div class="div_right">
				<nav class="margen">
					<ul class="ul_menu">
						<li class="li_first"><a href="../catalog/vegetales/vegetales.php">Vegatales</a></li>
						<li><a href="../catalog/carnes/carnes.php">Carnes</a></li>
						<li><a href="../catalog/pastas/pastas.php">Pastas</a></li>
						<li><a href="../catalog/postres/postres.php">Postres</a></li>
						<li class="li_last"><a href="../catalog/bebidas/bebidas.php">Bebidas</a></li>
					</ul>
				</nav> 
			 <div class="margen foto_radius">
			        <h4><strong> Un gusto a tu paladar</strong></h4>
			    	<img src="../img/<?= $campos->ungusto_img?>">
			 </div>
			 <div class="margen foto_radius">
			 	   <h4><strong>Un arte</strong></h4>
			    	<img src="../img/<?= $campos->unarte_img?>">
			 </div>
		</div>
	 </div>
</section>
<footer>
	<div class="content2">
            <ul>
                <li class="primero"><a href="">Home</a></li>
                
                <li><a href="contacto.php">Contact</a></li>
            </ul>
        </div>
</footer>

</body>
</html>
