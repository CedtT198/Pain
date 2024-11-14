<div class="row">
       <div class="col-md-2"></div>
       <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                     <div class="card-body">
                            <div class="row">
                                   <div class="col-md-2"></div>
                                   <div class="col-md-8">
                                          <h4 class="card-title">FORMULAIRE D'INSERTION RENDEZ-VOUS</h4>
                                   </div>
                            </div>
                            <?php if (isset($success)) { ?>
                                   <p class="card-description"><span class="text-info"><?php echo $success; ?> </span> </p>
                            <?php  } if (isset($error)) { ?>
                                   <p class="card-description"><span class="text-info"><?php echo $error; ?> </span> </p>
                            <?php  } ?>
                            <form class="forms-sample" method="post" action="<?php echo site_url('RendezVousController/insert'); ?>">
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
                                          <label for="date_rendez_vous">Date de rendez-vous</label>
                                          <input type="date" class="form-control" id="date_rendez_vous" name="date_rendez_vous">
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
