<?php 
include 'process/koneksi.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags --> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

  <title>Form Tambah Products</title>
  </head>
  <body>
 
  <?php
    include '../pelanggan/process/koneksi.php';
 
	$query = mysqli_query($koneksi, "SELECT max(id_produk) as kodeTerbesar FROM produk");
	$data = mysqli_fetch_array($query);
	$kodeProduk = $data['kodeTerbesar'];
 
	$urutan = (int) substr($kodeProduk, 3, 3);
 
	$urutan++;

	$huruf = "PRD";
	$kodeProduk = $huruf . sprintf("%03s", $urutan);
  
 ?>

 <!-- Form Registrasi -->
  <div class="container">
    <h3 class="text-center mt-3 mb-5">SILAHKAN TAMBAH PRODUK</h3>
    <div class="card p-5 mb-5">
      <form method="POST" action="" enctype="multipart/form-data">
      <div class="form-group">
        <input type="text" name="id_produk" class="form-control" value="<?php echo $kodeProduk ?>" hidden>
          <label for="nama_produk">Nama Produk</label>
          <input type="text" class="form-control" id="nama_produk" name="nama_produk">
        </div>
        <div class="form-group">
          <label for="harga_produk">Harga Produk</label>
          <input type="text" class="form-control" id="harga_produk" name="harga_produk">
        </div>
        <div class="form-group">
          <label for="foto_produk">Foto Menu</label>
          <input type="file" class="form-control-file border" id="foto_produk" name="foto_produk" accept="image/*">
        </div><br>
        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
        <button type="reset" class="btn btn-danger" name="reset">Hapus</button>
      </form>

      <?php 
  if(isset($_POST['tambah'])){
    $idProduk = $_POST ['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $harga_produk = $_POST['harga_produk'];
    $nama_file = $_FILES['foto_produk']['name'];
    $source = $_FILES['foto_produk']['tmp_name'];
    $folder_admin = './foto_produk/';
    $folder_pelanggan = './pelanggan/assets/img/upload/foto_produk/';

    move_uploaded_file($source, $folder_admin.$nama_file);
    move_uploaded_file($source, $folder_pelanggan.$nama_file);
    $insert = mysqli_query($koneksi, "INSERT INTO produk VALUES ('$idProduk','$nama_produk', '$harga_produk', '$nama_file')");

    if($insert){
      header("location: products.php");
    }
    else {
      echo "Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
    }
  }

   ?>

  </div>
  </div>
  <!-- Akhir Form Registrasi -->


  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.js"></script>
  </body>
</html>