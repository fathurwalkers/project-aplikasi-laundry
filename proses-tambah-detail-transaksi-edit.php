<?php
include "include/koneksi.php";

$No_Order = $_POST["No_Order"];
$Id_Pakaian = $_POST["Id_Pakaian"];
$Jumlah_Pakaian = $_POST["Jumlah_Pakaian"];

//validasi
if (trim($_POST['Id_Pakaian']) == '') {
	$error[] = '- Jenis Pakaian harus di isi';
}
if (trim($_POST['Jumlah_Pakaian']) == '') {
	$error[] = '- Jumlah Pakaian harus di isi';
}

if (isset($error)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $error);
	?>
	<script type="text/javascript">setTimeout("location.href='editdatatransaksi.php?edit=<?php echo $No_Order ?>';",1000);</script>
<?php } else {
	$sql = "INSERT INTO `detail_transaksi` (`No_Order`, `Id_Pakaian`, `Jumlah_Pakaian`)
			VALUES ('$No_Order', '$Id_Pakaian', '$Jumlah_Pakaian')";
			$kueri = mysqli_query($conn, $sql);
	echo '<b>Data Berhasil di simpan...</b><br/>';?>
	<script type="text/javascript">setTimeout("location.href='editdatatransaksi.php?edit=<?php echo $No_Order ?>';",1000);</script>
	<?php
}
