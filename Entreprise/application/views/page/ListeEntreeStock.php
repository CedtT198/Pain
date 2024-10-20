<div class="col-lg-12 grid-margin stretch-card">
       <div class="card">
              <div class="card-body">
                     <h4 class="card-title">Liste entree stock</h4>
                     <p class="card-description">
                            Add class <code>.table-striped</code>
                     </p>
                     <div class="table-responsive">
                            <table class="table table-striped">
                                   <thead>
                                          <tr>
                                                 <th>DATE</th>
                                                 <th>QUANTITE</th>
                                                 <th>PRODUIT</th>
                                          </tr>
                                   </thead>
                                    <tbody>
                                          <?php foreach ($isteStock as $stock) {  
                                                 $produit = $this->ProduitModel->getById($stock['id_produit']);
                                          ?>
                                                 <tr>
                                                        <td class="py-1"><?php $stock['date_input'] ;?></td>
                                                        <td><?php $stock['quantite']  ;?></td>
                                                        <td><?php $produit['nom_produit'] ;?></td>
                                                 </tr>
                                          <?php } ?>
                                   </tbody>
                            </table>
                     </div>
              </div>
       </div>
</div>