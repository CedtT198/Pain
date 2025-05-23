<div class="row">
       <div class="col-md-12 grid-margin">
              <div class="row">
                     <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">COMMANDES</h3>
                            <h6 class="font-weight-normal mb-0">Liste commandes</h6>
                     </div>
              </div>
       </div>
</div>
<div class="row">
       <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                     <div class="card-body">
                            <p class="card-title">Liste</p>
                            <!-- <p style="color:red;">Toutes commandes présentes ici ne sont pas encore livré en totalité.</p> -->
                            <div class="row">
                                   <div class="col-12">
                                          <div class="table-responsive">
                                                 <table id="example" class="display expandable-table" style="width:100%">
                                                        <thead>
                                                               <tr>
                                                                      <th>id</th>
                                                                      <th>Libelle</th>
                                                                      <th>Date</th>
                                                                      <th></th>
                                                               </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $id = 0;
                                                        // echo var_dump($commandes);
                                                        // echo var_dump($produits);
                                                        if (isset($error)) { ?>
                                                               <p style="color:red;"><?php echo $error; ?></p>
                                                        <?php } 
                                                        if (isset($success)) { ?>
                                                               <p style="color:green;"><?php echo $success; ?></p>
                                                        <?php } 
                                                        foreach ($commandes as $com) {
                                                               // echo $com['id_attestation'];
                                                               $qt = $this->BonDeLivraisonModel->getDetailLivraison($com['id_attestation']);
                                                               $qt_restante = $qt['quantite_restante'];
                                                               $qt_livree = $qt['quantite_livree'];
                                                               $id_bon_livraison = $qt['id_attestation'];
                                                               if ($qt_restante > 0) {       
                                                        ?>
                                                               <tr class="odd">
                                                                      <td class="sorting_1"><?php echo $com['id_attestation'];?></td>
                                                                      <td><?php echo $com['libelle'];?></td>
                                                                      <td><?php echo $com['date_attestation']; ?></td>
                                                                      <td><button type="button" class="btn btn-outline-primary btn-fw" onclick="toggleDetails('details<?php echo $id;?>')">Details</button></td>
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
                                                                                                                              <div class="col-md-6 grid-margin stretch-card">
                                                                                                                                     <div class="card">
                                                                                                                                            <div class="card-body">
                                                                                                                                                   <h4 class="card-title">Entreprise :  <code>Bakery</code></h4>
                                                                                                                                                   <div class="row">
                                                                                                                                                          <div class="col-md-7"></div>
                                                                                                                                                          <div class="col-md-5">
                                                                                                                                                                 <!-- <p class="font-weight-bold">Fournisseur : <code>Nom_fournisseur</code>  </p> -->
                                                                                                                                                          </div>
                                                                                                                                                   </div>
                                                                                                                                                   <p class="font-weight-bold">Date : <code><?php echo $com['date_attestation'] ?></code></p>
                                                                                                                                                   <p class="font-weight-bold">Centre : <code><?php echo $this->CentreModel->getById($com['id_centre'])['nom_centre']; ?></code></p>
                                                                                                                                                   <div class="row">
                                                                                                                                                          <div class="col-md-12 stretch-card grid-margin">
                                                                                                                                                                 <div class="card-body">
                                                                                                                                                                        <div class="table-responsive">
                                                                                                                                                                               <table class="table table-borderless">
                                                                                                                                                                                      <thead>
                                                                                                                                                                                             <tr>
                                                                                                                                                                                                    <th class="pl-0  pb-2 border-bottom">Nom</th>
                                                                                                                                                                                                    <th class="border-bottom pb-2">Prix unitaire</th>
                                                                                                                                                                                                    <th class="border-bottom pb-2">Quantite</th>
                                                                                                                                                                                                    <th class="border-bottom pb-2">Total</th>
                                                                                                                                                                                             </tr>
                                                                                                                                                                                      </thead>
                                                                                                                                                                                      <tbody>
                                                                                                                                                                                      <?php
                                                                                                                                                                                      $total = 0;
                                                                                                                                                                                      $produitsInAttestation = $this->ProduitInAttestationModel->getProduitByAttestation($com['id_attestation']);
                                                                                                                                                                                      foreach($produitsInAttestation as $prod) { ?>
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
                                                                                                                                                          <div class="col-md-12">
                                                                                                                                                                 <p style="color:green;">Total déjà livrée : <?php echo $qt_livree; ?></p>
                                                                                                                                                          </div>
                                                                                                                                                          <div class="col-md-12">
                                                                                                                                                                 <p style="color:green;">Reste à livrer : <?php echo $qt_restante; ?></p>
                                                                                                                                                          </div>
                                                                                                                                                          <div class="col-md-12">
                                                                                                                                                                 <p style="color:green;">Voir bon de livraison N°: <?php echo $id_bon_livraison; ?> pour plus de détails.</p> 
                                                                                                                                                          </div>
                                                                                                                                                   </div>
                                                                                                                                            </div>
                                                                                                                                     </div>
                                                                                                                              </div>
                                                                                                                              <div class="col-md-6 grid-margin stretch-card">
                                                                                                                                     <div class="card">
                                                                                                                                            <div class="card-body">
                                                                                                                                                   <!-- Atao eo amle ? le reste  -->
                                                                                                                                                   <h4 class="card-title">Création de bon de livraison</h4>
                                                                                                                                                   <p class="card-description"></p>
                                                                                                                                                   <form class="forms-sample" method="post" action="<?php echo site_url('LivraisonController/insert'); ?>">
                                                                                                                                                          <input type="hidden" name="id_commande" value="<?php echo $com['id_attestation']; ?>">
                                                                                                                                                          <div class="form-group">
                                                                                                                                                                 <label for="date">Date</label>
                                                                                                                                                                 <input type="date" class="form-control" id="date" name="date" placeholder="date" required>
                                                                                                                                                          </div>
                                                                                                                                                          <div class="form-group">
                                                                                                                                                                 <label for="libelle">Libelle</label>
                                                                                                                                                                 <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Text" required>
                                                                                                                                                          </div>
                                                                                                                                                          <div class="form-group">
                                                                                                                                                                 <label for="id_centre">Centre</label>
                                                                                                                                                                 <select class="form-control" id="id_centre" name="id_centre">
                                                                                                                                                                        <?php foreach($centres as $centre) { ?>
                                                                                                                                                                               <option value="<?php echo $centre['id_centre']; ?>">
                                                                                                                                                                                      <?php echo $centre['nom_centre']; ?>
                                                                                                                                                                               </option>
                                                                                                                                                                        <?php } ?>
                                                                                                                                                                 </select>
                                                                                                                                                          </div>
                                                                                                                                                          <div class="form-group">
                                                                                                                                                                 <label for="id_prod">Produit</label>
                                                                                                                                                                 <select class="form-control" id="id_prod" name="id_prod">
                                                                                                                                                                        <?php foreach($produits as $produit) { ?>
                                                                                                                                                                               <option value="<?php echo $produit['id_produit']; ?>">
                                                                                                                                                                                      <?php echo $produit['nom_produit']; ?>
                                                                                                                                                                               </option>
                                                                                                                                                                        <?php } ?>
                                                                                                                                                                 </select>
                                                                                                                                                          </div>
                                                                                                                                                          <div class="form-group">
                                                                                                                                                                 <label for="quantite">Quantité</label>
                                                                                                                                                                 <input type="number" class="form-control" id="quantite" name="quantite" placeholder="00" required>
                                                                                                                                                          </div>
                                                                                                                                                          <div class="form-group">
                                                                                                                                                                 <label for="montant">Montant</label>
                                                                                                                                                                 <input type="text" class="form-control" id="montant" name="montant" placeholder="00" required>
                                                                                                                                                          </div>
                                                                                                                                                          <button type="submit" class="btn btn-primary mr-2">VALIDER</button>
                                                                                                                                                          <div class="col-md-5  dropdown">
                                                                                                                                                                 <button type="button" class="btn btn-outline-danger" id="dropupMenuIconButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                                                                                        <i class="mdi mdi-help"></i>
                                                                                                                                                                 </button>
                                                                                                                                                                 <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton3">
                                                                                                                                                                        <!-- <a class="dropdown-item" href="#">Le bon de livraison à crée doit être égale au bon de commande associé, vérifier les propriétés suivants : </a> -->
                                                                                                                                                                        <h6 class="dropdown-header">Si livraison partielle : </h6>
                                                                                                                                                                        <a class="dropdown-item" href="#">- Quantité total et montant (unitaire) de chaque partielles dans bon de livraison doit être égale au bon de commande. </a>
                                                                                                                                                                        <h6 class="dropdown-header">Si livraison totale : </h6>
                                                                                                                                                                        <a class="dropdown-item" href="#">- Quantité et  montant (unitaire) dans bon de livraison doit être égale au bon de commande. </a>
                                                                                                                                                                        <!-- <a class="dropdown-item" href="<?php echo site_url('CaisseController'); ?>"></a> -->
                                                                                                                                                                 </div>
                                                                                                                                                          </div>
                                                                                                                                                   </form>
                                                                                                                                            </div>
                                                                                                                                     </div>
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
                                                        <?php } else if ($qt_restante == 0) { ?>
                                                               <tr class="odd">
                                                                      <td class="sorting_1"><?php echo $com['id_attestation'];?></td>
                                                                      <td><?php echo $com['libelle'];?></td>
                                                                      <td><?php echo $com['date_attestation']; ?></td>
                                                                      <td><button type="button" class="btn btn-outline-primary btn-fw" onclick="toggleDetails('details<?php echo $id;?>')">Details</button></td>
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
                                                                                                                              <div class="col-md-12 grid-margin stretch-card">
                                                                                                                                     <div class="card">
                                                                                                                                            <div class="card-body">
                                                                                                                                                   <h4 class="card-title">Entreprise :  <code>Bakery</code></h4>
                                                                                                                                                   <div class="row">
                                                                                                                                                          <div class="col-md-7"></div>
                                                                                                                                                          <div class="col-md-5">
                                                                                                                                                                 <!-- <p class="font-weight-bold">Fournisseur : <code>Nom_fournisseur</code>  </p> -->
                                                                                                                                                          </div>
                                                                                                                                                   </div>
                                                                                                                                                   <p class="font-weight-bold">Date : <code><?php echo $com['date_attestation'] ?></code></p>
                                                                                                                                                   <p class="font-weight-bold">Centre : <code><?php echo $this->CentreModel->getById($com['id_centre'])['nom_centre']; ?></code></p>
                                                                                                                                                   <div class="row">
                                                                                                                                                          <div class="col-md-12 stretch-card grid-margin">
                                                                                                                                                                 <div class="card-body">
                                                                                                                                                                        <div class="table-responsive">
                                                                                                                                                                               <table class="table table-borderless">
                                                                                                                                                                                      <thead>
                                                                                                                                                                                             <tr>
                                                                                                                                                                                                    <th class="pl-0  pb-2 border-bottom">Nom</th>
                                                                                                                                                                                                    <th class="border-bottom pb-2">Prix unitaire</th>
                                                                                                                                                                                                    <th class="border-bottom pb-2">Quantite</th>
                                                                                                                                                                                                    <th class="border-bottom pb-2">Total</th>
                                                                                                                                                                                             </tr>
                                                                                                                                                                                      </thead>
                                                                                                                                                                                      <tbody>
                                                                                                                                                                                      <?php
                                                                                                                                                                                      $total = 0;
                                                                                                                                                                                      $produitsInAttestation = $this->ProduitInAttestationModel->getProduitByAttestation($com['id_attestation']);
                                                                                                                                                                                      foreach($produitsInAttestation as $prod) { ?>
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
                                                                                                                                                          <div class="col-md-3">
                                                                                                                                                                 <p style="color:green;">Tout a été livré avec succès.</p>
                                                                                                                                                          </div>
                                                                                                                                                          <div class="col-md-9">        
                                                                                                                                                                 <form action="<?php echo site_url('FactureController/insert'); ?>" method="post">
                                                                                                                                                                        <input type="hidden" name="id_attestation" value="<?php echo $com['id_attestation']; ?>">
                                                                                                                                                                        <button type="submit" class="btn btn-outline-success btn-fw">Créer une facture</button>
                                                                                                                                                                 </form>
                                                                                                                                                          </div>
                                                                                                                                                          
                                                                                                                                                   </div>
                                                                                                                                            </div>
                                                                                                                                     </div>
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
                                                        <?php } ?>

                                                        <?php $id+=1;
                                                        }?>
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