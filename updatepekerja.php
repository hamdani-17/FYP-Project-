<?php
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
 
// Define variables and initialize with empty values
$nama = $no_kad_pengenalan = $no_tel = $alamat = $agama = $bangsa = $tarikh_lahir = $tempat_lahir = $kewarganegaraan = $status_perkahwinan = $nama_waris = $no_tel_waris = "";

$nama_err = $no_kad_pengenalan_err = $no_tel_err = $alamat_err = $agama_err = $bangsa_err = $tarikh_lahir_err = $tempat_lahir_err = $kewarganegaraan_err = $status_perkahwinan_err = $nama_waris_err = $no_tel_waris_err = "";
 
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    $input_nama = trim($_POST["nama"]);
    if(empty($input_nama)){
        $nama_err = "Please enter a name.";
    } elseif(!filter_var($input_nama, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nama_err = "Please enter a valid name.";
    } else{
        $nama = $input_nama;
    }
    
    // Validate address
    $input_no_kad_pengenalan = trim($_POST["no_kad_pengenalan"]);
    if(empty($input_no_kad_pengenalan)){
        $address_err = "Please enter an no_kad_pengenalan.";     
    } else{
        $no_kad_pengenalan = $input_no_kad_pengenalan;
    }
    
    // Validate salary
    $input_no_tel = trim($_POST["no_tel"]);
    if(empty($input_no_tel)){
        $no_tel_err = "Please enter the no_tel.";     
    } elseif(!ctype_digit($input_no_tel)){
        $no_tel_err = "Please enter a positive integer value.";
    } else{
        $no_tel = $input_no_tel;
    }


    // Validate address
    $input_alamat = trim($_POST["alamat"]);
    if(empty($input_alamat)){
        $alamat_err = "Please enter an alamat.";     
    } else{
        $alamat = $input_alamat;
    }
    
  // Validate address
    $input_agama = trim($_POST["agama"]);
    if(empty($input_agama)){
        $agama_err = "Please enter an agama.";     
    } else{
        $agama = $input_agama;
    }
    
    // Validate address
    $input_bangsa = trim($_POST["bangsa"]);
    if(empty($input_bangsa)){
        $bangsa_err = "Please enter an bangsa.";     
    } else{
        $bangsa = $input_bangsa;
    }

     // Validate address
    $input_tarikh_lahir = trim($_POST["tarikh_lahir"]);
    if(empty($input_tarikh_lahir)){
        $tarikh_lahir_err = "Please enter an tarikh_lahir.";     
    } else{
        $tarikh_lahir = $input_tarikh_lahir;
    }

     // Validate address
    $input_tempat_lahir = trim($_POST["tempat_lahir"]);
    if(empty($input_tempat_lahir)){
        $tempat_lahir_err = "Please enter an tempat_lahir.";     
    } else{
        $tempat_lahir = $input_tempat_lahir;
    }

     // Validate address
    $input_kewarganegaraan = trim($_POST["kewarganegaraan"]);
    if(empty($input_kewarganegaraan)){
        $kewarganegaraan_err = "Please enter an kewarganegaraan.";     
    } else{
        $kewarganegaraan = $input_kewarganegaraan;
    }

    // Validate address
    $input_status_perkahwinan = trim($_POST["status_perkahwinan"]);
    if(empty($input_status_perkahwinan)){
        $status_perkahwinan_err = "Please enter an status_perkahwinan.";     
    } else{
        $status_perkahwinan = $input_status_perkahwinan;
    }

    // Validate address
    $input_nama_waris = trim($_POST["nama_waris"]);
    if(empty($input_nama_waris)){
        $nama_waris_err = "Please enter an nama_waris.";     
    } else{
        $nama_waris = $input_nama_waris;
    }

    // Check input errors before inserting in database
    if(empty($nama_err) && empty($no_kad_pengenalan_err) && empty($no_tel_err) && empty($alamat_err) && empty($agama_err) && empty($bangsa_err) && empty($tarikh_lahir_err) && empty($tempat_lahir_err) && empty($kewarganegaraan_err) && empty($status_perkahwinan_err) && empty($nama_waris_err) && empty($no_tel_waris_err)){

        // Prepare an update statement
        $sql = "UPDATE employees SET nama=?, no_kad_pengenalan=?, no_tel=?, alamat=?, agama=?, bangsa=?, tarikh_lahir=?, tempat_lahir=?, kewarganegaraan=?, status_perkahwinan=?, nama_waris=?, no_tel_waris=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
           mysqli_stmt_bind_param($stmt, "ssssssssssssi", $param_nama, $param_no_kad_pengenalan, $param_no_tel, $param_alamat, $param_agama, $param_bangsa, $param_tarikh_lahir, $param_tempat_lahir, $param_kewarganegaraan, $param_status_perkahwinan, $param_nama_waris, $param_no_tel_waris, $param_id );
            
            // Set parameters
            $param_nama = $nama;
            $param_no_kad_pengenalan = $no_kad_pengenalan;
            $param_no_tel = $no_tel;
            $param_alamat = $alamat;
            $param_agama = $agama;
            $param_bangsa = $bangsa;
            $param_tarikh_lahir = $tarikh_lahir;
            $param_tempat_lahir = $tempat_lahir;
            $param_kewarganegaraan = $kewarganegaraan;
            $param_status_perkahwinan = $status_perkahwinan;
            $param_nama_waris = $nama_waris;
            $param_no_tel_waris = $no_tel_waris;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: indekpekerja.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM employees WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
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
                    // URL doesn't contain valid id. Redirect to error page
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
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                       <div class="form-group <?php echo (!empty($nama_err)) ? 'has-error' : ''; ?>">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>">
                            <span class="help-block"><?php echo $nama_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($no_kad_pengenalan_err)) ? 'has-error' : ''; ?>">
                            <label>No kad pengenalan</label>
                            <textarea name="no_kad_pengenalan" class="form-control"><?php echo $no_kad_pengenalan; ?></textarea>
                            <span class="help-block"><?php echo $no_kad_pengenalan_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($no_tel_err)) ? 'has-error' : ''; ?>">
                            <label>No telfon</label>
                            <input type="text" name="no_tel" class="form-control" value="<?php echo $no_tel; ?>">
                            <span class="help-block"><?php echo $no_tel_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($alamat_err)) ? 'has-error' : ''; ?>">
                            <label>No alamat</label>
                            <input type="text" name="alamat" class="form-control" value="<?php echo $alamat; ?>">
                            <span class="help-block"><?php echo $alamat_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($agama_err)) ? 'has-error' : ''; ?>">
                            <label>Agama</label>
                            <input type="text" name="agama" class="form-control" value="<?php echo $agama; ?>">
                            <span class="help-block"><?php echo $agama_err;?></span>
                        </div>
                         <div class="form-group <?php echo (!empty($bangsa_err)) ? 'has-error' : ''; ?>">
                            <label>Bangsa</label>
                            <input type="text" name="bangsa" class="form-control" value="<?php echo $bangsa; ?>">
                            <span class="help-block"><?php echo $bangsa_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($tarikh_lahir_err)) ? 'has-error' : ''; ?>">
                            <label>Tarikh lahir</label>
                            <input type="text" name="tarikh_lahir" class="form-control" value="<?php echo $tarikh_lahir; ?>">
                            <span class="help-block"><?php echo $tarikh_lahir_err;?></span>
                        </div>
                         <div class="form-group <?php echo (!empty($tempat_lahir_err)) ? 'has-error' : ''; ?>">
                            <label>Tempat lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $tempat_lahir; ?>">
                            <span class="help-block"><?php echo $tempat_lahir_err;?></span>
                        </div>
                         <div class="form-group <?php echo (!empty($kewarganegaraan_err)) ? 'has-error' : ''; ?>">
                            <label>Kewarganegaraan</label>
                            <input type="text" name="kewarganegaraan" class="form-control" value="<?php echo $kewarganegaraan; ?>">
                            <span class="help-block"><?php echo $kewarganegaraan_err;?></span>
                        </div>
                         <div class="form-group <?php echo (!empty($status_perkahwinan_err)) ? 'has-error' : ''; ?>">
                            <label>Status perkahwinan</label>
                            <input type="text" name="status_perkahwinan" class="form-control" value="<?php echo $status_perkahwinan; ?>">
                            <span class="help-block"><?php echo $status_perkahwinan_err;?></span>
                        </div>
                         <div class="form-group <?php echo (!empty($nama_waris_err)) ? 'has-error' : ''; ?>">
                            <label>Nama waris </label>
                            <input type="text" name="nama_waris" class="form-control" value="<?php echo $nama_waris; ?>">
                            <span class="help-block"><?php echo $nama_waris_err;?></span>
                        </div>
                        
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="indekpekerja.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>