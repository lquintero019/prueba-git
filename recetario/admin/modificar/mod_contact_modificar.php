<?php
	include_once("../../libs/db.php");
		$con = db();	
	if ($con->connect_errno){
		echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
		exit();
	}
		    $post=$_POST; 
	   
	        if(isset($post) && isset($_FILES)){
              
              $file_js=archivos($post['tipo'],$_FILES);
	          echo json_encode($file_js);

	        }

	   

    function archivos($tipo,$file){
		 $target_directori="../../img/";
		 $target_file=$target_directori.basename($file['fileToUpload']['name']);
         $upload_state=0;
         $file_size_max= 5242880;
         $file_size_min= 1048576;
		 $imageType=pathinfo($target_file,PATHINFO_EXTENSION);
         $file_extends='/jpg|png|gif|psd|jpeg/';
         $files_permit="jpg,png,gif,psd,jpeg";

      //con esto checo si es una imagen o es un archivo diferente a una imajen
		if(isset($file['fileToUpload'])){
		 	 $check=getimagesize($file['fileToUpload']['tmp_name']);
		 	 	if($check!==false){
		 	 		$upload_state=1;
		 	 	}else{
                    $upload_state=0;
                    $file_only_img="Lo sentimos pero solo se admiten imagenes";
                   
		 	 	}
		}
		// checo si la extencion de la imagen subida es igual alas que se dejan subir
		if(preg_match_all($file_extends,$imageType,$matches)){
            $upload_state=1;

		}else{
			$flie_extensions=" solo se permiten las siguientes extenciones : ".$files_permit;
			$upload_state=0;
		}
		//Comprueba si ya esxiste la imajen en nuestro directorio
		if(file_exists($target_file)){
		 	$file_exists=" El archivo con el nombre : '".basename($file['fileToUpload']['name'])."' ya existe";
		 	$upload_state=0;
		}
		//checo el tamaño de la imagen
		if($file['fileToUpload']['size'] > $file_size_max ||  $file['fileToUpload']['size'] < $file_size_min){
            $file_size=" no sepermiten archivos mayores de  5 MB y menores a 1 MB su imagen es de :".round(($file['fileToUpload']['size']/1048576),3)." MB";
            $upload_state=0;
		}
		//chaco si todo esta bien se sube la imajen si no ps no
		if($upload_state==0){
			$file_rezons=" lo sentimos pero no se puede subir su archivo por las siguientes razones";
			$update_success=0;

		}
		else if($upload_state==1){
			if(move_uploaded_file($file['fileToUpload']['tmp_name'], $target_file)){
               //pendiente con error al subir el archivo 
                $file_name=basename($file['fileToUpload']['name']);
                $foto=$file_name;
       
				 	$sql = "UPDATE contacto SET img ='$foto' WHERE id = 1"; 
				    $update_success= updateimg($sql);
			}
			else{
				$file_rcs=" no se puedo subir el archivo al la ruta especifica";
			}
		}
		return $file_js=array("file_rezons"=>$file_rezons,"file_only_img"=>$file_only_img,"flie_extensions"=>$flie_extensions,"file_exists"=>$file_exists,"file_size"=>$file_size,"update_success"=>$update_success);
	}

    function updateimg($sql){
    	$sql_funtion=$sql;
    	$update_success=0;
    	$con_bd = db();	
		if ($con_bd->connect_errno){
			echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
			$update_success=0;
			exit();
		}else{
   		    if($con_bd->query($sql_funtion)===TRUE){
		    	 $update_success=1;
 	        }else{
	    	    $update_success=0;
			}      
        }
        return $update_success;
	}


?>