<?php

$this->load->view('template/head');
?>

<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/chartjs/Chart.min.js') ?>" type="text/javascript"></script>


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


<!-- Main content -->
<section class="content">
  <!-- Main content -->
  <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                  <div class="inner">
                      <h3><?=$total_order;?></h3>
                      <p>Pemesanan</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-bag"></i>
                  </div>
                  <a href="<?base_url();?>status/pesanan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div><!-- ./col -->
          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                  <div class="inner">
                      <h3><?=$total_pelanggan;?><sup style="font-size: 18px"> orang</sup></h3>
                      <p>Pelanggan</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="<?=base_url();?>status/pelanggan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div><!-- ./col -->
          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                  <div class="inner">
                      <h3><?=$total_supir;?><sup style="font-size: 18px"> orang</sup></h3>
                      <p>Supir</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-person-add"></i>
                  </div>
                  <a href="status/supir" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div><!-- ./col -->
          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                  <div class="inner">
                      <h3><?=$total_mobil;?><sup style="font-size: 18px"> buah</sup></h3>
                      <p>Mobil</p>
                  </div>
                  <div class="icon">
                      <i class="fa fa-car"></i>
                  </div>
                  <a href="status/mobil" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div><!-- ./col -->
      </div><!-- /.row -->
      <!-- Main row -->


      <div class="row">
          <div class="col-md-12">
              <div class="box">
                  <div class="box-header with-border">
                      <h3 class="box-title">Laporan Rekap Bulanan</h3>
                      <div class="box-tools pull-right">
                          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                      <div class="row">
                          <div class="col-md-12">
                              <p class="text-center">
                                  <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                              </p>
                              <div class="chart-responsive text-center">
                                  <!-- Sales Chart Canvas -->
                                  <canvas id="salesChart" height="180"></canvas>
                              </div><!-- /.chart-responsive -->
                          </div><!-- /.col -->
                      </div><!-- /.row -->
                  </div><!-- ./box-body -->
                  <div class="box-footer">
                      <div class="row">
                          <div class="col-sm-3 col-xs-6">
                              <div class="description-block border-right">
                                  <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> </span>
                                  <h5 class="description-header">Rp. <?=$pendapatan['total']?></h5>
                                  <span class="description-text">Total Pendapatan</span>
                              </div><!-- /.description-block -->
                          </div><!-- /.col -->
                          <div class="col-sm-3 col-xs-6">
                              <div class="description-block border-right">
                                  <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> </span>
                                  <h5 class="description-header">Rp. <?=$pendapatan['total_bulan_ini']?></h5>
                                  <span class="description-text">Total Pendapatan Bu  lan Ini</span>
                              </div><!-- /.description-block -->
                          </div><!-- /.col -->
                          <div class="col-sm-3 col-xs-6">
                              <div class="description-block border-right">
                                  <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> </span>
                                  <h5 class="description-header">Rp. <?=$pendapatan['total_bulan_lalu'];?></h5>
                                  <span class="description-text">Total Pendapatan Bulan Lalu</span>
                              </div><!-- /.description-block -->
                          </div><!-- /.col -->
                          <div class="col-sm-3 col-xs-6">
                              <div class="description-block">
                                  <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> </span>
                                  <h5 class="description-header"><?=$pendapatan['persentase']?> %</h5>
                                  <span class="description-text">Persentase Kenaikan</span>
                              </div><!-- /.description-block -->
                          </div>
                      </div><!-- /.row -->
                  </div><!-- /.box-footer -->
              </div><!-- /.box -->
          </div><!-- /.col -->
      </div><!-- /.row -->


    <div class='row'>

        <div class='col-md-4'>
            <!-- USERS LIST -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Daftar Admin</h3>
                    <div class="box-tools pull-right">
                        <span class="label label-danger">8 Admin</span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <ul class="users-list clearfix">
                      <?php foreach ($admin_list as $admin) {?>
                        <li>
                            <img src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/img/admin/'.$admin->username.'.jpg') ?>" alt="User Image"/>
                            <a class="users-list-name" href="#"><?=$admin->nama_lengkap;?></a>
                            <span class="users-list-date">Today</span>
                        </li>
                      <?php } ?>


                    </ul><!-- /.users-list -->
                </div><!-- /.box-body -->
            </div><!--/.box -->
        </div><!-- /.col -->
        <div class="col-md-4">
            <!-- PRODUCT LIST -->
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Jadwal Kerja Supir</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <ul class="products-list product-list-in-box">
                      <?php foreach ($jadwal_supir as $jadwal_supir): ?>
                        <li class="item">
                            <div class="product-img">
                                <img src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/img/default-50x50.gif') ?>" alt="Product Image"/>
                            </div>
                            <div class="product-info">
                                <a href="javascript::;" class="product-title"><b><?=$jadwal_supir->nama_supir;?></b> <span class="label label-info pull-right">Kerja</span></a>
                            </div>
                        </li><!-- /.item -->
                      <?php endforeach; ?>
                    </ul>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a href="status/supir" class="btn btn-sm btn-default btn-flat pull-right">Lihat Semua Supir</a>
                </div><!-- /.box-footer -->
            </div><!-- /.box -->
        </div><!-- /.col -->
        <div class="col-md-4">
            <!-- TABLE: LATEST ORDERS -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Daftar Mobil Tersedia</h3>
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
                                    <th>Plat Mobil</th>
                                    <th>Nama Mobil</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($mobil_tersedia as $value) { ?>
                                <tr>
                                    <td><?=$value->plat_mobil;?></td>
                                    <td><?=$value->nama_mobil;?></td>
                                    <td><span class="label label-success"><?=$value->status;?></span></td>
                                </tr>
                              <?php } ?>

                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a href="status/mobil" class="btn btn-sm btn-default btn-flat pull-right">Lihat Semua Mobil</a>
                </div><!-- /.box-footer -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row">





</section><!-- /.content -->



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

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/pages/dashboard2.js') ?>" type="text/javascript"></script>


<!-- JQUERY UI -->
<script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js');?>" type="text/javascript"></script>

<!-- featherlight JS -->
<script src="<?=base_url('assets/featherlight/featherlight.min.js');?>"></script>
<!-- SELECT2.js  -->
<script src="<?=base_url('assets/AdminLTE-2.0.5/plugins/select2/select2.js');?>"></script>

<!-- AdminLTE for demo purposes -->
<!-- <script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/demo.js') ?>" type="text/javascript"></script> -->


<?php
// $this->load->view('jquery/chart-config');
$this->load->view('jquery/config');
$this->load->view('jquery/chart-config');
$this->load->view('template/foot');
?>
