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
                                          <textarea class="form-control" id="exampleTextarea1" rows="3"></textarea>
                                   </div>
                                   <div class="form-group">
                                          <label for="exampleInputUsername1">Quantite</label>
                                          <input type="number" class="form-control" id="exampleInputUsername1" placeholder="00">
                                   </div>
                                   <div class="row checkbox">
                                          <!-- ==== boucle ========= -->
                                          <div class="col-md-3 col-md-offset-1 form-group">
                                                 <div class="form-check form-check-info">
                                                        <!-- <label class="form-check-label"> -->
                                                               <input type="checkbox" class="form-check-input" checked>
                                                               exemple produit
                                                        <!-- </label> -->
                                                 </div>
                                          </div>
                                          <!-- ==== fin boucle ========= -->
                                   </div>
                                   <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </form>
                     </div>
              </div>
       </div>
</div>