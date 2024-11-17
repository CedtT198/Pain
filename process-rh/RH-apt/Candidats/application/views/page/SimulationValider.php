
<div class="container-scroller">
    <!-- <div class="container-fluid page-body-wrapper full-page-wrapper"> -->
        <div class="content-wrapper d-flex align-items-center auth px-0">
        <!-- <div class="row w-100 mx-0"> -->
            <div class="col-lg-6 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <h6 class="font-weight-light">Choisissez niveau de difficulté</h6>
                <?php if (isset($error)) { ?>
                    <h6 style="color:red;"><?php echo $error; ?></h6>
                    <?php } ?>
                <form class="pt-3" method="post" action="<?php echo site_url('SimulationController/begin'); ?>">
                    <div class="form-group">
                        <label for="difficulte"></label>
                        <select class="form-control" id="difficulte" name="difficulte" required>
                            <option value="10">Facile</option>
                            <option value="10">Moyen</option>
                            <option value="10">Difficile</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Commencer</button>
                    </div>
                </form>
            </div>
            </div>
        <!-- </div> -->
        </div>
        <!-- content-wrapper ends -->
    <!-- </div> -->
    <!-- page-body-wrapper ends -->
</div>