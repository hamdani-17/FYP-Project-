<?php

include "config.php"; //satu line ni kena ade atas skli. 
session_start();
if(empty($_SESSION['user_fullname'])){
    header('Location: login.php');
}
if(isset($_POST['submit'])){
    $tarikh = $_POST['tarikh'];
    $nama  = $_POST['nama'];
    $masa = $_POST['masa'];
    $tempat = $_POST['tempat'];
    $aktiviti = $_POST['aktiviti'];
    $barang_keperluan = $_POST['barang_keperluan'];
   


 $sql =mysqli_query ( "INSERT INTO `tbl_jadual`(`tarikh`, `nama`, `masa`, `tempat`, `aktiviti`, `barang_keperluan`) VALUES ('{$tarikh}','{$nama}','{$masa}','{$tempat}','{$aktiviti}','{$barang_keperluan}')" );


    $run_sql = mysqli_query($conn,$sql_statement);


echo "$tarikh";
    if($run_sql){

                  ?>
                  <script>
                      alert('Berjaya');
                      window.location.replace("http://localhost/psm_v1/index.php");
                  </script>
          <?php    
          }
          else{
          ?>
            <script>
                      alert('Tidak Berjaya');
                      window.location.replace("http://localhost/psm_v1/jadual.php");
                  </script>
<?php    
} //ttp else
} //ttp if
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
          <p>Hamdani</p>
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
     <?php include 'menu.php'; ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
        <!-- <small>Preview</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pengguna</a></li>
        <li class="active">Tambah Pengguna</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           <h4>penetapan tarikh:</h4>

              <form action="" method="_POST">
                tarikh bekerja : <input type="date" name="tarikh">
                 
               <br>
               <br>
                  <div class="form-group">
                    <label>Nama Pekerja</label>
                       <select class="form-control" name="nama">
                          <option selected>Sili klik untuk pilih...</option>
                            <option value="1">Ihsan Bin Taman</option>
                            <option value="2">Hamdani bin Taman</option>
                            <option value="2">Agus Santoso</option>
                        </select>
               <br>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Masa :  </label>
                      <input type="time" name="masa">
                      
                  </div>

                  <div class="form-group">
                  <label for="exampleInputPassword1">tempat :  </label>
                   <br>
                   <textarea rows="4" cols="60" name="tempat" form="usrform">
                    </textarea>
                  </div>

                   <div class="form-group">
                  <label for="exampleInputPassword1">Aktiviti :  </label>
                   <br>
                   <textarea rows="4" cols="60" name="aktiviti" form="usrform">
                    </textarea>
                  </div>

                   <div class="form-group">
                  <label for="exampleInputPassword1">Barang Keperluan :  </label>
                   <br>
                   <textarea rows="4" cols="60" name="barang_keperluan" form="usrform">
                    </textarea>
                  </div>

                  <input type="submit">






</form>


          </div>
          <!-- /.box -->

          <!-- /.box -->

        </div>
        <!--/.col (left) -->
       
      </div>
      <!-- /.row -->
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

  <!-- Control Sidebar -->
  
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="themes/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="themes/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="themes/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="themes/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="themes/dist/js/demo.js"></script>
</body>
</html>

