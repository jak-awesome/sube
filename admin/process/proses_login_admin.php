<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * FROM admin WHERE username='$username' AND password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
	$nama = $data['nama_admin'];
	$id_admin = $data['id_admin'];

	$_SESSION['nama_admin'] = $nama;
	$_SESSION['id_admin'] = $id_admin;
	// alihkan ke halaman produk	
	header("location:../products.php");
 
}else{
	header("location:../admin/index.php?pesan=gagal");
}
 
?>