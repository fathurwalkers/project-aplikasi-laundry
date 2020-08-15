<?php
include "include/koneksi.php";

$Id_Pakaian = $_POST["Id_Pakaian"];
$Jenis_Pakaian = $_POST["Jenis_Pakaian"];

if(empty($_POST["Id_Pakaian"]) || empty($_POST["Jenis_Pakaian"])){
	echo "<script language='javascript'>alert('Gagal di tambahkan');</script>";
	echo '<meta http-equiv="refresh" content="0; url=tambahdatapakaian.php">';
}else{
	$sql = "INSERT INTO `pakaian` (`Id_Pakaian`, `Jenis_Pakaian`)
			VALUES ('$Id_Pakaian', '$Jenis_Pakaian')";
			$kueri = mysqli_query($conn, $sql);
			echo "<script language='javascript'>alert('Berhasil di tambahkan');</script>";
			echo '<meta http-equiv="refresh" content="0; url=pakaian.php">';
}

?>
