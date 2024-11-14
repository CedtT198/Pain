<div class="row">
       <div class="col-md-12 grid-margin">
              <div class="row">
                     <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <div class="row">
                                   <div class="col-md-5"></div>
                                   <div class="col-md-7"><h2 class="font-weight-bold">   <small class="h2 text-muted">RESULTATS DES TESTS</small> </h2></div>
                            </div>
                     </div>
              </div>
       </div>
</div>
<div class="row">
       <div class="col-md-12">
              <div class="col-lg-12 grid-margin stretch-card">
                     <div class="card">
                            <div class="card-body">
                                   <!-- <h4 class="card-title">Liste</h4> -->
                                   <div class="table-responsive">
                                          <table class="table table-striped">
                                                 <thead>
                                                        <tr>
                                                               <th>Date de rendez vous</th>
                                                               <th>Nom</th>
                                                               <th>Prenom</th>
                                                               <th colspan="2">Note ( /20)</th>
                                                        </tr>
                                                        </thead>
                                                 <tbody>
                                                        <?php foreach ($results as $result) { ?>
                                                               <tr>
                                                                      <td class="py-1"><?php echo $result['date_resultat_test']; ?></td>
                                                                      <td><?php echo $result['nom']; ?></td>
                                                                      <td><?php echo $result['prenom']; ?></td>
                                                                      <td><?php echo $result['note']; ?></td>
                                                                      <td>
                                                                             <?php if ($result['nom'] > 10) { ?>
                                                                                    <a class="nav-link" href="<?php echo site_url('RendezVousController/index2'); ?>">
                                                                                           <button type="button" class="btn btn-outline-dark btn-fw">
                                                                                                  Appeler pour un entretien
                                                                                           </button>
                                                                                    </a>
                                                                             <?php } ?>
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