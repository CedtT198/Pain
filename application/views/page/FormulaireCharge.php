<div class="row">
       <div class="col-md-3"></div>
       <div class=" col-md-6 grid-margin stretch-card">
              <div class="card">
                     <div class="card-body">
                     <h4 class="card-title">CHARGE</h4>
                     <p class="card-description"></p>
                     
                     <?php if (isset($error)) { ?>
                            <p style="color:red;"><?php echo $error; ?></p>
                     <?php } ?>
                     <form class="forms-sample" action="<?php echo site_url('ChargesController/insert'); ?>" method="post">
                     <div class="form-group">
                            <label for="nature">Nature</label>
                            <select class="form-control" id="nature" name="nature">
                                   <?php foreach($natures as $nature) { ?>
                                          <option value="<?php echo $nature['id_nature']; ?>">
                                                 <?php echo $nature['nom_nature']; ?>
                                          </option>
                                   <?php } ?>
                            </select>
                     </div>
                     <div class="form-group">
                            <label for="rubrique">Rubrique</label>
                            <select class="form-control" id="rubrique" name="rubrique">
                                   <?php foreach($rubriques as $rubrique) { ?>
                                          <option value="<?php echo $rubrique['id_rubrique']; ?>">
                                                 <?php echo $rubrique['nom_rubrique']; ?>
                                          </option>
                                   <?php } ?>
                            </select>
                     </div>
                     <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" id="type" name="type">
                                   <?php foreach($types as $type) { ?>
                                          <option value="<?php echo $type['id_type_charge']; ?>">
                                                 <?php echo $type['nom_type_charge']; ?>
                                          </option>
                                   <?php } ?>
                            </select>
                     </div>
                     <div class="form-group">
                            <label for="unite">Unite</label>
                            <input type="text" class="form-control" id="unite" placeholder="00" name="unite">
                    </div>
                     <div class="form-group">
                            <label for="montant">Montant (Unitaire)</label>
                            <input type="text" class="form-control" id="montant" placeholder="00" name="montant">
                    </div>
                     <div class="form-group">
                            <label for="date">Date charge</label>
                            <input type="date" class="form-control" id="date" placeholder="00" name="date">
                    </div>
                    <br><hr><br>

                    <h4>REPARTITION (en %)</h4>
                    <div class="form-group">
                            <label for="rep_courses">Courses</label>
                            <input type="number" class="form-control" id="rep_courses" placeholder="00" name="rep_courses">
                    </div>
                    
                    <div class="form-group">
                            <label for="rep_usine">Usine</label>
                            <input type="number" class="form-control" id="rep_usine" placeholder="00" name="rep_usine">
                    </div>
                    
                    <div class="form-group">
                            <label for="rep_admin">Administration</label>
                            <input type="number" class="form-control" id="rep_admin" placeholder="00" name="rep_admin">
                    </div>
                    
                    <div class="form-group">
                            <label for="rep_livraison">Livraison</label>
                            <input type="number" class="form-control" id="rep_livraison" placeholder="00" name="rep_livraison">
                    </div>
                    
                     <button type="submit" class="btn btn-primary mr-2">Submit</button>
                     </form>
                     </div>
              </div>
       </div>
       <div class="col-md-3"></div>
</div>