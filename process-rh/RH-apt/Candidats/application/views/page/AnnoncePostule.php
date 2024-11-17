<div class="row">
       <div class="col-md-12 grid-margin">
              <div class="row">
                     <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <div class="row">
                                <div class="col-md-12"><h2 class="font-weight-bold">   <small class="h2 text-muted">Liste d'annonces postulés</small> </h2></div>
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
                                                               <th>Date candidature</th>
                                                               <th>Poste</th>
                                                               <th>Travail</th>
                                                               <th>Année d'expérience requise</th>
                                                               <th>Type de contrat</th>
                                                        </tr>
                                                        </thead>
                                                 <tbody>
                                                        <?php foreach ($annonces as $annonce) { ?>
                                                               <tr>   
                                                                    <td class="py-1"><?php echo $annonce['date_candidature']; ?></td>
                                                                    <td><?php echo $annonce['poste_nom'] ?></td>
                                                                    <td><?php echo $annonce['travail_nom'] ?></td>
                                                                    <td><?php echo $annonce['duree_exp_requise'] ?></td>
                                                                    <td><?php echo $annonce['nom_type_contrat'] ?></td>
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