<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Fournisseur</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/select.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/mdi/css/materialdesignicons.min.css">
 
</head>
<body>
<?php $id_depa = $this->session->userdata('id_fou'); ?>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="<?php echo site_url('LoginController'); ?>">
          <img src="<?php echo base_url(); ?>assets/images/fournisseur.png" class="mr-2" alt="logo"/>
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <!-- <img src="images/faces/face28.jpg" alt="profile"/> -->
              <p style="color:green">Connected as  : 
                <?php echo $this->session->userdata('nom_fou');  ?>
              </p>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <!-- <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a> -->
              <a class="dropdown-item" href="<?php echo site_url('LoginController'); ?>">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('ListeCommandeController'); ?>">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Liste des <br>commandes</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('ListeLivraisonController'); ?>">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Liste des bons <br>de livraison</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('ReceptionController'); ?>">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Liste des bons <br>de reception</span>
            </a>
          </li>
      </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <!-- ================== debut ampovoany  ================= -->
          <!-- ================== debut ampovoany  ================= -->
          <!-- ================== debut ampovoany  ================= -->