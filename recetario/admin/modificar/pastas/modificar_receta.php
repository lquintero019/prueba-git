<link rel="STYLESHEET" type="text/css" href="../../estilos/reset.css"></link>
<script type="text/javascript" src="../../js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="../../js/semantic.min.js"></script>
<script type="text/javascript" src="../../js/semantic.js"></script>
<link rel="STYLESHEET" type="text/css" href="../../estilos/semantic.css"></link>
<link rel="STYLESHEET" type="text/css" href="../../estilos/semantic.min.css"></link>
<style type="text/css">
    p{margin-left: 15px;}
</style>
<?php

	$conexion=mysql_connect('localhost','root','') or die('No hay conexión a la base de datos');
	$db=mysql_select_db('main',$conexion)or die('no existe la base de datos.');

    
    if($_POST['tipo']==1){
		$id=$_POST['id'];
		$nombre=$_POST['nombre'];
		$ingredientes=$_POST['ingrediente'];
		$procesos=$_POST['proceso'];
		$numPasIn = $_POST['numPas'];
		$numPasPro = $_POST['numPasos'];
		$rutaEnServidor='../../../catalog/pastas/images';
		$rutaTemporal=$_FILES['img']['tmp_name'];
		$nombreImagen=$_FILES['img']['name'];
		$rutaDestino=$rutaEnServidor.'/'.$nombreImagen;
		move_uploaded_file($rutaTemporal,$rutaDestino);

	  $sql1="UPDATE pastas SET nombre='$nombre', img='$nombreImagen' WHERE id='$id'";
	  $rs1 = mysql_query($sql1,$conexion);
		if ($rs1) {
			echo '<script language="javascript">alert("Se Modifico con exito");</script>';
        	echo '<p>Desea seguir modificando?</p>';
        	echo '<p><a href="javascript:history.go(-1)"><button class="ui button">Aceptar</button></a></p>';
        	echo '<p>Desea Terminar de Modificar?</p>';
        	echo '<p><a href="pastas.php"><button class="ui button">Aceptar</button></a></p>';
		}
		else{
			echo "error";
			echo '<script>location.href = "pastas.php"</script>';
		}
    }
    if($_POST['tipo']==2){
    	$numrow= "SELECT COUNT(num_pasos) as fila  FROM ingre_proce_pastas WHERE id_pastas=$_POST[id]";
    	$numrows= mysql_query($numrow);
    	$row = mysql_fetch_assoc($numrows);
        for ($i=1; $i <=$row['fila'] ; $i++) { 
        	$ingre="ingre".$i;
	    	$sqlIngre='UPDATE ingre_proce_pastas SET ingrediente ="'.$_POST[$ingre].'"  WHERE id_pastas= "'.$_POST["id"].'" AND num_pasos="'.$i.'"';
	    	$rs2 = mysql_query($sqlIngre,$conexion);
	    	if($rs2){
	    		$succes=1;
	    	}else{
	    		$succes=0;
	    	}
        }
        if($succes=1){
        	echo '<script language="javascript">alert("Se Modifico con exito");</script>';
        	echo '<p>Desea seguir modificando?</p>';
        	echo '<p><a href="javascript:history.go(-1)"><button class="ui button">Aceptar</button></a></p>';
        	echo '<p>Desea Terminar de Modificar?</p>';
        	echo '<p><a href="pastas.php"><button class="ui button">Aceptar</button></a></p>';

        }else{
        	echo "error";
        	echo '<script>location.href = "pastas.php"</script>';
        }
    }

    if($_POST['tipo']==3){
      $numrow= "SELECT COUNT(num_pasos) as fila  FROM proce_ingre_pastas WHERE id_pasta=$_POST[id]";
    	$numrows= mysql_query($numrow);
    	$row = mysql_fetch_assoc($numrows);
        for ($i=1; $i <=$row['fila'] ; $i++) { 
        	$proce="proce".$i;
	    	$sqlProce='UPDATE proce_ingre_pastas SET proceso ="'.$_POST[$proce].'" WHERE id_pasta= "'.$_POST["id"].'" AND num_pasos="'.$i.'"';
	    	$rs2 = mysql_query($sqlProce,$conexion);
	    	if($rs2){
	    		$succes=1;
	    	}else{
	    		$succes=0;
	    	}
        }
        if($succes=1){
        	echo '<script language="javascript">alert("Se Modifico con exito");</script>';
        	echo '<p>Desea seguir modificando?</p>';
        	echo '<p><a href="javascript:history.go(-1)"><button class="ui button">Aceptar</button></a></p>';
        	echo '<p>Desea Terminar de Modificar?</p>';
        	echo '<p><a href="pastas.php"><button class="ui button">Aceptar</button></a></p>';
        }else{
        	echo "error";
        	echo '<script>location.href = "pastas.php"</script>';
        } 
    }
?>