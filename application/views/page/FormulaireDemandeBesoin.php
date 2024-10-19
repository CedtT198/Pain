<style>
       .checkbox {
              margin-left: 20px;
       }
</style>
<div class="row">
       <div class="col-md-3"></div>
       <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                     <div class="card-body">
                            <h4 class="card-title">Demande besoin</h4>
                            <p class="card-description">
                                   formulaire
                            </p>
                            <?php if (isset($error)) { ?>
                                   <p style="color:red;"><?php echo $error; ?></p>
                            <?php } ?>
                            <form class="forms-sample" action="<?php echo site_url('DemandeBesoinController/insert'); ?>" method="post">
                                   <div class="form-group">
                                          <label for="desc">Description</label>
                                          <textarea class="form-control" id="desc" name="desc" rows="3" required></textarea>
                                   </div>
                                   <div class="form-group">
                                          <label for="produit">Produit</label>
                                          <input type="text" class="form-control" id="produit" name="nom_produit" placeholder="Nom du produit" required>
                                   </div>
                                   <div class="form-group">
                                          <label for="qt">Quantite</label>
                                          <input type="number" class="form-control" id="qt" name="qt" placeholder="00" required>
                                   </div>
                                   <div class="form-group">
                                          <label for="montant">Montant unitaire</label>
                                          <input type="number" class="form-control" id="montant" name="montant" placeholder="00" required>
                                   </div>
                                   <!-- <div class="row checkbox">              
                                          <?php foreach ($produits as $prod) { ?>
                                                 <div class="col-md-3 col-md-offset-1 form-group">
                                                        <div class="form-check form-check-info">
                                                               <input type="checkbox" class="form-check-input">
                                                              <?php echo $prod['id_produit']; ?>
                                                        </div>
                                                 </div>
                                          <?php } ?>
                                   </div> -->
                                   <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </form>
                     </div>
              </div>
       </div>
</div>