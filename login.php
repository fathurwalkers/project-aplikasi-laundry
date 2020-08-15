<?php
session_start();
include "include/koneksi.php";
if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$password = $_POST['pass'];
	$sql = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email' AND pass='$password'");
	$num = mysqli_num_rows($sql);
	if($num>0){
		$num2 = mysqli_fetch_array($sql);
		$_SESSION['id'] = $num2['id'];
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $password;
		echo "<script language='javascript'>alert('Login Berhasil')</script>";
		echo '<meta http-equiv="refresh" content="0; url=index1.php">';
	}else{
		echo "<script language='javascript'>alert('Login Gagal')</script>";
		echo '<meta http-equiv="refresh" content="0; url=login/index.php">';
	}
}
?>
