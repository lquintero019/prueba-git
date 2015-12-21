<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="STYLESHEET" type="text/css" href="../../estilos/reset.css"></link>
<script type="text/javascript" src="../../js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="../../js/semantic.min.js"></script>
<script type="text/javascript" src="../../js/semantic.js"></script>
<link rel="STYLESHEET" type="text/css" href="../../estilos/semantic.css"></link>
<link rel="STYLESHEET" type="text/css" href="../../estilos/semantic.min.css"></link>
<link rel="stylesheet" type="text/css" href="../../estilos/modificar_platillos.css">
<style type="text/css">
	.size{width: 25%; margin-left: 150px; margin-bottom: 10px;}
</style>
<script type="text/javascript">
	var numeroIngre;
	var numeroProce;
	$(document).ready(function(){
		
		$("body").on('click','#con',function(){
			var str = new FormData();
			$.each($("form").serializeArray(), function(index, val){
				str.append(val.name, val.value);
			});
			str.append("img", $("input[name=img]")[0].files[0]);
			console.log(str);
			$.ajax({
				type:'post',
				url:"nuevo.php",
				processData: false,
				contentType: false,
				data: str,
				success:function(data){
					var todo= $.parseJSON(data);
					var inputs;
					if(todo.error==0){
						for (var i=1; i <= todo.numIngredientes; i++) { 
				          inputs ='<p>Ingrediente #'+i+'</p><textarea name="ingrediente'+i+'" id="'+i+'" cols="30" rows="5"></textarea>';
				          $("form#ingre").append(inputs);
					    }
					    for (var i=1; i <= todo.numProcesos; i++) { 
				          inputs ='<p>Procesos #'+i+'</p><textarea name="proceso'+i+'" id="'+i+'" cols="30" rows="5"></textarea>';
				          $("form#ingre").append(inputs);
					    }
					    inputs ='<input type="hidden" id="id" name="id" value="'+todo.id+'">';
					    $("form#ingre").append(inputs);
					    $("form#ingre").append(inputs);
					    inputs ='<input type="hidden" id="id" name="ingre" value="'+todo.numIngredientes+'">';
					    $("form#ingre").append(inputs);
					    inputs ='<input type="hidden" id="id" name="proce" value="'+todo.numProcesos+'">';
					    $("form#ingre").append(inputs);
					    inputs='<p><input type="submit"  value="Guardar" class="ui button"></p>';
					    $("form#ingre").append(inputs);
					    $("form#form1").slideUp("fast");
					    //$("form#ingre").append(inputs);
					}else{
						alert("Nombre,archivo no valido o numerio de ingredientes y recetas no validos");
					}
				}
			});
		});
	});
</script>
<title>Nueva Receta</title>
</head>
<body class="size">
	<h1>Nueva Receta</h1>
	<form id="form1" class="ui form" name="form1" method="post" action="nuevo.php" enctype="multipart/form-data">
		<p>
			<label for="Nombre" class="ui pointing below label">Nombre</label>
			<input type="text" name="nombre" id="nombre" />
		</p>
		<p>
			<label for="Nombre" class="ui pointing below label">Seleccione una imagen</label>
			<input type="file" name="img" />
		</p>
		<p>&nbsp;</p>
		<p>
			<label for="Ingredientes" class="ui pointing below label">Ingredientes</label>
			<input type="text" name="numIngredientes" placeholder="# Numero de ingredientes">
		</p>
		<p>
			<label for="Procesos" class="ui pointing below label">Procesos</label>
			<input type="text" name="numProcesos" placeholder="# Numero de procesos">
		</p>
		<input id="con" type="button" name="Aceptar" value="Aceptar" class="ui button">
		<p></p>
	</form>
	<form id="ingre" class="ui form" action="guardar_ingredientes.php" method="post">
        
	</form>
<p><a href="http://localhost/recetario/admin/modificar/carnes/carnes.php"><button class="ui button">Cancelar</button></a></p>
</body>
</html>