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
                            <form class="forms-sample">
                                   <div class="form-group">
                                          <label for="exampleTextarea1">Description</label>
                                          <textarea class="form-control" id="exampleTextarea1" name="desc" rows="3" required></textarea>
                                   </div>
                                   <div class="form-group">
                                          <label for="exampleInputUsername1">Quantite</label>
                                          <input type="number" class="form-control" id="qt" placeholder="00" required>
                                   </div>
                                   <div class="row checkbox">              
                                          <?php foreach ($produits as $prod) { ?>
                                                 <div class="col-md-3 col-md-offset-1 form-group">
                                                        <div class="form-check form-check-info">
                                                               <input type="checkbox" class="form-check-input">
                                                              <?php echo $prod['id_produit']; ?>
                                                        </div>
                                                 </div>
                                          <?php } ?>
                                   </div>
                                   <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </form>
                     </div>
              </div>
       </div>
</div>