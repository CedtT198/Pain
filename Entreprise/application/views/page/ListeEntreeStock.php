<div class="col-lg-12 grid-margin stretch-card">
       <div class="card">
              <div class="card-body">
                     <h4 class="card-title">Liste entree stock</h4>
                     <!-- <p class="card-description">
                            Add class <code>.table-striped</code>
                     </p> -->
                     <div class="table-responsive">
                            <table class="table table-striped">
                                   <thead>
                                          <tr>
                                                 <th>Date</th>
                                                 <th>Quantite</th>
                                                 <th>Produit</th>
                                          </tr>
                                   </thead>
                                    <tbody>
                                          <?php foreach ($listeStock as $stock) {  
                                                 $produit = $this->ProduitModel->getById($stock['id_produit']);
                                          ?>
                                                 <tr>
                                                        <td class="py-1"><?php echo $stock['date_input'] ;?></td>
                                                        <td><?php echo $stock['quantite']  ;?></td>
                                                        <td><?php echo $produit['nom_produit'] ;?></td>
                                                 </tr>
                                          <?php } ?>
                                   </tbody>
                            </table>
                     </div>
              </div>
       </div>
</div>