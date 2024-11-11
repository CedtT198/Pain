<div class="row">
       <div class="col-md-2"></div>
       <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                     <div class="card-body">
                            <div class="row">
                                   <div class="col-md-2"></div>
                                   <div class="col-md-8">
                                          <h4 class="card-title">FORMULAIRE D'INSERTION PERSONNEL</h4>
                                   </div>
                            </div>
                            <?php if (isset($success)) { ?>
                                   <p class="card-description"><span class="text-info"><?php echo $success; ?> </span> </p>
                            <?php  } if (isset($error)) { ?>
                                   <p class="card-description"><span class="text-info"><?php echo $error; ?> </span> </p>
                            <?php  } ?>
                            <form class="forms-sample" method="post" action ="<?php echo site_url('PersonnelController/insert'); ?>">
                                   <div class="row">
                                          <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label for="nom">Nom</label>
                                                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
                                                 </div>
                                          </div>
                                          <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label for="prenom">Prenom</label>
                                                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
                                                 </div>
                                          </div>
                                   </div>
                                   <div class="row">
                                          <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label for="date_naissance">Date de naissance</label>
                                                        <input type="date" class="form-control" id="date_naissance" name="date_naissance">
                                                 </div>
                                          </div>
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
                                   </div>
                                   <div class="row">
                                          <div class="col-md-5"></div>
                                          <div class="col-md-6">
                                                 <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                          </div>
                                   </div>
                            </form>
                     </div>
              </div>
       </div>
</div>
