<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Boulangerie</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/select.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
</head>
<body>
<?php $id_depa = $this->session->userdata('id_depa'); ?>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="<?php echo site_url('CentreController'); ?>">
          <img src="<?php echo base_url(); ?>assets/images/pain.png" class="mr-2" alt="logo"/>
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
              <p style="color:green">id_user : 
                <?php echo$id_depa; ?>
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
              <!-- ============ debut lien sisiny ============= -->
              <!-- ============ debut lien sisiny ============= -->
              <!-- ============ debut lien sisiny ============= -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#rubrique" aria-expanded="false" aria-controls="rubrique">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Rubrique</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="rubrique">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('RubriqueController'); ?>">Liste</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('RubriqueController/index2'); ?>">Insertion</a></li>
              </ul>
            </div>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('CentreController'); ?>">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Centre</span>
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#centre" aria-expanded="false" aria-controls="centre">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Centre</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="centre">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('CentreController'); ?>">Liste</a></li>
                <?php if ($id_depa < 5) { ?>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('DemandeBesoinController'); ?>">Demande achat</a>
                  </li>
                <?php } ?>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#unite" aria-expanded="false" aria-controls="unite">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Unité d'oeuvres</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="unite">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('UniteOeuvreController'); ?>">Liste</a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('UniteOeuvreController/index2'); ?>">Insertion</a></li> -->
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charges" aria-expanded="false" aria-controls="charges">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Charges</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charges">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ChargesController'); ?>">Liste</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('ChargesController/index2'); ?>">Insertion</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#achat" aria-expanded="false" aria-controls="achat">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Productions</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="achat">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('AchatController'); ?>">Liste</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('AchatController/index2'); ?>">insertion</a></li>
              </ul>
            </div>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#achat" aria-expanded="false" aria-controls="achat">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Productions</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="achat">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('AchatController'); ?>">Liste</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('AchatController/index2'); ?>">insertion</a></li>
              </ul>
            </div>
          </li> -->
           <?php if ($id_depa == 5) { ?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#achat" aria-expanded="false" aria-controls="achat">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Achat</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="achat">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('DemandeBesoinController/index2'); ?>">Liste de demande<br> des besoins</a></li>
              </ul>
            </div>
          </li>
          <?php } else if ($id_depa == 6) { ?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#finance" aria-expanded="false" aria-controls="finance">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Finance</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="finance">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('DemandeBonCommandeController'); ?>">Liste de bon <br> de commande  </a></li>
              </ul>
            </div>
          </li>
          <?php } else if ($id_depa == 7) { ?>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#directeur" aria-expanded="false" aria-controls="directeur">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dir. général</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="directeur">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('DemandePaiementController'); ?>">Liste demande <br>de  paiement</a></li>
              </ul>
            </div>
          </li>
          <?php } ?>
          <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#vente" aria-expanded="false" aria-controls="vente">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Vente</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="vente">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('VenteController'); ?>">Liste</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('VenteController/index2'); ?>">Insertion</a></li>
              </ul>
            </div>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#repartition" aria-expanded="false" aria-controls="repartition">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Répartition charges</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="repartition">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('RepartitionController'); ?>">Liste</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('RepartitionController/index2'); ?>">Insertion</a></li>
              </ul>
            </div>
          </li> -->
        <!-- ============ fin lien sisiny ============= -->
        <!-- ============ fin lien sisiny ============= -->
        <!-- ============ fin lien sisiny ============= -->
      </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <!-- ================== debut ampovoany  ================= -->
          <!-- ================== debut ampovoany  ================= -->
          <!-- ================== debut ampovoany  ================= -->