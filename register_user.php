<?php

include "config.php"; //satu line ni kena ade atas skli. 
session_start();
if(empty($_SESSION['user_fullname'])){
    header('Location: login.php');
}
if(isset($_POST['submit'])){

    $user_email = $_POST['user_email'];
    $user_pwd = $_POST['user_pwd'];
    $role_id = $_POST['role_id'];

    $sql_statement = "INSERT INTO `tbl_user`(`user_email`, `user_pwd`, `role_id`) VALUES ('$user_email','$user_pwd','$role_id')";

    $run_sql = mysqli_query($conn,$sql_statement);

    if($run_sql){

        ?>
        <script>
            alert('Berjaya');
           window.location.replace("http://localhost/psm_v1/view_user.php");
        </script>
<?php    
}
else{
?>
  <script>
            alert('Tidak Berjaya');
            window.location.replace("http://localhost/psm_v1/register_user.php");
        </script>
<?php    
} //ttp else
} //ttp if
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Sistem Notifikasi</title>
  </head>
  <body>
    <!-- We going to put role in here -->
    <h3>Register Staff</h3>

    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-12">
    			<form class="form-horizontal" action="" method="post">

					<!-- Text input-->

                    <div class="form-group">
                      <label class="col-md-4 control-label" for="textinput1">Name</label>  
                      <div class="col-md-4">
                      <input id="textinput1" name="user_name" type="name" class="form-control input-md">
                      </div>
                    </div>
					<div class="form-group">
					  <label class="col-md-4 control-label" for="textinput1">Email</label>  
					  <div class="col-md-4">
					  <input id="textinput1" name="user_email" type="email" class="form-control input-md">
					  </div>
					</div>
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="textinput2">Password</label>  
                      <div class="col-md-4">
                      <input id="textinput2" name="user_pwd" type="password" class="form-control input-md">
                      </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-4">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="role_id">
                            <option selected>Choose...</option>
                            <option value="1">Pentadbir</option>
                            <option value="2">Staff</option>
                        </select>
                    </div>
                </div>
            </div>

                    <button type="submit" class="btn-primary" name="submit">Submit</button>
					</form>

    		</div>
	    </div>		
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>