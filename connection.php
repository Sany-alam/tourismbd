<?php
$servername ="localhost";
$username ="root";
$password ="";
$conn = mysqli_connect($servername, $username, $password,"tourismbd");
mysqli_query($conn,'SET CHARACTER SET utf8');
mysqli_query($conn,"SET SESSION collation_connection ='utf8_general_ci'");
session_start();

?>