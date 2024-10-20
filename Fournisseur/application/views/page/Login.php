<!-- <h1>ok</h1> -->

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>  
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?php echo base_url(); ?>assets/images/fournisseur.png" alt="logo">
              </div>
              <h6 class="font-weight-light">Log in to continue.</h6>
                <?php if (isset($error)) { ?>
                    <h6 style="color:red;"><?php echo $error; ?></h6>
                  <?php } ?>
              <form class="pt-3" method="post" action="<?php echo site_url('LoginController/checkLogin'); ?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Username" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">LOG IN</button>
                </div>
                <!-- <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div> -->
                <!-- <div class="mb-2"> -->
                  <!-- <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="ti-facebook mr-2"></i>Connect using facebook
                  </button>
                </div> -->
                <!-- <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
                </div> -->
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <script src="<?php echo base_url(); ?>assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/off-canvas.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/template.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/settings.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>











<div class="row">
       <div class="col-md-12 grid-margin">
              <div class="row">
                     <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">RECEPTION</h3>
                            <h6 class="font-weight-normal mb-0">Liste commande</h6>
                     </div>
              </div>
       </div>
</div>
<div class="row">
       <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                     <div class="card-body">
                            <p class="card-title">Liste</p>
                            <div class="row">
                                   <div class="col-12">
                                          <div class="table-responsive">
                                                 <table id="example" class="display expandable-table" style="width:100%">
                                                        <thead>
                                                               <tr>
                                                                      <th>Libelle</th>
                                                                      <th>Date</th>
                                                                      <th></th>
                                                               </tr>
                                                        </thead>
                                                        <tbody>
                                                               <tr class="odd">
                                                                      <td class="sorting_1"></td>
                                                                      <td>20 Octobre 2024</td>
                                                                      <td><button type="button" class="btn btn-outline-primary btn-fw" onclick="toggleDetails('details1')">Details</button></td>
                                                               </tr>
                                                               <tr  id="details1" style="display:table-row">   <!-- ilay tr mipoitra refa miclique details -->
                                                                      <td colspan="8">
                                                                             <table cellpadding="5" cellspacing="0" border="0" style="width:100%">
                                                                                    <tbody>
                                                                                           <tr class="expanded-row">
                                                                                                  <td colspan="8" class="row-bg">
                                                                                                         <div>
                                                                                                                <!-- <div class="d-flex justify-content-between"> -->
                                                                                                                <!-- <div class="d-flex"> -->
                                                                                                                <div class="">
                                                                                                                       <div class="row">
                                                                                                                              <div class="col-md-6 grid-margin stretch-card">
                                                                                                                                     <div class="card">
                                                                                                                                            <div class="card-body">
                                                                                                                                                   <h4 class="card-title">Entreprise :  <code>Bakery</code></h4>
                                                                                                                                                   <div class="row">
                                                                                                                                                          <div class="col-md-7"></div>
                                                                                                                                                          <div class="col-md-5">
                                                                                                                                                                 <p class="font-weight-bold">Fournisseur : <code>Nom_fournisseur</code>  </p>
                                                                                                                                                          </div>
                                                                                                                                                   </div>
                                                                                                                                                   <p class="font-weight-bold">Date : <code>20 Octobre 2024</code></p>
                                                                                                                                                   <p class="font-weight-bold">Centre : <code>Nom_centre</code></p>
                                                                                                                                                   <div class="row">
                                                                                                                                                          <div class="col-md-12 stretch-card grid-margin">
                                                                                                                                                                 <div class="card-body">
                                                                                                                                                                        <div class="table-responsive">
                                                                                                                                                                               <table class="table table-borderless">
                                                                                                                                                                                      <!-- <thead> -->
                                                                                                                                                                                             <tr>
                                                                                                                                                                                                    <th class="pl-0  pb-2 border-bottom">Nom</th>
                                                                                                                                                                                                    <th class="border-bottom pb-2">Prix unitaire</th>
                                                                                                                                                                                                    <th class="border-bottom pb-2">Quantite</th>
                                                                                                                                                                                                    <th class="border-bottom pb-2">Total</th>
                                                                                                                                                                                             </tr>
                                                                                                                                                                                      <!-- </thead> -->
                                                                                                                                                                                      <tbody>
                                                                                                                                                                                             <tr>
                                                                                                                                                                                                    <td class="pl-0">exemple</td>
                                                                                                                                                                                                    <td class="text-muted">exemple</td>
                                                                                                                                                                                                    <td class="text-muted">exemple</td>
                                                                                                                                                                                                    <td class="text-muted">exemple</td>
                                                                                                                                                                                             </tr>
                                                                                                                                                                                      </tbody>
                                                                                                                                                                               </table>
                                                                                                                                                                        </div>
                                                                                                                                                                 </div>
                                                                                                                                                          </div>
                                                                                                                                                   </div>
                                                                                                                                                   <div class="row">
                                                                                                                                                          <div class="col-md-7"></div>
                                                                                                                                                          <div class="col-md-5">
                                                                                                                                                                 <p class="font-weight-bold">TOTAL : <code>exemple</code></p>
                                                                                                                                                          </div>
                                                                                                                                                   </div>
                                                                                                                                            </div>
                                                                                                                                     </div>
                                                                                                                              </div>
                                                                                                                              <div class="col-md-6 grid-margin stretch-card">
                                                                                                                                     <div class="card">
                                                                                                                                            <div class="card-body">
                                                                                                                                                   <h4 class="card-title">Default form</h4>
                                                                                                                                                   <p class="card-description">
                                                                                                                                                         Basic form layout
                                                                                                                                                   </p>
                                                                                                                                                   <form class="forms-sample">
                                                                                                                                                          <div class="form-group">
                                                                                                                                                                 <label for="exampleInputUsername1">Date</label>
                                                                                                                                                                 <input type="date" class="form-control" id="exampleInputUsername1" placeholder="date">
                                                                                                                                                          </div>
                                                                                                                                                          <div class="form-group">
                                                                                                                                                                 <label for="exampleInputEmail1">Libelle</label>
                                                                                                                                                                 <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Text">
                                                                                                                                                          </div>
                                                                                                                                                          <div class="form-group">
                                                                                                                                                                 <label for="exampleInputPassword1">Centre</label>
                                                                                                                                                                 <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nom centre">
                                                                                                                                                          </div>
                                                                                                                                                          <div class="form-group">
                                                                                                                                                                 <label for="exampleInputConfirmPassword1">Produit</label>
                                                                                                                                                                 <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Nom produit">
                                                                                                                                                          </div>
                                                                                                                                                          <div class="form-group">
                                                                                                                                                                 <label for="exampleInputConfirmPassword1">Quantier</label>
                                                                                                                                                                 <input type="number" class="form-control" id="exampleInputConfirmPassword1" placeholder="00">
                                                                                                                                                          </div>
                                                                                                                                                          <div class="form-group">
                                                                                                                                                                 <label for="exampleInputConfirmPassword1">Montant</label>
                                                                                                                                                                 <input type="text" class="form-control" id="exampleInputConfirmPassword1" placeholder="00Ar">
                                                                                                                                                          </div>
                                                                                                                                                          <div class="row">
                                                                                                                                                                 <div class="col-md-3"></div>
                                                                                                                                                                 <button type="submit" class="btn btn-primary mr-2">VALIDER</button>
                                                                                                                                                                 <div class="dropdown">
                                                                                                                                                                        <button type="button" class="btn btn-outline-dark" id="dropupMenuIconButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                                                                                               <i class="mdi mdi-help-circle-outline"></i>
                                                                                                                                                                        </button>
                                                                                                                                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton3">
                                                                                                                                                                               <h6 class="dropdown-header">Settings</h6>
                                                                                                                                                                               <a class="dropdown-item" href="#">Action</a>
                                                                                                                                                                               <a class="dropdown-item" href="#">Another action</a>
                                                                                                                                                                               <a class="dropdown-item" href="#">Something else here</a>
                                                                                                                                                                               <div class="dropdown-divider"></div>
                                                                                                                                                                               <a class="dropdown-item" href="#">Separated link</a>
                                                                                                                                                                        </div>
                                                                                                                                                                 </div>
                                                                                                                                                          </div>
                                                                                                                                                   </form>
                                                                                                                                            </div>
                                                                                                                                     </div>
                                                                                                                              </div>
                                                                                                                       </div>
                                                                                                                </div>
                                                                                                         </div>
                                                                                                  </td>
                                                                                           </tr>
                                                                                    </tbody>
                                                                             </table>
                                                                      </td>
                                                               </tr>
                                                        </tbody>
                                                 </table>
                                          </div>
                                   </div>
                            </div>
                     </div>
              </div>
       </div>
</div>


<script>
       function toggleDetails(detailsId) {
              var details = document.getElementById(detailsId);
              if (details.style.display === "none") {
                     details.style.display = "table-row";
              } else {
                     details.style.display = "none";  // Utiliser table-row pour préserver la structure
              }
       }
</script>