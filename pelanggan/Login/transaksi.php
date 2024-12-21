<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Transaksi - CV SUBE</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">

 </head>

<body>
<?php
include "../process/koneksi.php";
 
 session_start();

 // cek apakah yang mengakses halaman ini sudah login
 if($_SESSION['id_pelanggan']==""){
     header("location:../login.php?pesan=belum");
 }
?>

  <!-- ======= Header ======= -->
 <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
  
      <a href="index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>CV SUBE<span>.</span></h1>
      </a>
  
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="cart.php">
            <i class="bi-cart4" style="font-size: 1.5rem;"></i>
          </a></li>
          <li class="dropdown"><a href="#"></i><?php echo $_SESSION['nama_pelanggan']; ?> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="profile.php">Profile</a></li>
              <li><a href="transaksi.php">Transaksi</a></li>
              <li><a href="../process/proses_logout_pelanggan.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </nav><!-- .navbar -->
  
    </div>
  </header><!-- End Header -->
  

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('../assets/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Transaksi</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Transaksi</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="">

          <div class="">

            <article class="blog-details">
                <br><br>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">ID Transaksi</th>
                    <th scope="col">Nama produk</th>
                    <th scope="col">Tanggal Pemesanan</th>
                    <th scope="col">Jumlah Pemesanan</th>
                    <th scope="col">Total Biaya</th>
                    <th scope="col">Deskripsi Pesanan</th>
                    <th scope="col">Gambar Desain</th>
                    <th scope="col">Status Pesanan</th>
                  </tr>
                </thead>
                <?php
              $no = 1;
              $sesi = $_SESSION['nama_pelanggan'];
              $tampil = mysqli_query($koneksi, "SELECT * FROM transaksi INNER JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan INNER JOIN produk ON transaksi.id_produk = produk.id_produk WHERE pelanggan.id_pelanggan='$_SESSION[id_pelanggan]' ");
              function rupiah($angka){
											
                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                return $hasil_rupiah;
              
              } 
              
              $total_harus_dibayar = mysqli_query($koneksi,"SELECT SUM(total_biaya) AS jumlah FROM transaksi WHERE id_pelanggan='$_SESSION[id_pelanggan]'");
              $hasil = mysqli_fetch_array($total_harus_dibayar);

              
              while ($data = mysqli_fetch_array($tampil)) {
                $tampil_2 = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi='$data[id_transaksi]' ");
                $jumlah = mysqli_num_rows($tampil_2);
                ?>
                <tbody>
                  <tr>
                    <th rowspan="" scope="row"><?= $data['id_transaksi']; ?></th>
                    <td><?= $data['nama_produk']; ?></td>
                    <td><?= $data['tgl_pemesanan']; ?></td>
                    <td><?= $data['jumlah_pemesanan']; ?></td>
                    <td><?= rupiah($data['total_biaya']); ?></td>
                    <td><?= $data['deskripsi']; ?></td>
                    <td><img src="../assets/img/upload/foto_pesanan/<?= $data['gambar']; ?>" style="width: 125px; height: 140px;"></td>
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
                  </tr>
                  <?php
                $no++;
                }
                 ?>
                 <tr>
                  <td colspan="7" align="right">Total Biaya yang telah dikeluarkan</td>
                  <td><h5><strong><?= rupiah($hasil['jumlah']); ?></strong></h5></td>
                 </tr>
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
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>