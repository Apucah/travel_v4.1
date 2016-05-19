<?php

$this->load->view('template/head');
?>

<!--tambahkan custom css disini-->
<!-- iCheck -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/flat/blue.css') ?>" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/morris/morris.css') ?>" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-1.2.2.css') ?>" rel="stylesheet" type="text/css" />
<!-- Date Picker -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datepicker/datepicker3.css') ?>" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/daterangepicker/daterangepicker-bs3.css') ?>" rel="stylesheet" type="text/css" />
<!-- My CSS -->
<link rel="stylesheet" href="<?=base_url('assets/mycss/style.css');?>">
<!-- Featherlight CSS -->
<link rel="stylesheet" href="<?=base_url('assets/featherlight/featherlight.min.css');?>" media="screen" title="no title" charset="utf-8">
<!-- SELECT2 -->
<link rel="stylesheet" href="<?=base_url('assets/AdminLTE-2.0.5/plugins/select2/select2.css');?>" media="screen" title="no title" charset="utf-8">
<!-- JQUERY UI  -->
<link rel="stylesheet" href="<?=base_url('assets/jquery-ui/jquery-ui.min.css');?>" media="screen" title="no title" charset="utf-8">

<?php
$this->load->view('modal');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
$this->load->view('notice.php');
?>

<section class="content">
  <!-- Main content -->
  <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

<div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Daftar Pemesanan Paket</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>No Pemesanan</th>
                          <th>Nama</th>
                          <th>Nama Paket</th>
                          <th>Tgl Mulai</th>
                          <th>Tgl Pemesanan</th>
                          <th>Mobil</th>
                          <th>Harga</th>
                          <th>
                            Status
                          </th>
                          <th>
                            Aksi
                          </th>

                        </tr>
                      </thead>
                      <tbody>
                            <?php foreach ($data_pesanan_paket as $value) {?>
                            <tr id="<?=$value['no_pemesanan']?>">
                                <td><p class="blue"><?=$value['no_pemesanan']?></p></td>
                                <td><p class="blue"><?=$value['nama']?></p></td>
                                <td><b><?=$value['nama_paket']?></b></td>
                                <td><span class="label label-info"><?=$value['tgl_mulai']?></span></td>
                                <td><span class="label label-info"><?=$value['tgl_pemesanan']?></span></td>
                                <td><?=$value['nama_mobil'];?></td>
                                <td><?=$value['harga'];?></td>
                                <td>
                                  <?php
                                    if ($value['status_konfirmasi'] == '') {
                                      echo '<span class="label label-warning">Belum Dibayar</span>';
                                    }
                                    else{
                                      echo '<span class="label label-success">Dibayar</span>';
                                    }

                                  ?>
                                </td>
                                <td>
                                  <?php if ($value['status_konfirmasi'] != 1): ?>
                                      <button type="button" name="" class="konfirmasi-paket btn btn-success" data-id="<?=$value['no_pemesanan']?>">Konfirmasi</button>
                                  <?php endif; ?>
                                  <button type="button" name="" class="hapus-paket btn btn-danger" data-id="<?=$value['no_pemesanan']?>">Hapus</button>
                                </td>
                            </tr>
                            <?}?>
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <p>
                    <h3 id="total-paket">Total <?=$total_pemesan_paket;?></h3>
                  </p>
                </div><!-- /.box-footer -->
              </div>


              <div class="box box-success">
                              <div class="box-header with-border">
                                <h3 class="box-title">Daftar Pemesanan Bangku</h3>
                                <div class="box-tools pull-right">
                                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                  <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                              </div><!-- /.box-header -->
                              <div class="box-body">
                                <div class="table-responsive">
                                  <table class="table no-margin">
                                    <thead>
                                      <tr>
                                        <th>No Pemesanan</th>
                                        <th>Nama </th>
                                        <th>Jumlah Bangku</th>
                                        <th>Tujuan</th>
                                        <th>Tgl Mulai</th>
                                        <th>Tgl Pemesanan</th>
                                        <th>Nama Supir</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                          <?php foreach ($data_pesanan_bangku as $value) {?>
                                          <tr id="<?=$value['no_pemesanan']?>">
                                              <td><p class="blue"><?=$value['no_pemesanan']?></p></td>
                                              <td><p class="blue"><?=$value['nama']?></p></td>
                                              <td><b><?=$value['jumlah_bangku']?></b></td>
                                              <td><?=$value['tujuan']?></td>
                                              <td><span class="label label-info"><?=$value['tgl_mulai']?></span></td>
                                              <td><span class="label label-info"><?=$value['tgl_pemesanan'];?></span></td>
                                              <td><?=$value['nama_supir'];?></td>
                                              <td><?=$value['total'];?></td>
                                              <td>
                                                <?php
                                                  if ($value['status'] == '') {
                                                    echo '<span class="label label-warning">Belum Dibayar</span>';
                                                  }
                                                  else{
                                                    echo '<span class="label label-success">Dibayar</span>';
                                                  }

                                                ?>
                                              </td>
                                              <td>
                                                <?php if ($value['status'] != 1): ?>
                                                    <button type="button" name="" class="konfirmasi-bangku btn btn-success" data-id="<?=$value['no_pemesanan']?>">Konfirmasi</button>
                                                <?php endif; ?>
                                                <button type="button" name="" class="hapus-bangku btn btn-danger" data-id="<?=$value['no_pemesanan']?>">Hapus</button>
                                              </td>
                                          </tr>
                                          <?}?>
                                    </tbody>
                                  </table>
                                </div><!-- /.table-responsive -->
                              </div><!-- /.box-body -->
                              <div class="box-footer clearfix">
                                <p>
                                  <h3 id="total-bangku">Total <?=$total_pemesan_bangku;?></h3>
                                </p>
                              </div><!-- /.box-footer -->
                            </div>



            </div>
          </section>
        </section>
              <?php
              $this->load->view('template/js');
              ?>

              <!--tambahkan custom js disini-->
              <!-- Sparkline -->
              <script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/sparkline/jquery.sparkline.min.js') ?>" type="text/javascript"></script>
              <!-- jvectormap -->
              <script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>" type="text/javascript"></script>
              <script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>" type="text/javascript"></script>
              <!-- daterangepicker -->
              <!-- <script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/daterangepicker/daterangepicker.js') ?>" type="text/javascript"></script> -->
              <!-- datepicker -->
              <!-- <script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datepicker/bootstrap-datepicker.js') ?>" type="text/javascript"></script> -->
              <!-- iCheck -->
              <script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>
              <!-- ChartJS 1.0.1 -->
              <script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/chartjs/Chart.min.js') ?>" type="text/javascript"></script>

              <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
              <!-- <script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/pages/dashboard2.js') ?>" type="text/javascript"></script> -->

              <!-- JQUERY UI -->
              <script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js');?>" type="text/javascript"></script>

              <!-- featherlight JS -->
              <script src="<?=base_url('assets/featherlight/featherlight.min.js');?>"></script>
              <!-- SELECT2.js  -->
              <script src="<?=base_url('assets/AdminLTE-2.0.5/plugins/select2/select2.js');?>"></script>

              <!-- AdminLTE for demo purposes -->
              <!-- <script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/demo.js') ?>" type="text/javascript"></script> -->


              <?php
              $this->load->view('jquery/config');
              $this->load->view('template/foot');
              ?>
