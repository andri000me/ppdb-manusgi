<?php include('../controller/admin_setting_control.php'); ?>

<!DOCTYPE html>2
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php if ($_SESSION['level'] == 'siswa') { ?>
    <title>Dashboard Siswa Baru - MA NU Sunan Giri Prigen</title>
    <?php } ?>

    <?php if ($_SESSION['level'] == 'admin') { ?>
    <title>Dashboard Admin - MA NU Sunan Giri Prigen</title>
    <?php } ?>


    <!-- Gambar title -->
    <link rel="icon" type="image/png" href="../assets/img/logo.png">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/js/style/css/main.css">
    <!-- Font-icon css-->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style2.css" rel="stylesheet">
    <link href="../assets/css/alertify.min.css" rel="stylesheet">

    <!-- css datepicker -->
    <link href="../assets/vendor/datepicker/css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="../assets/vendor/datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" style="background: #2b3643">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon">
                    <i class="fas">
                        <img src="../assets/img/logo.png" alt="" class="logo-side">
                    </i>
                </div>
                <div class="sidebar-brand-text mx-2">MANUSGI</div>
            </a>

            <!-- Heading -->
            <div class="sidebar-heading">
                <?= $_SESSION['level']; ?>
            </div>

            <?php if ($_SESSION['level'] == 'admin') { ?>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="pendaftaran.php">
                    <i class="fas fa-list"></i>
                    <span>Data pendaftar</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="setting.php">
                    <i class="fas fa-cog"></i>
                    <span>Setting Aplikasi</span></a>
            </li>

            <?php } else if ($_SESSION['level'] == 'siswa')  { ?>


            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="data_diri.php">
                    <i class="fas fa-user-edit"></i>
                    <span>Data Diri</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="data_orangtua.php">
                    <i class="fas fa-user-friends"></i>
                    <span>Data Orang Tua</span></a>
            </li>
            <?php } ?>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt ml-1"></i>
                    <span>Log Out</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand topbar mb-4 static-top shadow navbar-fixed-top"
                    style="background: #2b3643">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars" style="color: white"></i>
                    </button>

                    <?php 
                $nama = "";
                $url = "";
                if ($_SESSION['level'] == 'siswa') {
                  $nama = $data_pendaftar['nama'];
                  $url = "../siswa/dashboard.php";
                } else {
                    $nama = "Administrator";
                    $url = "../admin/dashboard.php";
                }
            ?>

                    <!-- Topbar  -->
                    <form class="d-none d-sm-inline-block mt-2">
                        <div class="text-left">
                            <?php 
                $nama_aplikasi = "";
                $nama_madrasah = "";
                if (isset($_SESSION['nama_aplikasi']) || isset($_SESSION['nama_madrasah'])) {
                  $nama_aplikasi = $data_setting['nama_aplikasi'];
                  $nama_madrasah = $data_setting['nama_madrasah'];
                } else {
                  $nama_aplikasi = "ppdb online";
                  $nama_madrasah = "ma nu sunan giri";
                }

              ?>
                            <a class="text-lg text-white text-uppercase"><b><?php if(isset($data_setting['nama_aplikasi'])) { echo $data_setting['nama_aplikasi']; } ?></b>
                                <a class="text-lg text-success text-uppercase" href="<?= $url ?>"
                                    style="text-decoration: none"><b><?php if(isset($data_setting['nama_madrasah'])) { echo $data_setting['nama_madrasah']; } ?></b></a>
                            </a>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-white small"
                                    style="font-size: 12px;"><?=  $nama ?></span>
                                <img class="img-profile rounded-circle" src="../assets/img/user.png" alt="fotoprofil">
                                <i class="fas fa-caret-down ml-2" style="color: white"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->