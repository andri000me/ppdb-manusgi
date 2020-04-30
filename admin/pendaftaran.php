<?php include('../config/auto_load.php'); ?>
<?php include('../controller/admin_pendaftaran_control.php'); ?>
<?php include('../template/header.php'); ?>


<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.8&appId=735461323279579";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <p class="h6 mb-3 text-gray-700 text-left" style="font-size: 12px;">
  <i class="fas fa-home"></i> 
  PPDB Online / <a href="dashboard.php" class="text-gray-700" >Admin</a> / <a href="pendaftaran.php" class="text-gray-700"> Data Pendaftar </a> </p>
    <!-- <hr> -->

    <div class="row">
            <div class="col-md-12">
            <!-- Data Pendaftar-->
            <div class="card mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-uppercase" style="font-size: 14px;">Data pendaftar keseluruhan</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <div class="col-md-12 mb-3" align="right">
                      <a href="<?= $base_url ?>/cetak/data_pendaftar.php" class="btn btn-primary btn-sm">
                      <i class="fas fa-download"></i>
                      Unduh Semua</a>
                    </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align="center" style="font-size: 14px;">
                      <!-- <th width="1%"><input type="checkbox" id="pilih_semua"></th> -->
                      <th width="2%">No</th>
                      <!-- <th width="3%">NISN</th> -->
                      <th width="15%">Nama</th>
                      <th width="5%">Email</th>
                      <th width="5%">Tahun Pelajaran</th>
                      <th width="8%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php

                    $no = 1;
                    $pesan = "Data belum diisi!";

                    while ($p = mysqli_fetch_array($all_pendaftar)) { ?>
                      <tr style="font-size: 14px;" id="<?php echo $rows["id"]; ?>">
                        <!-- <td align="center"><input type="checkbox" class="pgw_checkbox" data-pwg-id="<?php echo $rows["id"]; ?>"></td> -->
                        <td  align="center"><?= $no++ ?></td>
                        <!-- <td  class="text-left text-center"><?= $p['nisn'] ?></td> -->
                        <td class="text-left"><?= $p['nama'] ?></td>
                        <td class="text-left"><?= $p['email'] ?></td>
                        <td align="center"><span class="badge badge-info"><?php if(isset($data_setting['tahun_pelajaran'])) { echo $data_setting['tahun_pelajaran']; }  ?></span></td>
                        <td align="center">
                          <a href="detailpendaftar.php?id=<?= $p['id'] ?>" class="btn btn-primary btn-sm m-1">
                          <i class="fas fa-eye"></i></a>
                          <a href="<?= $base_url?>/cetak/detail_cetak.php?id=<?= $p['id'] ?>" class="btn btn-warning btn-sm m-1">
                          <i class="fas fa-download"></i></a>
                          <a href="#" class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#modalHapus_<?= $p['id'] ?>">
                          <i class="fas fa-trash-alt"></i></a>
                        </td>
                        </tr>    

                        <!-- Modal -->
                        <div class="modal fade" id="modalHapus_<?= $p['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                      </div>
                                      <div class="modal-body">
                                          <p>Anda akan menghapus data pendaftar atas nama "<?= $p['nama'] ?>",<br><b> DATA AKAN DIHAPUS PERMANEN.</b></p>                                       
                                        </div>
                                      <div class="modal-footer">
                                          <a href="<?= $base_url ?>/admin/pendaftaran.php?action=hapus&id=<?= $p['id'] ?>" class="btn btn-danger">Hapus</a>
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                      </div>
                                </div>
                            </div>
                        </div>

                    <?php } 

                    if (mysqli_num_rows($all_pendaftar) == 0) {
                      echo "<tr><td colspan='8' align='center'><b>Belum ada pendaftar baru yang masuk</b</tr>";
                    }

                    ?>
                  </tbody>
                </table>
              </div>
              <!-- <div class="col-md-2">
                <span class="baris_dipilih" id="jumlah_pilih">0 Dipilih</span>
                <a href="#" class="btn btn-danger btn-sm m-1" id="hapus_record">
                    <i class="fas fa-trash-alt"></i> Hapus</a>
              </div> -->
            </div>
          </div>
            
        </div>

    </div>

  </div>
  </div>
  <!-- /.container-fluid -->

<?php include('../template/footer.php'); ?>

