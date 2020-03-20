
<?php


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

session_start();
if(empty($_SESSION['user_fullname'])){
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Maklumat Pekerja ITE</h2>
                        <a href="createpekerja.php" class="btn btn-success pull-right">Tambah Pekerja</a>
                        <a href="index.php" class="btn btn-success pull-right">Halaman utama</a>
                    </div>
                    <?php
                   
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM employees";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Nama</th>";
                                        echo "<th>No_Kad_Pengenalan</th>";
                                        echo "<th>No_tel</th>";
										echo "<th>Email</th>";
                                        echo "<th>Alamat</th>";
                                        echo "<th>Agama</th>";
                                        echo "<th>Bangsa</th>";
                                        echo "<th>Tarikh_lahir</th>";
                                        echo "<th>Tempat_lahir</th>";
                                        echo "<th>Kewarganegaraan</th>";
                                        echo "<th>Status_Perkahwinan</th>";
                                        echo "<th>Nama_Waris</th>";
                                        echo "<th>No_tel_waris</th>";
                                        echo "<th>Respon</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['nama'] . "</td>";
                                        echo "<td>" . $row['no_kad_pengenalan'] . "</td>";
                                        echo "<td>" . $row['no_tel'] . "</td>";
										echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['alamat'] . "</td>";
                                        echo "<td>" . $row['agama'] . "</td>";
                                        echo "<td>" . $row['bangsa'] . "</td>";
                                        echo "<td>" . $row['tarikh_lahir'] . "</td>";
                                        echo "<td>" . $row['tempat_lahir'] . "</td>";
                                        echo "<td>" . $row['kewarganegaraan'] . "</td>";
                                        echo "<td>" . $row['status_perkahwinan'] . "</td>";
                                        echo "<td>" . $row['nama_waris'] . "</td>";
                                        echo "<td>" . $row['no_tel_waris'] . "</td>";
                                      


                                        echo "<td>";
                                            echo "<a href='readpekerja.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='updatepekerja.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='deletepekerja.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>