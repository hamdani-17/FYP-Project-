<?php 

//local

$servername = "localhost"; 
$username = "root";
$password = "";
$db = "sistemnotifikasi_v1";


// This line, we will connect the db with mysqli_connect function
$conn = mysqli_connect($servername, $username, $password, $db);

//Check connection here
if(!$conn) //if no connection
{
	die("Connection failed: ".mysqli_connect_error());
}

// echo "Connected successfully";

?>



<?php
   error_reporting(0);
   session_start();
   
   $user_id = $_SESSION['user_id'];
   $role_id = $_SESSION['role_id'];
   $user_email = $_SESSION['user_email'];
   $user_fullname = $_SESSION['user_fullname'];

?>