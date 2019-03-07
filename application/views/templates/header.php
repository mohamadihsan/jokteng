<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?= $title ?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?= base_url() ?>assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?= base_url() ?>assets/demo/demo.css" rel="stylesheet" />
  <link href="<?= base_url() ?>assets/css/jquery.loading.min.css" rel="stylesheet">
  <!-- DataTables -->
  <!-- <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
  <link href="<?= base_url() ?>node_modules/datatables.net-dt/css/jquery.dataTables.min.css">
  <!-- <link href="<?= base_url() ?>node_modules/datatables.net-responsive-dt/css/responsive.dataTables.min.css"> -->
  <!-- <link href="<?= base_url() ?>node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css"> -->
  <!-- <link href="<?= base_url() ?>node_modules/datatables.net-jqui/css/dataTables.jqueryui.min.css"> -->
  <!-- Script -->
  <script src="<?= base_url() ?>assets/js/core/jquery.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
</head>

<body class="">
  <div class="wrapper ">

    <div class="sidebar" data-color="<?= !empty($_SESSION['warna_var']) ? $_SESSION['warna_var'] : NULL; ?>" data-background-color="white" data-image="<?= base_url() ?>assets/img/<?= !empty($_SESSION['gambar_var']) ? $_SESSION['gambar_var'] : NULL; ?>">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="<?= site_url() ?>" class="simple-text logo-normal">
          <?= !empty($_SESSION['nama_admin_web_var']) ? $_SESSION['nama_admin_web_var'] : NULL; ?>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <?php  
          foreach ($menu_sidebar as $menu) 
          {
            if ($this->uri->segment(1) == $menu->url_menu_var) 
            {
              $active = 'active';
            }
            else
            {
              $active = '';
            }
            ?>
            <li class="nav-item <?= $active ?>">
              <a class="nav-link" href="<?= site_url($menu->url_menu_var) ?>">
                <i class="material-icons"><?= $menu->icon_var ?></i>
                <p><?= ucwords($menu->nama_menu_var) ?></p>
              </a>
            </li>
            <?php  
          }
          ?>
          <!-- <li class="nav-item active  ">
            <a class="nav-link" href="<?= site_url('dashboard') ?>">
              <i class="material-icons">dashboard</i>
              <p>Beranda</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= site_url('profile') ?>">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./tables.html">
              <i class="material-icons">content_paste</i>
              <p>Table List</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./typography.html">
              <i class="material-icons">library_books</i>
              <p>Typography</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./icons.html">
              <i class="material-icons">bubble_chart</i>
              <p>Icons</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./map.html">
              <i class="material-icons">location_ons</i>
              <p>Maps</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./notifications.html">
              <i class="material-icons">notifications</i>
              <p>Notifications</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./rtl.html">
              <i class="material-icons">language</i>
              <p>RTL Support</p>
            </a>
          </li>
          <li class="nav-item active-pro ">
            <a class="nav-link" href="./upgrade.html">
              <i class="material-icons">unarchive</i>
              <p>Upgrade to PRO</p>
            </a>
          </li> -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo"><?= $title ?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="<?= site_url('profile') ?>">Profile</a>
                  <a class="dropdown-item" href="<?= site_url('setting') ?>">Settings</a>
                  <div class="dropdown-divider"></div>
                  <!-- <a class="dropdown-item" href="<?= site_url('logout') ?>">Log out</a> -->
                  <a class="dropdown-item" href="#" id="btn-logout">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->