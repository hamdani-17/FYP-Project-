<?php

include("config.php");
session_start();
if(empty($_SESSION['user_fullname'])){
    header('Location: login.php');
}
?>

<?php
      define('DB_SERVER', 'localhost');
      define('DB_USERNAME', 'root');
      define('DB_PASSWORD', '');
      define('DB_NAME', 'sistemnotifikasi_v1');

      $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php include 'header.php'; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <?php include 'main_top_header.php'; ?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="themes/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user_fullname ; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
     <?php include 'menu_employee.php'; ?>
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Profil Maklumat Anda      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li class="active">Dashboard</li>
        <!-- <li><a href="#">Examples</a></li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Selamat Datang saudara <?php echo $user_fullname ; ?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>

      <div class="bs-example4" data-example-id="contextual-table" style="overflow-x:auto;">
                  
                  



                  <table class="table" method="post">
                    
                    
                     <tbody>
                      <center>

                      <tr>
                      <th>Nama</th>
                     </tr>
                     <tr>
                      <td><?php echo $record['nama'];?></td>
                     </tr>
                     <tr>
                      <th>No Kad Pengenalan</th>
                     </tr>
                     <tr>
                      <td><?php echo $record['no_kad_pengenalan'];?></td>
                     </tr>
                     <tr>
                      <th>No tel</th>
                     </tr>
                     <tr>
                      <td><?php echo $record['no_tel'];?></td>
                     </tr>
                     <tr>
                      <th>Email</th>
                     </tr>
                     <tr>
                      <td><?php echo $record['email'];?></td>
                     </tr>
                     <tr>
                      <th>Alamat</th>
                     </tr>
                     <tr>
                      <td><?php echo $record['alamat'];?></td>
                     </tr>
                     <tr>
                      <th>Agama</th>
                     </tr>
                     <tr>
                      <td><?php echo $record['agama'];?></td>
                     </tr>
                      <tr>
                      <th>Bangsa</th>
                     </tr>
                      <tr>
                      <td><?php echo $record['bangsa'];?></td>
                     </tr>
                      <tr>
                      <th>Tarikh lahir</th>
                     </tr>
                     <tr>
                      <td><?php echo $record['tarikh_lahir'];?></td>
                     </tr>
                      <tr>
                      <th>Tempat lahir</th>
                     </tr>
                     <tr>
                      <td><?php echo $record['tempat_lahir'];?></td>
                     </tr>
                      <tr>
                      <th>Kewarganegaraan</th>
                     </tr>
                      <tr>
                      <td><?php echo $record['kewarganegaraan'];?></td>
                     </tr>
                     <tr>
                      <th>Status perkahwinan</th>
                     </tr>
                      <tr>
                      <td><?php echo $record['status_perkahwinan'];?></td>
                     </tr>
                      <tr>
                      <th>Nama waris</th>
                     </tr>
                      <tr>
                      <td><?php echo $record['nama_waris'];?></td>
                     </tr>
                     <tr>
                      <th>No tel waris</th>
                     </tr>
                      <tr>
                      <td><?php echo $record['no_tel_waris'];?></td>
                     </tr>


                      <?php
                           $q = "SELECT *
                           FROM employees
                           Where email = '$user_email'  
               And status = '1'
                           order by id";
                           $r = mysqli_query($conn,$q);
                           
                           while($record = mysqli_fetch_array($r))
               { 

                 
               ?>
                     


        
           
                          
               <?php if (mysql_num_rows($r) <= 0)echo "";}?>
              
              
                       
                     </tbody>
                  
                  </table>
               </div>


        </div>
        <div class="box-body">
          <!-- Selamat Datang ! -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <!-- Footer -->
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2018 <a href="https://adminlte.io">Hamdani UTHM</a>.</strong> All rights
    reserved.
  </footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="themes/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="themes/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="themes/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="themes/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="themes/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="themes/dist/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>