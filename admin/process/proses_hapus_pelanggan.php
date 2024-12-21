<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
mysqli_query($koneksi,"DELETE FROM pelanggan WHERE id_pelanggan='$id'");
header("location:../pelanggan.php?pesan=hapus");
?>