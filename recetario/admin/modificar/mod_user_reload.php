<?php
session_start();
include_once("../../libs/db.php");
	$con = db();	
if ($con->connect_errno)
{
	echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
	exit();
}
@mysqli_query($con, "SET NAMES 'utf8'");
  $id=$_SESSION['clave'];
  $sql = "SELECT * FROM usuarios WHERE id = $id";
  $resultado= $con->query($sql);
  $campos=$resultado->fetch_object();
  $post=$_POST; 
  
   if(isset($post)){
	    if($post['tipo']==1){

		   $reload=$campos->usuario;
           echo json_encode($reload); 
		}
		if($post['tipo']==2){
		   $reload=$campos->contrasena;
           echo json_encode($reload); 
		}
		if($post['tipo']==3){
		   $reload=$campos->nombre;
           echo json_encode($reload); 
		}
		if($post['tipo']==4){
           $reload=$campos->correo;
           echo json_encode($reload);          
		}
   }else{
   	  echo "ERROR AL Recargar";
   }
   if($_GET['tipo']==5){
   	$id_user=$_GET['id'];
   	$estatus=$_GET['estatus'];
   	$sqlupdata=0;
	   	if($estatus==0){
	    	$sql = "UPDATE usuarios SET estatus='1' WHERE id = $id_user";
	    	if($con->query($sql)===true){
               $sqlupdata=1;
               $tipeupdate="dado de alta";	
               echo json_encode(array('sqlupdata'=>$sqlupdata,'tipeupdate'=>$tipeupdate));
	    	}else{
	    	   $sqlupdata=0;
               echo json_encode($sqlupdata);
           }

	   	}else{
            $sql = "UPDATE usuarios SET estatus='0' WHERE id = $id_user";
            if($con->query($sql)===true){
            	$sqlupdata=1;
            	$tipeupdate="dado de baja";
                echo json_encode(array("sqlupdata"=>$sqlupdata,"tipeupdate"=>$tipeupdate));
	    	}else{
	    	   $sqlupdata=0;
               echo json_encode($sqlupdata);
	    	}
	   	}

   }else{}

?>
