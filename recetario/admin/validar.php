<?php
error_reporting(0);
session_start();
$con = new mysqli("localhost","root","", "main");
if ($con->connect_errno)
{
	echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
	exit();
}
@mysqli_query($con, "SET NAMES 'utf8'");

$user = mysqli_real_escape_string($con, text_scape( $_POST['user']));
$pass = mysqli_real_escape_string($con, text_scape($_POST['pass']));
//print_r($user);
//print_r($pass);

if ($user == null || $pass == null)
{
	echo '<span>Por favor complete todos los campos.</span>';
}
else
{   
	$pass=md5($pass);
	//print_r($pass);
	$consulta = mysqli_query($con, "SELECT usuario,contrasena FROM usuarios WHERE usuario = '$user' AND contrasena = '$pass'");
    $result_rows=mysqli_num_rows($consulta);
	if ($result_rows > 0)
	{
		@mysqli_query($con, "SET NAMES 'utf8'");
        $sql = "SELECT * FROM usuarios WHERE usuario = '$user' AND contrasena = '$pass'";
  		$resultado= $con->query($sql);
  		$campos=$resultado->fetch_object();
        $id=$campos->id;
		$_SESSION["usuario"] = $user;
		$_SESSION['clave']= $id;
		//print_r($_SESSION);
		echo '<script>location.href = "welcome.php"</script>';
	}
	else
	{
		echo '<span>El usuario y/o clave son incorrectas, vuelva a intentarlo.</span>';
	}
}
function text_scape($data){
   $data=trim($data);
   $data=stripslashes($data);
   $data=htmlspecialchars($data);
   return $data;
}
?>
