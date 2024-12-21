<?php 
include('koneksi.php');

$id_pelanggan = $_POST['id_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$email = $_POST['email'];
$password = $_POST['password'];

$edit = mysqli_query($koneksi, "UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan', alamat='$alamat', no_hp='$no_hp', email='$email', password='$password' WHERE id_pelanggan='$id_pelanggan' ");

if($edit)
	header('location:../pelanggan.php?pesan=sukses');
else
header('location:../pelanggan.php?pesan=gagal');


 ?>