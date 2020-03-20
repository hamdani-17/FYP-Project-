<?php

include "config.php"; //satu line ni kena ade atas skli. 

if(isset($_POST['submit'])){

    $role_name = $_POST['role_name'];

    $sql_statement = "INSERT INTO `tbl_role`(`role_name`) VALUES ('$role_name')";

    $run_sql = mysqli_query($conn,$sql_statement);

    if($run_sql){

        ?>
        <script>
            alert('Berjaya');
            window.location.replace("http://localhost/psm_v1/add_role.php");
        </script>
<?php    
}
else{
?>
  <script>
            alert('Tidak Berjaya');
            window.location.replace("http://localhost/psm_v1/add_role.php");
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
    <h3>Role</h3>

    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-12">
    			<form class="form-horizontal" action="" method="post">

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="textinput">Role</label>  
					  <div class="col-md-4">
					  <input id="textinput" name="role_name" type="text" class="form-control input-md">
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