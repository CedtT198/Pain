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
                <!-- <img src="<?php echo base_url(); ?>assets/images/candidat.png" alt="logo"> -->
              </div>
              <h6 class="font-weight-light">Log in to continue.</h6>
                <?php if (isset($error)) { ?>
                    <h6 style="color:red;"><?php echo $error; ?></h6>
                  <?php } ?>
              <form class="pt-3" method="post" action="<?php echo site_url('LoginController/checkLogin'); ?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="nom" name="nom" placeholder="Nom" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="mdp" name="mdp" placeholder="Password" required>
                </div>
                <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">LOG IN</button>
                </div><br>
                <div style="text-align: center">
                    <a href="<?php echo site_url('LoginController/index2'); ?>">Pas encore de compte ?</a>
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

