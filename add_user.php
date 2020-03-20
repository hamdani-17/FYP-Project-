<?php

include "config.php"; //satu line ni kena ade atas skli. 

if(isset($_POST['submit'])){

    $user_email = $_POST['user_email'];
    $user_pwd = $_POST['user_pwd'];
	$user_fullname = $_POST['user_fullname'];
    $role_id = $_POST['role_id'];

    $sql_statement = "INSERT INTO `tbl_user`(`user_email`, `user_pwd`, `user_fullname`, `role_id`)
     VALUES ('$user_email','$user_pwd','$user_fullname','$role_id')";

    $run_sql = mysqli_query($conn,$sql_statement);

    if($run_sql){

        ?>
        <script>
            alert('Berjaya');
           window.location.replace("view_user.php");
        </script>
<?php    
}
else{
?>
  <script>
            alert('Tidak Berjaya');
            window.location.replace("register_user.php");
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
          <p><?php echo $user_fullname ; ?> </p>
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
        Borang Tambah Pengguna
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
                  <label for="exampleInputEmail1">Email </label>
                  <input type="email" class="form-control" id="exampleInputEmail1" name="user_email" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kata Laluan</label>
                  <input type="password" name="user_pwd" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="user_fullname" placeholder="Enter fullname">
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
