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
                                   <div class="table-responsive">
                                          <table class="table table-striped">
                                                 <thead>
                                                        <tr>
                                                               <th>Nom</th>
                                                               <th>Prenom</th>
                                                               <th>Date de naissance</th>
                                                               <th>Poste</th>
                                                               <th>Date debut</th>
                                                               <th>Date fin</th>
                                                               <th>Type de contrat</th>
                                                               <th></th>
                                                        </tr>
                                                        </thead>
                                                 <tbody>
                                                        <?php foreach ($personnels as $personnel) { ?>
                                                               <tr>   
                                                                      <td class="py-1"><?php echo $personnel['personnel_nom']; ?></td>
                                                                      <td><?php echo $personnel['prenom'] ?></td>
                                                                      <td><?php echo $personnel['date_naissance'] ?></td>
                                                                      <td><?php echo $personnel['poste_nom'] ?></td>
                                                                      <td><?php echo $personnel['date_debut'] ?></td>
                                                                      <td><?php echo $personnel['date_fin'] ?></td>
                                                                      <td><?php echo $personnel['nom_type_contrat'] ?></td>
                                                                      <?php if ($personnel['date_renvoie'] != null) { ?>
                                                                             <!-- <td><p style="color:red">Renvoyé</p></td> -->
                                                                      <?php } else { ?>
                                                                             <td></td>
                                                                      <?php } ?>
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