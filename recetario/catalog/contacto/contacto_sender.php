<?php
require_once('../../PHPMailer-master/class.phpmailer.php');
include("../../PHPMailer-master/class.smtp.php"); 
//require_once("../../phpmailer/class.phpmailer.php");
//include("../../phpmailer/class.smtp.php"); 

	if (!empty($_POST['nombre']) || !empty($_POST['correo']) || !empty($_POST['comentario'])) {
	   //print_r($_POST);
	   $nombre=htmlspecialchars(trim($_POST['nombre']));
	   $correo=htmlspecialchars(trim($_POST['correo']));
	   $comentario=htmlspecialchars(trim($_POST['comentario']));
	   $error = array();
	    $sintaxis='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
	    
	    if(empty($nombre)){     $error['nombre'] = "<div class='error'>El campo nombre es requerido</div>";}
	    if(empty($correo)){     $error['email'] = "<div class='error'>El campo Correo es requerido</div>";}
	    if(empty($comentario)){ $error['comentario'] = "<div class='error'>El campo mensaje es requerido</div>";}
	    if(count($error)>0){
	    	
	    	   $array_de_errores=serialize($error);
	    	   $array_de_errores=urlencode($array_de_errores);
	    	   header("location:../contacto.php?errores=$array_de_errores");
	    	 
	    }
	    else if(count($error)==0){
	        if(preg_match($sintaxis,$correo)==0){

	            $error["email"] = "<div class='error'>Introduce un correo valido</div>";
	           
	    	   $array_de_errores=serialize($error);
	    	   $array_de_errores=urlencode($array_de_errores);
	    	   header("location:../contacto.php?errores=$array_de_errores");
	        }
	    }
	    if(empty($error['email']) && empty($error['comentario']) && empty($error['nombre'])){
        
        require '../../PHPMailer-master/PHPMailerAutoload.php';
	    	$mail = new PHPMailer(); 
	    	//indico a la clase que use SMTP
			$mail->IsSMTP(); 
			 //permite modo debug para ver mensajes de las cosas que van ocurriendo
          //$mail->SMTPDebug = 2;

		  //Debo de hacer autenticación SMTP
			$mail->SMTPAuth = true; 
			$mail->SMTPSecure = "ssl"; 
			 //indico el servidor de Gmail para SMTP
			$mail->Host = "smtp.gmail.com"; 
			 //indico el puerto que usa Gmail
			$mail->Port = 465; 
			 //indico un usuario / clave de un usuario de gmail
			$mail->Username = "gonzalezraul690@gmail.com"; 
			$mail->Password = "raulgonzalez92";
			
			$mail->From = $correo; 
			$mail->FromName ="Recetario Team"; 
			$mail->Subject = "Recetario maestro"; 
			//$mail->AltBody = $comentario; 
			$mail->setFrom($correo,$nombre);
			$mail->AddAddress("gonzalezraul690@gmail.com","Administrador"); 
			$mail->addReplyTo($correo,$nombre);
			$mail->MsgHTML($comentario); 
			//$mail->AddAttachment("files/files.zip"; 
			//$mail->AddAttachment("files/img03.jpg"; 
			//$mail->IsHTML(true); 
			if(!$mail->Send()) { 
				echo "Error: " . $mail->ErrorInfo; 
			} else { 
				//echo "Mensaje enviado correctamente";
				 $exito="<div class='error'>Mensaje enviado correctamente ".$correo." ".$nombre."</div>";
				 $array_de_exito=serialize($exito);
	    	     $array_de_exito=urlencode($array_de_exito);
	    	     header("location:../contacto.php?exito=$array_de_exito");
			}
			echo $correo;
	         
	    }
	}
	else{
	   
	   $error = array();
	   $nombre=trim($_POST['nombre']);
	   $correo=trim($_POST['correo']);
	   $comentario=trim($_POST['comentario']);

	        $error['nombre'] = "<div class='error'>El campo nombre es requerido</div>";
	        $error['email'] = "<div class='error'>El campo Correo es requerido</div>";
	        $error['comentario'] = "<div class='error'>El campo mensaje es requerido</div>";
	  
	          $array_de_errores=serialize($error);
	    	  $array_de_errores=urlencode($array_de_errores);
	    	  header("location:../contacto.php?errores=$array_de_errores");
	}
?>