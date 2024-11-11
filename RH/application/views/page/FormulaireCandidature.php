<div class="row">
       <div class="col-md-2"></div>
       <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                     <div class="card-body">
                            <div class="row">
                                   <div class="col-md-3"></div>
                                   <div class="col-md-8">
                                          <h4 class="card-title">FORMULAIRE D'INSERTION CANDIDATURE </h4>
                                   </div>
                            </div>
                            <?php if (isset($success)) { ?>
                                   <a class="nav-link" href="<?php echo site_url('ExperienceTravailController'); ?>">
                                          <p class="card-description"><span class="text-info"><?php echo $success; ?> </span> </p>
                                   </a>
                            <?php  } ?>
                            <form class="forms-sample" method="post" action="<?php echo site_url('CandidatureController/insert'); ?>">
                                   <div class="row">
                                          <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label for="nom">Nom</label>
                                                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Votre nom">
                                                 </div>
                                          </div>
                                          <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label for="prenom">Prenom</label>
                                                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Votre prénom">
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
                                                        <label for="date_candidature">Date de candidature</label>
                                                        <input type="date" class="form-control" id="date_candidature" name="date_candidature">
                                                 </div>
                                          </div>
                                   </div>
                                   <div class="row">
                                          <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label for="id_diplome">Diplome</label>
                                                        <select class="form-control" id="id_diplome" name="id_diplome">
                                                               <?php  foreach ($diplomes as $diplome) { ?>
                                                                      <option value="<?php echo $diplome['id_diplome']; ?>">
                                                                             <?php echo $diplome['nom']; ?>
                                                                      </option>
                                                               <?php } ?>
                                                        </select>
                                                 </div>
                                          </div>
                                          <div class="col-md-6">
                                                 <div class="form-group">
                                                        <label for="id_annonce">Annonce</label>
                                                        <select class="form-control" id="id_annonce" name="id_annonce">
                                                               <?php  foreach ($annonces as $annonce) { ?>
                                                                      <option value="<?php echo $annonce['id_annonce']; ?>">
                                                                             <?php echo 'Poste : ' . $annonce['poste_nom'] . ' - Travail : ' . $annonce['travail_nom']; ?>
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
