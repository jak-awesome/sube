<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pelanggan - CV SUBE</title>
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
          <li><a href="pelanggan.php" class="active">Pelanggan</a></li>
          <li><a href="pemesanan.php">Pemesanan</a></li>
          </a></li>
          <li class="dropdown"><a href="#"></i><?php echo $_SESSION['nama_admin']; ?> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">Profile</a></li>
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

        <h2>Pelanggan</h2>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="">

          <div class="">

            <article class="blog-details">
            <div data-aos="fade-up" data-aos-delay="100" style="text-align: right;">
            <?php 
	                        if(isset($_GET['pesan'])){
	                        	if($_GET['pesan']=="sukses"){
		                        	echo "<div class='alert alert-success alert-dismissible text-center' role='alert'>
                                            Data Pelanggan sudah diubah!
                                            </div>";
	                        	}if($_GET['pesan']=="hapus"){
		                        	echo "<div class='alert alert-warning alert-dismissible text-center' role='alert'>
                                            Data Pelanggan sudah dihapus!
                                            </div>";
	                        	}
	                        }
                            ?>
              <a href="form_tambah_pelanggan.php" class="btn btn-primary" >Tambah Pelanggan</a>
              </div><br>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">ID Pelanggan</th>
                    <th scope="col">Nama Pelanggan</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No. Hp</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Option</th>
                  </tr>
                </thead>
                <?php
              $no = 1;
              $tampil = mysqli_query($koneksi, "SELECT * FROM pelanggan");
        
              while ($data = mysqli_fetch_array($tampil)) {
                ?>
                <tbody>
                  <tr>
                    <th scope="row"><?= $data['id_pelanggan']; ?></th>
                    <td><?= $data['nama_pelanggan']; ?></td>
                    <td><?= $data['alamat']; ?></td>
                    <td><?= $data['no_hp']; ?></td>
                    <td><?= $data['email']; ?></td>
                    <td><?= $data['password']; ?></td>
                    <td>
                    <a href="form_edit_pelanggan.php?id=<?php echo $data['id_pelanggan']  ?>" class="btn btn-primary btn-sm btn-block">EDIT</a>  
                    <a href="process/proses_hapus_pelanggan.php?id=<?php echo $data['id_pelanggan']  ?>" class="btn btn-danger btn-sm btn-block text-light">HAPUS</a></td>
                  </tr>
                  <?php
                $no++;
                }
                 ?>
                </tbody>
              </table>
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

</body>

</html>