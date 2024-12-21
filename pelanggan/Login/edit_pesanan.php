<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Edit Pemesanan - CV SUBE</title>
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
    if ($_SESSION['id_pelanggan'] == "") {
        header("location:../login.php?pesan=belum");
    }
    ?>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.php" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>CV SUBE</span></h1>
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

                <h2>Tambah Pesanan</h2>
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li>Tambah Pesanan</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Details Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <?php
                $id = $_GET['id'];
                $data = mysqli_query($koneksi, "SELECT * FROM pemesanan where id_pemesanan ='$id'");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <div class="">
                        <div class="container-fluid mt-2">
                            <h2>Pesanan </h2>
                            <form method="POST" action="../process/proses_tambah_pesanan_pelanggan.php" enctype="multipart/form-data">
                                <label for="">Nama Produk</label>
                                <div><select class="form-control show-tick" name='nama_produk'>
                                        <?php
                                        include "../process/koneksi.php";
                                        $lbl = '<option>---Pilih---</option>';
                                        $query  = mysqli_query($koneksi, "SELECT * FROM produk ") or die(mysqli_error($koneksi));
                                        while ($data = mysqli_fetch_array($query)) {
                                            echo "<option value=$data[nama_produk]> $data[nama_produk]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Jumlah Pesanan</label>
                                    <input type="number" name="jumlah_pemesanan" value="<?php echo $d['jumlah_pemesanan']; ?>" class="form-control" placeholder="Masukan Jumlah Pesanan">
                                </div>

                                <div class="">
                                    <label class="form-label">Catatan</label>
                                    <input type="text" name="deskripsi" value="<?php echo $d['deskripsi']; ?>" class="form-control" placeholder="Masukan Deskripsi Desain">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Desain</label>
                                    <div>
                                        <input type="file" name="foto" placeholder="" accept="image/*">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Simpan Edit Pesanan">
                                </div>
                            </form>
                        <?php
                    }
                        ?>
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