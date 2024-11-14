<div class="row">
       <div class="col-md-2"></div>
       <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                     <div class="card-body">
                            <div class="row">
                                   <div class="col-md-3"></div>
                                   <div class="col-md-6">
                                          <h4 class="card-title">FORMULAIRE D'INSERTION ANNONCE</h4>
                                   </div>
                            </div>
                            <?php if (isset($success)) { ?>
                                   <p class="card-description"><span class="text-info"><?php echo $success; ?> </span> </p>
                            <?php  } if (isset($error)) { ?>
                                   <p class="card-description"><span class="text-info"><?php echo $error; ?> </span> </p>
                            <?php  } ?>
                            <form class="forms-sample" method="post" action="<?php echo site_url('AnnonceController/insert'); ?>">
                                   <div class="row"> 
                                          <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label for="date">Date</label>
                                                        <input type="date" class="form-control" id="date" name="date">
                                                 </div>
                                          </div>
                                          <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label for="exp">Durée d'expérience requise</label>
                                                        <input type="number" class="form-control" id="exp" name="exp">
                                                 </div>
                                          </div>
                                   </div>
                                   <div class="row">
                                          <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label for="travail">Travail</label>
                                                        <select class="form-control" id="travail" name="travail">
                                                               <?php  foreach ($travails as $travail) { ?>
                                                                      <option value="<?php echo $travail['id_travail']; ?>"><?php echo $travail['nom']; ?></option>
                                                               <?php } ?>
                                                        </select>
                                                 </div>
                                          </div>
                                          <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label for="canal">Canal</label>
                                                        <select class="form-control" id="canal" name="canal">
                                                               <?php  foreach ($canals as $canal) { ?>
                                                                      <option value="<?php echo $canal['id_canal']; ?>"><?php echo $canal['nom']; ?></option>
                                                               <?php } ?>
                                                        </select>
                                                 </div>
                                          </div>
                                   </div>
                                   <div class="row">
                                          <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label for="poste">Poste</label>
                                                        <select class="form-control" id="poste" name="poste">
                                                               <?php  foreach ($postes as $poste) { ?>
                                                                      <option value="<?php echo $poste['id_poste']; ?>"><?php echo $poste['nom']; ?></option>
                                                               <?php } ?>
                                                        </select>
                                                 </div>
                                          </div>
                                          <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label for="type_contrat">Type de contrat</label>
                                                        <select class="form-control" id="type_contrat" name="type_contrat">
                                                               <?php  foreach ($type_contrats as $type_contrat) { ?>
                                                                      <option value="<?php echo $type_contrat['id_type_contrat']; ?>"><?php echo $type_contrat['nom']; ?></option>
                                                               <?php } ?>
                                                        </select>
                                                 </div>
                                          </div>
                                   </div>
                                   <div class="row">
                                          <div class="col-md-12">
                                                 <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                          </div>
                                   </div>
                            </form>
                     </div>
              </div>
       </div>
</div>
