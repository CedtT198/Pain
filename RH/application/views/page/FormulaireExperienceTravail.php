<div class="row">
       <div class="col-md-2"></div>
       <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                     <div class="card-body">
                            <div class="row">
                                   <div class="col-md-2"></div>
                                   <div class="col-md-8">
                                          <h4 class="card-title">Formulaire d'insetion d'expérience professionnelle</h4>
                                   </div>
                            </div>
                            <?php if (isset($success)) { ?>
                                   <p class="card-description"><span class="text-info"><?php echo $success; ?> </span> </p>
                            <?php  } if (isset($error)) { ?>
                                   <p class="card-description"><span class="text-info"><?php echo $error; ?> </span> </p>
                            <?php  } ?>
                            <form class="forms-sample" method="post" action ="<?php echo site_url('ExperienceTravailController/insert'); ?>">
                                   <div class="form-group">
                                          <label for="travail">Travail</label>
                                          <select class="form-control" id="travail" name="travail">
                                                 <?php  foreach ($travails as $travail) { ?>
                                                        <option value="<?php echo $travail['id_travail']; ?>"><?php echo $travail['nom']; ?></option>
                                                 <?php } ?>
                                          </select>
                                   </div>
                                   <div class="form-group">
                                          <label for="id_candidature">Candidat</label>
                                          <select class="form-control" id="id_candidature" name="id_candidature">
                                                 <?php  foreach ($candidatures as $candidature) { ?>
                                                        <option value="<?php echo $candidature['id_candidature']; ?>">
                                                               <?php echo $candidature['nom'] . ' ' . $candidature['prenom']; ?>
                                                        </option>
                                                 <?php } ?>
                                          </select>
                                   </div>
                                   <div class="form-group">
                                          <label for="exp">Duree d'experience (en année)</label>
                                          <input type="number" class="form-control" id="exp"name="exp"  placeholder="0">
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
