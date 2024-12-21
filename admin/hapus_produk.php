<?php 

include('process/koneksi.php');

$id_produk = $_GET['id_produk'];

$hapus= mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk='$id_produk'");

if($hapus)
	header('location: products.php');
else
	echo "Hapus data gagal";

 ?>