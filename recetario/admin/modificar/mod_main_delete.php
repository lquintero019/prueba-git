<?php
   $success=0;
   $dir="../../img/";
   $open_dir=opendir($dir);
   $file_name_delete= $_POST;
   foreach ($file_name_delete as $key => $fnd) {
   	   $new_fnd[$key]=$fnd;
   }
   
  $num_rows= count($new_fnd['Errase']);
  for ($i=0; $i < $num_rows ; $i++) { 
    if(unlink($dir.$new_fnd['Errase'][$i])){
     	$success=1;
    }
  }

 echo json_encode($success);

?>