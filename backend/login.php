<?php 
include("../connection.php");
@ob_start();
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
ini_set('error_log', 'ussd-app-error.log');


if(isset($_POST['email'])){
	$email=$_POST['email'];
	$password=$_POST['password'];

	$sql="Select * from user where user_email='$email' and user_password='$password'";
	$res=mysqli_query($conn,$sql);  
	$row=mysqli_fetch_array($res);

	$num_rows=mysqli_num_rows($res);

	if($num_rows==0){
		echo "not_ok";
	}
	else{
		$id=$row['id'];
		$_SESSION['id']=$id;
		echo "ok";
	}
}

 

?>


