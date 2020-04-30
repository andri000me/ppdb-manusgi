<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Aplikasi Pendaftaran Siswa Baru Online - MA NU Sunan Giri Prigen plus Program Vokasional (Multimedia, Pariwisata & Perhotelan)">
  <meta name="author" content="Syaifuddin Zuhri">

  <title>Login Siswa Baru - MA NU Sunan Giri</title>
  <!-- Gambar title -->
  <link rel="icon" type="image/png" href="assets/img/logo.png">

  <!-- Main CSS -->
  <link rel="stylesheet" type="text/css" href="assets/js/style/css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="assets/css/style2.css" rel="stylesheet">

</head>

<body class="register">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card o-hidden border-0 shadow-lg my-4" >
          <div class="card-body bg-light p-0" >
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-md-12">
                <div class="p-5">
                  <div class="text-center" class="text">
                    <img src="assets/img/logo.png" alt="Logo Aplikasi" class="img-logo">
                    <h1 class="h5 text-gray-900">Login Pendaftaran Siswa Baru</h1>
                    <h1 class="h5 text-gray-900"><b>MA NU SUNAN GIRI PRIGEN</b></h1>
                    <div class="alert alert-primary">
                      <h1 class="h6 text-gray-900"><b>PROGRAM VOKASIONAL</b></h1>
                      <h1 class="h6 text-gray-900">| Multimedia | Pariwisata & Perhotelan |</h1>
                    </div>

                    <?php 
                      session_start();

                      if (isset($_SESSION['registrasi_sukses']) && $_SESSION['registrasi_sukses'] <> '') {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 12px;">'. $_SESSION['registrasi_sukses'] .'
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>';
                      }      
                      if (isset($_SESSION['login_gagal']) && $_SESSION['login_gagal'] <> '') {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 12px;">'. $_SESSION['login_gagal'] .'
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>';
                      }                      
                      if (isset($_SESSION['pesan_logout']) && $_SESSION['pesan_logout'] <> '') {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 12px;">'. $_SESSION['pesan_logout'] .'
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>';
                      }                      

                      session_destroy();
                    ?>

                  </div>
                  <form class="user" action="controller/login_control.php" method="POST">
                    <div class="form-group">
                      <input type="email" name="username" class="form-control form-control-user" id="username" required="" 
                      placeholder="Masukkan Email..." style="font-size: 12px;"
                      oninvalid="this.setCustomValidity('Masukkan Email Anda!')"
                      oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="password" 
                      required="" placeholder="Masukkan Password..." style="font-size: 12px;"
                      oninvalid="this.setCustomValidity('Masukkan Password Anda!')"
                      oninput="setCustomValidity('')">
                    </div>
                    <input type="submit" name="btn_login" value="Login" class="btn btn-sm btn-success btn-user btn-block ">
                    </input>
                  </form>

                  <div class="text-center mt-2 mb-2">
                    <a class="" style="font-size: 12px;"> Belum punya akun? 
                      <a class="text-success" style="font-size: 12px;" href="registrasi.php"> Registrasi Disini!</a>
                    </a>
                  </div>
                  <div style="margin:5px auto; text-align:center">
                    <a class="btn btn-sm btn-warning" href="https://bit.ly/Mekanisme-Pendaftaran-PPDB-MANUSGI-2020" target="spmb">
                    <i class="fas fa-book-open"></i>
                    Lihat Mekanisme Pendaftaran</a>
                  </div>
                  <hr>
                  <marquee>SELAMAT DATANG DI WEBSITE PPDB ONLINE MA NU SUNAN GIRI PRIGEN | TAHUN PELAJARAN 2020/2021</marquee>
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
  <script src="assets/js/style/js/jquery-3.2.1.min.js"></script>
  <script src="assets/js/style/js/popper.min.js"></script>
  <script src="assets/js/style/js/bootstrap.min.js"></script>
  <script src="assets/js/style/js/main.js"></script>

  <!-- The javascript plugin to display page loading on top-->
  <script src="assets/js/style/js/plugins/pace.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

</body>
</html>
