<div class="row">
       <div class="col-md-12 grid-margin">
              <div class="row">
                     <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <div class="row">
                                   <div class="col-md-1"></div>
                                   <div class="col-md-11"><h2 class="font-weight-bold">   <small class="h2 text-muted">PERSONNELS DANS L'ENTREPRISE</small> </h2></div>
                            </div>
                     </div>
              </div>
       </div>
</div>
<div class="row">
       <!-- <div class="col-md-0"></div> -->
       <div class="col-md-12">
              <div class="col-lg-12 grid-margin stretch-card">
                     <div class="card">
                            <div class="card-body">
                                   <!-- <h4 class="card-title">Liste</h4> -->
                                   <form action="<?php echo site_url('PersonnelController/filterByCategoriePersonnel'); ?>" method="post">
                                          <div class="row">
                                                 <div class="col-md-2">
                                                        <select class="form-control form-control-sm" id="id_cat_pers" name="id_cat_pers">
                                                               <?php foreach ($categorie_personnel as $cp) { ?>
                                                                      <option value="<?php echo $cp['id_categorie_pesonnel']; ?>"><?php echo $cp['nom_categorie_pesonnel']; ?></option>
                                                               <?php } ?>
                                                        </select>     
                                                 </div>
                                                 <div class="col-md-6">
                                                        <button type="submit" class="btn btn-primary">Filtrer</button>
                                                 </div>
                                          </div>
                                   </form>
                                   <div class="table-responsive">
                                          <table class="table table-striped">
                                                 <thead>
                                                        <tr>
                                                               <th>Nom & prénom</th>
                                                               <!-- <th>Date de naissance</th> -->
                                                               <th>Poste</th>
                                                               <th>Date debut</th>
                                                               <th>Date fin</th>
                                                               <!-- <th>Type de contrat</th> -->
                                                               <th></th>
                                                               <th></th>
                                                        </tr>
                                                 </thead>
                                                 <tbody>
                                                        <?php
                                                        // var_dump($personnels);
                                                        foreach ($personnels as $personnel) { ?>
                                                               <tr>   
                                                                      <td class="py-1"><?php echo $personnel['personnel_nom'] . ' ' .$personnel['prenom']; ?></td>
                                                                      <!-- <td><?php echo $personnel['date_naissance'] ?></td> -->
                                                                      <td><?php echo $personnel['poste_nom'] ?></td>
                                                                      <td><?php echo $personnel['date_debut'] ?></td>
                                                                      <td><?php echo $personnel['date_fin'] ?></td>
                                                                      <!-- <td><?php echo $personnel['nom_type_contrat'] ?></td> -->
                                                                      <!-- <?php if ($personnel['date_renvoie'] != null) { ?> -->
                                                                             <!-- <td><p style="color:red">Renvoyé</p></td> -->
                                                                      <!-- <?php } else { ?> -->
                                                                             <!-- <td></td> -->
                                                                      <!-- <?php } ?> -->
                                                                      <td>
                                                                             <form action="<?php echo site_url('CongeController/'); ?>" method="post">
                                                                                    <div class="row">
                                                                                           <div class="col-md-6">
                                                                                                  <select class="form-control form-control-sm" id="exampleFormControlSelect3">
                                                                                                         <?php 
                                                                                                                $dates = $this->FichePaieModel->getDateDeTravail($personnel['id_personnel']);
                                                                                                                foreach ($dates as $date) {
                                                                                                         ?>
                                                                                                                <option value="<?php echo $date; ?>"><?php echo $date; ?></option>
                                                                                                         <?php } ?>
                                                                                                  </select>
                                                                                           </div>
                                                                                           <div class="col-md-6">
                                                                                                  <button type="submit" class="btn btn-light">Fiche paie</button>
                                                                                           </div>
                                                                                    </div>
                                                                             </form>
                                                                      </td>
                                                                      <td>
                                                                             <div class="row">
                                                                                    <div class="col-md-3">
                                                                                           <form action="<?php echo site_url('CongeController/index'); ?>" method="post">
                                                                                                  <input type="hidden" name="id_personnel" value="<?php echo $personnel['id_personnel']; ?>">
                                                                                                  <button type="submit" class="btn btn-warning btn-fw">Conger</button>
                                                                                           </form>
                                                                                    </div>
                                                                                    
                                                                                    <div class="col-md-3">
                                                                                           <form action="<?php echo site_url('PersonnelController/licencie'); ?>" method="post">
                                                                                                  <input type="hidden" name="id_personnel" value="<?php echo $personnel['id_personnel']; ?>">
                                                                                                  <button type="submit" class="btn btn-danger btn-fw">Licencie</button>
                                                                                           </form>
                                                                                    </div>
                                                                                    
                                                                                    <div class="col-md-3">
                                                                                           <form action="<?php echo site_url('ContratController/generatePdf'); ?>" method="post">
                                                                                                  <button type="submit" class="btn btn-dark btn-fw">Voir contrat</button>
                                                                                           </form>
                                                                                    </div>

                                                                                    <div class="col-md-3">
                                                                                           <form action="<?php echo site_url('AvenantController/generatePdf'); ?>" method="post">
                                                                                                  <button type="submit" class="btn btn-info btn-fw">Avenant</button>
                                                                                           </form>
                                                                                    </div>
                                                                             </div>
                                                                      </td>
                                                               </tr>
                                                        <?php } ?>
                                                 </tbody>
                                          </table>
                                   </div>
                            </div>
                     </div>
              </div>
       </div>
</div>
