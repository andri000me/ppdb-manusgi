<?php

$id_pendaftar = $_GET['id'];
// $sql_pendaftar = "SELECT pendaftar.*, data_diri.*, data_ortu.* FROM pendaftar, data_diri, data_ortu  where pendaftar.id='$id_pendaftar' and data_diri.pendaftar_id='$id_pendaftar' ";
$sql_pendaftar = "SELECT * FROM pendaftar where id='$id_pendaftar'";
$result_pendaftar = mysqli_query($koneksi, $sql_pendaftar);
$data_pendaftar = mysqli_fetch_array($result_pendaftar);
 
if (!$result_pendaftar) {
    die('Query : ' . mysqli_error($koneksi));
}

$sql_datadiri = "SELECT * FROM data_diri where pendaftar_id='$id_pendaftar'";
$result_datadiri = mysqli_query($koneksi, $sql_datadiri);
$data_datadiri = mysqli_fetch_array($result_datadiri);

if (!$result_datadiri) {
    die('Query : ' . mysqli_error($koneksi));
}

$sql_dataortu = "SELECT * FROM data_ortu where pendaftar_id='$id_pendaftar'";
$result_dataortu = mysqli_query($koneksi, $sql_dataortu);
$data_dataortu = mysqli_fetch_array($result_dataortu);

if (!$result_dataortu) {
    die('Query : ' . mysqli_error($koneksi));
}
  

?>