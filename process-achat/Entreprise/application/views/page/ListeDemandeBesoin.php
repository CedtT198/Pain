<div class="row">
       <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                     <div class="card-body">
                            <h4 class="card-title">LISTE DEMANDE BESOIN</h4>
                            <p class="card-description">
                                   <!-- Demande par <code>course</code> -->
                            </p>
                            <?php if (isset($error)) { ?>
                                   <p style="color:red;"><?php echo $error; ?></p>
                            <?php }if (isset($success)) { ?>
                                   <p style="color:green;"><?php echo $success; ?></p>
                            <?php } ?>
                            
                            <div class="dropdown">
                                   <button type="button" class="btn btn-outline-danger" id="dropupMenuIconButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <i class="mdi mdi-help"></i>
                                   </button>
                                   <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton3">
                                          <h6 class="dropdown-header">A vérifier</h6>
                                          <a class="dropdown-item" href="<?php echo site_url('StockController'); ?>">Vérifier la quantité de stock restant du produit demandé.</a>
                                   </div>
                            </div>
                            <div class="table-responsive">
                                   <table class="table table-striped">
                                          <thead>
                                                 <tr>
                                                        <th>Date de demande</th>
                                                        <th>Centre</th>
                                                        <th>Description</th>
                                                        <th>Produit</th>
                                                        <th>Quantite</th>
                                                 </tr>
                                          </thead>
                                          <tbody>
                                                 <?php foreach($demandes as $dem) { ?>
                                                        <tr>
                                                               <td>
                                                                      <?php echo $this->CentreModel->getById($dem['id_centre'])['nom_centre']; ?>
                                                               </td>
                                                               <td><?php echo $dem['date_demande']; ?></td>
                                                               <td><?php echo $dem['description']; ?></td>
                                                               <td>
                                                                      <?php echo $this->ProduitModel->getById($dem['id_produit'])['nom_produit']; ?>
                                                               </td>
                                                               <td><?php echo $dem['quantite']; ?></td>
                                                               <td>
                                                                      <form action="<?php echo site_url('DemandeBesoinController/accept'); ?>" method="post">
                                                                             <input type="hidden" value="<?php echo $dem['id_produit']; ?>" name="id_produit">
                                                                             <input type="hidden" value="<?php echo $dem['quantite']; ?>" name="quantite">
                                                                             <input type="hidden" value="<?php echo $dem['id_demande_besoin']; ?>" name="id">
                                                                             <input type="hidden" value="<?php echo $dem['date_demande']; ?>" name="date">
                                                                             <input type="hidden" value="<?php echo $dem['id_centre']; ?>" name="id_centre">
                                                                             <button type="submit" class="btn btn-inverse-success btn-fw">Accepter</button>
                                                                      </form>
                                                               </td>
                                                               <td>
                                                                      <form action="<?php echo site_url('DemandeBesoinController/refuse'); ?>" method="post">
                                                                             <input type="hidden" value="<?php echo $dem['id_demande_besoin']; ?>" name="id">
                                                                             <input type="hidden" value="<?php echo $dem['quantite']; ?>" name="quantite">
                                                                             <button type="submit" class="btn btn-inverse-danger btn-fw">Refuser</button>
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