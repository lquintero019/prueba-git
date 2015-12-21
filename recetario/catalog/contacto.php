<?php

 include_once("../libs/db.php");
    $con = db();    
if ($con->connect_errno)
{
    echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
    exit();
}
@mysqli_query($con, "SET NAMES 'utf8'");
  $sql = 'SELECT * FROM contacto WHERE id = 1';
  $resultado= $con->query($sql);
  $campos=$resultado->fetch_object();
 $error=array();
 $success="";

  $get_errores= $_GET['errores'];
  $errores_recibidos= stripslashes($get_errores);
  $errores_recibidos= urldecode($errores_recibidos);
  $errores= unserialize($errores_recibidos);
 
  $error=$errores;

  $get_exito= $_GET['exito'];
  $exito_recibidos= stripslashes($get_exito);
  $exito_recibidos= urldecode($exito_recibidos);
  $exito= unserialize($exito_recibidos);
 
  $success=$exito;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Contacto</title>
	<!--<link rel="stylesheet" type="text/css" href="../css_recetario/reseter.css">-->
  <script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css_recetario/contacto_style.css">
    <style type="text/css">
     body{
          height: 100%;
          width:100%;
          margin: 0px;
          background-image: url("../img/<?= $campos->img?>");
          background-size: 100% 100%;
          display: -webkit-inline-box;
        }
    </style>	
    <script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
</head>
<body>
  <?= $error;?>
<div class="div_top">
	
		<img src="../img/logo.png">

</div>
<div class="cuerpo">
    
     <form action="contacto/contacto_sender.php" method="post">
     <?=(isset($success))? $success :""?>
        <fieldset>
           <legend>Contactanos</legend> 
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre"placeholder="Nombre y Apellido" name="nombre" title="nombre" value="">
                <?= (isset($error['nombre']))?$error['nombre']:""?>
                
                <label for="correo">Correo</label>
                <input type="text" id="correo" placeholder="ejemplo@correo.com" name="correo" title="correo" value="">
                 <?= (isset($error['email']))?$error['email']:""?>
                <label for="comentario">Comentario</label>
                <div>
                    
                <textarea id="comentario" placeholder="Mensaje" name="comentario" title="comentario" value=""></textarea>  
                 <?= (isset($error['comentario']))?$error['comentario']:""?> 
                </div>

                <button type="submit">Enviar</button>  


        </fieldset>
     </form>

        
</div>
<footer class="footer">
	<div class="content2">
            <ul>
                <li class="primero"><a href="main.php">Home</a></li>
                <li><a href="contacto.php">Contact</a></li>
            </ul>
        </div>
</footer>
</body>
<script type="text/javascript">
  setTimeout(function(){
    $("div.error").hide("slow");
   
}, 5000);

</script>
</html>