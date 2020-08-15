<?php
$No_Order 		=  $_GET['cetak'];
use Dompdf\Dompdf;
ob_start(); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Struk Transaksi</title>
  <link rel="stylesheet" type="text/css" href="./asset/css/bootstrap.min.css">
  <style media="screen">
  table, th, td, tr {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}
hr{
  border: 1px solid black;
}
  </style>
</head>
<body>
<center><h1>SAN LAUNDRY</h1>
<h3>Laundry & Dry Cleaning</h3>
<h3>Hp : 087 822 555 784</h3>
</center>
<hr>
<?php
include "./include/koneksi.php";

$sql = mysqli_query($conn, "SELECT Nama, Alamat, Tgl_Terima, No_Order from (pelanggan join transaksi on pelanggan.No_Identitas = transaksi.No_Identitas) WHERE No_Order = '$No_Order'");
while ($hasil = mysqli_fetch_array($sql))
{
  $tgl1 = $hasil['Tgl_Terima'];;// pendefinisian tanggal awal
  $tgl2 = date('Y-m-d', strtotime('+3 days', strtotime($tgl1)));
?>

<div class="row">
<div class="col-sm-6 col-xs-6">
  <p>Nama   : <?php echo $hasil['Nama']; ?>
    <br>
    Alamat : <?php echo $hasil['Alamat']; ?>
  </p>
</div>
<div class="col-sm-6 col-xs-6">
  <p >Tgl Terima : <?php echo $hasil['Tgl_Terima']; ?>
    <br>
    Tgl Ambil   : <?php echo $tgl2; ?>
  </p>
</div>
</div>
<hr >
<p>No. Order : <?php echo $hasil['No_Order']; ?></p>
<div class="table-responsive">
<table class="table" >
  <thead>
    <tr>
      <th>No</th>
      <th>Jenis Pakaian</th>
      <th>Jumlah Pakaian</th>
    </tr>
  </thead>
  <tbody>
      <?php
        }
        $i = 1;
        $sql = mysqli_query($conn, "SELECT Jenis_Pakaian, Jumlah_Pakaian from (detail_transaksi join pakaian on detail_transaksi.Id_Pakaian = pakaian.Id_Pakaian) WHERE No_Order = '$No_Order'");
        while ($hasil = mysqli_fetch_array($sql)) {
     ?>
      <tr>
        <td style="text-align:center"><?=$i?></td>
        <td><?php echo $hasil['Jenis_Pakaian']; ?></td>
        <td><?php echo $hasil['Jumlah_Pakaian']; ?></td>
      </tr>
      <?php
      $i++;
    }
      ?>
  </tbody>
</table>
</div>
<?php
$sql = mysqli_query($conn, "SELECT total_berat, diskon, Total_Bayar from transaksi WHERE No_Order = '$No_Order'");
while ($hasil = mysqli_fetch_array($sql))
{
 ?>
<div>
  <p style="float:right">Total Bayar (Rp) : <?php echo $hasil['Total_Bayar']; ?></p>
</div>
<div class="">
  <p>Total Berat : <?php echo $hasil['total_berat']; ?>  Kg</p>
  <p>Diskon (Rp): <?php echo $hasil['diskon']; ?></p>
</div>

<?php
}
?>
</body>
</html>
<?php

$html = ob_get_clean();
require_once 'dompdf/autoload.inc.php';
$dompdf = new DOMPDF();
$dompdf->set_paper("A5");
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream('struk.pdf');

?>
