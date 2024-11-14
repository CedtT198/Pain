<div class="row">
       <div class="col-md-12 grid-margin">
              <div class="row">
                     <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <div class="row">
                                   <div class="col-md-1"></div>
                                   <div class="col-md-11"><h2 class="font-weight-bold">   <small class="h2 text-muted">DEMANDES DE BESOINS</small> </h2></div>
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
                                                               <th>Date demande</th>
                                                               <th>Nom du département</th>
                                                               <th colspan="2">Poste demandée</th>
                                                        </tr>
                                                        </thead>
                                                 <tbody>
                                                        <?php foreach ($demandes as $demande) { ?>
                                                               <tr>   
                                                                      <td class="py-1"><?php echo $demande['date_demande']; ?></td>
                                                                      <td><?php echo $demande['nom_departement'] ?></td>
                                                                      <td><?php echo $demande['nom'] ?></td>
                                                                      <td>
                                                                             <a class="nav-link" href="<?php echo site_url('AnnonceController/index'); ?>">
                                                                                    <button type="button" class="btn btn-outline-dark btn-fw">
                                                                                           Faire une annonce
                                                                                    </button>
                                                                             </a>
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