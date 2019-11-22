<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$email = md5($_POST['email']);
$password = $_POST['password'];
 
// menyeleksi data admin dengan email dan password yang sesuai
$data = mysqli_query($koneksi,"SELECT * from USER where email='$email' and password='$password'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$_SESSION['email'] = $email;
	$_SESSION['status'] = "login";
	header("location:dashboard");
}else{
	header("location:index");
}
?>