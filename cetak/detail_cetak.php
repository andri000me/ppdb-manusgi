<?php

include('../config/koneksi.php');

require '../vendor/autoload.php';

// // reference the Dompdf namespace
use Dompdf\Dompdf;

// // instantiate and use the dompdf class
$dompdf = new Dompdf();

$html = '
<style>
    table, th, td {
        padding: 5px;
        vertical-align: top;
    }
</style>

<img src="../assets/img/logo.png" style="float: left; height: 60px;">

<div style="margin-left: 20px">
<div style="font-size: 18px">Data Pendaftaran Siswa Baru Tahun Pelajaran 2020/2021</div>
<div style="font-size: 20px"><b>MA NU SUNAN GIRI PRIGEN</b></div>
<div style="font-size: 12px">Dsn. Talang Ds. Watuagung Kec. Prigen Kab. Pasuruan</div>
</div>

<hr style="border-0,5px solid-black; margin:10px 5px 10px 5px">';

$id_pendaftar = $_GET['id'];
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


$tmpt_lahir = "";
$tgl_lahir = "";
$jenis_kelamin = "";
$status_keluarga = "";
$anak_ke = "";
$agama = "";
$alamat = "";
$no_hp = "";
$asal_madrasah = "";

if (isset($data_datadiri['tmpt_lahir']) || isset($data_datadiri['tgl_lahir']) || isset($data_datadiri['jenis_kelamin']) || isset($data_datadiri['status_keluarga']) 
    || isset($data_datadiri['anak_ke']) || isset($data_datadiri['agama']) || isset($data_datadiri['alamat']) || isset($data_datadiri['no_hp']) || isset($data_datadiri['asal_madrasah']) ) {
    $tmpt_lahir = $data_datadiri['tmpt_lahir'];
    $tgl_lahir = $data_datadiri['tgl_lahir'];
    $jenis_kelamin = $data_datadiri['jenis_kelamin'];
    $status_keluarga = $data_datadiri['status_keluarga'];
    $anak_ke = $data_datadiri['anak_ke'];
    $agama = $data_datadiri['agama'];
    $alamat = $data_datadiri['alamat'];
    $no_hp = $data_datadiri['no_hp'];
    $asal_madrasah = $data_datadiri['asal_madrasah'];
} else {
    $tmpt_lahir = "-";
    $tgl_lahir  = "-";
    $jenis_kelamin = "-";
    $status_keluarga = "-";
    $anak_ke = "-";
    $agama = "-";
    $alamat = "-";
    $no_hp = "-";
    $asal_madrasah = "-";
}

$sql_dataortu = "SELECT * FROM data_ortu where pendaftar_id='$id_pendaftar'";
$result_dataortu = mysqli_query($koneksi, $sql_dataortu);
$data_dataortu = mysqli_fetch_array($result_dataortu);

if (!$result_dataortu) {
    die('Query : ' . mysqli_error($koneksi));
}

$nama_ayah = "";
$nama_ibu = "";
$alamat_ayah = "";
$alamat_ayah = "";
$telepon_ayah = "";
$telepon_ibu = "";
if (isset($data_dataortu['nama_ayah']) || isset($data_dataortu['nama_ibu']) || isset($data_dataortu['alamat_ayah']) 
    || isset($data_dataortu['alamat_ibu']) || isset($data_dataortu['telepon_ayah']) || isset($data_dataortu['telepon_ibu'])) {
    $nama_ayah = $data_dataortu['nama_ayah'];
    $nama_ibu = $data_dataortu['nama_ibu'];
    $alamat_ayah = $data_dataortu['alamat_ayah'];
    $alamat_ibu = $data_dataortu['alamat_ibu'];
    $telepon_ayah = $data_dataortu['telepon_ayah'];
    $telepon_ibu = $data_dataortu['telepon_ibu'];
} else {
    $nama_ayah = "-";
    $nama_ibu = "-";
    $alamat_ayah = "-";
    $alamat_ibu = "-";
    $telepon_ayah = "-";
    $telepon_ibu= "-";
}



$html .= '
<div align="center">
    <div style="font-size: 18px">Formulir Pendaftaran Siswa Baru</div>
    <div style="font-size: 20px"><b>MA NU SUNAN GIRI PRIGEN</b></div>
    <div style="font-size: 18px">Tahun Pelajaran 2020/2021</div>
</div>
<h3>I. Data Diri Siswa</h3>
<table width="100%">
    <tr>
        <td width="30%">Nama Lengkap</td>
        <td width="1%">:</td>
        <td width="69%">'. $data_pendaftar['nama'] .'</td>
    </tr>
    <tr>
        <td>TTL</td>
        <td>:</td>
        <td>'. $tmpt_lahir .', '. date("d-m-Y", strtotime($tgl_lahir)) .'</td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>'. $jenis_kelamin .'</td>
    </tr>
    <tr>
        <td>Anak Ke-</td>
        <td>:</td>
        <td>'. $anak_ke .'</td>
    </tr>
    <tr>
        <td>Status Dalam Keluarga</td>
        <td>:</td>
        <td>'. $status_keluarga .'</td>
    </tr>
    <tr>
        <td>Agama</td>
        <td>:</td>
        <td>'. $agama .'</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>'. $alamat .'</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>:</td>
        <td>'. $data_pendaftar['email'] .'</td>
    </tr>
    <tr>
        <td>Nomor HP</td>
        <td>:</td>
        <td>'. $no_hp .'</td>
    </tr>
    <tr>
        <td>Asal Madrasah / Sekolah</td>
        <td>:</td>
        <td>'. $asal_madrasah .'</td>
    </tr>
</table>
<h3>II. Data Orang Tua Siswa</h3>
<h4>A. Identitas Ayah</h4>
<table width="100%">
    <tr>
        <td width="30%">Nama Ayah</td>
        <td width="1%">:</td>
        <td width="69%">'. $nama_ayah .'</td>
    </tr>
    <tr>
        <td width="30%">Alamat Ayah</td>
        <td width="1%">:</td>
        <td width="69%">'. $alamat_ayah .'</td>
    </tr>
    <tr>
        <td width="30%">Nomor HP Ayah</td>
        <td width="1%">:</td>
        <td width="69%">'. $telepon_ayah .'</td>
    </tr>
</table>
<h4>B. Identitas Ibu</h4>
<table width="100%">
    <tr>
        <td width="30%">Nama Ibu</td>
        <td width="1%">:</td>
        <td width="69%">'. $nama_ibu .'</td>
    </tr>
    <tr>
        <td width="30%">Alamat Ibu</td>
        <td width="1%">:</td>
        <td width="69%">'. $alamat_ibu .'</td>
    </tr>
    <tr>
        <td width="30%">Nomor HP Ibu</td>
        <td width="1%">:</td>
        <td width="69%">'. $telepon_ibu .'h</td>
    </tr>
</table>
';






$dompdf->loadHtml($html);

// // (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// // Render the HTML as PDF
$dompdf->render();

// // Output the generated PDF to Browser
// // $dompdf->stream();
$dompdf->stream("data_pendaftar.pdf", array("Attachment"=>0));


?>


