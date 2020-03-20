<?php

include "config.php"; //satu line ni kena ade atas skli. 

if(isset($_POST['submit'])){


    $nama = $_POST['nama'];
    $no_surat_beranak  = $_POST['no_surat_beranak'];
    $no_kad_pengenalan = $_POST['no_kad_pengenalan'];
    $tarikh_lahir = $_POST['tarikh_lahir'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $kewarganegaraan = $_POST['kewarganegaraan'];
    $status_perkahwinan = $_POST['status_perkahwinan'];
    $agama = $_POST['agama'];
    $bangsa = $_POST['bangsa'];
    $alamat = $_POST['alamat'];


 $sql_statement = "INSERT INTO `tbl_pekerja`( `nama`, `no_surat_beranak`, `no_kad_pengenalan`, `alamat`, `tarikh_lahir`, `tempat lahir`, `kewarganegaraan`, `status_perkahwinan`, `agama`, `bangsa`) VALUES ('{$nama}','{$no_surat_beranak}','{$no_kad_pengenalan}','{$tarikh_lahir}','{$tempat_lahir}','{$kewarganegaraan}','{$status_perkahwinan}','{$agama}','{$bangsa}','{$alamat}')";



    $run_sql = mysqli_query($conn,$sql_statement);



    if($run_sql){

        ?>
        <script>
            alert('Berjaya');
           window.location.replace("http://localhost/psm_v1/view_pekerja.php");
        </script>
<?php

}
else{
?>
  <script>
            alert('Tidak Berjaya');
            window.location.replace("http://localhost/psm_v1/add_pekerja.php");
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
     <?php include 'menu.php'; ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Borang maklumat pekerja ihsan teguh enterprise 
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
              <h3 class="box-title">Sila lengkap kan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputText">nama </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="nama" placeholder="nama">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">no kad pengenalan</label>
                  <input type="text" name="no_kad_pengenalan" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">no surat beranak</label>
                  <input type="text" name="no_surat_beranak" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">tarikh lahir</label>
                  <input type="text" name="tarikh_lahir" class="form-control" id="exampleInputPassword1" placeholder="tarikh_lahir">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">tempat lahir</label>
                  <input type="text" name="tempat_lahir" class="form-control" id="exampleInputPassword1" placeholder="tempat_lahir">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">agama  </label>
                  <input type="text" name="agama" class="form-control" id="exampleInputPassword1" placeholder="agama">
                </div>
                 <div class="form-group">
                  <label>kewarganegaraan</label>
                  <select class="form-control" name="kewarganegaraan" id="kewarganegaraan" >
                    <option selected>Sila klik untuk pilih...</option>
                            <option value="1">kewarganegaraan</option>
                            <option value="2">bumiputra</option>
                            <option value="2">pemastautin tetap</option>
                  </select>
                </div>



             


                <div class="form-group">
                  <label for="exampleInputPassword1">bangsa </label>
                  <input type="text" name="bangsa" class="form-control" id="exampleInputPassword1" placeholder="bangsa">
                </div>

                     </div>
                 <div class="form-group">
                  <label for="exampleInputPassword1">alamat </label>
                  <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat">
                </div>

                 <div class="form-group">
                  <label for="exampleInputPassword1">status perkahwinan </label>
                  <input type="text" name="status_perkahwinan" class="form-control" id="exampleInputPassword1" placeholder="status_perkahwinan">
                </div>

                <div class="form-group">
                  <label>Peranan</label>
                  <select class="form-control" name="role_id">
                    <option selected>Sili klik untuk pilih...</option>
                            <option value="1">Pentadbir</option>
                            <option value="2">Staff</option>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="submit">Hantar</button>
              </div>
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

