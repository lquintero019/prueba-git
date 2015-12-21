<?php
include_once("../../libs/db.php");
	$con = db();	
if ($con->connect_errno)
{
	echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
	exit();
}
@mysqli_query($con, "SET NAMES 'utf8'");
  $sql = 'SELECT * FROM main WHERE id = 1';
  $resultado= $con->query($sql);
  $campos=$resultado->fetch_object();
  $post=$_POST; 
  
   if(isset($post)){

	    if($post['tipo']==1){
		}
		if($post['tipo']==2){
			print_r("tipo 2");
		}
		if($post['tipo']==3){
			print_r("tipo 3"); 
		}
		if($post['tipo']==4){
           $reload=$campos->bienvenidos;
           echo json_encode($reload);          
		}
		if($post['tipo']==5){
			$reload=$campos->contenido;
            echo json_encode($reload);  
		}
		if($post['tipo']==6){
		   $reload=$campos->acercade;
           echo json_encode($reload);  
		}
		if($post['tipo']==7){
			print_r("tipo 7");
		}
		if($post['tipo']==8){
			print_r("tipo 8");
		}
   }else{
   	  echo "ERROR AL Recargar";
   }
    
    function archivos(){
		 
		 
		 
	 }
  
  

?>

