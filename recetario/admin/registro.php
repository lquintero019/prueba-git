<?php	
	include_once("../libs/db.php");
	$db = db();	
    $no_character='/#|!|SELECT|select|"|&|INSERT|insert|DROP|drop|DELETE|delete|WHERE|where/';
	if(!empty($_POST)){
		$error = array();
		$nombre = trim($_POST["nombre"]);
		$usuario = trim($_POST["user"]);
		$contrasena = trim($_POST["pass"]);
		$correo = trim($_POST["correo"]);
		if(empty($nombre)){$error['nombre'] = "<div class='errorsote'>El campo nombre es requerido</div>";}
        elseif (!empty($nombre)) { 
             if(preg_match_all($no_character,$nombre,$matches)){
             	for($i=0;$i<count($matches);$i++) {
                     for($e=0;$e<count($matches[$i]);$e++) { $nombre_matches=$nombre_matches.$matches[$i][$e].',';}
                }
                $nombre_matches= trim($nombre_matches,",");
				$error["nombre"] = "<div class='errorsote'>No se permiten los sig caracteres: <strong> $nombre_matches </strong></div>";
			}else{}
		}
		
		if(empty($usuario)){$error['user'] = "<div class='errorsote'>El campo usuario es requerido</div>";}
		elseif (!empty($usuario)) { 
             if(preg_match_all($no_character,$usuario,$matches)){
             	for($i=0;$i<count($matches);$i++) {
                     for($e=0;$e<count($matches[$i]);$e++) { $usuario_matches=$usuario_matches.$matches[$i][$e].',';}
                }
                $usuario_matches= trim($usuario_matches,",");
				$error["user"] = "<div class='errorsote'>No se permiten los sig caracteres :<strong> $usuario_matches </strong></div>";
			}else{}
		}
			
		if(empty($contrasena)){$error["pass"] = "<div class='errorsote'>El campo contrasena requerido</div>";}
		elseif (!empty($contrasena)) { 
			if(preg_match_all($no_character,$contrasena,$matches)){
				for($i=0;$i<count($matches);$i++) {
                     for($e=0;$e<count($matches[$i]);$e++) { $contrasena_matches=$contrasena_matches.$matches[$i][$e].',';}
                }
                $contrasena_matches= trim($contrasena_matches,",");
				$error["pass"] = "<div class='errorsote'>No se permiten los sig caracteres : <strong> $contrasena_matches</strong></div>";
			}else{}
		}	
		
		if(empty($correo)){$error["correo"] = "<div class='errorsote'>El campo correo es requerido</div>"; }
		if(!empty($correo)){
			if(filter_email($correo)){
    
            }else{$error["correo"]="<div class='errorsote'>El campo correo tiene que tener el sig formato 'algo@algo.algo'</div>";}}				
		
		if(!count($error)){
			$contrasena =md5 ($contrasena);
			$fecha = date("Y-m-d H:i:s");
			$codigo_confirmacion = md5($fecha);
			$query = "INSERT INTO usuarios values(NULL,'$usuario','$contrasena','$nombre','$correo',1)";
			$db->query($query);
			if(!$db->insert_id)
				echo "Hubo un error al procesar su petición ".$db->error;
			else{
				echo "<div class='exito'>Datos almacenados</div>";
			}
		}
	}
	function filter_email($correo){
		   $Sintaxis='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
   			if(preg_match($Sintaxis,$correo))
      			return true;
   			else
     			return false;
	}
?>
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="estilos/style.css"/>
		<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
		<noscript>
			<h3>Este sitio requiere javascript</h3>
		</noscript>
		<style type="text/css">
				form div.campo div.errorsote{position:static}
				form div.campo > div.errorsote > strong{ font-size: 1.5em}
				div.exito{position: relative;top: 52%;left: 29%;font-size: 3em;}
		</style>
	</head>
	<body>
		<div class="content">
			<h1>Registro de usuarios</h1>
			<form action="" method="POST" id="frm_registro">
				<label for="nombre">Nombre</label>
				<div class="campo" id="nombre">
					<input type="text" id="nombre" name="nombre" title="nombre" value=""/>
					<?= (isset($error['nombre']))?$error['nombre']:""?>
				</div>
				<label for="user">Usuario</label>
				<div class="campo" id="user">
					<input type="text" id="user" name="user" title="user" value=""/>
					<?= (isset($error['user']))?$error['user']:""?>
				</div>
				<label for="contrasena">Contraseña</label>
				<div class="campo" id="pass">
					<input type="password" id="pass" name="pass" title="pass" value=""/>
					<?= (isset($error['pass']))?$error['pass']:""?>
				</div>
				<label for="correo">Correo</label>
				<div class="campo" id="correo">
					<input type="text" id="correo" name="correo" title="correo" value=""/>
					<?= (isset($error['correo']))?$error['correo']:""?>
				</div>
				<div class="last_div">
					<button id="guardar">Guardar</button>
					<button><a href="index.php">Regresar</a></button>
				</div>
			</form>
		</div>
		<script type="text/javascript">
			setTimeout(function(){
				$('form div.campo div.errorsote').hide("slow");
			},5000);
			$('div.campo input').focus(function(){
				var papa = $(this).parent();
				papa.find(".errorsote").hide();
			});
			$("form#frm_registro div.last_div").on("click","button#guardar",function(){
                   
                   if($("input#nombre").val()==""){
                          var nombre_vacio="<div class='errorsote'>El campo NOMBRE es requerido</div>";
                          $("div#nombre").append(nombre_vacio);
                   }else{

                   }
                   if($("input#user").val()==""){
                          var nombre_vacio="<div class='errorsote'>El campo USUARIO es requerido</div>";
                          $("div#user").append(nombre_vacio);
                   }else{

                   }
                   if($("input#pass").val()==""){
                          var contrasena_vacio="<div class='errorsote'>El campo CONTRASEÑA requerido</div>";
                          $("div#pass").append(contrasena_vacio);
                   }else{

                   }
                   if($("input#correo").val()==""){
                          var nombre_vacio="<div class='errorsote'>El campo CORREO es requerido</div>";
                          $("div#correo").append(nombre_vacio);
                   }else{

                   }

			});
		</script>
	</body>
</html>