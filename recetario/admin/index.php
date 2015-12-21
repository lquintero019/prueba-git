<?php
session_start();
if (isset($_SESSION['usuario']))
{
	echo '<script>location.href = "welcome.php";</script>';
}
else
{
}
?>
<!DOCTYPE html>
<html lang="es" >
	<head>
		<meta charset="UTF-8">
		<title>INICIO DE SESIÓN</title>
		<link rel="stylesheet" href="estilos/estilo.css" />
		<script src="js/jquery-1.11.1.min.js"></script>
		
	</head>
	<body>
	<div class="contenedor">
		<h1>Login</h1>
		<h2>INICIO DE SESIÓN</h2>
		<img src="img/login.png" alt="" width="80" height="80">
		<div id="formulario">
			<form method="POST" action="return false" onsubmit="return false">
				<div id="resultado"></div>
				<p><input type="text" name="user" id="user" value="" placeholder="USUARIO"></p>
				<p><input type="password" name="pass" id="pass" value="" placeholder="*******"></p>
				<p><button onclick="Validar(document.getElementById('user').value, document.getElementById('pass').value);">ENTRAR</button></p>
			</form>
		</div>
		<p></p>
	</div>
	</body>
	<script>
	  $("div#formulario").on( "focusout", "form p input",function(){
               var string =$(this).val();
	  	  	   var new_string= string.replace(/SELECT|'|FROM|=|WHERE|LIKE|/gi,"").replace("*","").replace('"','').replace("&","").replace("!","");
	  	  	       new_string=$.trim(new_string);
	  	  	   $(this).val(new_string);
	  } );
            
			function Validar(user, pass)
			{
				$.ajax({
					url: "validar.php",
					type: "POST",
					data: "user="+user+"&pass="+pass,
					success: function(resp){
						$('#resultado').html(resp)
					}		
				});
			}
	</script>
</html>