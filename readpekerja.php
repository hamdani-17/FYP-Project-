<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file

//local

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'sistemnotifikasi_v1');

//cloud
/*
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'pakarbua_psm');
define('DB_PASSWORD', 'pakarbua_psm!@#');
define('DB_NAME', 'pakarbua_psm');
*/

 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
    
    // Prepare a select statement
    $sql = "SELECT * FROM employees WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

               
                
                // Retrieve individual field value
                $nama = $row["nama"];
                $no_kad_pengenalan = $row["no_kad_pengenalan"];
                $no_tel = $row["no_tel"];
                $alamat = $row["alamat"];
                $agama = $row["agama"];
                $bangsa = $row["bangsa"];
                $tarikh_lahir = $row["tarikh_lahir"];
                $tempat_lahir = $row["tempat_lahir"];
                $kewarganegaraan = $row["kewarganegaraan"];
                $status_perkahwinan = $row["status_perkahwinan"];
                $nama_waris = $row["nama_waris"];
                $no_tel_waris = $row["no_tel_waris"];

            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<?php
session_start();
if(empty($_SESSION['user_fullname'])){
    header('Location: login.php');
}
?>
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Record</h1>
                    </div>

                    
                    <div class="form-group">
                        <label>Name</label>
                        <p class="form-control-static"><?php echo $row["nama"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>No kad pengenalan</label>
                        <p class="form-control-static"><?php echo $row["no_kad_pengenalan"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>No tel</label>
                        <p class="form-control-static"><?php echo $row["no_tel"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <p class="form-control-static"><?php echo $row["alamat"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Agama</label>
                        <p class="form-control-static"><?php echo $row["agama"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Bangsa</label>
                        <p class="form-control-static"><?php echo $row["bangsa"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Tarikh lahir</label>
                        <p class="form-control-static"><?php echo $row["tarikh_lahir"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Tempat lahir</label>
                        <p class="form-control-static"><?php echo $row["tempat_lahir"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Kewarganegaraan</label>
                        <p class="form-control-static"><?php echo $row["kewarganegaraan"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Status perkahwinan</label>
                        <p class="form-control-static"><?php echo $row["status_perkahwinan"]; ?></p>
                    </div>
                      <div class="form-group">
                        <label>Nama waris</label>
                        <p class="form-control-static"><?php echo $row["nama_waris"]; ?></p>
                    </div>
                      <div class="form-group">
                        <label>No tel waris</label>
                        <p class="form-control-static"><?php echo $row["no_tel_waris"]; ?></p>
                    </div>
                    <p><a href="indekpekerja.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>