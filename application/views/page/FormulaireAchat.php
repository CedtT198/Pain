<div class="row">
       <div class="col-md-3"></div>
       <div class=" col-md-6 grid-margin stretch-card">
              <div class="card">
                     <div class="card-body">
                     <h4 class="card-title">PRODUCTION</h4>
                     <p class="card-description"></p>
                     
                     <form class="forms-sample" action="<?php echo site_url('AchatController/insert'); ?>" method="post">
                    <div class="form-group">
                            <label for="qt">Quanitté</label>
                            <input type="number" class="form-control" id="qt" placeholder="00" name="qt" required>
                    </div>
                    
                    <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    
                    <?php if (isset($error)) { ?>
                            <p style="color:red;"><?php echo $error; ?></p>
                     <?php } ?>

                     <button type="submit" class="btn btn-primary mr-2">Submit</button>
                     </form>
                     </div>
              </div>
       </div>
       <div class="col-md-3"></div>
</div>