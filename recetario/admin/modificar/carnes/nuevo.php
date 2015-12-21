<?php
	$conexion=mysql_connect('localhost','root','') or die('No hay conexión a la base de datos');
	$db=mysql_select_db('main',$conexion)or die('no existe la base de datos.');

	$rutaEnServidor='../../../catalog/carnes/images';
	$rutaTemporal=$_FILES['img']['tmp_name'];
	$nombreImagen=$_FILES['img']['name'];
	$rutaDestino=$rutaEnServidor.'/'.$nombreImagen;
    $file_extends='/jpg|png|gif|psd|jpeg/';
	$target_file=$rutaEnServidor.basename($nombreImagen);
    $imageType=pathinfo($target_file,PATHINFO_EXTENSION);
    $upload_state=0;
    $numeric=0;       

	$nombre=$_POST['nombre'];
// checo si la extencion de la imagen subida es igual alas que se dejan subir
		if(preg_match_all($file_extends,$imageType,$matches)){
            $upload_state=1;

		}else{
			$upload_state=0;
		}

		//chaco si todo esta bien se sube la imajen si no ps no
		if($upload_state==0){ $upload_state=0;}
		else if($upload_state==1){
			if(move_uploaded_file($rutaTemporal,$rutaDestino)){ $upload_state=1; }
			else{ $upload_state=0; }
		}
    if(is_numeric($_POST['numIngredientes']) && is_numeric($_POST['numProcesos'])){
            $numeric=1;

    }else{
            $numeric=0;
    }
  //  print_r($numeric."".$upload_state."".$nombre);
    
	if ($nombre == null || $upload_state == 0 || $numeric==0 ) {
	   	$array=array("error"=>1);
	   	echo json_encode($array);

	}
	else{
		$sql="INSERT INTO carnes (img,nombre) values('".$nombreImagen."','".$nombre."')";
		$res=mysql_query($sql,$conexion);
		$id=mysql_insert_id();

		if ($res){
			$numIngre = $_POST["numIngredientes"];
			$numProce = $_POST["numProcesos"];
			$array=array("id"=>$id ,"numIngredientes"=>$numIngre,"numProcesos"=>$numProce,"error"=>0);
			echo json_encode($array);

		}else{
	    	echo '<script language="javascript">alert("Error");</script>';
	    	echo '<script>location.href = "carnes.php"</script>';
		}
	}    
?>