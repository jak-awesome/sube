<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Detail Pemesanan - CV SUBE</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body>
<?php 
include "process/koneksi.php";
 
session_start();

// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['id_admin']==""){
    header("location: index.php?pesan=belum");
}
?>
   <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="#" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>CV SUBE</span></h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="products.php">Products</a></li>
          <li><a href="pelanggan.php" >Pelanggan</a></li>
          <li><a href="pemesanan.php"class="active" >Pemesanan</a></li>
          </a></li>
          <li class="dropdown"><a href="#"></i><?php echo $_SESSION['nama_admin']; ?> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="process/proses_logout_admin.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Detail Pemesanan</h2>
        <ol>
          <li><a href="pemesanan.php">Pemesanan</a></li>
          <li>Detail Pemesanan</li>

        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
      <?php 
        $no = 1;
        $id = $_GET['id'];
        $data = mysqli_query($koneksi,"SELECT * FROM transaksi INNER JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan INNER JOIN produk ON transaksi.id_produk = produk.id_produk WHERE id_transaksi='$id';");
        function rupiah($angka){
											
          $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
          return $hasil_rupiah;
        
        } 
        while($d = mysqli_fetch_array($data)){
        ?>
        <div class="">
        <div class="container-fluid mt-2">
        <h2>Detail Pemesanan <?= $no ?></h2>
        <form method="POST" action="" enctype="multipart/form-data">
        <div class="mb-3">

            <label class="form-label">Id Pemesanan</label>
             <input readonly type="text" name="id_transaksi" class="form-control" value="<?php echo $d['id_transaksi']; ?>"class="form-control">
          
            <label class="form-label">Nama Pelanggan</label>
              <input readonly type="text" name="nama_pelanggan" value="<?php echo $d['nama_pelanggan']; ?>" class="form-control">
          
                <label class="form-label">Nama Produk</label>
              <input readonly type="text" name="nama_produk" value="<?php echo $d['nama_produk']; ?>" class="form-control">
          
                <label class="form-label">Tanggal Pemesanan</label>
              <input readonly type="text" name="tgl_pemesanan" value="<?php echo $d['tgl_pemesanan']; ?>" class="form-control">
          
                <label class="form-label">Jumlah Pemesanan</label>
              <input readonly type="text" name="jumlah_pemesanan" value="<?php echo $d['jumlah_pemesanan']; ?>" class="form-control">
          
                <label class="form-label">Total Biaya</label>
              <input readonly type="text" name="total_biaya" value="<?php echo rupiah($d['total_biaya']); ?>" class="form-control">

              <label class="form-label">Deskripsi</label>
              <input readonly type="text" name="deskripsi" value="<?php echo $d['deskripsi']; ?>" class="form-control">

              <label class="form-label">Desain</label><br>
                  <a href="../pelanggan/assets/img/upload/foto_pesanan/<?= $d['gambar']; ?>" title="Detail Desain" data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link">
                  <img src="../pelanggan/assets/img/upload/foto_pesanan/<?= $d['gambar']; ?>" class="img-fluid" alt="" style="width: auto; height: 200px;">
                  </a><br><br>

              <label class="form-label">Status</label>
              <input readonly type="text" name="status" value="<?php echo $d['status']; ?>" class="form-control"><br>
          </div>
          <?php 
          $no++;
         }
         ?>
          </form>
          <!-- Button trigger modal -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Cek Bukti Pembayaran
</button>

              </div><!-- End post content -->
            </article><!-- End blog post -->
          </div>
          </div>
        </div>
      </div>
    </section><!-- End Blog Details Section -->

  </main><!-- End #main -->



  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content position-relative">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>CV SUBE</h3>
              <p>
                Jln. Raya Cirendang, Kasturi, Kec. Kuningan <br>
                Kab. Kuningan, Jawa Barat<br><br>
                <strong>Phone:</strong> 08xxxxxxxxx<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              
            </div>
          </div><!-- End footer info column-->

        </div>
      </div>
    </div>

    <div class="footer-legal text-center position-relative">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>CV SUBE</span></strong>. All Rights Reserved
        </div>
      </div>
    </div>

  </footer>
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Modal -->
<div class="modal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php
        $data1 = mysqli_query($koneksi,"SELECT * FROM pembayaran INNER JOIN transaksi ON pembayaran.id_transaksi=transaksi.id_transaksi WHERE pembayaran.id_transaksi='$id';");
        $total_harus_dibayar = mysqli_query($koneksi,"SELECT SUM(total_biaya) AS jumlah FROM transaksi WHERE id_transaksi='$id'");
        $hasil = mysqli_fetch_array($total_harus_dibayar);
        while($d1 = mysqli_fetch_array($data1)){
        ?>
        <div class="">
        <div class="container-fluid mt-2">
        <h2>Detail Pembayaran</h2>
        <form method="POST" action="process/proses_konfirmasi_pembayaran.php" enctype="multipart/form-data">
        <div class="mb-3">

            <label class="form-label">Id Pembayaran</label>
             <input readonly type="text" name="id_pembayaran" class="form-control" value="<?php echo $d1['id_pembayaran']; ?>"class="form-control">
             <input hidden type="text" name="id_transaksi" class="form-control" value="<?php echo $d1['id_transaksi']; ?>"class="form-control">


            <label class="form-label">Total yang harus dibayar</label>
              <input readonly type="text" name="nama_pelanggan" value="<?php echo rupiah($hasil['jumlah']); ?>" class="form-control">
          
                <label class="form-label">Tanggal Pembayaran</label>
              <input readonly type="text" name="tgl_pemesanan" value="<?php echo $d1['tgl_pembayaran']; ?>" class="form-control">

              <label class="form-label">Bukti Pembayaran</label><br>
                  <a href="../pelanggan/assets/img/upload/foto_bukti_pembayaran/<?= $d1['bukti']; ?>" title="Bukti Pembayaran" data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link">
                  <img src="../pelanggan/assets/img/upload/foto_bukti_pembayaran/<?= $d1['bukti']; ?>" class="img-fluid" alt="" style="width: auto; height: 200px;">
                  </a><br><br>

              <label class="form-label">Status</label>
              <select  class="form-control" name="status">
                <option value="Dalam Proses">Dalam Proses</option>
                <option value="Dibatalkan">Dibatalkan</option>
                <option value="Selesai">Selesai</option>
              </select>
        </div>
        <?php
        }
        ?>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
        <button type="submit" class="btn btn-primary" name="submit">Konfirmasi</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>

</html>