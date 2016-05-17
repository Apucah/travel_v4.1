</head>
<body class="skin-black">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <a href="<?=base_url();?>" class="logo"><b>Tour</b> Travel</a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="<?=base_url();?>status/pesanan" class="dropdown-toggle">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="label label-success"><?=$total_order;?></span>
                            </a>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span class="label label-warning"><?=$total_supir;?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header"><?=$total_supir-1;?> Total Supir, 1 Supir Baru</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> <?=$supir[0]->nama_supir?>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="<?=base_url();?>status/supir">Lihat Semua Supir</a></li>
                            </ul>
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bus"></i>
                                <span class="label label-danger"><?=$total_mobil;?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header"><?=$total_mobil-1?> Total Mobil, 1 Mobil Baru</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                          <li>
                                              <a href="#">
                                                  <i class="fa fa-bus text-aqua">&nbsp&nbsp <b><?=$mobil_tersedia[0]->plat_mobil;?></b> - <?=$mobil_tersedia[0]->nama_mobil;?></i>
                                              </a>
                                          </li>
                                      </ul>
                                </li>
                                <li class="footer">
                                    <a href="<?=base_url();?>status/mobil">Lihat Semua Mobil</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/img/admin/'.$data_user->username.'.jpg') ?>" class="user-image" alt="User Image"/>
                                <span class="hidden-xs"><?=$data_user->nama_lengkap;?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/img/admin/'.$data_user->username.'.jpg') ?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?=$data_user->nama_lengkap;?>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                  <div class="col-xs-12 text-center">
                                      <a href="<?php echo site_url('auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                  </div>
                                </li>
                                <!-- Menu Footer-->
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->
