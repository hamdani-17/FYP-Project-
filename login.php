<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Signin Sistem Notifikasi</title>

    <!-- Bootstrap core CSS -->
    <!-- <link href="../../dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <style>body {
   background-image: url("img/bg.jpg");
   background-color: #cccccc;
   background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */
}</style>
  </head>

  <body class="text-center">
    <form class="form-signin" action="" method="post">
      <img class="mb-4" src="img/collaboration.png" alt="" width="auto" >
      <h1 class="h3 mb-3 font-weight-normal" style="color: white;"><b>Sistem <br/> Notifikasi</b></h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="user_email">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="user_pwd">
      
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Log Masuk</button>
      
      
      <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
    </form>
  </body>
</html>

<?php

include "config.php"; //satu line ni kena ade atas skli. 

if(isset($_POST['submit']))
{
    session_start();

    $user_email = $_POST['user_email'];
    $user_pwd = $_POST['user_pwd'];
    

    $sql_statement = "SELECT * FROM `tbl_user` WHERE `user_email`='$user_email'
     AND `user_pwd` = '$user_pwd'";

    $run_sql = mysqli_query($conn,$sql_statement);
	$row = mysqli_fetch_assoc($run_sql);
    $run_row = mysqli_num_rows($run_sql);


    if($run_row > 0)
	{

	$_SESSION['user_id'] = $row['user_id'];
	$_SESSION['role_id'] = $row['role_id'];
	$_SESSION['user_email'] = $row['user_email'];
	$_SESSION['user_fullname'] = $row['user_fullname'];

    ?>
    <script>
        alert('Berjaya');
		<?php
		if ( $_SESSION['role_id'] != '8')
		{
		?>
        window.location.replace("index.php");
		<?php
		}
		else
		{
		?>
		window.location.replace("index1_employee.php");
		<?php
		}
		?>
    </script>
	<?php    
	}
	else
	{
    ?>
    <script>
		alert('Tidak Berjaya');
		window.location.replace("login.php");
	</script>
	<?php    
	} //ttp else
	} //ttp if
	?>