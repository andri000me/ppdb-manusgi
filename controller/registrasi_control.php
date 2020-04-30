<?php

include('../config/koneksi.php');
session_start();

if (isset($_POST['btn_registrasi'])) {
    $nama = $_POST['nama'];
    // $nisn = $_POST['nisn'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $ulangi_password = md5($_POST['ulangi_password']);


    if($password != $ulangi_password){
        $_SESSION['pesan_registrasi'] = "Password tidak sama, Masukkan kembali password Anda!";
        header('location:registrasi.php');
        die;
    }

    $sql_user = "INSERT INTO users (nama, username, password, level) VALUES ('$nama', '$email','$password','siswa')";
    $result_user = mysqli_query($koneksi, $sql_user);

    if($result_user){
        $data_user = mysqli_query($koneksi, "SELECT LAST_INSERT_ID()");
        while($u = mysqli_fetch_array($data_user)){
            $id_user = $u[0];
        }       

        $sql_pendaftar = "INSERT INTO pendaftar (nama, email, status_datadiri, status_dataortu, users_id) VALUES ('$nama', '$email', 0, 0,'$id_user')";
        $result_pendaftar = mysqli_query($koneksi, $sql_pendaftar);

        if ($result_pendaftar) {
            $_SESSION['registrasi_sukses'] = "Registrasi berhasil! Silahkan login menggunakan Email dan Password Anda!";
            header('location:../login.php');         
        } else {
            $_SESSION['registrasi_gagal'] = "Registrasi gagal!";
            header('location:../registrasi.php');     
        }

    } else {
        $_SESSION['registrasi_gagal'] = "Maaf, NISN atau Email sudah terdaftar!";
        header('location:../registrasi.php');     
        die;
    }

} else {
    header('location:../registrasi.php');
}

?>