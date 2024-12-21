<?php
extract($_POST);

include "../process/koneksi.php";
session_start();

$nama_produk = $_POST['nama_produk'];
$tgl_pemesanan = date("Y-m-d h:i:s");
$jumlah_pemesanan = $_POST['jumlah_pemesanan'];
$deskripsi = $_POST['deskripsi'];
$nama_file = $_FILES['foto']['name'];
$source = $_FILES['foto']['tmp_name'];
$folder = '../assets/img/upload/foto_pesanan/';

$query = mysqli_query($koneksi, "SELECT max(id_transaksi) as kodeTerbesar FROM transaksi");
$data = mysqli_fetch_array($query);
$kodeTransaksi = $data['kodeTerbesar'];
 
$urutan = (int) substr($kodeTransaksi, 3, 3);
 
$urutan++;

$huruf = "TRN";
$kodeTransaksi = $huruf . sprintf("%03s", $urutan);

$status = "Belum Dikonfirmasi";

$query_2=mysqli_query ($koneksi, "SELECT * FROM produk WHERE nama_produk='$nama_produk'");
$d = mysqli_fetch_array($query_2);
$total_biaya = $d['harga_produk'] * $jumlah_pemesanan;

move_uploaded_file($source, $folder.$nama_file);
mysqli_query($koneksi, "INSERT INTO pemesanan VALUES ('$kodeTransaksi', '$_SESSION[id_pelanggan]', '$d[id_produk]', '$tgl_pemesanan', '$jumlah_pemesanan', '$total_biaya', '$deskripsi', '$nama_file', '$status')");

header("location: ../Login/cart.php");
?>