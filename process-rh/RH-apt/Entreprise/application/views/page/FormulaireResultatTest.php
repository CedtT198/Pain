<div class="row">
       <div class="col-md-2"></div>
       <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                     <div class="card-body">
                            <div class="row">
                                   <div class="col-md-2"></div>
                                   <div class="col-md-8">
                                          <h4 class="card-title">FORMULAIRE D'INSERTION RESULTAT DE TEST</h4>
                                   </div>
                            </div>
                            <?php if (isset($success)) { ?>
                                   <p class="card-description"><span class="text-info"><?php echo $success; ?> </span> </p>
                            <?php  } if (isset($error)) { ?>
                                   <p class="card-description"><span class="text-info"><?php echo $error; ?> </span> </p>
                            <?php  } ?>
                            <form class="forms-sample" method="post" action ="<?php echo site_url('ResultatTestController/insert'); ?>">
                                   <div class="form-group">
                                          <label for="id_test">Candidat</label>
                                          <select class="form-control" id="id_test" name="id_test"> 
                                                 <?php  foreach ($tests as $test) { ?>
                                                        <option value="<?php echo $test['id_test']; ?>">
                                                               <?php echo $test['date_test'] ; ?> - 
                                                               <?php echo $test['nom'] . ' ' . $test['prenom']; ?>
                                                        </option>
                                                 <?php } ?>
                                          </select>
                                   </div>
                                   <div class="form-group">
                                          <label for="note">Note</label>
                                          <input type="number" class="form-control" id="note" name="note" placeholder="Note">
                                   </div>
                                   <div class="form-group">
                                          <label for="date_resultat_test">Date de resultat de test</label>
                                          <input type="date" class="form-control" id="date_resultat_test" name="date_resultat_test">
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
