<?php
	$id = $_POST['id'];
	$canIngre = $_POST['ingre'];
	$canProce = $_POST['proce'];
	$proceso=array();
    $ingrediente=array();
   	for ($i=1; $i <= $canIngre; $i++) { 
    	$ingrediente[$i]=$_POST['ingrediente'.$i.''];
   	}
   	for ($x=1; $x <= $canProce; $x++) { 
    	$proceso[$x]=$_POST['proceso'.$x.''];
   	}

	$conexion=mysql_connect('localhost','root','') or die('No hay conexión a la base de datos');
	$db=mysql_select_db('main',$conexion)or die('no existe la base de datos.');

	for ($i=1; $i <= $canIngre; $i++) { 
		$sql="INSERT INTO ingre_proce_postres(id_postres,num_pasos,ingrediente) VALUES('".$id."','".$i."','".$ingrediente[$i]."')";
		if($res=mysql_query($sql,$conexion)){
			$p = 1;
		}
		else{
			$p = 0;
		}
	}

	if ($p==1) {
		echo '<script language="javascript">alert("Ingredientes Almacenados");</script>';
	}

	for ($x=1; $x <= $canProce; $x++) { 
		$sql2="INSERT INTO proce_ingre_postres(id_postre,num_pasos,proceso) VALUES('".$id."','".$x."','".$proceso[$x]."')";
		if($res2=mysql_query($sql2,$conexion)){
			$m = 1;
		}
		else{
			$m = 0;
		}
	}

	if ($m==1) {
		echo '<script language="javascript">alert("Procesos Almacenados");</script>';
	}
	echo '<script>location.href = "postres.php"</script>';

?>