<div class="row">
       <div class="col-md-12 grid-margin">
              <div class="row">
                     <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">DEMANDE PAIEMENT</h3>
                            <h6 class="font-weight-normal mb-0">Liste de facture</h6>
                     </div>
              </div>
       </div>
</div>
<div class="row">
       <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-relative">
                     <div class="card-body">
                            <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2">
                                   <div class="carousel-inner">
                                   <div style="text-align:center">
                                          <?php if (isset($error)) { ?>
                                                 <p style="color:red;"><?php echo $error; ?></p>
                                          <?php } if (isset($success)) { ?>
                                                 <p style="color:green;"><?php echo $success; ?></p>
                                          <?php } ?>
                                   </div>
                                          <?php
                                          $id = 0;
                                          foreach ($factures as $facture) { ?>
                                                 <?php if ($id == 0) { ?>
                                                        <div class="carousel-item active">
                                                 <?php } else { ?>
                                                        <div class="carousel-item activer">
                                                 <?php } ?>


                                                        <div class="row">
                                                               <div class="col-md-1"></div>
                                                                      <div class="col-md-10 grid-margin stretch-card">
                                                                             <!-- <div class="card"> -->
                                                                                    <div class="card-body">
                                                                                           <h3>N° facture : <?php echo $facture['id_attestation'] ;?></h3>
                                                                                           <br>
                                                                                           <h4 class="card-title">Entreprise :  <code>Bakary</code></h4>
                                                                                           <div class="row">
                                                                                                  <div class="col-md-7"></div>
                                                                                                  <div class="col-md-5">
                                                                                                         <p class="font-weight-bold">Fournisseur : <code><?php echo $this->FournisseurModel->getById($facture['id_fournisseur'])['nom_fournisseur']  ;?></code></p>
                                                                                                  </div>
                                                                                           </div>
                                                                                           <p class="font-weight-bold">Date : <code><?php echo $facture['date_attestation'] ;?></code></p>
                                                                                           <p class="font-weight-bold">Centre : <code><?php echo $this->CentreModel->getById($facture['id_centre'])['nom_centre'] ;?></code></p>
                                                                                           <div class="row">
                                                                                                  <div class="col-md-12 stretch-card grid-margin">
                                                                                                         <div class="card-body">
                                                                                                                <div class="table-responsive">
                                                                                                                       <table class="table table-borderless">
                                                                                                                              <!-- <thead> -->
                                                                                                                              <tr>
                                                                                                                                     <th class="pl-0  pb-2 border-bottom">Nom</th>
                                                                                                                                     <th class="border-bottom pb-2">Quantite</th>
                                                                                                                                     <th class="border-bottom pb-2">P.U</th>
                                                                                                                                     <th class="border-bottom pb-2">Total</th>
                                                                                                                              </tr>
                                                                                                                              <!-- </thead> -->
                                                                                                                              <tbody>
                                                                                                                                     <?php 
                                                                                                                                            $total = 0;
                                                                                                                                            $produits = $this->ProduitInAttestationModel->getProduitByAttestation($facture['id_attestation']);
                                                                                                                                            foreach ($produits as $prod) {
                                                                                                                                     ?>
                                                                                                                                            <tr>
                                                                                                                                                   <td class="pl-0"><?php echo $prod['nom_produit'] ;?></td>
                                                                                                                                                   <td class="text-muted"><?php echo $prod['quantite'] ;?></td>
                                                                                                                                                   <td class="text-muted"><?php echo $prod['montant'] ;?></td>
                                                                                                                                                   <td class="text-muted"><?php echo $prod['quantite'] * $prod['montant'] ;?></td>
                                                                                                                                            </tr>
                                                                                                                                     <?php 
                                                                                                                                                   $total += $prod['montant']*$prod['quantite'];
                                                                                                                                            }
                                                                                                                                     ?>
                                                                                                                              </tbody>
                                                                                                                       </table>
                                                                                                                </div>
                                                                                                         </div>
                                                                                                  </div>
                                                                                           </div>
                                                                                           <div class="row">
                                                                                                  <div class="col-md-7"></div>
                                                                                                  <div class="col-md-5">
                                                                                                         <p class="font-weight-bold">TOTAL : <code><?php echo $total ;?></code>  </p>
                                                                                                  </div>
                                                                                           </div>
                                                                                           <?php
                                                                                           if ($facture['accepte'] != true) {
                                                                                                  if ($this->session->userdata('id_depa') == 7) { ?>
                                                                                                         <div class="row">
                                                                                                                <div class="col-md-3"></div>
                                                                                                                <div class="col-md-2">
                                                                                                                       <form action="<?php echo site_url('FactureController/accept'); ?>" method="post">
                                                                                                                              <input type="hidden" name="id_attestation" value="<?php echo $facture['id_attestation']; ?>">
                                                                                                                              <button type="submit" class="btn btn-success btn-rounded btn-fw">Accepter</button>
                                                                                                                       </form>
                                                                                                                </div>
                                                                                                                <div class="col-md-2">
                                                                                                                       <form action="<?php echo site_url('FactureController/refuse'); ?>" method="post">
                                                                                                                              <input type="hidden" name="id_attestation" value="<?php echo $facture['id_attestation']; ?>">
                                                                                                                              <button type="submit" class="btn btn-danger btn-rounded btn-fw">Refuser</button>
                                                                                                                       </form>
                                                                                                                </div>
                                                                                                         </div>
                                                                                                  <?php }  if ($this->session->userdata('id_depa') == 7 || $this->session->userdata('id_depa') == 6) { ?>
                                                                                                         <div class="col-md-4"></div>
                                                                                                         <div class="col-md-3">        
                                                                                                                <form action="<?php echo site_url('AttestationController/compare'); ?>" method="post">
                                                                                                                       <input type="hidden" name="id_attestation" value="<?php echo $facture['id_attestation']; ?>">
                                                                                                                       <button type="submit" class="btn btn-outline-success btn-fw">Comparer validité</button>
                                                                                                                </form>
                                                                                                         </div>
                                                                                                  <?php }
                                                                                           }?>
                                                                                    </div>
                                                                             <!-- </div> -->
                                                                      </div>
                                                        </div>
                                                 </div>

                                          <?php $id += 1; } ?>
                                   </div>
                                   <a class="carousel-control-prev" href="#detailedReports" role="button" data-slide="prev">
                                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                          <span class="sr-only">Previous</span>
                                   </a>
                                   <a class="carousel-control-next" href="#detailedReports" role="button" data-slide="next">
                                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                          <span class="sr-only">Next</span>
                                   </a>
                            </div>
                     </div>
              </div>
       </div>
</div>