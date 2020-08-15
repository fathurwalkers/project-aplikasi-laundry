<?php
include "include/koneksi.php";

$No_Identitas = $_POST["No_Identitas"];
$Nama = $_POST["Nama"];
$Alamat = $_POST["Alamat"];
$No_Hp = $_POST["No_Hp"];

if(empty($_POST["No_Identitas"]) || empty($_POST["Nama"]) || empty($_POST["Alamat"]) || empty($_POST["No_Hp"])){
	echo "<script language='javascript'>alert('Gagal di tambahkan');</script>";
	echo '<meta http-equiv="refresh" content="0; url=tambahdatapelanggan.php">';
}else{
	$sql = "INSERT INTO `pelanggan` (`No_Identitas`, `Nama`, `Alamat`, `No_Hp`)
			VALUES ('$No_Identitas', '$Nama', '$Alamat', '$No_Hp')";
			$kueri = mysqli_query($conn, $sql);
			echo "<script language='javascript'>alert('Berhasil di tambahkan');</script>";
			echo '<meta http-equiv="refresh" content="0; url=pelanggan.php">';
}
?>
