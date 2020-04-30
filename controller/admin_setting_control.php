<?php 

// $id_user = $_SESSION['id_users'];
$sql_select_setting = "SELECT * FROM setting WHERE id = 1";
$result_select_setting = mysqli_query($koneksi, $sql_select_setting);

if (mysqli_num_rows($result_select_setting)) {
    $data_setting = mysqli_fetch_array($result_select_setting);
    $id_setting = $data_setting['id'];
  
    if (isset($_POST['btn_simpan']) && $_POST['btn_simpan'] == 'simpan_datasetting') {
        $nama_aplikasi = $_POST['nama_aplikasi'];
        $nama_madrasah = $_POST['nama_madrasah'];
        $tahun   = $_POST['tahun'];

        if (isset($_SESSION['id_setting'])) {
            $id_setting = $_SESSION['id_setting'];

            $sql_update_setting = "UPDATE setting SET nama_aplikasi = '$nama_aplikasi', nama_madrasah = '$nama_madrasah', tahun_pelajaran = '$tahun'
                WHERE id = '$id_setting'";
            $result_update_setting = mysqli_query($koneksi, $sql_update_setting);

            if ($result_update_setting) {
                header('location:../admin/setting.php');
            } else {
                echo "Update Setting Aplikasi Gagal";
                echo "<br><br> <button type='button' onClick='history.back()'>Kembali</button>";
                die;
            }
        }

    }

} 

?> 