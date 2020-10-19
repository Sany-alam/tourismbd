<?php
@ob_start();
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
include("../connection.php");
$email=$_POST['email'];
$password=$_POST['password'];


$sql="SELECT * from hotel where email='$email' and password='$password'";
$res=mysqli_query($conn,$sql);
$num_rows=mysqli_num_rows($res);
$row = mysqli_fetch_array($res);

if($num_rows!=0)
{
	header("location:main.php");
	$_SESSION['hotel']=$row;
}
else
{
	header("location:index.php");
}
?>