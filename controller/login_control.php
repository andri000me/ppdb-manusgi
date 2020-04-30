<?php

include('../config/koneksi.php');
session_start();

if (isset($_POST['btn_login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql_users = "SELECT * FROM users WHERE username= '$username' AND password = '$password'";
    $result_user = mysqli_query($koneksi, $sql_users);
    $count = mysqli_num_rows($result_user);
    
    if ($count > 0) {
        while ($data_user = mysqli_fetch_array($result_user)) {
            $_SESSION['status'] = 'login';
            $_SESSION['id_users'] = $data_user['id'];
            $_SESSION['nama'] = $data_user['nama'];
            $_SESSION['level'] = $data_user['level'];

            if ($data_user['level'] == 'admin') {
                // $_SESSION['jenis'] = 'admin';
                header('location:../admin/dashboard.php');
            } elseif ($data_user['level'] == 'siswa') {
                // $_SESSION['jenis'] = 'siswa';
                header('location:../siswa/dashboard.php');
            } else {
                header('location:../login.php');
            }
        }

    } else {
        if ($username = " " || $password = " ") {
            $_SESSION['login_gagal'] = "Username atau Password tidak boleh kosong!";
            header('location:../login.php');       
        }
        if ($password != 'password') {
            $_SESSION['login_gagal'] = "Username atau Password salah!";
            header('location:../login.php'); 
        }
    }
    
} else {
    // echo '<script>window.location="registrasi.php"</script>';
    header('location:../login.php');
}

?>