<?php
include "include/koneksi.php";

$No_Order = $_POST["No_Order"];
$No_Identitas = $_POST["No_Identitas"];
$total_berat = $_POST["total_berat"];
$diskon = $_POST["diskon"];
$total_bayar = $_POST["total_bayar"];
$Tgl_Terima = $_POST["tanggal"];

// if(empty($_POST["No_Order"]) || empty($_POST["No_Identitas"]) || empty($_POST["total_berat"]) || empty($_POST["diskon"]) || empty($_POST["total_bayar"]) || empty($_POST["tanggal"])){
// 	echo "<script language='javascript'>alert('Gagal di tambahkan');</script>";
// 	// echo '<meta http-equiv="refresh" content="0; url=tambahdatatransaksi.php">';
// }else{
if(empty($_POST["No_Order"]) || empty($_POST["No_Identitas"]) || empty($_POST["total_berat"]) || empty($_POST["total_bayar"]) || empty($_POST["tanggal"])){
	echo "<script language='javascript'>alert('Gagal di tambahkan');</script>";
	echo '<meta http-equiv="refresh" content="0; url=tambahdatatransaksi.php">';
}else{
	$sql = "INSERT INTO `transaksi` (`No_Order`, `No_Identitas`, `Tgl_Terima`, `Tgl_Ambil`, `total_berat`, `diskon`, `Total_Bayar`)
			VALUES ('$No_Order', '$No_Identitas', '$Tgl_Terima', NULL, '$total_berat', '$diskon', '$total_bayar')";
			$kueri = mysqli_query($conn, $sql);
			echo "<script language='javascript'>alert('Berhasil di tambahkan');</script>";
			echo '<meta http-equiv="refresh" content="0; url=transaksi?>">';
}

?>
