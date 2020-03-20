<?php

include "config.php"; //satu line ni kena ade atas skli. 

if(empty($_SESSION['user_fullname'])){
    header('Location: login.php');
}
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
         <div class="container-fluid">
            <div class="row">
              <div class="col-md-4">

          <h3>View pekerja</h3>
          <p><a href="add_pekerja.php">Register pekerja</a></p>
          <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">id_pekerja</th> 
            <th scope="col">nama</th>
            <th scope="col">no_surat_beranak</th>
            <th scope="col">no_kad_pengenalan</th>
            <th scope="col">alamat</th>
            <th scope="col">tarikh_lahir</th>
            <th scope="col">tempat_lahir</th>
            <th scope="col">kewarganegaraan</th>
            <th scope="col">status_perkahwinan</th>
            <th scope="col">agama</th>
            <th scope="col">bangsa</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
        
        <?php

        $sql_statement = "SELECT * tbl_pekerja ";
        $run_query = mysqli_query($conn,$sql_statement);

          while($row = mysqli_fetch_array($run_query)){
         ?>
             <tr>
                <td><?php echo $row['id_pekerja'];?></td>
                <td><?php echo $row['nama'];?></td>
                <td><?php echo $row['no_surat_beranak'];?></td>
                <td><?php echo $row['no_kad_pengenalan'];?></td>
                <td><?php echo $row['alamat'];?></td>
                <td><?php echo $row['tarikh_lahir'];?></td>
                <td><?php echo $row['tempat_lahir'];?></td>
                <td><?php echo $row['kewarganegaraan'];?></td>
                <td><?php echo $row['status_perkahwinan'];?></td>
                <td><?php echo $row['agama'];?></td>
                <td><?php echo $row['bangsa'];?></td>
                <td>Edit | Delete</td>
              </tr>

          <?php $running_no++;} ?>
       
       
        
        </tbody>
      </table>


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