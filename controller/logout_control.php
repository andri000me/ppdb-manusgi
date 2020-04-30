<?php

session_start();

session_destroy();

session_start();
$_SESSION['pesan_logout'] = "Anda berhasil Logout!";
header('location:../login.php');

?>