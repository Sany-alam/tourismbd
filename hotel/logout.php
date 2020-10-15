<?php
session_start();
session_destroy();
// $_SESSION['hotel_name']=$hotel_name;
header("location:index.php");