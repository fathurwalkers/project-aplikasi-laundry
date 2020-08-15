<?php
include "include/koneksi.php";

$Id_Pakaian = $_POST["Id_Pakaian"];
$Jenis_Pakaian = $_POST["Jenis_Pakaian"];

if(empty($_POST["Id_Pakaian"]) || empty($_POST["Jenis_Pakaian"])){
	echo "<script language='javascript'>alert('Gagal di Edit');</script>";
	echo '<meta http-equiv="refresh" content="0; url=editdatapakaian.php">';
}else{
	$sql = "UPDATE `pakaian` SET `Jenis_Pakaian`='$Jenis_Pakaian' WHERE `Id_Pakaian` = '$Id_Pakaian'";
				$kueri = mysqli_query($conn, $sql);
				echo "<script language='javascript'>alert('Berhasil di Edit');</script>";
				echo '<meta http-equiv="refresh" content="0; url=pakaian.php">';
	}
?>
