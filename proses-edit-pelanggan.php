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
	$sql = "UPDATE `pelanggan` SET `Nama`='$Nama', `Alamat`='$Alamat', `No_Hp`='$No_Hp' WHERE `No_Identitas` = '$No_Identitas'";
				$kueri = mysqli_query($conn, $sql);
				echo "<script language='javascript'>alert('Berhasil di Edit');</script>";
				echo '<meta http-equiv="refresh" content="0; url=pelanggan.php">';
	}
?>
