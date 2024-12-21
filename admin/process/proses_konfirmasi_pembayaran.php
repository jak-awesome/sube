<?php 
include('koneksi.php');
$id = $_GET['id'];

$status = $_POST['status'];
$id_transaksi = $_POST['id_transaksi'];

$edit = mysqli_query($koneksi, "UPDATE transaksi SET status='$status'WHERE id_transaksi='$id_transaksi' ");

if($edit)
	header('location:../pemesanan.php?pesan=sukses');
else
header('location:../pemesanan.php?pesan=gagal');


 ?>