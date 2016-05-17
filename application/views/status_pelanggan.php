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
                  <h3 class="box-title">Daftar Supir</h3>
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
                              <?php foreach ($data_pelanggan[0] as $key2 => $value2) {?>
                                  <th><?=strtoupper($key2);?></th>
                              <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                            <?php foreach ($data_pelanggan as $value) {?>
                            <tr>
                                <td><p class="blue"><?=$value['id_pemesan']?></p></td>
                                <td><p class="blue"><?=$value['nama']?></p></td>
                                <td><b><?=$value['alamat']?></b></td>
                                <td><span class="label label-info"><?=$value['no_telp']?></span></td>
                            </tr>
                            <?}?>
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <p>
                    <h3>Total <?=$total_pelanggan;?></h3>
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
