<div class="row">
       <div class="col-md-12 grid-margin">
              <div class="row">
                     <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <div class="row">
                                <div class="col-md-4">
                                    <form class="pt-3" method="post" action="<?php echo site_url('AnnonceController/filter'); ?>">
                                        <div class="form-group">
                                            <label for="poste">Canal</label>
                                            <select class="form-control" id="id_canal" name="id_canal" required>
                                                    <?php  foreach ($canals as $canal) { ?>
                                                            <option value="<?php echo $canal['id_canal']; ?>"><?php echo $canal['nom']; ?></option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                        <div class="mt-3">
                                            <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Filtrer</button>
                                        </div>
                                    </form><br><br>
                                </div>
                                <div class="col-md-11"><h2 class="font-weight-bold">   <small class="h2 text-muted">Liste d'annonces disponibles : <?php echo Count($annonces); ?></small> </h2></div>
                                   <?php if (isset($success)) { ?>
                                          <h6 style="color:green;"><?php echo $success; ?></h6>
                                   <?php } ?>
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
                                                               <th>Date</th>
                                                               <th>Poste recherché</th>
                                                               <th>Travail</th>
                                                               <th>Année d'expérience requise</th>
                                                               <th colspan="2">Type de contrat</th>
                                                        </tr>
                                                        </thead>
                                                 <tbody>
                                                        <?php foreach ($annonces as $annonce) { ?>
                                                               <tr>   
                                                                      <td class="py-1"><?php echo $annonce['date_annonce']; ?></td>
                                                                      <td><?php echo $annonce['poste_nom'] ?></td>
                                                                      <td><?php echo $annonce['travail_nom'] ?></td>
                                                                      <td><?php echo $annonce['duree_exp_requise'] ?></td>
                                                                      <td><?php echo $annonce['nom_type_contrat'] ?></td>
                                                                      <td>
                                                                             <form action="<?php echo site_url('AnnonceController/postule'); ?>" method="post">
                                                                                    <input type="hidden" name="id_annonce" value="<?php echo $annonce['id_annonce'] ?>">
                                                                                    <button type="submit" class="btn btn-dark mr-2">Postuler</button>
                                                                             </form>
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