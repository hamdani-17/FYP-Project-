<?php
session_start();

// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';

$user_fullname = $_SESSION['user_fullname'];


if(empty($_SESSION['user_fullname'])){
    header('Location: login.php');
}
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

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Laporan
<!--                <small>advanced tables</small>-->
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Aktiviti</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tarikh</th>
                                    <th>Masa</th>
                                    <th>Aktiviti</th>
                                    <th>Staff bertugas</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                include 'config.php';

                                //join two table
                                $sql = "SELECT * FROM `activity` AS A JOIN tbl_user as S ON A.staff_id=S.user_id ";
                                $run = mysqli_query($conn,$sql);
                                $no = 1;

                                while($row = mysqli_fetch_array($run)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <td><?php echo $row['act_date'];?></td>
                                        <td><?php echo $row['act_time'];?></td>
                                        <td><?php echo $row['act_name'];?></td>
                                        <td><?php echo $row['user_fullname'];?></td>
                                    </tr>
                                    <?php
                                    $no++;
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Tarikh</th>
                                    <th>Masa</th>
                                    <th>Aktiviti</th>
                                    <th>Staff bertugas</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                            <button class="btn-primary" onclick="myFunction()">Print</button>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
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
<!-- DataTables -->
<script src="themes/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="themes/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="themes/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="themes/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="themes/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="themes/dist/js/demo.js"></script>
<!-- page script -->
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,

        })

    })
</script>


<script>
function myFunction() {
  window.print();
}
</script>
</body>
</html>
