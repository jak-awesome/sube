<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$email = $_POST['email'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * FROM pelanggan WHERE email='$email' AND password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
	$nama = $data['nama_pelanggan'];
	$id_pelanggan = $data['id_pelanggan'];

	$_SESSION['nama_pelanggan'] = $nama;
	$_SESSION['id_pelanggan'] = $id_pelanggan;
	// alihkan ke halaman index
	header("location:../Login/index.php");
 
}else{
	header("location:../login.php?pesan=gagal");
}
 
?>