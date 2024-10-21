<div class="row">
       <div class="col-md-3"></div>
       <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                     <div class="card-body">
                            <h4 class="card-title">Entree stock</h4>
                            <!-- <p class="card-description">formulaire</p> -->
                            <?php if (isset($error)) { ?>
                                   <p style="color:red;"><?php echo $error; ?></p>
                            <?php } if (isset($success)) { ?>
                                   <p style="color:green;"><?php echo $success; ?></p>
                            <?php } ?>
                            <form class="forms-sample" action="<?php echo site_url('StockController/insert') ;?>" method="post">
                                   <div class="form-group row">
                                          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Date</label>
                                          <div class="col-sm-9">
                                                 <input type="Date" class="form-control" id="exampleInputUsername2" placeholder="Date" name="date">
                                          </div>
                                   </div>
                                   <div class="form-group row">
                                          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Quantite</label>
                                          <div class="col-sm-9">
                                                 <input type="number" class="form-control" id="exampleInputEmail2" placeholder="00" name="quantite">
                                          </div>
                                   </div>
                                   <div class="form-group row">
                                          <label class="col-sm-3 col-form-label">Produit</label>
                                          <div class="col-sm-9">
                                                 <select class="form-control" name="id_produit">
                                                        <?php foreach ($produits as $produit) { ?>
                                                               <option value="<?php echo $produit['id_produit'] ;?>" ><?php echo $produit['nom_produit'] ; ?></option>
                                                        <?php } ?>
                                                 </select>
                                          </div>
                                   </div>
                                   <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                                   <!-- <button type="submit" class="btn btn-primary mr-2">Submit</button> -->
                            </form>
                     </div>
              </div>
       </div>
</div>