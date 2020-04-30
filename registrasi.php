<!-- <?php include('../controller/siswa_editprofil_control.php'); ?> -->


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Aplikasi Pendaftaran Siswa Baru Online - MA NU Sunan Giri Prigen plus Program Vokasional (Multimedia, Pariwisata & Perhotelan)">
  <meta name="author" content="Syaifuddin Zuhri">

  <title>Registrasi Siswa Baru - MA NU Sunan Giri</title>
  
  <!-- Gambar title -->
  <link rel="icon" type="image/png" href="assets/img/logo.png">

  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="assets/js/style/css/main.css">
  
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="assets/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="assets/css/style2.css" rel="stylesheet">

  <!-- Style Css Manual-->
  <style>

  </style>

</head>
<body class="register">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-md-12">
                <div class="p-5">
                  <div class="text-center">
                    <img src="assets/img/logo.png" alt="Logo Aplikasi" class="img-logo-regis">
                    <h1 class="h5 text-gray-900">Registrasi Siswa Baru</h1>
                    <h1 class="h5 text-gray-900"><b>MA NU SUNAN GIRI PRIGEN</b></h1>
                    <div class="alert alert-primary">
                      <h1 class="h6 text-gray-900"><b>PROGRAM VOKASIONAL</b></h1>
                      <h1 class="h6 text-gray-900">| Multimedia | Pariwisata & Perhotelan |</h1>
                    </div>


                    <?php 
                      session_start();

                      if (isset($_SESSION['registrasi_gagal']) && $_SESSION['registrasi_gagal'] <> '') {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 12px;">'. $_SESSION['registrasi_gagal'] .'
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>';
                      }      
                    
                      session_destroy();
                    ?>

                  </div>
                  <form class="user" action="controller/registrasi_control.php" method="POST">
                    <div class="form-group">
                        <label for="nama" style="font-size: 12px">Nama Lengkap</label>
                      <input type="text" name="nama" class="form-control form-control" required ="" 
                      id="nama" placeholder="Nama Lengkap" style="font-size: 12px"
                      oninvalid="this.setCustomValidity('Masukkan Name Lengkap Anda!')"
                      oninput="setCustomValidity('')">
                    </div>
                     <!-- <div class="form-group">
                        <label for="nisn" style="font-size: 12px">NISN</label>
                        <input type="number" name="nisn" id="nisn" class="form-control" required ="" placeholder="NISN"
                        style="font-size: 12px"
                        oninvalid="this.setCustomValidity('Masukkan NISN Anda!')"
                        oninput="setCustomValidity('')">
                    </div> -->
                     <div class="form-group">
                        <label for="email" style="font-size: 12px">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required ="" placeholder="Email"
                        style="font-size: 12px"
                        oninvalid="this.setCustomValidity('Masukkan Email Anda!')"
                        oninput="setCustomValidity('')">
                    </div>
                     <div class="form-group row">
                        <div class="col-md-6 pb-3">
                                <label for="password" style="font-size: 12px">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required ="" placeholder="Password"
                                style="font-size: 12px"
                                oninvalid="this.setCustomValidity('Masukkan Password Anda!')"
                                oninput="setCustomValidity('')">
                        </div>
                        <div class="col-md-6">
                                <label for="ulangi_password" style="font-size: 12px">Ulangi Password</label>
                                <input type="password" name="ulangi_password" id="ulangi_password" class="form-control" required ="" 
                                placeholder="Ulangi Password" style="font-size: 12px"
                                oninvalid="this.setCustomValidity('Masukkan Password ulang!')"
                                oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <input type="submit" name="btn_registrasi" value="Registrasi" class="btn btn-sm btn-success btn-user btn-block" ></input>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="" style="font-size: 12px;">Sudah punya akun? 
                        <a class="text-success" style="font-size: 12px;" href="login.php">Login Disini!</a>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Essential javascripts for application to work-->
  <!-- <script src="assets/js/style/js/jquery-3.2.1.min.js"></script>
  <script src="assets/js/style/js/popper.min.js"></script>
  <script src="assets/js/style/js/bootstrap.min.js"></script>
  <script src="assets/js/style/js/main.js"></script> -->
  <!-- The javascript plugin to display page loading on top-->
  <!-- <script src="assets/js/style/js/plugins/pace.min.js"></script> -->

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>
	
</body>

</html>
