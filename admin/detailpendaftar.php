<?php include('../config/auto_load.php'); ?>
<?php include('../controller/admin_detailpendaftar_control.php'); ?>

<?php include('../template/header.php'); ?>

  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <p class="h6 mb-3 text-gray-700 text-left" style="font-size: 12px;">
    <i class="fas fa-home"></i> 
    PPDB Online / <a href="dashboard.php" class="text-gray-700" >Admin</a> / <a href="detailpendaftar.php" class="text-gray-700" > Data Detail Pendaftar </a> </p>
    <!-- <hr> -->
      <div class="row">
          <!-- Data Pendaftar -->
          <div class="col-md-6">
              <div class="card mb-4">
                  <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary" style="font-size: 14px;">DATA DIRI SISWA</h6>
                  </div>
                  <div class="card-body">
                      <div class="text-center">
                          <img src="../assets/img/user.png" alt="fotoprofil" class="img-fuild rounded-circle" style="width: 200px; height:200px">
                      </div>
                      <h5 class="text-center text-gray-900 card-title mt-4 text-uppercase" style="font-size: 15px">
                      <b><?= $data_pendaftar['nama'] ?></b>
                      </h5>
                          <ul class="list-group">
                            <!-- <li class="list-group-item ">
                                <h6 class="mb-0 text-gray-900" style="font-size: 13px"><b>NISN</b></h6>
                                <medium class="text-muted"><?= $data_pendaftar['nisn'] ?></medium>
                            </li> -->
                            <li class="list-group-item ">
                                <?php 
                                    $tmpt_lahir = "";
                                    $tgl_lahir = "";
                                    if (isset($data_datadiri['tmpt_lahir']) || isset($data_datadiri['tgl_lahir'])) {
                                        $tmpt_lahir = $data_datadiri['tmpt_lahir'];
                                        $tgl_lahir = $data_datadiri['tgl_lahir'];
                                    } else {
                                        $tmpt_lahir = "TTL Belum Diisi";
                                        $tgl_lahir  = "-";
                                    }
                                ?>
                                <h6 class="mb-0 text-gray-900" style="font-size: 13px"><b>Tempat, Tanggal Lahir</b></h6>
                                <medium class="text-muted"><?= $tmpt_lahir ?>, <?= date("d-m-Y", strtotime($tgl_lahir))?></medium>
                            </li>
                            <li class="list-group-item ">
                                <?php 
                                    $jenis_kelamin = "";
                                    if (isset($data_datadiri['jenis_kelamin'])) {
                                        $jenis_kelamin = $data_datadiri['jenis_kelamin'];
                                    } else {
                                        $jenis_kelamin = "-";
                                    }
                                ?>
                                <h6  class="mb-0 text-gray-900" style="font-size: 13px"><b>Jenis Kelamin</b></h6>
                                <medium><?= $jenis_kelamin ?></medium>
                            </li>
                            <li class="list-group-item ">
                                <?php 
                                    $status_keluarga = "";
                                    if (isset($data_datadiri['status_keluarga'])) {
                                        $status_keluarga = $data_datadiri['status_keluarga'];
                                    } else {
                                        $status_keluarga = "-";
                                    }
                                ?>
                                <h6  class="mb-0 text-gray-900" style="font-size: 13px"><b>Status Dalam Keluarga</b></h6>
                                <medium><?= $status_keluarga ?></medium>
                            </li>
                            <li class="list-group-item ">
                                <?php 
                                    $anak_ke = "";
                                    if (isset($data_datadiri['anak_ke'])) {
                                        $anak_ke = $data_datadiri['anak_ke'];
                                    } else {
                                        $anak_ke = "-";
                                    }
                                ?>
                                <h6  class="mb-0 text-gray-900" style="font-size: 13px"><b>Anak Ke-</b></h6>
                                <medium><?= $anak_ke ?></medium>
                            </li>
                            <li class="list-group-item ">
                                <?php 
                                    $agama = "";
                                    if (isset($data_datadiri['agama'])) {
                                        $agama = $data_datadiri['agama'];
                                    } else {
                                        $agama = "-";
                                    }
                                ?>
                                <h6  class="mb-0 text-gray-900" style="font-size: 13px"><b>Agama</b></h6>
                                <medium> <?= $agama ?> </medium>
                            </li>
                            <li class="list-group-item ">
                                <?php 
                                    $alamat = "";
                                    if (isset($data_datadiri['alamat'])) {
                                        $alamat = $data_datadiri['alamat'];
                                    } else {
                                        $alamat = "-";
                                    }
                                ?>
                                <h6  class="mb-0 text-gray-900" style="font-size: 13px"><b>Alamat</b></h6>
                                <medium> <?= $alamat ?> </medium>
                            </li>
                            <li class="list-group-item ">
                                <h6  class="mb-0 text-gray-900" style="font-size: 13px"><b>Email</b></h6>
                                <medium><?= $data_pendaftar['email'] ?></medium>
                            </li>
                            <li class="list-group-item ">
                                <?php 
                                    $no_hp = "";
                                    if (isset($data_datadiri['no_hp'])) {
                                        $no_hp = $data_datadiri['no_hp'];
                                    } else {
                                        $no_hp = "-";
                                    }
                                ?>
                                <h6  class="mb-0 text-gray-900" style="font-size: 13px"><b>Nomor HP</b></h6>
                                <medium><?= $no_hp ?></medium>
                            </li>
                            <li class="list-group-item ">
                                <?php 
                                    $asal_madrasah = "";
                                    if (isset($data_datadiri['asal_madrasah'])) {
                                        $asal_madrasah = $data_datadiri['asal_madrasah'];
                                    } else {
                                        $asal_madrasah = "-";
                                    }
                                ?>
                                <h6  class="mb-0 text-gray-900" style="font-size: 13px"><b>Asal Madrasah / Sekolah</b></h6>
                                <medium><?= $asal_madrasah ?></medium>
                            </li>
                          </ul>
                  </div>
              </div>
          </div>
          <!-- Data Pendaftar -->
          <div class="col-md-6">
              <div class="card mb-4">
                  <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary" style="font-size: 14px;">DATA ORANG TUA SISWA</h6>
                  </div>
                  <div class="card-body">
                      <div class="text-center">
                          <img src="../assets/img/orang_tua.png" alt="fotoprofil" class="img-fuild rounded-circle" style="width: 200px; height:200px">
                      </div>
                        <div class="card-header py-3 mb-2 mt-4">
                            <h6 class="m-0 font-weight-bold text-primary" style="font-size: 14px;">DATA AYAH</h6>
                        </div>
                          <ul class="list-group">
                            <li class="list-group-item ">
                                <?php 
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

                                        if ($data_dataortu['telepon_ayah'] != NULL || $data_dataortu['telepon_ibu'] != NULL ) {
                                            $telepon_ayah = $data_dataortu['telepon_ayah'];
                                            $telepon_ibu = $data_dataortu['telepon_ibu'];
                                        } else {
                                            $telepon_ayah = "Telepon Ayah belum diisi";
                                            $telepon_ibu= "Telepon Ibu belum diisi";
                                        }
                                    } else {
                                        $nama_ayah = "-";
                                        $nama_ibu = "-";
                                        $alamat_ayah = "-";
                                        $alamat_ibu = "-";
                                        $telepon_ayah = "-";
                                        $telepon_ibu= "-";
                                    }
                                ?>
                                <h6  class="mb-0 text-gray-900" style="font-size: 13px" style="font-size: 10px;"><b>Nama Ayah</b></h6>
                                <medium><?= $nama_ayah ?></medium>
                            </li>
                            <li class="list-group-item ">
                                <h6  class="mb-0 text-gray-900" style="font-size: 13px" style="font-size: 10px;"><b>Alamat Ayah</b></h6>
                                <medium><?= $alamat_ayah ?></medium>
                            </li>
                            <li class="list-group-item ">
                                <h6  class="mb-0 text-gray-900" style="font-size: 13px" style="font-size: 10px;"><b>Nomor HP Ayah</b></h6>
                                <medium> <?= $telepon_ayah ?> </medium>
                            </li>
                          </ul>
                        <div class="card-header py-3 mb-2 mt-2">
                            <h6 class="m-0 font-weight-bold text-primary"style="font-size: 14px;"> DATA IBU</h6>
                        </div>
                          <ul class="list-group">
                            <li class="list-group-item ">
                                <h6  class="mb-0 text-gray-900" style="font-size: 13px"><b>Nama Ibu</b></h6>
                                <medium><?= $nama_ibu ?></medium>
                            </li>
                            <li class="list-group-item ">
                                <h6  class="mb-0 text-gray-900" style="font-size: 13px"><b>Alamat Ibu</b></h6>
                                <medium><?= $alamat_ibu ?></medium>
                            </li>
                            <li class="list-group-item ">
                                <h6  class="mb-0 text-gray-900" style="font-size: 13px"><b>Nomor HP Ibu</b></h6>
                                <medium> <?= $telepon_ibu ?> </medium>
                            </li>
                          </ul>
                  </div>
              </div>
              
            <!-- Modal -->
            <div class="modal fade" id="modalvalidasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="<?= $base_url ?>/admin/detailpendaftar.php?id=<?= $id_pendaftar?>" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Penilaian data pendaftar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            <!-- <a href="" class="btn btn-success mr-3">Diterima</a>
                            <a href="" class="btn btn-danger">Ditolak</a> -->
                            
                            <label for="nilai">Beri Penilaian</label>
                            <select name="nilai" id="nilai" required class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="1">Diterima</option>
                                <option value="2">Ditolak</option>
                            </select>                                          
                            </div>
                        <div class="modal-footer">
                            <button name="simpan" value="simpan_nilai" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            Simpan</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            <i class="fas fa-arrow-left"></i>
                            Cancel</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
          </div>             
      </div> 
      <div class="row justify-content-center">
              <div class="col-md-12 text-center">
                <div class="mb-4">
                    <a href="pendaftaran.php" class="btn btn-secondary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-left"></i>
                    </span>
                        <span class="text">Kembali ke halaman data pendaftar</span>
                    </a>
                </div>   
              </div>
          </div>  
    </div>
  </div>
  <!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>
