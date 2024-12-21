<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$id_pelanggan = $_POST['id_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$email = $_POST['email'];
$password = $_POST['password'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
 
$sql_cek=mysqli_query($koneksi,"SELECT * FROM pelanggan WHERE email='".$email."'");
$r_cek=mysqli_num_rows($sql_cek);
if ($r_cek>0) {
    header("location:../register.php?pesan=gagal");
} else {
    mysqli_query($koneksi,"INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `no_hp`, `email`, `password`) VALUES ('$id_pelanggan', '$nama_pelanggan', '$alamat', '$no_hp', '$email', '$password');");
	// alihkan ke halaman login
	header("location:../login.php");
}
 
?>