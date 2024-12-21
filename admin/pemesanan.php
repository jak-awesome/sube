<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pemesanan - CV SUBE</title>
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
          <li><a href="pelanggan.php">Pelanggan</a></li>
          <li><a href="pemesanan.php" class="active">Pemesanan</a></li>
          </a></li>
          <li class="dropdown"><a href="#"></i><?php echo $_SESSION['nama_admin']; ?>  <i class="bi bi-chevron-down dropdown-indicator"></i></a>
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

        <h2>Pemesanan</h2>
        <ol>
          <li>Pemesanan</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->
    <section id="hero" class="hero">
    </section>
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up" data-aos-delay="100" style="text-align: right;">

        <div class="">

          <div class="">
            <?php
          if(isset($_GET['pesan'])){
        if($_GET['pesan']=="sukses"){
          echo "<div class='alert alert-success alert-dismissible text-center' role='alert'>
                        Status Pemesanan sudah diubah!
                        </div>";
        }if($_GET['pesan']=="gagal"){
          echo "<div class='alert alert-warning alert-dismissible text-center' role='alert'>
                        Status Pemesanan gagal Diubah!
                        </div>";
        }
      }
      ?>
            <article class="blog-details">
            <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      Cetak laporan
    </button>
    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
      <li><a class="dropdown-item" href="cetak_semua.php">Cetak Semua</a></li>
      <li><a class="dropdown-item" href="cetak_selesai.php">Cetak Pesanan Selesai</a></li>
      <li><a class="dropdown-item" href="cetak_batal.php">Cetak Pesanan Dibatalkan</a></li>
      <li><a class="dropdown-item" href="cetak_proses.php">Cetak Pesanan Dalam Proses</a></li>
    </ul>
  </div>
                <br><br>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">ID Transaksi</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Tanggal Pemesanan</th>
                    <th scope="col">Jumlah Pemesanan</th>
                    <th scope="col">Total Biaya</th>
                    <th scope="col">Deskripsi Pesanan</th>
                    <th scope="col">Gambar Desain</th>
                    <th scope="col">Status Pesanan</th>
                    <th scope="col">Options</th>
                  </tr>
                </thead>
                <?php
              $no = 1;
              $tampil = mysqli_query($koneksi, "SELECT * FROM transaksi INNER JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan INNER JOIN produk ON transaksi.id_produk = produk.id_produk");
              function rupiah($angka){
											
                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                return $hasil_rupiah;
              
              } 
              while ($data = mysqli_fetch_array($tampil)) {
                ?>
                <tbody>
                  <tr>
                    <th scope="row"><?= $data['id_transaksi']; ?></th>
                    <td><?= $data['nama_pelanggan']; ?></td>
                    <td><?= $data['nama_produk']; ?></td>
                    <td><?= $data['tgl_pemesanan']; ?></td>
                    <td><?= $data['jumlah_pemesanan']; ?></td>
                    <td><?= rupiah($data['total_biaya']); ?></td>
                    <td><?= $data['deskripsi']; ?></td>
                    <td>
                      <a href="../pelanggan/assets/img/upload/foto_pesanan/<?= $data['gambar']; ?>" title="Detail Desain" data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link">
                      Lihat Desain</a></td>
                    <td><?php 
                    if($data['status'] == "Belum Dikonfirmasi"){
                        echo "<div class='btn btn-warning btn-sm'>Belum Dikonfirmasi</div>";
                    }
                    if($data['status'] == "Dalam Proses"){
                        echo "<div class='btn btn-primary btn-sm'>Dalam Proses</div>";
                    }
                    if($data['status'] == "Dibatalkan"){
                        echo "<div class='btn btn-danger btn-sm'>Dibatalkan</div>";
                    }
                    if($data['status'] == "Selesai"){
                        echo "<div class='btn btn-success btn-sm'>Selesai</div>";
                    }
                    ?></td>
                    <td>
                    <a href="detail_pemesanan.php?id=<?php echo $data['id_transaksi']  ?>" class="btn btn-success btn-sm btn-block">Detail</a>
                    </td>
                  </tr>
                  <?php
                $no++;
                }
                 ?>
                </tbody>
              </table>
              <div data-aos="fade-up" data-aos-delay="100" style="text-align: right;">
              </div>
              </div><!-- End post content -->

            </article><!-- End blog post -->

          </div>


          </div>
        </div>

      </div>
    </section>

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

</body>

</html>