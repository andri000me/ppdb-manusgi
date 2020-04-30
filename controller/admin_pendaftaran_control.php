<?php

// $all_pendaftar = mysqli_query($koneksi, "SELECT pendaftar.*, data_diri.*,data_ortu.* FROM pendaftar, data_diri, data_ortu WHERE pendaftar.id = data_diri.pendaftar_id");
// $all_pendaftar = mysqli_query($koneksi, "SELECT pendaftar.*, data_diri.* FROM pendaftar, data_diri WHERE pendaftar.id = data_diri.pendaftar_id");
$all_pendaftar = mysqli_query($koneksi, "SELECT * FROM pendaftar");


//cek hasil
if (!$all_pendaftar) {
    die('Query error : ' . mysqli_error($koneksi));
}

if(isset($_POST['pwg_id'])) {
	$pwg_id = trim($_POST['pwg_id']);
	// $sql = "DELETE FROM pegawai WHERE id in ($pwg_id)";
	// $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
    $query_pendaftar = mysqli_query($koneksi, "SELECT * FROM pendaftar WHERE id in ($pwg_id)");
    echo $pwg_id;
}

if (isset($_GET['action']) && $_GET['action'] == 'hapus') {
    $id_pendaftar = $_GET['id'];
    $query_pendaftar = mysqli_query($koneksi, "SELECT * FROM pendaftar WHERE id='$id_pendaftar'");
    if (mysqli_num_rows($query_pendaftar)) {
        
        $data_pendaftar = mysqli_fetch_array($query_pendaftar);
        $id_user = $data_pendaftar['users_id'];

        //Hapus Data Diri
        $sql_hapus_datadiri = mysqli_query($koneksi, "DELETE FROM data_diri WHERE pendaftar_id = '$id_pendaftar'");
        
        //Hapus Foto pendaftar (unlink = mengahapus file)
        unlink('../uploads/' . $data_pendaftar['foto']);

        $sql_hapus_pendaftar = mysqli_query($koneksi, "DELETE FROM pendaftar WHERE id = '$id_pendaftar'");

        // Hapus Data Ortu
        $sql_hapus_dataortu = mysqli_query($koneksi, "DELETE FROM data_ortu WHERE pendaftar_id = '$id_pendaftar'");

        //Hapus di tabel user
        $sql_hapus_user = mysqli_query($koneksi, "DELETE FROM users WHERE id = '$id_user'");

        if (!$sql_hapus_datadiri || !$sql_hapus_dataortu || !$sql_hapus_pendaftar || !$sql_hapus_user) {
            die('Query error: ' . mysqli_error($koneksi));
        } else{
            // Simpan session
            $_SESSION['hapus_sukses'] = "Data pendaftar berhasil dihapus!";
            header('location:../admin/pendaftaran.php');
        }       
    } else {
        die('Data pendaftar tidak ditemukan!');
    }
}

?>