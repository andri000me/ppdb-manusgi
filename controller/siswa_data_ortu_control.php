<?php 

$id_user = $_SESSION['id_users'];
$sql_select_pendaftar = "SELECT * FROM pendaftar WHERE users_id = '$id_user'";
$result_select_pendaftar = mysqli_query($koneksi, $sql_select_pendaftar);

if (mysqli_num_rows($result_select_pendaftar)) {
    $data_pendaftar = mysqli_fetch_array($result_select_pendaftar);
    $id_pendaftar = $data_pendaftar['id'];

    $sql_select_dataortu = "SELECT * FROM data_ortu WHERE pendaftar_id = '$id_pendaftar'";
    $result_select_dataortu = mysqli_query($koneksi, $sql_select_dataortu);

    if (mysqli_num_rows($result_select_dataortu)) {
        $data_ortu = mysqli_fetch_array($result_select_dataortu);
    } else {
    }

    if (isset($_POST['btn_simpan']) && $_POST['btn_simpan'] == 'simpan_dataortu') {
        $nama_ayah = $_POST['nama_ayah'];
        $alamat_ayah = $_POST['alamat_ayah'];
        $nama_ibu = $_POST['nama_ibu'];
        $alamat_ibu = $_POST['alamat_ibu'];
        $telepon_ayah = $_POST['telepon_ayah'];
        $telepon_ibu = $_POST['telepon_ibu'];

        if (isset($_SESSION['id_dot'])) {
            $id_dataortu = $_SESSION['id_dot'];
            $sql_update_dataortu = "UPDATE data_ortu SET nama_ayah = '$nama_ayah', nama_ibu = '$nama_ibu', 
                alamat_ayah = '$alamat_ayah', alamat_ibu = '$alamat_ibu',
                telepon_ayah = '$telepon_ayah', telepon_ibu = '$telepon_ibu'
                WHERE id = '$id_dataortu'";
            $result_update_dataortu = mysqli_query($koneksi, $sql_update_dataortu);

            if ($result_update_dataortu) {
                header('location:../siswa/data_orangtua.php');
            } else {
                // echo "Error : " . mysqli_error($koneksi);
                echo "Update Data Orang Tua Gagal";
                echo "<br><br> <button type='button' onClick='history.back()'>Kembali</button>";
                die;
            }
        } else {
            $sql_insert_dataortu = "INSERT INTO data_ortu (nama_ayah, nama_ibu, alamat_ayah, alamat_ibu, telepon_ayah, telepon_ibu, pendaftar_id) VALUES 
                ('$nama_ayah', '$nama_ibu', '$alamat_ayah', '$alamat_ibu', '$telepon_ayah', '$telepon_ibu', '$id_pendaftar')";
            $result_insert_dataortu = mysqli_query($koneksi, $sql_insert_dataortu);

            if ($result_insert_dataortu) {

                $sql_insert_pendaftar = "UPDATE pendaftar SET status_dataortu = 1 WHERE id='$id_pendaftar'";
                $result_insert_pendaftar = mysqli_query($koneksi, $sql_insert_pendaftar);

                if ($result_insert_pendaftar) {
                    
                } else {
                    echo "Insert Data Orang Tua Gagal";
                    echo "<br><br> <button type='button' onClick='history.back()'>Kembali</button>";
                    die;
                }

                header('location:../siswa/data_orangtua.php');
            } else {
                // echo "Error : " . mysqli_error($koneksi);
                echo "Erro!";
                echo "<br><br> <button type='button' onClick='history.back()'>Kembali</button>";
                die;
            }
        }

    }

} 

?> 