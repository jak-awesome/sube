<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
 
// menghapus data dari database
$query = mysqli_query($koneksi,"SELECT * FROM pemesanan WHERE id_pelanggan='$id'");
$data = mysqli_fetch_array($query);
$target = "../assets/img/upload/foto_pesanan/$data[gambar]";
if(file_exists($target)){
    unlink($target);
}
mysqli_query($koneksi,"DELETE FROM pemesanan WHERE id_pelanggan='$id'");
header("location:../Login/cart.php");
?>