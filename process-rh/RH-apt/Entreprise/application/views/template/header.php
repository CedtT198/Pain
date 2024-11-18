<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Ressources Humaines</title>
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
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="<?php echo site_url('DemandeBesoinController'); ?>">
          <img src="<?php echo base_url(); ?>assets/images/collaborer.png" class="mr-2" alt="logo"/>
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
              <!-- <p style="color:green">Connected as  : 
                <?php echo $this->session->userdata('nom_fou');  ?>
              </p> -->
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <p style="color:green">Département ressources humaines</p> 
              <!-- <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a> -->
              <!-- <a class="dropdown-item" href="<?php echo site_url('LoginController'); ?>">
                <i class="ti-power-off text-primary"></i>
                Logout -->
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
            <a class="nav-link" data-toggle="collapse" href="#demadne_besoin" aria-expanded="false" aria-controls="demadne_besoin">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Demande <br>de besoin</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="demadne_besoin">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('DemandeBesoinController/index'); ?>">Insertion</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('DemandeBesoinController/index2'); ?>">Liste</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#annonce" aria-expanded="false" aria-controls="annonce">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Annonce</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="annonce">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('AnnonceController'); ?>">Insertion</a></li>
                <!-- <?php if ($id_depa < 5) { ?> -->
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('AnnonceController/index2'); ?>">Liste avec tous les <br>candidatures</a>
                  </li>
                <!-- <?php } ?> -->
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#personnel" aria-expanded="false" aria-controls="personnel">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Personnel</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="personnel">
              <ul class="nav flex-column sub-menu">
                <!-- <li>Côté entreprise</li> -->
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('PersonnelController'); ?>">Insertion</a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('PersonnelController/index3'); ?>">Licensier</a></li> -->
                <!-- <?php if ($id_depa < 5) { ?> -->
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('PersonnelController/index2'); ?>">Liste</a>
                  </li>

                <!-- <?php } ?> -->
                <!-- <li>Côté candidat</li> -->
                <!-- <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('CandidatureController'); ?>">Candidater</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ExperienceTravailController'); ?>">Insertion <br>expériences<br>professionnelles</a></li> -->
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#resulttest" aria-expanded="false" aria-controls="resulttest">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Test</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="resulttest">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('TestController/index'); ?>">Insertion d'un test</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('TestController/index2'); ?>">Liste rendez-vous <br> test</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ResultatTestController/index'); ?>">Insertion notes</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ResultatTestController/index2'); ?>">Résultats tests</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#rendezvous" aria-expanded="false" aria-controls="rendezvous">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Rendez-vous <br>pour un entretien</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="rendezvous">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('RendezVousController'); ?>">Insertion</a></li>
                <!-- <?php if ($id_depa < 5) { ?> -->
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('RendezVousController/index2'); ?>">Liste</a>
                  </li>
                <!-- <?php } ?> -->
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#contrat" aria-expanded="false" aria-controls="contrat">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Contrat</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="contrat">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ContratController/index'); ?>">Insertion</a></li>
                <!-- <?php if ($id_depa < 5) { ?> -->
                  <!-- <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('Controller'); ?>">Liste des tests</a>
                  </li> -->
                <!-- <?php } ?> -->
              </ul>
            </div>
          </li>
      </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <!-- ================== debut ampovoany  ================= -->
          <!-- ================== debut ampovoany  ================= -->
          <!-- ================== debut ampovoany  ================= -->







