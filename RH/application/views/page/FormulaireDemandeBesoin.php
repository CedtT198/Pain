<div class="row">
       <div class="col-md-2"></div>
       <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                     <div class="card-body">
                            <div class="row">
                                   <div class="col-md-3"></div>
                                   <div class="col-md-8">
                                          <h4 class="card-title">DEMANDE BESOIN </h4>
                                   </div>
                            </div>
                            <?php if (isset($success)) { ?>
                                   <p class="card-description"><span class="text-info"><?php echo $success; ?> </span> </p>
                            <?php  } if (isset($error)) { ?>
                                   <p class="card-description"><span class="text-info"><?php echo $error; ?> </span> </p>
                            <?php  } ?>
                            <form class="forms-sample" method="post" action="<?php echo site_url('DemandeBesoinController/insert'); ?>">
                                   <div class="row">
                                          <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label for="id_poste">Poste</label>
                                                        <select class="form-control" id="id_poste" name="id_poste">
                                                               <?php  foreach ($postes as $poste) { ?>
                                                                      <option value="<?php echo $poste['id_poste']; ?>">
                                                                             <?php echo $poste['nom']; ?>
                                                                      </option>
                                                               <?php } ?>
                                                        </select>
                                                 </div>
                                          </div>
                                          <!-- <div class="form-group">
                                                 <label for="date_demande">Date demande</label>
                                                 <input type="date" class="form-control" id="date_demande" name="date_demande">
                                          </div> -->
                                          <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label for="id_departement">Departement</label>
                                                        <select class="form-control" id="id_departement" name="id_departement">
                                                               <?php  foreach ($departements as $departement) { ?>
                                                                      <option value="<?php echo $departement['id_departement']; ?>">
                                                                             <?php echo $departement['nom_departement']; ?>
                                                                      </option>
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




<!-- <div class="row">
       <div class="col-md-2"></div>
       <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                     <div class="card-body">
                            <div class="row">
                                   <div class="col-md-3"></div>
                                   <div class="col-md-6">
                                          <h4 class="card-title">FORMULAIRE D'INSERTION CANDIDATURES</h4>
                                   </div>
                            </div>
                            <p class="card-description">Message :  <span class="text-info"> Candidature Enregistre ! </span> </p>
                            <form class="forms-sample">
                                   <div class="row">
                                          <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label for="exampleInputUsername1">Nom</label>
                                                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Votre nom">
                                                 </div>
                                          </div>
                                          <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label for="exampleInputUsername1">Prenom</label>
                                                        <input type="date" class="form-control" id="exampleInputUsername1" placeholder="Votre prenom">
                                                 </div>
                                          </div>
                                   </div>
                                   <div class="row">
                                          <div class="col-md-6">
                                                 <div class="form-group">
                                                               <label for="exampleInputUsername1">Date de naissance</label>
                                                               <input type="date" class="form-control" id="exampleInputUsername1" placeholder="Votre prenom">
                                                        </div>
                                                 </div>
                                          </div>
                                          <div class="col-md-6">
                                                 <div class="form-group">
                                                               <label for="exampleInputUsername1">Date de candidature</label>
                                                               <input type="date" class="form-control" id="exampleInputUsername1" placeholder="Votre prenom">
                                                        </div>
                                                 </div>
                                          </div>
                                   </div>
                                   <div class="row">
                                          <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label for="exampleSelectGender">Diplome</label>
                                                        <select class="form-control" id="exampleSelectGender">
                                                               <option>exemple 1</option>
                                                               <option>exemple 2</option>
                                                        </select>
                                                 </div>
                                          </div>
                                           <div class="col-md-6"></div> 
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
</div> -->
