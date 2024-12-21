<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">
        <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <body>
        <?php
 
    include 'process/koneksi.php';
 
	$query = mysqli_query($koneksi, "SELECT max(id_pelanggan) as kodeTerbesar FROM pelanggan");
	$data = mysqli_fetch_array($query);
	$kodePelanggan = $data['kodeTerbesar'];
 
	$urutan = (int) substr($kodePelanggan, 3, 3);
 
	$urutan++;

	$huruf = "PLG";
	$kodePelanggan = $huruf . sprintf("%03s", $urutan);
  
 ?>
            <div class="container">
                <div class="row">
                  <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card border-0 shadow rounded-3 my-5">
                      <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Sign Up</h5>
                        <?php 
	                        if(isset($_GET['pesan'])){
	                        	if($_GET['pesan']=="gagal"){
		                        	echo "<div class='alert alert-danger alert-dismissible text-center' role='alert'>
                                            Email sudah dipakai!
                                            </div>";
	                        	}
	                        }
                            ?>
                        <form action="process/proses_register_pelanggan.php" method="POST">
                            <input type="text" name="id_pelanggan" class="form-control" value="<?php echo $kodePelanggan ?>" hidden>
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Nama Lengkap" name="nama_pelanggan" required>
                            <label for="floatingInput">Nama Lengkap</label>
                          </div>
                          <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required>
                            <label for="floatingInput">Email</label>
                          </div>
                          <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                            <label for="floatingPassword">Password</label>
                          </div>
                          <div class="form-floating mb-3">
                            <textarea type="text" class="form-control" id="floatingInput" placeholder="Alamat" style="height: 100px;" name="alamat" required></textarea>
                            <label for="floatingInput">Alamat</label>
                          </div>
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="No Telpon" name="no_hp" required>
                            <label for="floatingInput">No. Telepon</label>
                          </div>

                          <div class="d-grid">
                            <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name="submit">Register</button>
                          </div>
                          <hr class="my-4">
                          <div>
                            <label class="form-check-label">Sudah punya akun? <a href="login.php">Masuk disini</a></label>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </body>
    </head>
</html>