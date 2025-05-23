<div class="row">
       <div class="col-md-12 grid-margin">
              <div class="row">
                     <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">BONS DE  COMMANDE</h3>
                            <h6 class="font-weight-normal mb-0">Liste des bon commande</h6>
                     </div>
              </div>
       </div>
</div>
<div class="row">
       <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                     <div class="card-body">
                            <p class="card-title">Liste</p>
                            <?php if (isset($error)) { ?>
                                   <p style="color:red;"><?php echo $error; ?></p>
                            <?php } ?>
                            <div class="row">
                                   <div class="col-12">
                                          <div class="table-responsive">
                                                 <table id="example" class="display expandable-table" style="width:100%">
                                                        <thead>
                                                               <tr>
                                                                      <th>Libelle</th>
                                                                      <th>Date</th>
                                                                      <th></th>
                                                               </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $id = 0;
                                                        foreach ($commandes as $com) { ?>
                                                               <tr class="odd">
                                                                      <td class="sorting_1"><?php echo $com['libelle'];?></td>
                                                                      <td><?php echo $com['date_attestation']; ?></td>
                                                                      <td><button type="button" class="btn btn-outline-warning btn-fw" onclick="toggleDetails('details<?php echo $id;?>')">Voir facture</button></td>
                                                               </tr>
                                                               <tr  id="details<?php echo $id;?>" style="display:none">   <!-- ilay tr mipoitra refa miclique details -->
                                                                      <td colspan="8">
                                                                             <table cellpadding="5" cellspacing="0" border="0" style="width:100%">
                                                                                    <tbody>
                                                                                           <tr class="expanded-row">
                                                                                                  <td colspan="8" class="row-bg">
                                                                                                         <div>
                                                                                                                <!-- <div class="d-flex justify-content-between"> -->
                                                                                                                <!-- <div class="d-flex"> -->
                                                                                                                <div class="">
                                                                                                                       <div class="row">
                                                                                                                              <div class="col-md-1"></div>
                                                                                                                              <div class="col-md-10 grid-margin stretch-card">
                                                                                                                                     <!-- <div class="card"> -->
                                                                                                                                            <div class="card-body">
                                                                                                                                                   <h4 class="card-title">Entreprise :  <code>Bakery</code></h4>
                                                                                                                                                   <div class="row">
                                                                                                                                                          <div class="col-md-7"></div>
                                                                                                                                                          <div class="col-md-5">
                                                                                                                                                                 <p class="font-weight-bold">Fournisseur : <code><?php echo $this->FournisseurModel->getById($com['id_fournisseur'])['nom_fournisseur']; ?></code>  </p>
                                                                                                                                                          </div>
                                                                                                                                                   </div>
                                                                                                                                                   <p class="font-weight-bold">Date : <code><?php echo $com['date_attestation'] ?></code></p>
                                                                                                                                                   <p class="font-weight-bold">Centre : <code><?php echo $this->CentreModel->getById($com['id_centre'])['nom_centre']; ?></code></p>
                                                                                                                                                   <div class="row">
                                                                                                                                                          <div class="col-md-12 stretch-card grid-margin">
                                                                                                                                                                 <div class="card-body">
                                                                                                                                                                        <div class="table-responsive">
                                                                                                                                                                               <table class="table table-borderless">
                                                                                                                                                                                      <!-- <thead> -->
                                                                                                                                                                                             <tr>
                                                                                                                                                                                                    <th class="pl-0  pb-2 border-bottom">Nom</th>
                                                                                                                                                                                                    <th class="border-bottom pb-2">Prix unitaire</th>
                                                                                                                                                                                                    <th class="border-bottom pb-2">Quantite</th>
                                                                                                                                                                                                    <th class="border-bottom pb-2">Total</th>
                                                                                                                                                                                             </tr>
                                                                                                                                                                                      <!-- </thead> -->
                                                                                                                                                                                      <tbody>
                                                                                                                                                                                      <?php
                                                                                                                                                                                      $total = 0;
                                                                                                                                                                                      $produits = $this->ProduitInAttestationModel->getProduitByAttestation($com['id_attestation']);
                                                                                                                                                                                      foreach($produits as $prod) { ?>
                                                                                                                                                                                             <tr>
                                                                                                                                                                                                    <td class="pl-0"><?php echo $prod['nom_produit'];?></td>
                                                                                                                                                                                                    <td class="text-muted"><?php echo $prod['montant'];?></td>
                                                                                                                                                                                                    <td class="text-muted"><?php echo $prod['quantite'];?></td>
                                                                                                                                                                                                    <td class="text-muted"><?php echo $prod['montant']*$prod['quantite'];?></td>
                                                                                                                                                                                             </tr>
                                                                                                                                                                                      <?php
                                                                                                                                                                                             $total += $prod['montant']*$prod['quantite'];
                                                                                                                                                                                      } ?>
                                                                                                                                                                                      </tbody>
                                                                                                                                                                               </table>
                                                                                                                                                                        </div>
                                                                                                                                                                 </div>
                                                                                                                                                          </div>
                                                                                                                                                   </div>
                                                                                                                                                   <div class="row">
                                                                                                                                                          <div class="col-md-7"></div>
                                                                                                                                                          <div class="col-md-5">
                                                                                                                                                                 <p class="font-weight-bold">TOTAL : <code><?php echo $total;?></code></p>
                                                                                                                                                          </div>
                                                                                                                                                   </div>
                                                                                                                                                   <div class="row">
                                                                                                                                                          <div class="col-md-3"></div>
                                                                                                                                                          <div class="col-md-2">
                                                                                                                                                                 <form action="<?php echo site_url('BonCommandeController/accept'); ?>" method="post">
                                                                                                                                                                        <input type="hidden" value="<?php echo $total; ?>" name="total_montant">
                                                                                                                                                                        <input type="hidden" value="<?php echo $com['id_attestation']; ?>" name="id">
                                                                                                                                                                        <button type="submit" class="btn btn-success btn-rounded btn-fw">Accepter</button>
                                                                                                                                                                 </form>
                                                                                                                                                          </div>
                                                                                                                                                          <div class="col-md-2">
                                                                                                                                                                 <form action="<?php echo site_url('BonCommandeController/refuse'); ?>" method="post">
                                                                                                                                                                        <input type="hidden" value="<?php echo $com['id_attestation']; ?>" name="id">
                                                                                                                                                                        <button type="submit" class="btn btn-danger btn-rounded btn-fw">Refuser</button>
                                                                                                                                                                 </form>
                                                                                                                                                          </div>
                                                                                                                                                          <div class="col-md-5  dropdown">
                                                                                                                                                                 <button type="button" class="btn btn-outline-danger" id="dropupMenuIconButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                                                                                        <i class="mdi mdi-help"></i>
                                                                                                                                                                 </button>
                                                                                                                                                                 <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton3">
                                                                                                                                                                        <h6 class="dropdown-header">A vérifier</h6>
                                                                                                                                                                        <a class="dropdown-item" href="<?php echo site_url('CaisseController'); ?>">Assurez-vous que le montant en caisse de l'entreprise est suffisant pour ces achats.</a>
                                                                                                                                                                 </div>
                                                                                                                                                          </div>
                                                                                                                                                   </div>
                                                                                                                                            </div>
                                                                                                                                     <!-- </div> -->
                                                                                                                              </div>
                                                                                                                       </div>
                                                                                                                </div>
                                                                                                         </div>
                                                                                                  </td>
                                                                                           </tr>
                                                                                    </tbody>
                                                                             </table>
                                                                      </td>
                                                               </tr>
                                                        <?php $id+= 1;
                                                        } ?>
                                                        </tbody>
                                                 </table>
                                          </div>
                                   </div>
                            </div>
                     </div>
              </div>
       </div>
</div>


<script>
       function toggleDetails(detailsId) {
              var details = document.getElementById(detailsId);
              if (details.style.display === "none") {
                     details.style.display = "table-row";
              } else {
                     details.style.display = "none";  // Utiliser table-row pour préserver la structure
              }
       }
</script>