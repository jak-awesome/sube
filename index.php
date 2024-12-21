<?php
include "pelanggan/process/koneksi.php";
session_start();

if($_SESSION['id_pelanggan']==""){
    header("location: pelanggan/Non Login/index.php");
}
if($_SESSION['id_pelanggan']==$_SESSION['nama_pelanggan']){
    header("location:pelangganLogin/index.php");
}
?>