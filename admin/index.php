<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">
        <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <body>
            <div class="container">
                <div class="row">
                  <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card border-0 shadow rounded-3 my-5">
                      <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Sign In</h5>
                        <form action="process/proses_login_admin.php" method="POST">
                        <?php 
	                        if(isset($_GET['pesan'])){
	                        	if($_GET['pesan']=="gagal"){
		                        	echo "<div class='alert alert-danger alert-dismissible text-center' role='alert'>
                                            Email atau Password tidak sesuai!
                                            </div>";
	                        	}
                                if($_GET['pesan']=="belum"){
                                    echo "<div class='alert alert-danger alert-dismissible text-center' role='alert'>
                                     Login terlebih dahulu!
                                </div>";
	                        }}
                            ?>
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username" required>
                            <label for="floatingInput">Username</label>
                          </div>
                          <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                            <label for="floatingPassword">Password</label>
                          </div>
            
                          <div class="d-grid">
                            <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name="submit">Sign
                              in</button>
                          </div>
                          <hr class="my-4">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </body>
    </head>
</html>