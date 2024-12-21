<?php 
include('koneksi.php');

$id_produk = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk'];
$harga_produk = $_POST['harga_produk'];
$nama_file = $_FILES['foto_produk']['name'];
$source = $_FILES['foto_produk']['tmp_name'];
$folder = '../foto_produk/';

move_uploaded_file($source, $folder.$nama_file);
$edit = mysqli_query($koneksi, "UPDATE produk SET nama_produk='$nama_produk', harga_produk='$harga_produk', foto_produk='$nama_file' WHERE id_produk='$id_produk' ");

if($edit)
	header('location:../products.php');
else
	echo "Edit Menu Gagal";


 ?>