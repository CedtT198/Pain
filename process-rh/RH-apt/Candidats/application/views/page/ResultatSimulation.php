<div class="row">
       <div class="col-md-12 grid-margin">
              <div class="row">
                     <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <div class="row">
                                <div class="col-md-12"><h2 class="font-weight-bold">   <small class="h2 text-muted">Résultats finals</small> </h2></div>
                            </div>
                     </div>
              </div>
       </div>
</div>
<div class="row">
       <div class="col-md-12">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                        <div class="card-body">
                            <h1><?php echo $this->session->userdata('nom_can');  ?> </h1>
                            <p>Score : <?php echo $score; ?> / <?php echo $nb_question; ?></p>
                            <a href="<?php echo site_url('SimulationController'); ?>">
                                <button class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn">Recommencer</button>
                            </a>
                        </div>
                </div>
             </div>
       </div>
</div>