<?php
session_start();
include_once("../../libs/db.php");
	$con = db();	
if ($con->connect_errno)
{
	echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
	exit();
} 
  $post=$_POST; 
  $valor=$post['valor'];
  $correo=$valor;
   if(isset($post)){
        //usuario
	    if($post['tipo']==1){
			 @mysqli_query($con, "SET NAMES 'utf8'");
			   $id=$_SESSION['clave'];
			   $sql = "UPDATE usuarios SET usuario='$valor' WHERE id = $id"; 
			   if($con->query($sql)==TRUE){
	          	    echo json_encode(1);
	           } else {
	    			echo json_encode(0);
	    			print_r( "Error al actualizar: " . $con->error);
			   }
		}
		//contraseña
		if($post['tipo']==2){
			 @mysqli_query($con, "SET NAMES 'utf8'");
			   $id=$_SESSION['clave'];
			   $valor=md5($valor);
			   $sql = "UPDATE usuarios SET contrasena='$valor' WHERE id = $id"; 
			   if($con->query($sql)==TRUE){
	          	   echo json_encode(1);
	           } else {
	    			echo json_encode(0);
	    			print_r( "Error al actualizar: " . $con->error);
			   }
		}
		//nombre
		if($post['tipo']==3){
			 @mysqli_query($con, "SET NAMES 'utf8'");
			   $id=$_SESSION['clave'];
			   $sql = "UPDATE usuarios SET nombre='$valor' WHERE id = $id"; 
			   if($con->query($sql)==TRUE){
	          	   echo json_encode(1);
	           } else {
	    			echo json_encode(0);
	    			print_r( "Error al actualizar: " . $con->error);
			   }
		}
		//correo
		if($post['tipo']==4){
			if(filter_email($correo)== true){
			   @mysqli_query($con, "SET NAMES 'utf8'");
			   $id=$_SESSION['clave'];
			   $sql = "UPDATE usuarios SET correo='$valor' WHERE id = $id"; 
			   if($con->query($sql)==TRUE){
                   echo json_encode(1);
	           } else {
	           	    echo json_encode(0);
	    			print_r( "Error al actualizar: " . $con->error);
			   }
			}
			else{
			   echo json_encode(0);
			}
		}
		// alta y baja de uausrios
		if($post['tipo']==5){

			@mysqli_query($con, "SET NAMES 'utf8'");
			   $sql = "SELECT id,usuario,nombre,correo,estatus From usuarios"; 
			   $resultado= $con->query($sql);
               while ($campos= $resultado->fetch_object()){
               	    $usuarios[]=$campos;
               }
             
//$usuarios=array("id"=>$campos->id,"usuario"=>$campos->usuario,"nombre"=>$campos->nombre,"correo"=>$campos->correo,"status"=>$campos->estatus);
                
                  echo json_encode($usuarios);
	      
	           	   // echo json_encode(0);
	    			//print_r( "Error al actualizar: " . $con->error);
			   
		}
		
   }else{
   	  echo "ERROR AL ACTUALIZAR";
   }
    function filter_email($correo){
		   $Sintaxis='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
   			if(preg_match($Sintaxis,$correo))
      			return true;
   			else
     			return false;
	}


?>
