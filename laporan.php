<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SI-BARANG</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <style media="screen">
    .box {padding: 20px 15px 15px 20px }
    th{text-align: center;}
  </style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->

  <!-- Logo -->
  <a href="#" class="logo">
    <span class="logo-lg">SI-BARANG</span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->

        <!-- User Account Menu -->
          <li>
          <!-- Menu Toggle Button -->
          <a href="../../index.php" >

            Keluar
          </a>
        </li>
      </ul>
    </div>
  </nav>
  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="active"><a href="../pemilik/databarang.php"><span>Data Barang</span></a></li>
        <li class="active"><a href="../pemilik/laporan.php"><span>Laporan</span></a></li>
      </ul>

        <!-- sidebar menu: : style can be found in sidebar.less -->
    </section>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan Penjualan
      </h1>
      <br>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <!-- Isi -->
  			<!-- Tombol Tambah Data -->
        <div class="box box-info">
  		<!-- Table
  		Table -->
  		<div class="box-body" >
  			<table  class="table table-striped table-bordered" >
  				<thead>
  					<tr>
  						<th>No</th>
  						<th>Tahun</th>
  						<th>Bulan</th>
  						<th style="text-align: center;" >Aksi</th>
  					</tr>
  				</thead>

  				<tbody>
              <?php
                include "../../koneksi.php";
                $halaman = @$_GET['halaman'];
                if (empty($halaman)) {
                  $posisi = 0;
                  $halaman = 1;
                } else {
                  $posisi = ($halaman-1) * 5;
                }
                $i = $posisi + 1;
                $sql = mysqli_query($conn, "SELECT DISTINCT date_format(tanggal, '%Y') as tahun, date_format(tanggal, '%M') as bulan  FROM `pemesanan` LIMIT $posisi, 5");
                while ($hasil = mysqli_fetch_array($sql)) {
             ?>

              <tr>
    						<td style="text-align: center;"><?php echo $i; ?></td>
                <td><?php echo $hasil['tahun']; ?></td>
                <td><?php echo $hasil['bulan']; ?></td>
    						<td style="text-align: center;"><a href="download-laporan.php?tahun=<?php echo $hasil['tahun']; ?>&bulan=<?php echo $hasil['bulan']; ?>">Download</a></td>
  					  </tr>
              <?php
        		 			$i++;
        		 			}
                ?>
  				</tbody>
  			</table>
  		</div>

      <center>
      	<nav aria-label="Page navigation example">
          <ul class="pagination">
              <!-- LINK FIRST AND PREV -->
              <?php
              if($halaman == 1){ // Jika page adalah page ke 1, maka disable link PREV
              ?>
                <li class="disabled"><a href="#">&laquo;</a></li>
              <?php
              }else{ // Jika page bukan page ke 1
                $link_prev = ($halaman > 1)? $halaman - 1 : 1;
              ?>
                <li><a href="laporan.php?halaman=<?php echo $link_prev; ?>">&laquo;</a></li>
              <?php
              }
              ?>

              <!-- LINK NUMBER -->
              <?php
              // Buat query untuk menghitung semua jumlah data
              $res = mysqli_query($conn, "SELECT * FROM pemesanan");
              $hitung = mysqli_num_rows($res);
              $jum = $hitung / 5;
              $jumlah = ceil($jum);
              for ($i=1; $i <= $jumlah ; $i++) {
                   echo "<li><a href='laporan.php?halaman=$i'>".$i."</a></li>";
               }

              ?>

              <!-- LINK NEXT AND LAST -->
              <?php
              // Jika page sama dengan jumlah page, maka disable link NEXT nya
              // Artinya page tersebut adalah page terakhir
              if($halaman == $jumlah){ // Jika page terakhir
              ?>
                <li class="disabled"><a href="#">&raquo;</a></li>
              <?php
              }else{ // Jika Bukan page terakhir
                $link_next = ($halaman < $jumlah)? $halaman + 1 : $jumlah;
              ?>
                <li><a href="laporan.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
              <?php
              }
              ?>
            </ul>

      </nav>
      </center>

    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright Kelompok ADSI &copy; 2017
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
