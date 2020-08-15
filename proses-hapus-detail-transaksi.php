<?php
include "include/koneksi.php";

$Id_Pakaian = $_GET['pakaian'];
$No_Order = $_GET['order'];

if (isset($error)) {
	echo '<b>Error</b>: <br />'.implode('<br />', $error);
} else {
  $query = "DELETE FROM detail_transaksi WHERE No_Order='".$No_Order."' AND Id_Pakaian='".$Id_Pakaian."'";
  $sql = mysqli_query($conn, $query); // Eksekusi/Jalankan query dari variabel $query
?>
		<script type="text/javascript">setTimeout("location.href='tambahdatatransaksi.php';");</script>
<?php
}
