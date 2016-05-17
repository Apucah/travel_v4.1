<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/img/admin/'.$data_user->username.'.jpg') ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?=$data_user->nama_lengkap;?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa ion-bag"></i>
                    <span> Pesan</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#" id="pesan-bangku"><i class="fa fa-circle-o text-warning"></i> Bangku</a></li>
                    <li><a href="#" id="pesan-paket"><i class="fa fa-circle-o text-warning"></i> Paket</a></li>
                </ul>
            </li>
            <li class="treeview">
              <a href="#">
                  <i class="fa fa-plus"></i>
                  <span> Tambah Item</span>
                  <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#" id="add-supir"><i class="fa fa-circle-o text-success"></i> Tambah Supir</a></li>
                <li><a href="#" id="add-mobil"><i class="fa fa-circle-o text-success"></i> Tambah Mobil</a></li>
                <li><a href="#" id="add-jenis-mobil"><i class="fa fa-circle-o text-success"></i> Tambah Jenis Mobil</a></li>
              </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fax"></i>
                    <span> Status</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=base_url('status/mobil');?>" id="pesan-bangku"><i class="fa fa-circle-o text-info"></i> Mobil</a></li>
                    <li><a href="<?=base_url('status/supir');?>" id="pesan-paket"><i class="fa fa-circle-o text-info"></i> Supir</a></li>
                    <li><a href="<?=base_url('status/pelanggan');?>" id="pesan-bangku"><i class="fa fa-circle-o text-info"></i> Pelanggan</a></li>
                    <li><a href="<?=base_url('status/pesanan');?>"><i class="fa fa-circle-o text-info"></i> Pesanan</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
