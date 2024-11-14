<div class="row">
       <div class="col-md-2"></div>
       <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                     <div class="card-body">
                            <div class="row">
                                   <div class="col-md-2"></div>
                                   <div class="col-md-8">
                                          <h4 class="card-title">FORMULAIRE DE RENVOIE PERSONNEL</h4>
                                   </div>
                            </div>
                            <?php if (isset($success)) { ?>
                                   <p class="card-description"><span class="text-info"><?php echo $success; ?> </span> </p>
                            <?php  } if (isset($error)) { ?>
                                   <p class="card-description"><span class="text-info"><?php echo $error; ?> </span> </p>
                            <?php  } ?>
                            <form class="forms-sample" method="post" action ="<?php echo site_url('PersonnelController/renvoyer'); ?>">
                                   <div class="row">
                                          <div class="col-md-12">
                                                 <div class="form-group">
                                                        <label for="id_contrat">Personnel</label>
                                                        <select class="form-control" id="id_contrat" name="id_contrat">
                                                               <?php foreach ($personnels as $personnel) { ?>
                                                                      <option value="<?php echo $personnel['id_contrat']; ?>">
                                                                             <?php echo $personnel['personnel_nom']; ?>  
                                                                             <?php echo $personnel['prenom']; ?>  -  
                                                                             <?php echo $personnel['nom_type_contrat']; ?>  -  Fin : 
                                                                             <?php echo $personnel['date_fin']; ?>
                                                                      </option>
                                                               <?php } ?>
                                                        </select>
                                                 </div>
                                          </div>
                                   </div>
                                   <div class="row">
                                          <div class="col-md-5"></div>
                                          <div class="col-md-6">
                                                 <button type="submit" class="btn btn-primary mr-2">Renvoyer</button>
                                          </div>
                                   </div>
                            </form>
                     </div>
              </div>
       </div>
</div>
