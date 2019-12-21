<!DOCTYPE html>
<html>
<?php error_reporting(0) ?> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=0.9, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SIM OPMAWA</title>

    <link rel="icon" href="<?php echo base_url('assets/favicon.ico')?>" type="image/x-icon">
    
    <!-- Google Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css"> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
   

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url('assets/plugins/bootstrap-select/css/bootstrap-select.min.css')?>" rel="stylesheet" />

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url('assets/plugins/node-waves/waves.min.css')?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url('assets/plugins/animate-css/animate.css')?>" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="<?php echo base_url('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')?>" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="<?php echo base_url('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css')?>" rel="stylesheet" />

   <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url('assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')?>" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url('assets/css/themes/all-themes.min.css')?>" rel="stylesheet" />

    <style type="text/css">
      #round {
        border-radius: 12px;
      }

      .round_edge {
        border-radius: 12px; 
      }

      .hide_scroll::-webkit-scrollbar {
         display: none;
      }
    </style>

</head>

<body class="theme-red hide_scroll">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="CARI BERKAS...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header" style="margin-bottom: 0">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <div class="navbar-brand">Sistem Informasi Manajemen OPMAWA</div> 
 
               <?php
                    if (!isset($_SESSION['logged_in'])) {
                        Redirect(base_url('Login_C'));
                    }
                    
                ?> 

            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">3</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFIKASI</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 anggota baru bergabung</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="<?php echo base_url('Main_C/backup_database') ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">cached</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Backup SQL sekarang</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-purple">
                                                <i class="material-icons">note_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Saul menambah catatan (BINER)</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> Yesterday
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks -->             

                    
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url('assets/images/user.png')?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user_nama']; ?></div>
                    <div class="email"><?php echo $_SESSION['user_NIM']; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right" id="round">
                            <li><a href="<?php echo base_url('User_C/profil') ?>"><i class="material-icons">person</i>Profil</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url('Login_C/exeLogout') ?>"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">NAVIGASI UTAMA</li>
                    <li class="active">
                        <a href="<?php echo base_url('Main_C') ?>">
                            <i class="material-icons">home</i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('User_C/index') ?>">
                            <i class="material-icons">group</i>
                            <span>Daftar Anggota</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('Proker_C') ?>">
                            <i class="material-icons">list</i>
                            <span>Daftar Proker</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('Keuangan_c') ?>">
                            <i class="material-icons">monetization_on</i>
                            <span>Keuangan</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('Berkas_C') ?>">
                            <i class="material-icons">attach_file</i>
                            <span>Berkas</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('Rapat_C') ?>">
                            <i class="material-icons">timeline</i>
                            <span>Agenda Rapat</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">settings</i>
                            <span>Registrasi Sistem</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url('Main_C/regProdi') ?>">Registrasi Prodi</a>
                            </li>
                            <?php if ($_SESSION['user_role'] == 1) {
                              ?> 
                            <li>
                                <a href="<?php echo base_url('Main_C/regOpmawa') ?>">Registrasi Opmawa</a>
                            </li>
                            <?php } ?>
                            <li>
                                <a href="<?php echo base_url('Main_C/regPosisi') ?>">Registrasi Posisi</a>
                            </li>
                        </ul>
                    </li>
                    <?php if ($_SESSION['user_role'] == 2) { ?>
                    
                    <li class="header">Pengawasan</li>
                    <li class="active">
                        <a href="<?php echo base_url('Proker_C/proker_bem') ?>">
                            <i class="material-icons">home</i>
                            <span>Penilaian Program Kerja BEM</span>
                        </a>
                    </li>

                     <?php } ?>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="container-fluid">
             
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="settings">
                    <div class="demo-settings">
                        <p>PENGATURAN</p>
                        <ul class="setting-list">
                            <li>
                                <span>Reminder Backup</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>