<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- <title>AdminLTE 3 | Dashboard</title> -->
        <title><?php echo SITE_NAME; ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/summernote/summernote-bs4.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        <style>
          .pagination {
            display: inline-block;
            padding-left: 0;
            margin: 20px 0;
            border-radius: 4px;
          }
          .pagination > li {
            display: inline;
          }
          .pagination > li > a,
          .pagination > li > span {
            position: relative;
            float: left;
            padding: 6px 12px;
            margin-left: -1px;
            line-height: 1.42857143;
            color: #428bca;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ddd;
          }
          .pagination > li:first-child > a,
          .pagination > li:first-child > span {
            margin-left: 0;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
          }
          .pagination > li:last-child > a,
          .pagination > li:last-child > span {
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
          }
          .pagination > li > a:hover,
          .pagination > li > span:hover,
          .pagination > li > a:focus,
          .pagination > li > span:focus {
            color: #2a6496;
            background-color: #eee;
            border-color: #ddd;
          }
          .pagination > .active > a,
          .pagination > .active > span,
          .pagination > .active > a:hover,
          .pagination > .active > span:hover,
          .pagination > .active > a:focus,
          .pagination > .active > span:focus {
            z-index: 2;
            color: #fff;
            cursor: default;
            background-color: #428bca;
            border-color: #428bca;
          }
          .pagination > .disabled > span,
          .pagination > .disabled > span:hover,
          .pagination > .disabled > span:focus,
          .pagination > .disabled > a,
          .pagination > .disabled > a:hover,
          .pagination > .disabled > a:focus {
            color: #999;
            cursor: not-allowed;
            background-color: #fff;
            border-color: #ddd;
          }
          .pagination-lg > li > a,
          .pagination-lg > li > span {
            padding: 10px 16px;
            font-size: 18px;
          }
          .pagination-lg > li:first-child > a,
          .pagination-lg > li:first-child > span {
            border-top-left-radius: 6px;
            border-bottom-left-radius: 6px;
          }
          .pagination-lg > li:last-child > a,
          .pagination-lg > li:last-child > span {
            border-top-right-radius: 6px;
            border-bottom-right-radius: 6px;
          }
          .pagination-sm > li > a,
          .pagination-sm > li > span {
            padding: 5px 10px;
            font-size: 12px;
          }
          .pagination-sm > li:first-child > a,
          .pagination-sm > li:first-child > span {
            border-top-left-radius: 3px;
            border-bottom-left-radius: 3px;
          }
          .pagination-sm > li:last-child > a,
          .pagination-sm > li:last-child > span {
            border-top-right-radius: 3px;
            border-bottom-right-radius: 3px;
          }

        </style>
    </head>

    <body class="hold-transition sidebar-mini layout-fixed text-sm">

        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">

                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i class="fas fa-th-large"></i></a>
                    </li>
                </ul>

            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">

                <!-- Brand Logo -->
                <a href="<?php echo site_url(); ?>" class="brand-link">
                    <img src="<?php echo base_url(); ?>assets/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                    <!-- <span class="brand-text font-weight-light">AdminLTE 3</span> -->
                    <span class="brand-text"><?php echo "<b>" . SITE_NAME . "</b>"; ?></span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">

                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <!-- <img src="<?php echo base_url(); ?>assets/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
                        </div>
                        <div class="info">
                            <!-- <a href="#" class="d-block">Administrator</a> -->
                            <?php if ($this->session->userdata('fullName')) { ?>
                                <a href="#" class="d-block" ><?php echo $this->session->userdata('fullName'); ?></a>
                            <?php } ?>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                with font-awesome or any other icon font library -->
                            <!-- <li class="nav-item has-treeview menu-open"> -->

                            <!-- dashboard -->
                            <li class="nav-item">
                                <a href="<?php echo site_url(); ?>" class="nav-link <?php echo($this->uri->segment(1) == '' ? 'active' : ($this->uri->segment(1) == 'dashboard' ? 'active' : '')); ?>"> <!-- active -->
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>DASHBOARD</p>
                                </a>
                            </li>
                            <!-- /dashboard -->

                            <?php if ($this->ion_auth->logged_in()) { ?>

                            <!-- setup -->
                            <li class="nav-item has-treeview
                                <?php
                                switch ($this->uri->segment(1)) {
                                    case '_01_company':
                                    case 'user-management':
                                    case '_02_akun':
                                    case 'customer':
                                    case 'shipper':
                                    case 'vendor1':
                                    case 'armada':
                                    case 'sparepart':
                                    case 'input-tanggal-saldo-awal':
                                    case 'tanggal-saldo-awal':
                                    case 'saldo-awal':
                                    case 'package':
                                        echo 'menu-open';
                                        break;
                                    default:
                                        echo '';
                                }
                                ?>
                            ">
                                <a href="#" class="nav-link">
                                    <i class="fab fa-buffer nav-icon"></i>
                                    <p>SETUP<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <!-- perusahaan -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('_01_company'); ?>" class="nav-link <?php echo $this->uri->segment(1) == '_01_company' ? 'active' : ''; ?>">
                                            <i class="fas fa-door-open nav-icon"></i>
                                            <p>Company</p>
                                        </a>
                                    </li>
                                    <!-- user management -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('user-management'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 'user-management' ? 'active' : ''; ?>">
                                            <i class="fas fa-user-friends nav-icon"></i>
                                            <p>User Management</p>
                                        </a>
                                    </li>
                                    <div class="dropdown-divider"></div>
                                    <!-- customer -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('customer'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'customer') ? 'active' : ''; ?>">
                                            <i class="fas fa-hands-helping nav-icon"></i>
                                            <p>Customer</p>
                                        </a>
                                    </li>
                                    <!-- shipper -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('shipper'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'shipper') ? 'active' : ''; ?>">
                                            <i class="fas fa-dolly-flatbed nav-icon"></i>
                                            <p>Shipper</p>
                                        </a>
                                    </li>
                                    <!-- vendor -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('vendor1'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'vendor1') ? 'active' : ''; ?>">
                                            <i class="fas fa-user-tie nav-icon"></i>
                                            <p>Vendor</p>
                                        </a>
                                    </li>
                                    <div class="dropdown-divider"></div>
                                    <!-- armada -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('armada'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'armada') ? 'active' : ''; ?>">
                                            <i class="fas fa-truck-moving nav-icon"></i>
                                            <p>Armada</p>
                                        </a>
                                    </li>
                                    <!-- stock spare part -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('sparepart'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'sparepart') ? 'active' : ''; ?>">
                                            <i class="fas fa-drum-steelpan nav-icon"></i>
                                            <p>Spare Part</p>
                                        </a>
                                    </li>
                                    <div class="dropdown-divider"></div>
                                    <!-- klasifikasi akun -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('_02_akun'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == '_02_akun') ? 'active' : ''; ?>">
                                            <i class="fab fa-adn nav-icon"></i>
                                            <p>Chart of Account</p>
                                        </a>
                                    </li>
                                    <!-- saldo awal -->
                                    <li class="nav-item">
                                        <!-- <a href="<?php //echo site_url('saldo-awal'); ?>" class="nav-link <?php //echo ($this->uri->segment(1) == 'saldo-awal') ? 'active' : ''; ?>"> -->
                                        <a href="<?php echo site_url('input-tanggal-saldo-awal'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'input-tanggal-saldo-awal' or $this->uri->segment(1) == 'saldo-awal') ? 'active' : ''; ?>">
                                            <i class="fas fa-code-branch nav-icon"></i>
                                            <p>Saldo Awal</p>
                                        </a>
                                    </li>
                                    <!-- tgl. input saldo awal -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('tanggal-saldo-awal'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'tanggal-saldo-awal') ? 'active' : ''; ?>">
                                            <i class="fas fa-calendar-check nav-icon"></i>
                                            <p>Tgl. Input Saldo Awal</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- /setup -->

                            <li class="nav-item has-treeview
                                <?php
                                switch ($this->uri->segment(1)) {
                                    case 'sales-order':
                                    // case 'user-management':
                                    // case 'customer':
                                    // case 'shipper':
                                    // case 'vendor1':
                                    // case 'armada':
                                    // case 'sparepart':
                                    // case 'akun':
                                    // case 'input-tanggal-saldo-awal':
                                    // case 'tanggal-saldo-awal':
                                    // case 'saldo-awal':
                                    // case 'package':
                                        echo 'menu-open';
                                        break;
                                    default:
                                        echo '';
                                }
                                ?>
                            ">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-calculator nav-icon"></i>
                                    <p>TRANSAKSI<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <!-- Cost Sheet -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('s01_thaj'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's01_thaj' ? 'active' : ''; ?>">
                                            <i class="far fa-copy nav-icon"></i>
                                            <p>Cost Sheet</p>
                                        </a>
                                    </li>

                                    <!-- pembelian -->
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="fas fa-shopping-cart nav-icon"></i>
                                            <p>Pembelian<i class="right fas fa-angle-left"></i></p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <!-- Permintaan Pembelian (PR) -->
                                            <li class="nav-item">
                                                <a href="<?php echo site_url('s01_thaj'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's01_thaj' ? 'active' : ''; ?>">
                                                    <i class="far fa-edit nav-icon"></i>
                                                    <p>Permintaan Pembelian (PR)</p>
                                                </a>
                                            </li>
                                            <!-- Pesanan Pembelian (SO) -->
                                            <li class="nav-item">
                                                <a href="<?php echo site_url('s01_thaj'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's01_thaj' ? 'active' : ''; ?>">
                                                    <i class="fas fa-file-invoice nav-icon"></i>
                                                    <p>Pesanan Pembelian (PO)</p>
                                                </a>
                                            </li>
                                            <!-- Penerimaan Barang -->
                                            <li class="nav-item">
                                                <a href="<?php echo site_url('s01_thaj'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's01_thaj' ? 'active' : ''; ?>">
                                                    <i class="fas fa-people-carry nav-icon"></i>
                                                    <p>Penerimaan Barang</p>
                                                </a>
                                            </li>
                                            <!-- Retur Pembelian -->
                                            <li class="nav-item">
                                                <a href="<?php echo site_url('s01_thaj'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's01_thaj' ? 'active' : ''; ?>">
                                                    <i class="fas fa-undo nav-icon"></i>
                                                    <p>Retur Pembelian</p>
                                                </a>
                                            </li>
                                            <!-- Hutang Vendor -->
                                            <li class="nav-item">
                                                <a href="<?php echo site_url('s01_thaj'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's01_thaj' ? 'active' : ''; ?>">
                                                    <i class="fas fa-file-signature nav-icon"></i>
                                                    <p>Hutang Vendor</p>
                                                </a>
                                            </li>
                                            <!-- Pembelian Langsung -->
                                            <li class="nav-item">
                                                <a href="<?php echo site_url('s01_thaj'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's01_thaj' ? 'active' : ''; ?>">
                                                    <i class="fas fa-dolly-flatbed nav-icon"></i>
                                                    <p>Pembelian Langsung</p>
                                                </a>
                                            </li>
                                            <!-- Pembayaran Langsung -->
                                            <li class="nav-item">
                                                <a href="<?php echo site_url('s01_thaj'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's01_thaj' ? 'active' : ''; ?>">
                                                    <i class="fas fa-hand-holding-usd nav-icon"></i>
                                                    <p>Pembayaran Langsung</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <!-- <div class="dropdown-divider"></div> -->

                                    <!-- Penjualan -->
                                    <!-- <li class="nav-item has-treeview"> -->
                                    <li class="nav-item has-treeview
                                        <?php
                                        switch ($this->uri->segment(1)) {
                                            case 'sales-order':
                                            // case 'user-management':
                                            // case 'customer':
                                            // case 'shipper':
                                            // case 'vendor1':
                                            // case 'armada':
                                            // case 'sparepart':
                                            // case 'akun':
                                            // case 'input-tanggal-saldo-awal':
                                            // case 'tanggal-saldo-awal':
                                            // case 'saldo-awal':
                                            // case 'package':
                                                echo 'menu-open';
                                                break;
                                            default:
                                                echo '';
                                        }
                                        ?>
                                    ">
                                        <a href="#" class="nav-link">
                                            <i class="fas fa-chart-line nav-icon"></i>
                                            <p>Penjualan<i class="right fas fa-angle-left"></i></p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <!-- Pesanan Penjualan (SO) -->
                                            <li class="nav-item">
                                                <a href="<?php echo site_url('sales-order'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 'sales-order' ? 'active' : ''; ?>">
                                                    <i class="far fa-edit nav-icon"></i>
                                                    <p>Pesanan Penjualan (SO)</p>
                                                </a>
                                            </li>
                                            <!-- Uang Jalan / Kas Bon -->
                                            <li class="nav-item">
                                                <a href="<?php echo site_url('s01_thaj'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's01_thaj' ? 'active' : ''; ?>">
                                                    <i class="fas fa-file-invoice-dollar nav-icon"></i>
                                                    <p>Uang Jalan / Kas Bon</p>
                                                </a>
                                            </li>
                                            <!-- Validasi Uang Jalan -->
                                            <li class="nav-item">
                                                <a href="<?php echo site_url('s01_thaj'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's01_thaj' ? 'active' : ''; ?>">
                                                    <i class="far fa-check-square nav-icon"></i>
                                                    <p>Validasi Uang Jalan</p>
                                                </a>
                                            </li>
                                            <!-- Invoice Trucking -->
                                            <li class="nav-item">
                                                <a href="<?php echo site_url('s01_thaj'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's01_thaj' ? 'active' : ''; ?>">
                                                    <i class="fas fa-file-invoice nav-icon"></i>
                                                    <p>Invoice Trucking</p>
                                                </a>
                                            </li>
                                            <!-- Nota Debit -->
                                            <li class="nav-item">
                                                <a href="<?php echo site_url('s01_thaj'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's01_thaj' ? 'active' : ''; ?>">
                                                    <i class="fas fa-receipt nav-icon"></i>
                                                    <p>Nota Debit</p>
                                                </a>
                                            </li>
                                            <!-- Piutang Customer -->
                                            <li class="nav-item">
                                                <a href="<?php echo site_url('s01_thaj'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's01_thaj' ? 'active' : ''; ?>">
                                                    <i class="fas fa-file-signature nav-icon"></i>
                                                    <p>Piutang Customer</p>
                                                </a>
                                            </li>
                                            <!-- Pembayaran Piutang -->
                                            <li class="nav-item">
                                                <a href="<?php echo site_url('s01_thaj'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's01_thaj' ? 'active' : ''; ?>">
                                                    <i class="fas fa-hand-holding-usd nav-icon"></i>
                                                    <p>Pembayaran Piutang</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <!-- <div class="dropdown-divider"></div> -->

                                    <!-- Kas / Bank -->
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="fas fa-money-check nav-icon"></i>
                                            <p>Kas / Bank<i class="right fas fa-angle-left"></i></p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <!-- Kas/Bank Masuk & Keluar -->
                                            <li class="nav-item">
                                                <a href="<?php echo site_url('s01_thaj'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's01_thaj' ? 'active' : ''; ?>">
                                                    <i class="far fa-building nav-icon"></i>
                                                    <p>Kas/Bank Masuk & Keluar</p>
                                                </a>
                                            </li>
                                            <!-- jurnal umum -->
                                            <li class="nav-item">
                                                <a href="<?php echo site_url('s01_thaj'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's01_thaj' ? 'active' : ''; ?>">
                                                    <i class="far fa-newspaper nav-icon"></i>
                                                    <p>Jurnal Umum</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <!-- Perbaikan Armada -->
                                    <li class="nav-item has-treeview">
                                        <a href="#" class="nav-link">
                                            <i class="fas fa-hammer nav-icon"></i>
                                            <p>Perbaikan Armada<i class="right fas fa-angle-left"></i></p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <!-- Kas/Bank Masuk & Keluar -->
                                            <li class="nav-item">
                                                <a href="<?php echo site_url('s01_thaj'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's01_thaj' ? 'active' : ''; ?>">
                                                    <i class="far fa-edit nav-icon"></i>
                                                    <p>Permintaan Perbaikan</p>
                                                </a>
                                            </li>
                                            <!-- Pembayaran Perbaikan -->
                                            <li class="nav-item">
                                                <a href="<?php echo site_url('s01_thaj'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's01_thaj' ? 'active' : ''; ?>">
                                                    <i class="fas fa-hand-holding-usd nav-icon"></i>
                                                    <p>Pembayaran Perbaikan</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- /transaksi -->

                            <!-- laporan -->
                            <li class="nav-item has-treeview
                            <?php
                            switch ($this->uri->segment(1)) {
                                case 'buku-besar':
                                    echo 'menu-open';
                                    break;
                                default:
                                    echo '';
                            }
                            ?>
                            ">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-scroll nav-icon"></i>
                                    <p>LAPORAN<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <!-- Profit Armada -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('buku-besar'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 'buku-besar' ? 'active' : ''; ?>">
                                            <i class="fab fa-accusoft nav-icon"></i>
                                            <p>Profit Armada</p>
                                        </a>
                                    </li>
                                    <!-- Detail Armada -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('buku-besar'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 'buku-besar' ? 'active' : ''; ?>">
                                            <i class="fab fa-accusoft nav-icon"></i>
                                            <p>Detail Armada</p>
                                        </a>
                                    </li>
                                    <!-- Kartu Stok Spare Part -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('buku-besar'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 'buku-besar' ? 'active' : ''; ?>">
                                            <i class="fab fa-accusoft nav-icon"></i>
                                            <p>Kartu Stok Spare Part</p>
                                        </a>
                                    </li>
                                    <div class="dropdown-divider"></div>
                                    <!-- Hutang Vendor -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('buku-besar'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 'buku-besar' ? 'active' : ''; ?>">
                                            <i class="fab fa-accusoft nav-icon"></i>
                                            <p>Hutang Vendor</p>
                                        </a>
                                    </li>
                                    <!-- Piutang Customer -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('buku-besar'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 'buku-besar' ? 'active' : ''; ?>">
                                            <i class="fab fa-accusoft nav-icon"></i>
                                            <p>Piutang Customer</p>
                                        </a>
                                    </li>
                                    <div class="dropdown-divider"></div>
                                    <!-- buku besar -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('buku-besar'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 'buku-besar' ? 'active' : ''; ?>">
                                            <i class="fab fa-accusoft nav-icon"></i>
                                            <p>Buku Besar (Ledger)</p>
                                        </a>
                                    </li>
                                    <!-- neraca -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('s01_thaj'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's01_thaj' ? 'active' : ''; ?>">
                                            <i class="fas fa-balance-scale nav-icon"></i>
                                            <p>Neraca</p>
                                        </a>
                                    </li>
                                    <!-- laba / rugi -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('s01_thaj'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's01_thaj' ? 'active' : ''; ?>">
                                            <i class="fas fa-file-invoice-dollar nav-icon"></i>
                                            <p>Laba / Rugi</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- /laporan -->

                            <!-- utility -->
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-tools nav-icon"></i>
                                    <p>UTILITY<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <!-- backup -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('s01_thaj'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's01_thaj' ? 'active' : ''; ?>">
                                            <i class="fas fa-download nav-icon"></i>
                                            <p>Backup</p>
                                        </a>
                                    </li>
                                    <!-- restore -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('s01_thaj'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's01_thaj' ? 'active' : ''; ?>">
                                            <i class="fas fa-upload nav-icon"></i>
                                            <p>Restore</p>
                                        </a>
                                    </li>
                                    <!-- change password -->
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('change-password'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 'change-password' ? 'active' : ''; ?>">
                                            <i class="fas fa-key nav-icon"></i>
                                            <p>Change Password</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- /utility -->

                            <?php }  // end if ($this->ion_auth->logged_in()) {  ?>

                            <!-- Login or logout -->
                            <li class="nav-item">
                                <?php if ($this->session->userdata('user_id') != "") { ?>
                                    <a href="<?php echo site_url('auth/logout'); ?>" class="nav-link">
                                        <i class="fas fa-sign-out-alt nav-icon"></i>
                                        <p>LOGOUT</p>
                                    </a>
                                <?php } else { ?>
                                    <a href="<?php echo site_url('auth/login'); ?>" class="nav-link">
                                        <i class="fas fa-sign-in-alt nav-icon"></i>
                                        <p>LOGIN</p>
                                    </a>
                                <?php }?>
                            </li>
                            <!-- /Login or logout -->

                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->

                </div>
                <!-- /.sidebar -->

            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <!-- <h1 class="m-0 text-dark">Dashboard</h1> -->
                                <h1 class="m-0 text-dark"><?php echo $_caption; ?></h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <!-- <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Dashboard v1</li>
                                </ol> -->
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item">Dashboard</li>
                                    <?php foreach ($this->uri->segments as $segment): ?>
                                    <li class="breadcrumb-item"><?php echo ucfirst($segment) ?></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">

                        <?php $this->load->view($_view); ?>

                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->

            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer">
                <?php echo SITE_NAME_LONG; ?> &copy; <?php echo date('Y'); ?> created by <a href="http://selusin.online" target="_blank" title="SELARAS SOLUSINDO">SELUSIN</a>. All rights reserved. Licensed to <strong><a href="http://lts.io" target="_blank">PT. LTS</a></strong>.
                <!-- <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> -->
                <!-- All rights reserved. -->
                <div class="float-right d-none d-sm-inline-block">
                    <b>v</b> <?php echo SITE_VERSION; ?>
                </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/moment/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="<?php echo base_url(); ?>assets/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/adminlte/dist/js/adminlte.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?php echo base_url(); ?>assets/adminlte/dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>assets/adminlte/dist/js/demo.js"></script>

        <script>
        $(function () {
            $('.btn').addClass('btn-sm')
            $('.table').addClass('table-sm')
            $('.form-control').addClass('form-control-sm')
        })
        </script>

    </body>
</html>
