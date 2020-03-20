<?php

include "config.php"; //satu line ni kena ade atas skli. 

if(isset($_POST['Add_Jadual']))
{
	$user_id = $_POST['user_id'];
    $tarikh = $_POST['tarikh'];
	$masa = $_POST['masa'];

	$tempat1 = $_POST['tempat'];
    $tempat  = htmlspecialchars($tempat1, ENT_QUOTES);

	$aktiviti1 = $_POST['aktiviti'];
    $aktiviti  = htmlspecialchars($aktiviti1, ENT_QUOTES);

	$barang_keperluan1 = $_POST['barang_keperluan'];
    $barang_keperluan  = htmlspecialchars($barang_keperluan1, ENT_QUOTES);

	$status='1';

	$sql = "SELECT * FROM employees WHERE id='$user_id' ";
    $res = mysqli_query($conn,$sql) or die(mysqli_error()); 
    $row = mysqli_fetch_assoc($res);
    $nama = $row['nama'];
	$email = $row['email'];

    $sql_statement = "INSERT INTO tbl_jadual
	(
	user_id,tarikh,nama,email,masa,tempat,aktiviti,barang_keperluan,status
	) 
	VALUES 
	(
	'$user_id','$tarikh','$nama','$email','$masa','$tempat','$aktiviti','$barang_keperluan','$status'
	)";

    $run_sql = mysqli_query($conn,$sql_statement);

    if($run_sql)
	{

	$to      = $email;
    $subject = "Hi " . $nama . ", Info Jadual Pekerja Sistem Notifikasi";
        
    $message = "
	<html>
	<head>
	<title>Hi '" . $nama . "', Info Jadual Pekerja Sistem Notifikasi</title>
	</head>
	<body>
	<p>

	Hai " . $nama . ",<br><br>

	Info Jadual Baru Anda <br><br>
	Tarikh :".$tarikh." <br>
	Masa :".$masa." <br>
	Nama Pekerja :".$nama." <br>
	Tempat :".$tempat." <br>
	Aktiviti :".$aktiviti." <br>
	Barang Keperluan :".$barang_keperluan." <br>
	
	
	</p>

	</body>
	</html>
	";
        
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
    // More headers
    $headers .= 'From: <NoReply@sistemnotifikasi.com>' . "\r\n";
        
        
    mail($to, $subject, $message, $headers);

    ?>
    <script>
        alert('Berjaya Tambah Jadual');
        window.location.replace("jadual_1.php");
    </script>
	<?php    
	}
	else
	{
	?>
		<script>
        alert('Tidak Berjaya Tambah Jadual');
        window.location.replace("jadual_1.php");
    </script>
	<?php    
	} //ttp else

} //ttp if




if(isset($_POST['Update_Delete_Jadual']))
{
	$Action = $_POST['Action'];
	
	$id = $_POST['id'];

	$user_id = $_POST['user_id'];
    $tarikh = $_POST['tarikh'];
	$masa = $_POST['masa'];

	$tempat1 = $_POST['tempat'];
    $tempat  = htmlspecialchars($tempat1, ENT_QUOTES);

	$aktiviti1 = $_POST['aktiviti'];
    $aktiviti  = htmlspecialchars($aktiviti1, ENT_QUOTES);

	$barang_keperluan1 = $_POST['barang_keperluan'];
    $barang_keperluan  = htmlspecialchars($barang_keperluan1, ENT_QUOTES);

	$status='1';

	$sql = "SELECT * FROM employees 
	WHERE id='$user_id' ";
    $res = mysqli_query($conn,$sql) or die(mysqli_error()); 
    $row = mysqli_fetch_assoc($res);
    $nama = $row['nama'];

    if ( $Action == 'Update' )
    {  

		$UpdateQuery= "UPDATE tbl_jadual SET  
		user_id='$user_id' , 
		tarikh='$tarikh' , 
		nama='$nama' , 
		masa='$masa' , 
		tempat='$tempat' , 
		aktiviti='$aktiviti' , 
		barang_keperluan='$barang_keperluan'
		WHERE id='$id' ";               
		$result_update=mysqli_query($conn, $UpdateQuery);
	   
		if($result_update)
		{

		?>
		<script>
			alert('Berjaya Kemaskini Jadual');
			window.location.replace("jadual_1.php");
		</script>
		<?php    
		}
		else
		{
		?>
		<script>
        alert('Tidak Berjaya Kemaskini Jadual');
        window.location.replace("jadual_1.php");
        </script>
   	<?php  
        }
	}  	  
	else
	if ( $Action == 'Delete' )
    {  
   	   
		$UpdateQuery= "UPDATE tbl_jadual SET  
		status='9'
		WHERE id='$id' ";               
		$result_Delete=mysqli_query($conn, $UpdateQuery);
	   
		if($result_Delete)
		{

		?>
		<script>
			alert('Berjaya Buang Jadual');
			window.location.replace("jadual_1.php");
		</script>
		<?php    
		}
		else
		{
		?>
		<script>
        alert('Tidak Berjaya Buang Jadual');
        window.location.replace("jadual_1.php");
        </script>

		<?php
		}
    }
} //ttp if
?>

<!DOCTYPE html>
<html>
<head>
 
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
        Jadual Pekerja
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
        <div class="col-md-12">
          <!-- general form elements -->
          <div id="page-wrapper">
      <div class="graphs">
         <div class="col_1">
            <div id="printableArea" class="panel panel-midnightblue" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
               <div class="panel-heading">
                  <div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
               </div>

               <div class="bs-example4" data-example-id="contextual-table" style="overflow-x:auto;">
                  <table class="table">
                     <thead>
                        <tr>
						   <th>Tarikh bekerja</th>
						   <th>Masa</th>
						   <th>Nama Pekerja</th>
						   <th>Tempat</th>
						   <th>Aktiviti</th>
						   <th>Barang Keperluan</th>
						   <th></th>
						   <th></th>
                        </tr>
                     </thead>
                     <tbody>
                         <form action="" method="post" >
						    <tr class="active">
                              <td><input type="date" name='tarikh' ></td>

                         		<td> 
                            <select class="form-control" name="masa" id="masa" >
	                    		<option selected>Pilih masa</option>
	                            <option value="pagi">Pagi</option>
	                            <option value="petang">Petang</option>
                  			</select>
                  				</td>


							  

							  <td>
							    <select  name="user_id" style="width:100%; height:30px" required >
									 <?php
									    $q = "SELECT *
										FROM employees
										order by id";
										$r_pack = mysqli_query($conn,$q);						
										while($record_pack = mysqli_fetch_array($r_pack)){ 
								
										$id = $record_pack['id'];
										$nama = $record_pack['nama'];
								  	 ?>
                                  <option value="<?php echo $id ;?>"><?php echo $nama ;?> </option>
                                  <?php if (mysqli_num_rows($r_pack) <= 0)echo "";}?>
                                </select>
							  </td>

							   <td>
							  	
							  <select class="form-control" name="tempat" id="tempat" >
	                    		<option selected>Pilih tempat</option>
	                            <option value="LOT 4, KG PT WARIJO">LOT 4, KG PT WARIJO</option>
	                            <option value="LOT7, PT SIMIS">LOT7, PT SIMIS</option>
	                            <option value="LOT 9, PT SARKON">LOT 9, PT SARKON</option>
	                            <option value="LOT 3, PT GOBEK">LOT 3, PT GOBEK</option>
	                            <option value="LOT 9, PT OMAR">LOT 9, PT OMAR</option>
                  			</select>
                  		       
							  </td> 	
								
								<td>
							  <select class="form-control" name="aktiviti" id="aktiviti" >
	                    		<option selected>Pilih aktiviti</option>
	                            <option value="MENANAM ANAK POKOK">MENANAM ANAK POKOK</option>
	                            <option value="MEMBERSIHKAN KAWASAN KEBUN">MEMBERSIHKAN KAWASAN KEBUN</option>
	                            <option value="MENGHANTAR BAJA">MENGHANTAR BAJA</option>
	                            <option value="BRONING(POTONG PELEPAH)">BRONING(POTONG PELEPAH)</option>
	                            <option value="MERACUN POKOK">MERACUN POKOK</option>
                  			</select>
                  		       </td>
                             
							 
							  <td><textarea type="text"  style="width:100%;" rows="5" cols="39" name="barang_keperluan"></textarea></td> 	
                              <td></td>
							  <td>
                              <input type='submit' class='initialism  btn btn-danger' style="background-color: #000099;" name='Add_Jadual'  value='Add'>
                              </td>
                           </tr>
						   
                        </form>
						
						<?php
                           $q = "SELECT *
                           FROM tbl_jadual
                           Where status = '1'                           
                           order by id";
                           $r = mysqli_query($conn,$q);
                           
                           while($record = mysqli_fetch_array($r))
						   { 

						     $user_id = $record['user_id'];
							 $nama_pekerja = $record['nama'];
						   ?>
                           <form action="" method="post" >
							   <tr class="active">
								  <td><input type="date" name='tarikh' value="<?php echo $record['tarikh'];?>" > </td>
								  <td><input type="select" name='masa' value="<?php echo $record['masa'];?>" > </td>
								  
								
								  <td>

								   <select  name="user_id" style="width:100%; height:30px" required >
									 <?php
									    $q = "SELECT *
										FROM employees
										order by id";
										$r_pack = mysqli_query($conn,$q);						
										while($record_pack = mysqli_fetch_array($r_pack)){ 
								
										$id = $record_pack['id'];
										$nama = $record_pack['nama'];
								  	 ?>
									  <option value="<?php echo $user_id ;?>"><?php echo $nama_pekerja ;?> </option>
									  <option value="<?php echo $id ;?>"><?php echo $nama ;?> </option>
									  <?php if (mysqli_num_rows($r_pack) <= 0)echo "";}?>
								   </select> 
							      </td>

							      <td>
							      	<input type="select" name='tempat' value="<?php echo $record['tempat'];?>" > 
							      </td>

							      <td>
								  <textarea type="text"  style="width:100%;" rows="5" cols="39" name="aktiviti" readonly ><?php echo $record['aktiviti'];?></textarea>
								  </td> 	

								 
								

								  <td>
								  <textarea type="text"  style="width:100%;" rows="5" cols="39" name="barang_keperluan"><?php echo $record['barang_keperluan'];?>
								  </textarea>
								  </td> 	
								  <td>
									 <select  name="Action" style="width:100%; height:30px" required >
										<option value="Update">Kemaskini</option>
										<option value="Delete">Padam</option>
									 </select>
								  </td>
								  <td>
									 <input type='hidden' name='id' value='<?php echo $record['id'];?>' >
									 <input type='submit' class='initialism  btn btn-danger' style="background-color: #000099;" 
										name='Update_Delete_Jadual'  value='Submit'>
								  </td>
							   </tr>
						   </form>
						   <?php if (mysql_num_rows($r) <= 0)echo "";}?>
							
						  
                       
                     </tbody>
                  </table>
               </div>

            </div>
         </div>         
      </div>
      <!--body wrapper start--> 
   </div>
   <!--body wrapper end--> 
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
