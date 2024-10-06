<div class="row">
       <div class="col-md-3"></div>
       <div class=" col-md-6 grid-margin stretch-card">
              <div class="card">
                     <div class="card-body">
                     <h4 class="card-title">REPARTITION</h4>
                     <p class="card-description"></p>
                     <form class="forms-sample" action="<?php echo site_url("RepartitionController/insert");?>" method="post">
                     <div class="form-group">
                            <label for="charge">Charges</label>
                            <select class="form-control" id="charge" name="charge">
                                   <?php foreach($charges as $charge) { ?>
                                          <option value="<?php echo $charge['id_charge']; ?>">
                                                 <?php echo $this->RubriqueModel->GetById($charge['id_rubrique'])['nom_rubrique']; ?> - 
                                                 <?php echo $charge['date_charge']; ?> - 
                                                 <?php echo $charge['montant']; ?>
                                          </option>
                                   <?php } ?>
                            </select>
                     </div>
                     <div class="form-group">
                            <label for="centre">Centre</label>
                            <select class="form-control" id="centre" name="centre">
                                   <?php foreach($centres as $centre) { ?>
                                          <option value="<?php echo $centre['id_centre']; ?>">
                                                 <?php echo $centre['nom_centre']; ?>
                                          </option>
                                   <?php } ?>
                            </select>
                     </div>
                     <div class="form-group">
                            <label for="taux">Taux</label>
                            <input type="text" class="form-control" id="taux" placeholder="00" name="taux">
                    </div>
                     <button type="submit" class="btn btn-primary mr-2">Submit</button>
                     </form><br>
                     <?php if (isset($error)) { ?>
                            <p style="color:red;"><?php echo $error; ?></p>
                     <?php } ?>
                     </div>
              </div>
       </div>
       <div class="col-md-3"></div>
</div>