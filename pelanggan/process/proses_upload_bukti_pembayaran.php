<?php
extract($_POST);

include "../process/koneksi.php";
session_start();

$id_pembayaran = $_POST['id_pembayaran'];
$id_pelanggan = $_POST['id_pelanggan'];
$tgl_pembayaran = date("Y-m-d h:i:s");
$nama_file = $_FILES['bukti']['name'];
$source = $_FILES['bukti']['tmp_name'];
$folder = '../assets/img/upload/foto_bukti_pembayaran/';

$query = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE id_pelanggan='$_SESSION[id_pelanggan]'");
$data = mysqli_fetch_array($query);
$jum_data = mysqli_num_rows($query);

for ($i = 0; $i < $jum_data; $i++) {
    while ($d = mysqli_fetch_array($query)) {
        mysqli_query($koneksi, "INSERT INTO transaksi(id_transaksi,id_pelanggan,id_produk,tgl_pemesanan,jumlah_pemesanan,total_biaya,deskripsi,gambar,status) VALUES ('$d[id_transaksi]','$d[id_pelanggan]','$d[id_produk]','$d[tgl_pemesanan]','$d[jumlah_pemesanan]','$d[total_biaya]','$d[deskripsi]','$d[gambar]','$d[status]')");
    }
}

mysqli_query($koneksi, "DELETE FROM pemesanan WHERE id_pelanggan='$id_pelanggan'");

move_uploaded_file($source, $folder . $nama_file);
mysqli_query($koneksi, "INSERT INTO pembayaran VALUES ('$id_pembayaran','$data[id_transaksi]','$id_pelanggan', '$nama_file', '$tgl_pembayaran')");

header("location: ../Login/transaksi.php");
?>