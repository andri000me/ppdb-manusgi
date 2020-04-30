<?php 

$id_user = $_SESSION['id_users'];
$sql_select_pendaftar = "SELECT * FROM pendaftar WHERE users_id = '$id_user'";
$result_select_pendaftar = mysqli_query($koneksi, $sql_select_pendaftar);

if (mysqli_num_rows($result_select_pendaftar)) {
    $data_pendaftar = mysqli_fetch_array($result_select_pendaftar);
    $id_pendaftar = $data_pendaftar['id'];
    

    $sql_select_datadiri = "SELECT * FROM data_diri WHERE pendaftar_id = '$id_pendaftar'";
    $result_select_datadiri = mysqli_query($koneksi, $sql_select_datadiri);

    if (mysqli_num_rows($result_select_datadiri)) {
        $data_diri = mysqli_fetch_array($result_select_datadiri);
        // $status = $data_diri['status'];
    } else {
    }

    if (isset($_POST['btn_simpan']) && $_POST['btn_simpan'] == 'simpan_data') {
        $nama = $_POST['nama'];
        // $nisn = $_POST['nisn'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = date("Y-m-d", strtotime($_POST['tgl_lahir']));
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $agama = $_POST['agama'];
        $status = $_POST['status'];
        $anak = $_POST['anak'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];
        $asal_madrasah = $_POST['asal'];

        if (isset($_SESSION['id_dd'])) {
            $id_datadiri = $_SESSION['id_dd'];
            $sql_update_datadiri = "UPDATE data_diri SET tmpt_lahir = '$tempat_lahir', tgl_lahir = '$tanggal_lahir', jenis_kelamin = '$jenis_kelamin', status_keluarga = '$status', anak_ke = '$anak', agama = '$agama', alamat = '$alamat',
                no_hp = '$telepon', asal_madrasah = '$asal_madrasah'
                WHERE id = '$id_datadiri'";
            $result_update_datadiri = mysqli_query($koneksi, $sql_update_datadiri);

            if ($result_update_datadiri) {
                $_SESSION['datadiri_sukses'] = 'Simpan Data Diri Berhasil';
                header('location:../siswa/data_diri.php');
            } else {
                echo "Update Data Diri Gagal";
                echo "<br><br> <button type='button' onClick='history.back()'>Kembali</button>";
                die;
            }

            $sql_update_pendaftar = "UPDATE pendaftar SET nama = '$nama', email = '$email'
                WHERE id = (SELECT pendaftar_id FROM data_diri WHERE id = '$id_datadiri')";
            $result_update_pendaftar = mysqli_query($koneksi, $sql_update_pendaftar);

            if ($result_update_pendaftar) {
                header('location:../siswa/data_diri.php');
            } else {
                echo "Update Data Diri Gagal";
                echo "<br><br> <button type='button' onClick='history.back()'>Kembali</button>";
                die;
            }

        } else {
            $sql_insert_datadiri = "INSERT INTO data_diri (tmpt_lahir, tgl_lahir, jenis_kelamin, status_keluarga, anak_ke, agama, alamat, no_hp, asal_madrasah, pendaftar_id) VALUES 
                ('$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$status', '$anak', '$agama', '$alamat', '$telepon', '$asal_madrasah', '$id_pendaftar')";
            $result_insert_datadiri = mysqli_query($koneksi, $sql_insert_datadiri);

            if ($result_insert_datadiri) {

                $sql_insert_pendaftar = "UPDATE pendaftar SET status_datadiri = 1 WHERE id='$id_pendaftar'";
                $result_insert_pendaftar = mysqli_query($koneksi, $sql_insert_pendaftar);

                if ($result_insert_pendaftar) {
                    
                } else {
                    echo "Insert Data Diri Gagal";
                    echo "<br><br> <button type='button' onClick='history.back()'>Kembali</button>";
                    die;
                }

                header('location:../siswa/data_diri.php');
            } else {
                echo "Error";
                echo "<br><br> <button type='button' onClick='history.back()'>Kembali</button>";
                die;
            }
        }

    }

} 

?>