<?php
include("../connection.php");

if(isset($_POST['s_email'])){
	$email=$_POST['s_email'];
	$name=$_POST['s_name'];
	$password=$_POST['s_password'];
	$r_password=$_POST['s_password_confirmation'];


	$sql2="SELECT * FROM user where user_email='$email'";
	$res2=mysqli_query($conn,$sql2);
	$num_rows=mysqli_num_rows($res2);
	if($num_rows==0){
		if($password==$r_password){
			$sql="INSERT INTO user(`user_name`,`user_email`,`user_password`) VALUES ('$name','$email','$password')";
			$res=mysqli_query($conn,$sql);  
			if($res)
			{
				echo "Success";
			}
		}
		else{
			echo "Password don't match";
		}
	}
	else{
		echo "Email Already Used";
	}
}



?>