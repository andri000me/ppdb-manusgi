<?php include('../config/auto_load.php'); ?>
<?php include('../controller/admin_setting_control.php'); ?>

<?php include('../template/header.php'); ?>

  <!-- Begin Page Content -->
  <div class="container-fluid">


    <?php 
        if(isset($data_setting)) {
            $id_setting = $data_setting['id'];
            // echo "<input type='hidden' name='id_data$id_datadiri' value='$id_datadiri'>";
            $_SESSION['id_setting'] = $id_setting;
        } else {
            // echo "insert nilai";
        }                            
    ?> 

    <!-- Page Heading -->
    <p class="h6 mb-3 text-gray-700 text-left" style="font-size: 12px;">
    <i class="fas fa-home"></i> 
    PPDB Online / <a href="dashboard.php" class="text-gray-700" >Admin</a> / <a href="setting.php" class="text-gray-700" > Setting Aplikasi </a> </p>
    <!-- <hr> -->
    <form class="user mb-4" method="POST" action="<?= $base_url ?>/admin/setting.php" enctype="multipart/form-data">
        <div class="col-md-12">
            <div class="row">
                <!-- Data Nilai -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary" style="font-size: 12px;">SETTING APLIKASI</h6>
                        </div>
                        <div class="card-body">
                                                       
                            <form class="user" method="POST" action="<?= $base_url ?>/admin/setting.php">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nama_aplikasi" style="font-size: 12px;">Nama Aplikasi</label>
                                                <input type="text" name="nama_aplikasi" class="form-control form-control" 
                                                id="nama_aplikasi" placeholder="Nama Aplikasi" style="font-size: 12px;"
                                                value="<?php if(isset($data_setting['nama_aplikasi'])) { echo $data_setting['nama_aplikasi']; }  ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_madrasah" style="font-size: 12px;">Nama Madrasah</label>
                                                <input type="text" name="nama_madrasah" class="form-control form-control" 
                                                id="nama_madrasah" placeholder="Nama Madrasah" style="font-size: 12px;"
                                                value="<?php if(isset($data_setting['nama_madrasah'])) { echo $data_setting['nama_madrasah']; } ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="tahun" style="font-size: 12px;">Tahun Pelajaran</label>
                                                <input type="text" name="tahun" class="form-control form-control" 
                                                id="tahun" placeholder="Tahun Pelajaran" style="font-size: 12px;"
                                                value="<?php if(isset($data_setting['tahun_pelajaran'])) { echo $data_setting['tahun_pelajaran']; } ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="text-left">
                                        <button type="submit" name="btn_simpan" value="simpan_datasetting"  class="btn btn-sm btn-success">
                                        <i class="fas fa-save"></i>
                                        Simpan </button>
                                        <a href="dashboard.php" class="btn btn-sm btn-danger" name="kembali">
                                        <i class="fas fa-arrow-left"></i>
                                        Kembali</a>
                                    </div>  
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </form>
    </div>
  </div>
  <!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>
