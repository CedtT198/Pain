<div class="row">
       <div class="col-md-3"></div>
       <div class=" col-md-6 grid-margin stretch-card">
              <div class="card">
                     <div class="card-body">
                     <h4 class="card-title">RUBRIQUE</h4>
                     <p class="card-description"></p>
                     <form class="forms-sample" action="<?php echo site_url('RubriqueController/insert'); ?>" method="post">
                            <div class="form-group">
                                   <label for="nom">Nom</label>
                                   <input type="text" class="form-control" id="nom" placeholder="nom" name="nom">
                           </div>
                     <div class="form-group">
                            <label for="unite">Unite d' Oeuvre</label>
                            <select class="form-control" id="unite" name="unite">
                                   <?php foreach ($unites as $unite) { ?>
                                          <option value="<?php echo $unite['id_unite_oeuvre']; ?>">
                                                 <?php echo $unite['nom_unite_oeuvre']; ?>
                                          </option>
                                   <?php } ?>
                            </select>
                     </div>
                     <button type="submit" class="btn btn-primary mr-2">Submit</button>
                     </form>
                     </div>
              </div>
       </div>
       <div class="col-md-3"></div>
</div>