<?php

// $all_pendaftar = mysqli_query($koneksi, "SELECT * FROM pendaftar, data_diri WHERE pendaftar.id = data_diri.pendaftar_id AND data_diri.status = 1");
$all_pendaftar = mysqli_query($koneksi, "SELECT * FROM pendaftar");

//cek hasil
if (!$all_pendaftar) {
    die('Query error : ' . mysqli_error($koneksi));

}

?>