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
        font-size: 12px;
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
    }

</style>

<img src="../assets/img/logo.png" style="float: left; height: 60px;">

<div style="margin-left: 20px">
    <div style="font-size: 18px">Data Pendaftaran Siswa Baru Tahun Pelajaran 2020/2021</div>
    <div style="font-size: 20px"><b>MA NU SUNAN GIRI PRIGEN</b></div>
    <div style="font-size: 12px">Dsn. Talang Ds. Watuagung Kec. Prigen Kab. Pasuruan</div>
</div>

<hr style="border-0,5px solid-black; margin:10px 5px 10px 5px">

<div stlye="font-size: 12px; margin-left: 10px;">&nbsp;
Tanggal Cetak: '. date("d-m-Y").'
</div>

<table width="100%">
<tr>
    <th width="3%">No</th>
    <th width="30%">Nama Lengkap</th>
    <th width="8%">Jenis Kelamin</th>
    <th>Alamat</th>
    <th width="20%">Asal Madrasah</th>
</tr>';

$all_pendaftar = "SELECT pendaftar.*, data_diri.* FROM pendaftar, data_diri WHERE pendaftar.id=data_diri.pendaftar_id ORDER BY nama";
$result_all_pendaftar = mysqli_query($koneksi, $all_pendaftar);

$no = 1;

while ($p = mysqli_fetch_array($result_all_pendaftar) ) {
    $jk = "";
    if ($p['jenis_kelamin'] == "Laki-laki") {
        $jk = "L";
    } else {
        $jk = "P";
    }


$html .= '

        <tr>
            <td align="center">'. $no++ .'</td>
            <td align="left">'. $p['nama'].'</td>
            <td align="center">'. $jk.'</td>
            <td>'. $p['alamat'].'</td>
            <td align="center">'. $p['asal_madrasah'].'</td>
        </tr>';
}

$html .= '</table>';





$dompdf->loadHtml($html);

// // (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// // Render the HTML as PDF
$dompdf->render();

// // Output the generated PDF to Browser
// // $dompdf->stream();
$dompdf->stream("data_pendaftar.pdf", array("Attachment"=>0));


?>




