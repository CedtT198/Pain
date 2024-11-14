<div class="row">
       <div class="col-md-3"></div>
       <div class=" col-md-6 grid-margin stretch-card">
              <div class="card">
                     <div class="card-body">
                     <h4 class="card-title">UNITE d' OEUVRE</h4>
                     <p class="card-description"></p>
                     <form class="forms-sample" action="<?php echo site_url('UniteOeuvreController/insert'); ?>" method="post">
                            <div class="form-group">
                                   <label for="Nom">Nom</label>
                                   <input type="text" class="form-control" id="Nom" name="nom"  placeholder="nom">
                            </div>
                            <div class="form-group">
                                   <label for="Abreviation">Abreviation</label>
                                   <input type="text" class="form-control" id="Abreviation" name="abreviation" placeholder="abreviation">
                            </div>
                     <button type="submit" class="btn btn-primary mr-2">Submit</button>
                     </form>
                     </div>
              </div>
       </div>
       <div class="col-md-3"></div>
</div>